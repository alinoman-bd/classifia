<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Session;
use Cookie;
use DB;
use Illuminate\Support\Facades\Hash;

use App\MainCategory;
use App\SubCategory;
use App\InnerCategory;


use App\Services\ServicesForm;
use App\Services\ServicesAdPosterInfo;


use App\AllAd;
use App\Search;
use App\UserInformation;
use App\PaymentInfo;
use App\Slider\Slider;

// modify
use Image;
use App\Advertisement;
use App\Image as ImageModel;


class ServicesController extends Controller
{
	public function ServiceForm($sub_cat = null, $inner_cat = null, $th_cat = null)
	{
		if ($th_cat) {
			$data['cat'] = $th_cat;
			$data['sub_cat'] = $sub_cat;
			$data['inner_cat'] = $inner_cat;
		} elseif ($inner_cat) {
			$data['cat'] = $inner_cat;
			$data['sub_cat'] = $sub_cat;
		} else {
			$data['cat'] = $sub_cat;
		}
		return view('frontend.category.services.category-form', $data);
	}

	public function storeServicesform(Request $request)
	{

		$images_arr = [];
		if ($request->hasFile('files')) {
			foreach ($request->file('files') as $key => $image) {
				$name = 'services_alt_' . time() . $key . '.' . $image->getClientOriginalExtension();
				$image->move('ServicesImages', $name);
				$images_arr[$key]['type'] = 'alt';
				$images_arr[$key]['image'] = $name;
			}
		}
		if ($request->hasFile('cover')) {
			$image = $request->file('cover');
			$image_name = 'services_thumbnail_' . time() . '.' . $image->getClientOriginalExtension();
			$destinationPath = 'ad_thumbnail';
			$resize_image = Image::make($image->getRealPath());
			$resize_image->resize(250, 180, function ($constraint) {
				$constraint->aspectRatio();
			})->save($destinationPath . '/' . $image_name);

			$image->move('ServicesImages', $image_name);
			$n = count($images_arr);
			$images_arr[$n]['type'] = 'cover';
			$images_arr[$n]['image'] = $image_name;
		}
		$data = new Advertisement;
		$data->cat = 'services';
		$data->form_type = $request->form_type;
		$data->sub_cat = $request->sub_cat ?: null;
		$data->inner_cat = $request->inner_cat ?: null;
		$data->title = $request->title;
		$data->description = $request->description;
		$data->price = intval($request->price);
		$data->web_url = $request->web_url;
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

	public function servicesBrowse(Request $request)
	{
		$data['category'] = MainCategory::where('cat_key', 'services')->first();
		$data['sub_cats'] = SubCategory::where('main_cat_id', $data['category']->_id)->orderBy('category_name', 'asc')->get();
		$data['inner_categories'] = InnerCategory::orderBy('category_name')->get()->sortBy('category_name', SORT_NATURAL | SORT_FLAG_CASE);

		$data['sliders'] = Slider::where('slider_type', 'services')->orderBy('created_at', 'desc')->get();
		$data['feature_products'] = PaymentInfo::whereNotNull('advert_id')
			->with(['advertisement' => function ($q) {
				return $q->where('cat', 'services')
					->orderBy('created_at', 'desc')
					->with('coverImage');
			}])
			->orderBy('created_at', 'desc')
			->limit(12)
			->get();
		$data['ad_products'] = PaymentInfo::whereNotNull('promot_id')
			->with(['advertisement' => function ($q) {
				return $q->where('cat', 'services')
					->orderBy('created_at', 'desc')
					->with('coverImage');
			}])
			->orderBy('created_at', 'desc')
			->limit(12)
			->get();
		return view('frontend.category.services.services-browse', $data);
	}

	public function searchServices(Request $request)
	{
		$form_type = $request->form_type;
		$title = $request->title;
		$price = (int)$request->price;

		$data['advertisements']  = Advertisement::where('cat', 'services')
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
		$data['form_type'] = $request->form_type;
		$data['category'] = MainCategory::where('category_name', 'services')->first();
		$data['sub_cats'] = SubCategory::where('main_cat_id', $data['category']->_id)->orderBy('category_name', 'asc')->get();
		$data['inner_categories'] = InnerCategory::orderBy('category_name')->get()->sortBy('category_name', SORT_NATURAL | SORT_FLAG_CASE);
		return view('frontend.category.services.services-search-result', $data);
	}

	// public function serviceDetails($post_id, $form_type){
	// 	$data['services'] = ServicesForm::where('_id',$post_id)->with('servicesAdPosterInfo')->first();
	// 	return view('frontend.category.services.services-details',$data);
	// }

	// public function serviceGetActiveData(Request $request){
	// 	$form_type = $request->form_type; 
	// 	$data['services']  = ServicesForm::when($form_type, function($q) use($form_type) {
	// 		$q->where('form_type',$form_type);
	// 	})
	// 	->orderBy('created_at', 'desc')
	// 	->get();
	// 	$html = '';
	// 	if($data['services']->count() == 0){
	// 		$html .= '<h1>No data!</h1>';
	// 	}else{
	// 		foreach ($data['services'] as $service) {
	// 			$post_id = $service->_id;
	// 			if (!$request->form_type) {
	// 				$form_type = $service->form_type;
	// 			}
	// 			$html .= '<a href="'.url('view-service-details', ['post_id' => $post_id, 'cat' => $form_type]).'" class="re-link">
	// 			<div class="m-side-list mar-b-15 ">
	// 			<div class="m-side-img"><img class="cover" src="'.('ServicesImages/'.$service->basic_img).'" alt="product"></div>
	// 			<div class="m-side-cnt">
	// 			<span class="fav"><i class="far fa-heart"></i></span>
	// 			<div class="star"><i class="far fa-star"></i> Features</div>
	// 			<div class="loc-name"><i class="fas fa-map-marker-alt"></i> '.$service->address.'</div>
	// 			<div class="house-name">'.ucfirst($service->title).'</div>
	// 			<div class="house-price-len">
	// 			<span class="h-len-txt">'.str_replace("-"," ",ucfirst($form_type)).'</span>
	// 			</div>
	// 			<div class="house-price-len">
	// 			<span class=""><i class="far fa-money">$</i> '.$service->price.'</span>
	// 			<span class=""><i class="far fa-clock"></i> '.$service->created_at->diffForHumans().'</span>
	// 			</div>
	// 			</div>
	// 			</div>
	// 			</a>';
	// 		}
	// 	}
	// 	return $html;
	// }


	public function serviceFilter(Request $request)
	{
		$form_type = $request->form_type;
		$address = $request->address;
		$title = $request->title;
		$min_price = (int)$request->min_price;
		$max_price = (int)$request->max_price;

		$data['advertisements']  = Advertisement::where('cat', 'services')
			->when($form_type, function ($q) use ($form_type) {
				$q->where('form_type', $form_type);
			})
			->when($title, function ($q) use ($title) {
				$q->where('title', 'like', "%$title%");
			})
			->when($address, function ($q) use ($address) {
				$q->where('address', 'like', "%$address%");
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

	public function updateServices(Request $request)
	{
		$data = Advertisement::where('_id', $request->post_id)->first();

		$images_arr = [];
		if ($request->hasFile('files')) {
			foreach ($request->file('files') as $key => $image) {
				$name = 'service_alt_' . time() . $key . '.' . $image->getClientOriginalExtension();
				$image->move('ServicesImages', $name);
				$images_arr[$key]['type'] = 'alt';
				$images_arr[$key]['image'] = $name;
			}
		}
		if ($request->hasFile('cover')) {
			$c = ImageModel::where('post_id', $request->post_id)->where('type', 'cover')->first();
			if ($c) {
				$cover = $c['image'];
				$c_thumb = 'ad_thumbnail/' . $cover;
				$c_alt = 'ServicesImages/' . $cover;
				if (file_exists($c_thumb)) {
					unlink($c_thumb);
				}
				if (file_exists($c_alt)) {
					unlink($c_alt);
				}
				$c->delete();
			}
			$image = $request->file('cover');
			$image_name = 'service_thumbnail_' . time() . '.' . $image->getClientOriginalExtension();
			$destinationPath = 'ad_thumbnail';
			$resize_image = Image::make($image->getRealPath());
			$resize_image->resize(250, 180, function ($constraint) {
				$constraint->aspectRatio();
			})->save($destinationPath . '/' . $image_name);

			$image->move('ServicesImages', $image_name);
			$n = count($images_arr);
			$images_arr[$n]['type'] = 'cover';
			$images_arr[$n]['image'] = $image_name;
		}
		$data->title = $request->title;
		$data->description = $request->description;
		$data->price = intval($request->price);
		$data->web_url = $request->web_url;
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
