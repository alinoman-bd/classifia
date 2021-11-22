<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Favourite;
use Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use Cookie;
use App\UserInformation;

use Carbon\Carbon;
// house
use App\House\Apartment;
use App\House\Plot;
use App\House\FirmsForest;
use App\House\LeisureHotel;
use App\House\Other;
use App\House\Office;
use App\House\TownHouse;
use App\House\Villa;
use App\House\HouseCommonRecord;
use App\House\HouseAdPosterInfo;

// cars
use App\UsedCar;
use App\WaterBike;
use App\Sailboat;
use App\WaterTransportOther;
use App\MotorandEngine;
use App\Motorboat;
use App\KayaksCanoe;
use App\PersonalWaterCraft;
use App\BoatsRaft;
use App\PassengerVan;
use App\Minibus;
use App\Buses;
use App\TrailersandSemitrailers;
use App\Motorcycles;
use App\Trucks;
use App\SemiTrailerTrucks;
use App\Autotrains;
use App\StorageandLoadingEquipment;
use App\MunicipalMachinery;
use App\ConstructionMachineryAccessories;
use App\ConstructionandRoadConstructionEquipment;
use App\ForestMachinery;
use App\AgriculturalMachinery;
use App\AgriculturalImplements;
use App\RecreationalVehiclesCampare;
use App\MinivansMinibus;
use App\CarAddPosterInfo;
use App\CarCommonRecord;

// job
use App\Job\JobForm;
use App\Job\JobAdPosterInfo;

// services
use App\Services\ServicesForm;
use App\Services\ServicesAdPosterInfo;
// buysale

use App\BuySale\BuySale;
use App\BuySale\BuySaleAdposterInfo;

use App\AllAd;
use App\Search;

use App\LastVisit;
use App\Package;
use App\PaymentInfo;
use App\UserBalance;
use App\MainCategory;
use App\Slider\Slider;

use DB;
use App\Advertisement;
use App\Image;
use App\OurCondition;
use App\OurPolicy;

use App\UserQuery;


class IndexController extends Controller
{


	public function setLanguage($language)
	{
		request()->session()->put('ln', $language);
		app()->setLocale(request()->session()->get('ln'));
		return redirect()->back();
	}
	
	public function addNewBalace(Request $request){

		$check_balace = UserBalance::where('user_id', Auth::user()->id)->first();
		if ($check_balace) {
			UserBalance::where('user_id', Auth::user()->id)->update([
				'balance' => $check_balace->balance + intval($request->amount)	
			]);
		}else{
			$balance = new UserBalance;
			$balance->user_id  = Auth::user()->id;
			$balance->balance  = intval($request->amount);
			$balance->save();
		}
		return back()->with('success', 'Balace Updated successfully!');
	}
	public function index()
	{
		$data['cat'] = MainCategory::orderBy('_id', 'asc')->with('languages')->get();
		$data['categories'] = $data['cat']->map(function($category){
			if ($category->languages) {
				foreach ($category->languages as $value) {
					if ($value->key == app()->getLocale()) {
						$category->category_name = $value->value;
						return $category;
					}
				}
				return $category;
			}
			return $category;
		});
		$data['sliders'] = Slider::where('slider_type','home_page')->where('role', 1)->orderBy('created_at', 'desc')->get();
		$data['sliders_two'] = Slider::where('role', 2)->orderBy('created_at', 'desc')->get();

		if (Auth::check()) {
			$last_v = LastVisit::where('user_id', Auth::user()->id)->pluck('post_id');
			$data['histories'] = Advertisement::whereIn('_id', $last_v)
			->with('paymentInfo.package', 'paymentInfo.promot', 'paymentInfo.advert','images', 'coverImage','userInfo')
			->orderBy('created_at','desc')
			->paginate(5);
			$data['auth'] = 1;
		} else {
			$history = (array) json_decode(Cookie::get('history'));
			$data['histories'] = Advertisement::whereIn('_id', array_keys($history))
			->with('paymentInfo.package', 'paymentInfo.promot', 'paymentInfo.advert','images', 'coverImage','userInfo')
			->orderBy('created_at','desc')
			->paginate(5);
			$data['auth'] = 0;
			// $paginate =  12;
			// $page = Input::get('page', 1);
			// $offSet = ($page * $paginate) - $paginate;
			// $data['histories'] = array_slice($data['items'], $offSet, $paginate, true);
		}
		$data['features'] = Advertisement::where('featured', 1)
		->orderBy('updated_at','desc')
		->limit(10)
		->get();

		$data['cat_features'] = MainCategory::with(['advertisement' => function($q) {
			return $q->where('featured', 1)
			->orderBy('updated_at','desc');
		}])
		->get();
		$data['cat_features'] = $data['cat_features']->filter(function($item) {
			if($item->advertisement->count())
			{
				return $item;
			}
		});
		return view('frontend.index', $data);
	}

