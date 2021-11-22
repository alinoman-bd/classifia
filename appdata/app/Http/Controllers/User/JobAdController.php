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


use App\Job\JobForm;
use App\Job\JobAdPosterInfo;

use App\AllAd;
use App\Search;
use App\PaymentInfo;
use App\Slider\Slider;

// modify 

use App\Advertisement;
use App\Image as ImageModel;
use Image;

class JobAdController extends Controller
{

	public function jobInfo($form_type)
	{
		$data['form_type'] = $form_type;
		return view('frontend.category.job.category-form', $data);
	}
	public function storeJobInfo(Request $request){
		$images_arr  = [];
		if ($request->hasFile('files')) {
			foreach($request->file('files') as $key => $image)
			{
				$name = 'job_alt_'.time().$key.'.'.$image->getClientOriginalExtension();
				$image->move('jobAdimages', $name);
				$images_arr[$key]['type'] = 'alt'; 
				$images_arr[$key]['image'] = $name; 
			}
		}
		if($request->hasFile('cover')) {
			$image = $request->file('cover');
			$image_name = 'job_thumbnail_'.time() . '.' . $image->getClientOriginalExtension();
			$destinationPath = 'ad_thumbnail';
			$resize_image = Image::make($image->getRealPath());
			$resize_image->resize(250, 180, function($constraint){
				$constraint->aspectRatio();
			})->save($destinationPath . '/' . $image_name);

			$image->move('jobAdimages', $image_name);
			$n = count($images_arr);
			$images_arr[$n]['type'] = 'cover'; 
			$images_arr[$n]['image'] = $image_name; 
		}
		if ($request->job_category) {
			$job_sector  = json_encode($request->job_category);
		}else{
			$job_sector  = null;
		}
		if ($request->job_type) {
			$job_type  = json_encode($request->job_type);
		}else{
			$job_type  = null;
		}
		$data = new Advertisement;
		$data->cat = 'job';
		$data->form_type = $request->form_type;
		$data->title = $request->title;
		$data->job_category = $job_sector;
		$data->address = $request->address;
		$data->city = $request->job_city;
		if ($request->remote_job) {
			$data->remote_job = 1;
		}else{
			$data->remote_job = 0;
		}
		$data->salary_from = intval($request->salary_from);
		$data->salary_to = intval($request->salary_to);
		$data->salary_type = $request->salary_type;
		$data->adds_validaty = $request->adds_validaty;
		$data->job_type = $job_type;
		$data->salary_currency = $request->salary_currency;
		$data->about_position = $request->about_position;
		$data->requirements = $request->requirements;
		if ($request->about_company) {
			$data->about_company = $request->about_company;
		}
		if ($request->about_me) {
			$data->about_me = $request->about_me;
		}
		$data->featured = 0;
		$data->suspend = 0;
		$data->user_id = Auth::user()->_id;
		$data->save();

		foreach ($images_arr as $value) {
			$image = $data->images()->create($value);
		}
		$poster_info = $data->userInfo()->create([
			'contact_mail' => $request->contact_mail,
			'contact_number' => $request->contact_number
		]);

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

	public function jobBrowse(Request $request){
		$data['feature_products'] = PaymentInfo::whereNotNull('advert_id')
		->with(['advertisement' => function($q) {
			return $q->where('cat', 'job')
			->orderBy('created_at','desc')
			->with('coverImage');
		}])
		->orderBy('created_at','desc')
		->limit(12)
		->get();
		$data['ad_products'] = PaymentInfo::whereNotNull('promot_id')
		->with(['advertisement' => function($q) {
			return $q->where('cat', 'job')
			->orderBy('created_at','desc')
			->with('coverImage');
		}])
		->orderBy('created_at','desc')
		->limit(4)
		->get();

		$data['sliders'] = Slider::where('slider_type', 'job')->orderBy('created_at','desc')->get();
		return view('frontend.category.job.job-browse',$data);
	}

	public function jobSearch(Request $request){
		$form_type = $request->form_type;
		$address = $request->address;
		$title = $request->title;
		$job_category = $request->job_category;
		$salary_type = $request->salary_type;
		$job_type = $request->job_type;
		
		$data['jobs']  = Advertisement::where('cat', 'job')
		->when($form_type, function($q) use($form_type) {
			$q->where('form_type',$form_type);
		})
		->when($title, function($q) use($title) {
			$q->where('title', $title);
		})
		->when($address, function($q) use($address) {
			$q->where('address', $address);
		})
		->when($job_category, function($q) use($job_category) {
			$q->where('job_category', 'like', '%"' . $job_category . '"%');
		})
		->when($job_type, function($q) use($job_type) {
			$q->where('job_type', 'like', '%"' . $job_type . '"%');
		})
		->when($salary_type, function($q) use($salary_type) {
			$q->where('salary_type', $salary_type);
		})
		->orderBy('_id','desc')
		->with('coverImage')
		->paginate(12);
		return view('frontend.category.job.job-search-result',$data);
	}

	public function jobDetails($post_id, $form_type){
		$data['job'] = JobForm::where('_id',$post_id)->with('jobAdposter')->first();
		return view('frontend.category.job.job-details',$data);
	}

	// public function actvJobData(Request $request){
	// 	$form_type = $request->form_type; 

	// 	$data['jobs']  = JobForm::where('form_type',$form_type)->get();
	// 	$html = '';
	// 	if($data['jobs']->count() == 0){
	// 		$html .= '<h1>No data!</h1>';
	// 	}else{
	// 		foreach ($data['jobs'] as $job) {
	// 			$post_id = $job->_id;
	// 			$html .= '<div class="m-side-list mar-b-15 ">
	// 			<div class="m-side-img">
	// 			<a href="'.url('view-job-details', ['post_id' => $post_id, 'cat' => $request->form_type]).'" class="re-link">
	// 			<img class="cover" src="'.('jobAdimages/'.$job->image).'" alt="product">
	// 			</a>
	// 			</div>
	// 			<div class="m-side-cnt">
	// 			<span class="fav" onclick="addToFavourite('.'\'job\''. ',' .'\''.$post_id. '\''.','.'\''.$form_type. '\')"><i class="far fa-heart"></i></span>
	// 			<a href="'.url('view-job-details', ['post_id' => $post_id, 'cat' => $request->form_type]).'">
	// 			<div class="star"><i class="far fa-star"></i> Features</div>
	// 			<div class="loc-name">
	// 			<span  class="pr-4"><i class="fas fa-map-marker-alt"></i> '.$job->address.'</span>
	// 			<span><i class="far fa-clock"></i> '.$job->created_at->diffForHumans().'</span>
	// 			</div>
	// 			<div class="house-name text-uppercase">'.ucfirst($job->title).'</div>
	// 			<div class="house-name text-uppercase">vilniuje (15:00-00:00 val)</div>
	// 			<div class="house-price-len">
	// 			<span class="h-price job-salary">820-1300 </span>
	// 			<span class="job-salary-v">€/men. bruto</span>
	// 			</div>
	// 			</a>
	// 			</div>
	// 			</div>';

	// 			// $html .= '<a href="'.url('view-job-details', ['post_id' => $post_id, 'cat' => $request->form_type]).'" class="re-link">
	// 			// <div class="m-side-list mar-b-15 ">
	// 			// <div class="m-side-img"><img class="cover" src="'.('jobAdimages/'.$job->image).'" alt="product"></div>
	// 			// <div class="m-side-cnt">
	// 			// <span class="fav"><i class="far fa-heart"></i></span>
	// 			// <div class="star"><i class="far fa-star"></i> Features</div>
	// 			// <div class="loc-name"><i class="fas fa-map-marker-alt"></i> '.$job->address.'</div>
	// 			// <div class="house-name">'.ucfirst($job->title).'</div>
	// 			// <div class="house-price-len">
	// 			// <span class="h-len-txt">'.str_replace("-"," ",ucfirst($form_type)).'</span>
	// 			// </div>
	// 			// <div class="house-price-len">
	// 			// <span class=""><i class="far fa-clock"></i> '.$job->created_at->diffForHumans().'</span>
	// 			// </div>
	// 			// </div>
	// 			// </div>
	// 			// </a>';
	// 		}
	// 	}
	// 	return $html;
	// }


	public function filterAllJob(Request $request){
		$form_type = $request->form_type;
		$title = $request->job_title;
		$address = $request->address;
		$city = $request->city;
		$salary_from = (int)$request->salary_from;
		$salary_type = $request->salary_type;

		$job_sector = [];
		$job_type = [];

		if($request->sector) {
			$job_sector = $request->sector;
		}

		if($request->job_type) {
			$job_type = $request->job_type;
		}


		$data['jobs']  = Advertisement::where('cat','job')
		->when($form_type, function($q) use($form_type) {
			$q->where('form_type',$form_type);
		})
		->when($title, function($q) use($title) {
			$q->where('title','LIKE',$title. '%');
		})
		->when($city, function($q) use($city) {
			$q->where('city',$city);
		})
		->when($address, function($q) use($address) {
			$q->where('address','LIKE',$address. '%');
		})
		->when($salary_from, function($q) use($salary_from) {
			$q->where('salary_from','>=',$salary_from);
		})
		->when($job_type, function($q) use($job_type) {
			foreach ($job_type as  $value) {
				$q->where('job_type', 'like', '%"' . $value . '"%');
			}
		})
		->when($job_sector, function($q) use($job_sector) {
			foreach ($job_sector as  $value) {
				$q->where('job_category', 'like', '%"' . $value . '"%');
			}
		})
		->orderBy('_id','desc')
		->with('coverImage')
		->paginate(12);
		$view = view('frontend.category.job.job-listing-section',$data)->render();
		return json_encode($view);
	}

	// public function filterJobByTopValues(Request $request){
	// 	$form_type = $request->form_type;
	// 	if ($request->city) {
	// 		$city =  implode($request->city);
	// 	}else{
	// 		$city =  null;
	// 	}
	// 	$title = $request->title;
	// 	$address = $request->address;


	// 	$data['jobs']  = JobForm::when($form_type, function($q) use($form_type) {
	// 		$q->where('form_type',$form_type);
	// 	})
	// 	->when($title, function($q) use($title) {
	// 		$q->where('title', $title);
	// 	})
	// 	->when($address, function($q) use($address) {
	// 		$q->where('address', $address);
	// 	})
	// 	->when($city, function($q) use($city) {
	// 		$q->where('job_city', $city);
	// 	})
	// 	->get();
	// 	$html = '';
	// 	$form_type = $request->form_type; 
	// 	if($data['jobs']->count() == 0){
	// 		$html = '<h1>No data!</h1>';
	// 	}else{
	// 		foreach ($data['jobs'] as $job) {
	// 			$post_id = $job->_id;
	// 			$html .= '<div class="m-side-list mar-b-15 ">
	// 			<div class="m-side-img">
	// 			<a href="'.url('view-job-details/', ['post_id' => $post_id, 'cat' => $job->form_type]).'" class="re-link">
	// 			<img class="cover" src="'.('jobAdimages/'.$job->image) .'" alt="product">
	// 			</a>
	// 			</div>
	// 			<div class="m-side-cnt">
	// 			<span class="fav" onclick="addToFavourite(\'job\',\''.$post_id.'\',\''.$job->form_type.'\')"><i class="far fa-heart"></i></span>
	// 			<a href="'.url('view-job-details', ['post_id' => $post_id, 'cat' => $job->form_type]).'">
	// 			<div class="star"><i class="far fa-star"></i> Features</div>
	// 			<div class="loc-name">
	// 			<span  class="pr-4"><i class="fas fa-map-marker-alt"></i> '.$job->address.'</span>
	// 			<span><i class="far fa-clock"></i> '.$job->created_at->diffForHumans().'</span>
	// 			</div>
	// 			<div class="house-name text-uppercase">'.ucfirst($job->title).'</div>
	// 			<div class="house-name text-uppercase">vilniuje (15:00-00:00 val)</div>
	// 			<div class="house-price-len">
	// 			<span class="h-price job-salary">'.$job->salary_from.'-'.$job->salary_to.'</span>
	// 			<span class="job-salary-v">€/';
	// 			$types = json_decode($job->job_type);
	// 			foreach ($types as $jb_type) {
	// 				$html .='<span>'.$jb_type.'</span>,';
	// 			}

	// 			$html .='</span>
	// 			</div>
	// 			</a>
	// 			</div>
	// 			</div>';
	// 		}
	// 	}
	// 	return $html;	
	// }

	// public function filterAllJobByTopVal(Request $request){


	// 	$form_type = $request->form_type;
	// 	$title = $request->job_title;
	// 	$address = $request->address;
	// 	$city = $request->city;


	// 	$data['jobs']  = JobForm::when($form_type, function($q) use($form_type) {
	// 		$q->where('form_type',$form_type);
	// 	})
	// 	->when($title, function($q) use($title) {
	// 		$q->where('title', $title);
	// 	})
	// 	->when($address, function($q) use($address) {
	// 		$q->where('address', $address);
	// 	})

	// 	->when($city, function($q) use($city) {
	// 		$q->where('job_city', $city);
	// 	})
	// 	->get();
	// 	$html = '';
	// 	$form_type = $request->form_type; 
	// 	if($data['jobs']->count() == 0){
	// 		$html = '<h1>No data!</h1>';
	// 	}else{
	// 		foreach ($data['jobs'] as $job) {
	// 			$post_id = $job->_id;
	// 			$html .= '<div class="m-side-list mar-b-15 ">
	// 			<div class="m-side-img">
	// 			<a href="'.url('view-job-details/', ['post_id' => $post_id, 'cat' => $job->form_type]).'" class="re-link">
	// 			<img class="cover" src="'.('jobAdimages/'.$job->image) .'" alt="product">
	// 			</a>
	// 			</div>
	// 			<div class="m-side-cnt">
	// 			<span class="fav" onclick="addToFavourite(\'job\',\''.$post_id.'\',\''.$job->form_type.'\')"><i class="far fa-heart"></i></span>
	// 			<a href="'.url('view-job-details', ['post_id' => $post_id, 'cat' => $job->form_type]).'">
	// 			<div class="star"><i class="far fa-star"></i> Features</div>
	// 			<div class="loc-name">
	// 			<span  class="pr-4"><i class="fas fa-map-marker-alt"></i> '.$job->address.'</span>
	// 			<span><i class="far fa-clock"></i> '.$job->created_at->diffForHumans().'</span>
	// 			</div>
	// 			<div class="house-name text-uppercase">'.ucfirst($job->title).'</div>
	// 			<div class="house-name text-uppercase">vilniuje (15:00-00:00 val)</div>
	// 			<div class="house-price-len">
	// 			<span class="h-price job-salary">'.$job->salary_from.'-'.$job->salary_to.'</span>
	// 			<span class="job-salary-v">€/';
	// 			$types = json_decode($job->job_type);
	// 			foreach ($types as $jb_type) {
	// 				$html .='<span>'.$jb_type.'</span>,';
	// 			}

	// 			$html .='</span>
	// 			</div>
	// 			</a>
	// 			</div>
	// 			</div>';
	// 		}
	// 	}
	// 	return json_encode($html);
	// }

	public function updateJobPost(Request $request){

		$data = Advertisement::where('_id', $request->post_id)->first();

		$images_arr = [];
		if ($request->hasFile('files')) {
			foreach($request->file('files') as $key => $image)
			{
				$name = 'job_alt_'.time().$key.'.'.$image->getClientOriginalExtension();
				$image->move('jobAdimages', $name);
				$images_arr[$key]['type'] = 'alt'; 
				$images_arr[$key]['image'] = $name; 
			}
		}
		if($request->hasFile('cover')) {
			$c = ImageModel::where('post_id', $request->post_id)->where('type','cover')->first();
			if ($c) {
				$cover = $c['image'];
				$c_thumb = 'ad_thumbnail/' . $cover;
				$c_alt = 'jobAdimages/' . $cover;
				if (file_exists($c_thumb)) {
					unlink($c_thumb);
				}
				if (file_exists($c_alt)) {
					unlink($c_alt);
				}
				$c->delete();
			}
			$image = $request->file('cover');
			$image_name = 'job_thumbnail_'.time() . '.' . $image->getClientOriginalExtension();
			$destinationPath = 'ad_thumbnail';
			$resize_image = Image::make($image->getRealPath());
			$resize_image->resize(250, 180, function($constraint){
				$constraint->aspectRatio();
			})->save($destinationPath . '/' . $image_name);

			$image->move('jobAdimages', $image_name);
			$n = count($images_arr);
			$images_arr[$n]['type'] = 'cover'; 
			$images_arr[$n]['image'] = $image_name; 
		}

		if ($request->job_category) {
			$job_sector  = json_encode($request->job_category);
		}else{
			$job_sector  = null;
		}
		if ($request->job_type) {
			$job_type  = json_encode($request->job_type);
		}else{
			$job_type  = null;
		}
		$data->title = $request->title;
		$data->job_category = $job_sector;
		$data->address = $request->address;
		$data->city = $request->job_city;
		if ($request->remote_job) {
			$data->remote_job = 1;
		}else{
			$data->remote_job = 0;
		}
		$data->salary_from = intval($request->salary_from);
		$data->salary_to = intval($request->salary_to);
		$data->salary_type = $request->salary_type;
		$data->adds_validaty = $request->adds_validaty;
		$data->job_type = $job_type;
		$data->salary_currency = $request->salary_currency;
		$data->about_position = $request->about_position;
		$data->requirements = $request->requirements;
		if ($request->about_company) {
			$data->about_company = $request->about_company;
		}
		if ($request->about_me) {
			$data->about_me = $request->about_me;
		}
		$data->save();
		$data->userInfo->update([
			'contact_mail' => $request->contact_mail,
			'contact_number' => $request->contact_number
		]);
		foreach ($images_arr as $value) {
			$image = $data->images()->create($value);
		}
		return 1;
	}
}
