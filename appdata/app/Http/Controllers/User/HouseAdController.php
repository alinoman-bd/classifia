<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session;
use Cookie;
use DB;
use Image;
use App\User;
use App\UserInformation;
use App\PaymentInfo;
use App\Advertisement;
use App\Image as ImageModel;

class HouseAdController extends Controller
{
	public function houseForm($sub_cat,$type) 
	{
		$data['cat'] = $sub_cat;
		$data['type'] = $type;
		return view('frontend.category.house.category-form', $data);
	}

	public function insertHouseForm(Request $request){
		// $validatedData = $request->validate([
		// 	'cover' => 'image|mimes:jpg,png',
		// ]);
		$location = $request->address;
		$latlng = $this->getLatLng($location);
		$images_arr = [];
		if ($request->hasFile('files')) {
			foreach($request->file('files') as $key => $image)
			{
				$name = 'realestate_alt_'.time().$key.'.'.$image->getClientOriginalExtension();
				$image->move('houseAdimages', $name);
				$images_arr[$key]['type'] = 'alt'; 
				$images_arr[$key]['image'] = $name; 
			}
		}
		if($request->hasFile('cover')) {
			$image = $request->file('cover');
			$image_name = 'realestate_thumbnail_'.time() . '.' . $image->getClientOriginalExtension();
			$destinationPath = 'ad_thumbnail';
			$resize_image = Image::make($image->getRealPath());
			$resize_image->resize(250, 180, function($constraint){
				$constraint->aspectRatio();
			})->save($destinationPath . '/' . $image_name);

			$image->move('houseAdimages', $image_name);
			$n = count($images_arr);
			$images_arr[$n]['type'] = 'cover'; 
			$images_arr[$n]['image'] = $image_name; 
		}
		$data = new Advertisement;
		$data->cat = 'house';
		$data->form_type = $request->cat;
		$data->title = $request->title;
		$data->type = $request->type;
		$data->area = intval($request->area);
		$data->award = intval($request->award);
		$data->room_nr = intval($request->room_nr);
		if ($request->rent_type) {
			$data->rent_type = $request->rent_type;
		}
		$data->price = intval($request->price);
		$data->keyword = $request->keyword;
		$data->new_development = $request->new_development;
		$data->built_year = intval($request->built_year);
		$data->water_distance = intval($request->water_distance);
		$data->house_type = $request->building_type;
		$data->per_Sqr_price = intval($request->per_Sqr_price);
		$data->description = $request->description;
		$data->youtube = $request->youtube;
		$data->thDTour = $request->thDTour;
		$data->featured = 0;
		$data->suspend = 0;
		$data->user_id = Auth::user()->_id;
		$data->city = $request->city;
		$data->address = $request->address;
		$data->lat = $latlng['lat'];
		$data->lng = $latlng['lng'];
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
			UserInformation::where('user_id', Auth::user()->_id)->update(['phone'=> $up_number]);
		} 
		if ($request->contact_email_update) {
			$up_email = $request->contact_mail;
			UserInformation::where('user_id', Auth::user()->_id)->update(['secondary_email'=> $up_email]);
		} 
		if ($request->contact_name_update) {
			$up_name = $request->contact_name;
			UserInformation::where('user_id', Auth::user()->_id)->update(['name'=> $up_name]);
		} 
		if ($request->contact_address_update) {
			$up_address = $request->address;
			UserInformation::where('user_id', Auth::user()->_id)->update(['address'=> $up_address]);
		}
		$request->session()->put(
			'ad_info', [
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
	
	public function removeAdCover(Request $request){
		$img = ImageModel::where('_id', $request->img_id)->first();
		$cover = $img['image'];
		$thumb = 'ad_thumbnail/' . $cover;
		if (file_exists($thumb)) {
			unlink($thumb);
		}
		$alt_img = 'houseAdimages/' . $cover;
		if (file_exists($alt_img)) {
			unlink($alt_img);
		}
		$img->delete();
	}
	public function removeAdAlt(Request $request){
		$img = ImageModel::where('_id', $request->img_id)->first();
		$image = $img['image'];
		$thumb = 'houseAdimages/' . $image;
		if (file_exists($thumb)) {
			unlink($thumb);
		}
		$img->delete();
	}
	public function updateHousePost(Request $request){
		$location = $request->address;
		$latlng = $this->getLatLng($location);
		$images_arr = [];
		if ($request->hasFile('files')) {
			foreach($request->file('files') as $key => $image)
			{
				$name = 'realestate_alt_'.time().$key.'.'.$image->getClientOriginalExtension();
				$image->move('houseAdimages', $name);
				$images_arr[$key]['type'] = 'alt'; 
				$images_arr[$key]['image'] = $name; 
			}
		}
		if($request->hasFile('cover')) {
			$c = ImageModel::where('post_id', $request->post_id)->where('type','cover')->first();
			if ($c) {
				$cover = $c['image'];
				$c_thumb = 'ad_thumbnail/' . $cover;
				$c_alt = 'houseAdimages/' . $cover;
				if (file_exists($c_thumb)) {
					unlink($c_thumb);
				}
				if (file_exists($c_alt)) {
					unlink($c_alt);
				}
				$c->delete();
			}
			$image = $request->file('cover');
			$image_name = 'realestate_thumbnail_'.time() . '.' . $image->getClientOriginalExtension();
			$destinationPath = 'ad_thumbnail';
			$resize_image = Image::make($image->getRealPath());
			$resize_image->resize(250, 180, function($constraint){
				$constraint->aspectRatio();
			})->save($destinationPath . '/' . $image_name);

			$image->move('houseAdimages', $image_name);
			$n = count($images_arr);
			$images_arr[$n]['type'] = 'cover'; 
			$images_arr[$n]['image'] = $image_name; 
		}
		$data = Advertisement::where('_id',$request->post_id)->with('userInfo')->first();
		$data->title = $request->title;
		$data->type = $request->type;
		$data->area = intval($request->area);
		$data->award = intval($request->award);
		$data->room_nr = intval($request->room_nr);
		if ($request->rent_type) {
			$data->rent_type = $request->rent_type;
		}
		$data->price = intval($request->price);
		$data->keyword = $request->keyword;
		$data->new_development = $request->new_development;
		$data->built_year = intval($request->built_year);
		$data->water_distance = intval($request->water_distance);
		$data->house_type = $request->building_type;
		$data->per_Sqr_price = intval($request->per_Sqr_price);
		$data->description = $request->description;
		$data->youtube = $request->youtube;
		$data->thDTour = $request->thDTour;
		$data->city = $request->city;
		$data->address = $request->address;
		$data->lat = $latlng['lat'];
		$data->lng = $latlng['lng'];
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

	public function getLatLng($address){
		$address = str_replace(" ", "+", $address);
		$json = file_get_contents("https://maps.google.com/maps/api/geocode/json?key=AIzaSyDgS793eWlCwsEaxw4bUz5xKYnxhvUMpnA&address=$address&sensor=false");
		$json = json_decode($json);
		$data['lat'] = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
		$data['lng'] = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
		return $data;
	}
}