	public function searchResult(Request $request)
	{
		$category = ($request->category) ? $request->category : null;
		$city = ($request->city) ? $request->city : null;
		$title = $request->title;
		$data['items'] = Advertisement::when($city, function ($q) use ($city) {
			$q->where('city', $city);
		})
		->when($category, function ($q) use ($category) {
			$q->where('cat', $category);
		})
		->when($title, function ($q) use ($title) {
			$q->where('title', 'LIKE', "%$title%");
		})
		->orderBy('_id','desc')
		->with('coverImage')
		->paginate(5);
		$data['category'] = ($request->category) ? $request->category : null;
		$data['city'] = ($request->city) ? $request->city : null;
		$data['title'] = $request->title;
		$data['all_cat'] = MainCategory::orderBy('category_name', 'asc')->get();
		return view('frontend.search-result', $data);
	}
	public function searchTitle(Request $request)
	{
		$cat_filed = ($request->cat) ? $request->cat : null;
		$city = ($request->city) ? $request->city : null;
		$s_title = $request->value;
		$m_title = Advertisement::when($city, function ($q) use ($city) {
			$q->where('city', $city);
		})
		->when($cat_filed, function ($q) use ($cat_filed) {
			$q->where('cat', $cat_filed);
		})
		->when($s_title, function ($q) use ($s_title) {
			$q->where('title', 'LIKE', "%$s_title%");
		})
		->get()
		->unique();
		$results = [];
		foreach ($m_title as $value) {
			array_push($results, $value->title);
		}
		$filtered = collect($this->sortingResult($results, $s_title))->take(15);
		$html = '';
		if ($filtered->count()) {
			foreach ($filtered as $value) {
				$html .= '<li><span>' . $value . '</span></li>';
			}
		} else {
			$html .= '<h5 class="text-warning">no match found</h5>';
		}
		return $html;
	}

	public function sortingResult($results, $word)
	{
		$results = array_reverse(array_values(array_unique($results)));
		$word = strtolower($word);
		$final = array();

		foreach ($results as $key => $value) {
			if (strtolower($value) == $word) {
				$final[] = $value;
				unset($results[$key]);
			}
		}

		foreach ($results as $key => $value) {
			$pos = strpos(strtolower($value), $word);
			if ($pos !== false) {
				$final[] = [
					'key' => $pos,
					'value' => $value
				];
				unset($results[$key]);
			}
		}
		array_multisort(array_column($final, 'key'), SORT_ASC, $final);
		$final = collect($final)->map(function ($val) {
			return $val['value'];
		})->take(5);

		return $final;
	}


	public function insertPaymentInfo(Request $request)
	{

		if ($request->payment_method == 'balance') {
			$mybalance = UserBalance::where('user_id', Auth::user()->_id)->first()->balance;
			$fee = (int)$request->total_price;
			$new_balance = $mybalance - $fee;
			$update_balacen = UserBalance::where('user_id', Auth::user()->_id)->update([
				'balance' => $new_balance
			]);
		}
		$data  = new PaymentInfo;
		$data->total_amount = intval($request->total_price);
		$data->payment_method = $request->payment_method;
		$data->package_id = $request->package_id;
		$data->promot_id = $request->promot_id;
		$data->advert_id = $request->advert_id;
		$data->promot_days = intval($request->promot_days);
		$data->advert_days = intval($request->advert_days);
		$data->post_id = $request->session()->get('ad_info')['post_id'];
		$data->featured = 0;
		$data->save();
		$request->session()->forget('ad_info');
		$request->session()->forget('insert');
		return 1;
	}

