<?php

namespace App\Http\Controllers\User;

// modify
use Image;
use Cookie;
use App\PaymentInfo;
use App\Advertisement;
use App\Slider\Slider;
use App\MainCategory;
use App\SubCategory;
use App\InnerCategory;
use App\UserInformation;
use App\Image as ImageModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class BuySaleAdController extends Controller
{
	public function storeBuysaleform(Request $request)
	{
		
		$images_arr = [];
		if ($request->hasFile('files')) {
			foreach ($request->file('files') as $key => $image) {
				$name = 'buy_Sale_alt_' . time() . $key . '.' . $image->getClientOriginalExtension();
				$image->move('buySaleImages', $name);
				$images_arr[$key]['type'] = 'alt';
				$images_arr[$key]['image'] = $name;
			}
		}
		if ($request->hasFile('cover')) {
			$image = $request->file('cover');
			$image_name = 'buy_Sale_thumbnail_' . time() . '.' . $image->getClientOriginalExtension();
			$destinationPath = 'ad_thumbnail';
			$resize_image = Image::make($image->getRealPath());
			$resize_image->resize(250, 180, function ($constraint) {
				$constraint->aspectRatio();
			})->save($destinationPath . '/' . $image_name);

			$image->move('buySaleImages', $image_name);
			$n = count($images_arr);
			$images_arr[$n]['type'] = 'cover';
			$images_arr[$n]['image'] = $image_name;
		}
		$data = new Advertisement;
		$data->cat = 'buy-sale';
		$data->form_type = $request->form_type;
		$data->sub_cat = $request->sub_cat?:null;
		$data->inner_cat = $request->inner_cat?:null;
		$data->title = $request->title;
		$data->description = $request->description;
		$data->price = intval($request->price);
		$data->city = $request->city;
		$data->address = $request->address;
		$data->featured = 0;
		$data->suspend = 0;
		$data->user_id = Auth::user()->_id;
		$data->save();
		foreach ($images_arr as $value) {
			$image = $data->images()->create($value);
		}

		$poster_info = $data->userInfo()->create([
			'contact_mail' => $request->contact_mail,
			'contact_number' => $request->contact_number,
			'additional_number' => $request->additional_number,
			'contact_name' => $request->contact_name
		]);
		if ($request->contact_number_update) {
			$up_number = $request->contact_number;
			UserInformation::where('user_id', Auth::user()->_id)->update(['phone' => $up_number]);
		}
		if ($request->contact_email_update) {
			$up_email = $request->contact_mail;
			UserInformation::where('user_id', Auth::user()->_id)->update(['secondary_email' => $up_email]);
		}
		if ($request->contact_name_update) {
			$up_name = $request->contact_name;
			UserInformation::where('user_id', Auth::user()->_id)->update(['name' => $up_name]);
		}
		if ($request->contact_address_update) {
			$up_address = $request->address;
			UserInformation::where('user_id', Auth::user()->_id)->update(['address' => $up_address]);
		}
		$request->session()->put(
			'ad_info',
			[
				'post_id' => $data->_id
			]
		);

		$notification_ad = [];
		if (Cookie::get('notification_ad') == null) {
			$notification_ad[$data->_id]['all_table_id'] = $data->_id;
		} else {
			$notification_ad = (array) json_decode(Cookie::get('notification_ad'));
			$notification_ad[$data->_id]['all_table_id'] = $data->_id;
		}
		Cookie::queue('notification_ad', json_encode($notification_ad), 518400);
		$request->session()->put('insert', 1);
		return 1;
	}

	public function buySaleBrowse()
	{
		$data['category'] = MainCategory::where('category_name', 'buy / sale')->first();
		$data['sub_cats'] = SubCategory::where('main_cat_id', $data['category']->_id)->orderBy('category_name', 'asc')->get();
		$data['inner_categories'] = InnerCategory::orderBy('category_name')->get()->sortBy('category_name', SORT_NATURAL | SORT_FLAG_CASE);

		$data['sliders'] = Slider::where('slider_type', 'buy-sale')
			->orderBy('created_at', 'desc')
			->get();
		$data['feature_products'] = PaymentInfo::whereNotNull('advert_id')
			->with(['advertisement' => function ($q) {
				return $q->where('cat', 'buy-sale')
					->orderBy('created_at', 'desc')
					->with('coverImage');
			}])
			->orderBy('created_at', 'desc')
			->limit(12)
			->get();
		$data['ad_products'] = PaymentInfo::whereNotNull('promot_id')
			->with(['advertisement' => function ($q) {
				return $q->where('cat', 'buy-sale')
					->orderBy('created_at', 'desc')
					->with('coverImage');
			}])
			->orderBy('created_at', 'desc')
			->limit(4)
			->get();
		// dd($data['ad_products']);
		return view('frontend.category.buy-sale.buy-sale-browse', $data);
	}

	public function searchBuySale(Request $request)
	{


		dd($request->all());

		$form_type = $request->form_type;
		$title = $request->title;
		$price = (int)$request->price;

		$data['advertisements']  = Advertisement::where('cat', 'buy-sale')
			->when($form_type, function ($q) use ($form_type) {
				$q->where('form_type', $form_type);
			})
			->when($title, function ($q) use ($title) {
				$q->where('title', 'like', "%$title%");
			})
			->when($price, function ($q) use ($price) {
				$q->where('price', '>=', $price);
			})
			->orderBy('created_at', 'desc')
			->with('coverImage')
			->paginate(12);
		$data['category'] = MainCategory::where('cat_key', 'buy-sale')->first();
		$data['sub_cats'] = SubCategory::where('main_cat_id', $data['category']->_id)->orderBy('category_name', 'asc')->get();
		$data['inner_categories'] = InnerCategory::orderBy('category_name')->get()->sortBy('category_name', SORT_NATURAL | SORT_FLAG_CASE);
		return view('frontend.category.buy-sale.buy-sale-search-result', $data);
	}
	public function buySaleFilter(Request $request)
	{
		$form_type =  $request->form_type;
		$title = $request->title;
		$min_price = (int)$request->min_price;
		$max_price = (int)$request->max_price;

		$data['advertisements']  = Advertisement::where('cat', 'buy-sale')
			->when($form_type, function ($q) use ($form_type) {
				$q->where('form_type', $form_type);
			})
			->when($title, function ($q) use ($title) {
				$q->where('title', 'like', "%$title%");
			})
			->when($min_price && $max_price, function ($q) use ($min_price, $max_price) {
				$q->whereBetween('price', [$min_price, $max_price]);
			})
			->when($min_price && $max_price == 0, function ($q) use ($min_price) {
				$q->where('price', '>=', $min_price);
			})
			->when($max_price && $min_price == 0, function ($q) use ($max_price) {
				$q->where('price', '<=', $max_price);
			})
			->orderBy('created_at', 'desc')
			->with('coverImage')
			->paginate(12);
		$view = view('frontend.category.services.services-listing-section', $data)->render();
		return json_encode($view);
	}

	public function updateBuySale(Request $request)
	{

		$data = Advertisement::where('_id', $request->post_id)->first();
		$images_arr = [];
		if ($request->hasFile('files')) {
			foreach ($request->file('files') as $key => $image) {
				$name = 'buysale_alt_' . time() . $key . '.' . $image->getClientOriginalExtension();
				$image->move('buySaleImages', $name);
				$images_arr[$key]['type'] = 'alt';
				$images_arr[$key]['image'] = $name;
			}
		}
		if ($request->hasFile('cover')) {
			$c = ImageModel::where('post_id', $request->post_id)->where('type', 'cover')->first();
			if ($c) {
				$cover = $c['image'];
				$c_thumb = 'ad_thumbnail/' . $cover;
				$c_alt = 'buySaleImages/' . $cover;
				if (file_exists($c_thumb)) {
					unlink($c_thumb);
				}
				if (file_exists($c_alt)) {
					unlink($c_alt);
				}
				$c->delete();
			}
			$image = $request->file('cover');
			$image_name = 'buysale_thumbnail_' . time() . '.' . $image->getClientOriginalExtension();
			$destinationPath = 'ad_thumbnail';
			$resize_image = Image::make($image->getRealPath());
			$resize_image->resize(250, 180, function ($constraint) {
				$constraint->aspectRatio();
			})->save($destinationPath . '/' . $image_name);

			$image->move('buySaleImages', $image_name);
			$n = count($images_arr);
			$images_arr[$n]['type'] = 'cover';
			$images_arr[$n]['image'] = $image_name;
		}
		$data->title = $request->title;
		$data->description = $request->description;
		$data->price = intval($request->price);
		$data->city = $request->city;
		$data->address = $request->address;
		$data->save();
		$data->userInfo->update([
			'contact_mail' => $request->contact_mail,
			'contact_number' => $request->contact_number,
			'additional_number' => $request->additional_number,
			'contact_name' => $request->contact_name
		]);
		foreach ($images_arr as $value) {
			$image = $data->images()->create($value);
		}
		return 1;
	}
}
