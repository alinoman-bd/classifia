<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\PaymentInfo;
use App\Menu;
// modify
use App\Advertisement;
use App\AdPosterInfo;
use App\Image;
use Cookie;
use App\LastVisit;

use App\OurCondition;
use App\OurPricing;
use App\OurPolicy;

use App\Language;
use App\Languageable;

class DashboardController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:admin');
	}
	public function index() {
		return view('admin.home');
	}

	public function advertisement(){
		$data['posts'] = Advertisement::orderBy('_id', 'desc')
		->with('paymentInfo.package', 'paymentInfo.promot', 'paymentInfo.advert','images','coverImage','userInfo','user.userinfo')
		->get();
		return view('admin.advertisement-list', $data);
	}
	public function allUser(){
		$data['users'] = User::with('userinfo')->get();
		return view('admin.user-list', $data);
	}

	public function deleteUser(Request $request){
		$user_ads = Advertisement::where('user_id', $request->id)
		->with('images','coverImage')
		->get();
		if ($user_ads) {
			foreach ($user_ads as $post) {
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
				$post->images()->delete();
				$post->userInfo()->delete();
				$post->paymentInfo()->delete();
				$post->delete();
			}
		}
		User::where('_id', $request->id)->delete();
		$data['users'] = User::with('userinfo')->get();
		$view = view('admin.user-listing-section',$data)->render();
		return $view;
	}
	public function suspendOrBanUser(Request $request){
		if ($request->type == 'suspend') {
			User::find($request->id)->update(['suspend' => 1]);
		}else{
			User::find($request->id)->update(['ban' => 1]);
		}
		return 1;
	}
	public function deletePost(Request $request){
		$post = Advertisement::where('_id', $request->id)->with('images','coverImage')->first();
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
		$post->images()->delete();
		$post->userInfo()->delete();
		$post->paymentInfo()->delete();
		$post->delete();
		$data['posts'] = Advertisement::orderBy('_id', 'desc')
		->with('paymentInfo.package', 'paymentInfo.promot', 'paymentInfo.advert','images','coverImage','userInfo','user.userinfo')
		->get();
		$data['tr'] = 0; 
		$view = view('admin.ad-listing-section',$data)->render();
		return $view;
	}
	public function suspendPost(Request $request){
		$post = Advertisement::where('_id',$request->id)
		->update(['suspend' => 1]);
		return 1;

	}
	public function featuredAd(Request $request){
		$post = Advertisement::where('_id',$request->post_id)
		->update(['featured' => intval($request->status)]);
		return 1;
	}
	public function userInfo(Request $request){
		$data = User::where('_id', $request->id)->with('userinfo')->first();
		$html = '';
		$html.='<div class="info">
		<p><b>Email : </b><span id="email">'.$data->email.'</span></p>
		<p><b>Name : </b><span id="name">'.$data->userinfo->name.'</span></p>
		<p><b>City : </b><span id="city">'.$data->userinfo->city.'</span></p>
		<p><b>Address : </b><span id="address">'.$data->userinfo->address.'</span></p>
		<p><b>Company Name : </b><span id="companyName">'.$data->userinfo->company_name.'</span></p>
		<p><b>Company Code : </b><span id="companyCode">'.$data->userinfo->company_code.'</span></p>
		<p><b>Phone : </b><span id="phone">'.$data->userinfo->phone.'</span></p>
		</div>';
		$data['html'] = $html;
		$data['user_id'] = $request->id;
		return $data;
	}

	public function termsCond(){

		return view('admin.terms-condition');
	}
	public function storeTerms(Request $request){
		$data = new OurPolicy;
		$data->description = $request->description;
		$data->save();
		foreach(Language::all() as $lang){
			$key = $lang->key.'_description';
			if ($request->$key) {
				$language = new Languageable;
				$language->key = $lang->key;
				$language->value = $request->$key;
				$data->languages()->save($language);
			}

		}
		return redirect()->back();
	}


}