	public function updateAdsValidity(Request $request)
	{
		$data  = PaymentInfo::where('_id', $request->pay_id)->first();
		if ($data) {
			$data->promot_days = intval($data->promot_days + $request->promot_days);
			$data->advert_days = intval($data->advert_days + $request->advert_days);
			$data->total_amount = intval($data->total_amount + $request->total_price);
			$data->save();
			return 1;
		}
	}

	public function thisPaymentInfo(Request $request)
	{
		return 2323;
	}

	


	public function addToFavourite(Request $request)
	{
		// if (Cookie::has('favourite')) {
		// 	Cookie::queue(Cookie::forget('favourite'));
		// 	return 32;
		// }else{
		// 	return 1;
		// };
		// exit();
		$favrt = [];
		if (Cookie::get('favourite') == null) {
			$favrt[$request->post_id]['post_id'] = $request->post_id;
		} else {
			$favrt = (array) json_decode(Cookie::get('favourite'));
			if (!array_key_exists($request->post_id, $favrt)) {
				$favrt[$request->post_id]['post_id'] = $request->post_id;
			}
		}
		Cookie::queue('favourite', json_encode($favrt), 518400);
		$data = Cookie::get('favourite');
		return 1;
	}


	public function addToLastVisit(Request $request)
	{
		// if (Cookie::has('history')) {
		// 	Cookie::queue(Cookie::forget('history'));
		// 	return 32;
		// }else{
		// 	return 6666;
		// };
		// exit();
		if (Auth::check()) {
			$count_history  = LastVisit::where('user_id', Auth::user()->id)->get();
			$total = $count_history->count();
			if ($total < 50) {
				$checkData = LastVisit::where('post_id', $request->post_id)
				->where('user_id', Auth::user()->id)
				->first();
				if (!$checkData) {
					$data = new LastVisit;
					$data->post_id = $request->post_id;
					$data->user_id = Auth::user()->id;
					$data->save();
				}
			} else {
				$first_data = LastVisit::where('user_id', Auth::user()->id)->orderBy('created_at', 'asc')->limit(1)->first()->delete();
				if ($first_data) {
					$checkData = LastVisit::where('post_id', $request->post_id)
					->where('user_id', Auth::user()->id)
					->first();
					if (!$checkData) {
						$data = new LastVisit;
						$data->post_id = $request->post_id;
						$data->user_id = Auth::user()->id;
						$data->save();
					}
				}
			}
		} else {
			$history = [];
			$history_c  = (array) json_decode(Cookie::get('history'));
			if (count($history_c) == 0) {
				$history[$request->post_id]['post_id'] = $request->post_id;
			} else {
				$history = (array) json_decode(Cookie::get('history'));
				$total = count($history);
				if ($total < 50) {
					if (!array_key_exists($request->post_id, $history)) {
						$history[$request->post_id]['post_id'] = $request->post_id;
					}
				} else {
					unset($history[array_key_first($history)]);
					if (!array_key_exists($request->post_id, $history)) {
						$history[$request->post_id]['post_id'] = $request->post_id;
					}
				}
			}
			Cookie::queue('history', json_encode($history), 518400);
			$data = Cookie::get('history');
		}
		return 1;
	}

	public function favouriteList()
	{
		$fav = (array) json_decode(Cookie::get('favourite'));
		$data['advertisements'] = Advertisement::whereIn('_id', array_keys($fav))
		->with('paymentInfo.package', 'paymentInfo.promot', 'paymentInfo.advert','images', 'coverImage','userInfo')
		->orderBy('created_at','desc')
		->paginate(5);
		return view('frontend.favourites', $data);
	}

	public function history()
	{
		if (Auth::check()) {
			$last_v = LastVisit::where('user_id', Auth::user()->id)->pluck('post_id');
			$data['histories'] = Advertisement::whereIn('_id', $last_v)
			->with('paymentInfo.package', 'paymentInfo.promot', 'paymentInfo.advert','images', 'coverImage','userInfo')
			->orderBy('created_at','desc')
			->paginate(5);
			$data['auth'] = 1;
		} else {
			$history = (array) json_decode(Cookie::get('history'));
			$data['histories'] = Advertisement::whereIn('_id', array_keys($history))
			->with('paymentInfo.package', 'paymentInfo.promot', 'paymentInfo.advert','images', 'coverImage','userInfo')
			->orderBy('created_at','desc')
			->paginate(5);
			$data['auth'] = 0;
			// $paginate =  5;
			// $page = Input::get('page', 1);
			// $offSet = ($page * $paginate) - $paginate;
			// $data['histories'] = array_slice((array)$data['histories'], $offSet, $paginate, true);
		}
		return view('frontend.history', $data);
	}

	public function removeFromFavourite(Request $request)
	{
		$favrt = (array) json_decode(Cookie::get('favourite'));
		if (array_key_exists($request->post_id, $favrt)) {
			unset($favrt[$request->post_id]);
		}
		Cookie::queue('favourite', json_encode($favrt), 518400);
		return 'Item Has been removed from favourite list successfully!';
	}
	

	
	public function updateUserInfo(Request $request)
	{
		if ($request->hasFile('file')) {
			$img = $request->file('file');
			$image_name = 'user_' . Auth::user()->_id . time() . '.' . $img->getClientOriginalExtension();
			$img->move('userImage', $image_name);
		}
		$user_info = UserInformation::where('user_id', Auth::user()->id)->first();
		if ($request->name) {
			$user_info->name = $request->name;
		}
		if ($request->surname) {
			$user_info->surname = $request->surname;
		}
		if ($request->dob) {
			$user_info->dob = $request->dob;
		}
		if ($request->nickname) {
			$user_info->nickname = $request->nickname;
		}
		if ($request->phone) {
			$user_info->phone = $request->phone;
		}
		if ($request->company_name) {
			$user_info->company_name = $request->company_name;
		}
		if ($request->company_code) {
			$user_info->company_code = $request->company_code;
		}
		if ($request->address) {
			$user_info->address = $request->address;
		}
		if ($request->hasFile('file')) {
			$user_info->image =  $image_name;
		}
		$user_info->save();
		return back()->with('success', 'Information Updated successfully!');
	}
	

	public function updatePassword(Request $request)
	{
		$match_pass  = $request->old_password;
		$user = User::where('_id', Auth::user()->_id)->first();
		if (Hash::check($match_pass, $user->password)) {
			$user->fill([
				'password' => Hash::make($request->new_password)
			])->save();
		} else {
			return redirect()->back()->with('error', 'password does not match!');
		}
		return redirect()->back()->with('success', 'password changed successfully!');
	}

	public function getUserCarPost($type)
	{
		$data['posts'] = Advertisement::where('user_id', Auth::user()->_id)
		->where('cat', $type)
		->with('userInfo','coverImage')
		->orderBy('_id','dsc')
		->paginate(4);
		$data['menu'] = 1;
		$data['type'] = $type;
		// dd($data['posts']);
		return view('frontend.user-profile.user-post-list', $data);
	}

	
	public function deletePost(Request $request)
	{
		$post = Advertisement::where('_id',$request->post_id)->with('images','coverImage')->first();
		if($post->cat == 'cars'){
			$folder = 'carAdimages/';
		}elseif($post->cat == 'house'){
			$folder = 'houseAdimages/'; 
		}elseif($post->cat == 'job'){
			$folder = 'jobAdimages/'; 
		}elseif($post->cat == 'services'){
			$folder = 'ServicesImages/'; 
		}elseif($post->cat == 'buy-sale'){
			$folder = 'buySaleImages/'; 
		}
		$thumb = 'ad_thumbnail/' . $post->coverImage->image;
		if (file_exists($thumb)) {
			unlink($thumb);
		}
		$images = $post->images;
		if($images){
			foreach($images as $value) {
				$npath = $folder . $value->image;
				if (file_exists($npath)) {
					unlink($npath);
				}
			}
		}

		$post->delete();
		$post->images()->delete();
		$post->userInfo()->delete();
		$post->paymentInfo()->delete();
		return 'Item Deleted successfully';
	}



	public function getPostforUpdate($cat, $form_type,$post_id)
	{
		$data['post'] = Advertisement::where('_id',$post_id)
		->with('paymentInfo.package','paymentInfo.promot','paymentInfo.advert','images', 'coverImage','userInfo')
		->first();
		if ($cat == 'realestate') {
			return view('frontend.update-ad.house.update-form', $data);
		}elseif ($cat == 'job') {
			return view('frontend.update-ad.job.update-form', $data);
		}elseif ($cat == 'buy-sale') {
			return view('frontend.update-ad.buysale.update-form', $data);
		}elseif ($cat == 'services') {
			return view('frontend.update-ad.services.update-form', $data);
		}elseif ($cat == 'transport') {	
			return view('frontend.update-ad.car.update-form', $data);
		}
	}


	public function removeNotificationAd(Request $request){
		$notifications = (array) json_decode(Cookie::get('notification_ad'));
		if (array_key_exists($request->id, $notifications)) {
			unset($notifications[$request->id]);
		}
		Cookie::queue('notification_ad', json_encode($notifications), 518400);
	}

	public function termsAndCondition()
	{
		$data['our_condition'] = OurCondition::with('languages')->get();

		$data['description'] = $data['our_condition']->map(function($description){
			if ($description->languages) {
				foreach ($description->languages as $value) {
					if ($value->key == app()->getLocale()) {
						$description->description = $value->value;
						return $description;
					}
				}
				return $description;
			}
			return $description;
		});
		return view('frontend.terms-and-condition',$data);
	}

	public function policy()
	{
		$data['our_condition'] = OurPolicy::with('languages')->get();

		$data['description'] = $data['our_condition']->map(function($description){
			if ($description->languages) {
				foreach ($description->languages as $value) {
					if ($value->key == app()->getLocale()) {
						$description->description = $value->value;
						return $description;
					}
				}
				return $description;
			}
			return $description;
		});
		return view('frontend.policy',$data);
	}


	public function realestateMap()
	{
		return view('frontend.pages.realestate-map');
	}


	public function carsSearchR()
	{
		return view('frontend.pages.cars-search-result');
	}

	public function selectPlane()
	{

		$data['packages'] = Package::all();
		return view('frontend.pages.select-plane', $data);
	}
	public function realestateDetails()
	{
		return view('frontend.pages.realestate-details');
	}

	public function adDetails($category,$form_type,$post_id){
		$data['advertisement'] = Advertisement::where('_id',$post_id)
		->with('paymentInfo.package','paymentInfo.promot','paymentInfo.advert','images', 'coverImage','userInfo')
		->first();
		$data['images'] = $data['advertisement']->images()->orderBy('type','desc')->get();
		if ($category == 'realestate') {
			return view('frontend.category.house.house-details', $data);
		}else if($category == 'buy-sale'){
			return view('frontend.category.buy-sale.buy-sale-details', $data);
		}else if($category == 'services'){
			return view('frontend.category.services.services-details', $data);
		}else if($category == 'transport'){
			return view('frontend.category.car.car-details', $data);
		}else if($category == 'job'){
			// dd($data['advertisement']);
			return view('frontend.category.job.job-details', $data);
		}
	}
	public function contactUs(){
		return view('frontend.contact-us');
	}
	public function storeUserQuery(Request $request){

		$request->validate([
			'name' => 'required',
			'email' => 'required|email',
			'phone' => 'required',
			'message' => 'required',
		]);
		UserQuery::create([
			'name' => $request->name,
			'email' => $request->email,
			'phone' => $request->phone,
			'message' => $request->message,
		]);

		return redirect()->back()->with('success','your query has been submitted succefully! Thanks for being with us!');

	}


	// public function houseDetails(){
	// 	$data['post_id'] = $post_id;
	// 	$data['cat'] = $cat;
	// 	// dd($data['house_info']);
	// 	return view('frontend.category.house.house-details', $data);
	// }
}
