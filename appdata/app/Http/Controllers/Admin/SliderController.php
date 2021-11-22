<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Slider\Slider;

class SliderController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth:admin');
	}
	public function sliderOne(){
		$data['sliders'] = Slider::where('role', 1)->orderBy('created_at','desc')->get();
		return view('admin.slider.slider-one', $data);
	}

	public function storeSliderOne(Request $request){
		$slider = $request->file('slider');
		$slider_name = 'slider_1_'.time() . '.' . $slider->getClientOriginalExtension();
		$slider->move(('assets/img/Sliders'), $slider_name);
		Slider::create([
			'slider_type' => $request->slider_type,
			'slider' => $slider_name,
			'url' => $request->url, 
			'role' => intval($request->role), 
		]);
		if ($request->role == 1) {
			$sliders = Slider::where('role',1)->orderBy('created_at', 'desc')->get();
		}else{
			$sliders = Slider::where('role',2)->orderBy('created_at', 'desc')->get();
		}

		$tr = 0;
		$html = '';
		foreach ($sliders as $slider) {	
			$html .='<tr class="tr-'.++$tr.'">
			<td><img src="'.asset('assets/img/Sliders/'. $slider->slider).'" height="200" width="300" alt="'.$slider->category_name.'"></td>
			<td class="text-capitalize cat_nam">
			<a target="_blank" href="'.$slider->url.'">link</a>
			</td>
			<td class="text-capitalize cat_nam">';
			if ($slider->slider_type == 'home_page') {
				$html .='Home Page';
			}elseif($slider->slider_type == 'house'){
				$html .='House';
			}
			elseif($slider->slider_type == 'job'){
				$html .='Job';
			}
			elseif($slider->slider_type == 'cars'){
				$html .='Cars';
			}elseif($slider->slider_type == 'services'){
				$html .='Services';
			}elseif($slider->slider_type == 'buy-sale'){
				$html .='Buy/Sale';
			}
			$html .='</td>
			<td>
			<button onclick="getThisSlider(\'' . $slider->_id . '\', \'' . $tr . '\')" data-toggle="modal" data-target="#editModal" data-placement="bottom" title="edit"  class="btn btn-sm btn-info text-light"><i class="fa fa-edit"></i>
			</button>
			<button onclick="deleteSlider(\'' . $slider->_id . '\', \'' . $tr . '\')" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="delete"  class="btn btn-sm btn-danger text-light" ><i class="fa fa-trash"></i>
			</button>
			</td>
			</tr>';
		}
		return json_encode($html);
	}

	public function editSliderOne(Request $request){
		$data = Slider::find($request->id);
		return $data;
	}


	public function updateSliderOne(Request $request){
		$slider_img = Slider::where('_id',$request->editID)->first()->slider;
		if ($request->slider) {
			$path = 'assets/img/Sliders/'.$slider_img;
			unlink($path);
			$slider = $request->file('slider');
			$slider_name = 'slider_1_'.time() . '.' . $slider->getClientOriginalExtension();
			$slider->move(('assets/img/Sliders'), $slider_name);
		}else{
			$slider_name = $slider_img;
		}
		$data  = Slider::where('_id',$request->editID)->update([
			'slider_type' => $request->slider_type,
			'slider' => $slider_name,
			'url' => $request->url
		]);
		$res['items'] = Slider::where('_id',$request->editID)->first();
		$res['tr'] = $request->tr;
		return $res;
	}


	public function deleteSliderOne(Request $request){
		$data = Slider::where('_id',$request->id)->first();
		$path = 'assets/img/Sliders/'.$data->slider;
		unlink($path);
		$delete = Slider::where('_id', $request->id)->delete();
		if ($data->role == 1) {
			$sliders = Slider::where('role', 1)->orderBy('created_at', 'desc')->get();
		}else{
			$sliders = Slider::where('role', 2)->orderBy('created_at', 'desc')->get();
		}

		$tr = 0;
		$html = '';
		foreach ($sliders as $slider) {	
			$html .='<tr class="tr-'.++$tr.'">
			<td><img src="'.asset('assets/img/Sliders/'. $slider->slider).'" height="200" width="300" alt="'.$slider->category_name.'"></td>
			<td class="text-capitalize cat_nam">
			<a target="_blank" href="'.$slider->url.'">link</a>
			</td>
			<td class="text-capitalize cat_nam">';
			if ($slider->slider_type == 'home_page') {
				$html .='Home Page';
			}elseif($slider->slider_type == 'house'){
				$html .='House';
			}
			elseif($slider->slider_type == 'job'){
				$html .='Job';
			}
			elseif($slider->slider_type == 'cars'){
				$html .='Cars';
			}elseif($slider->slider_type == 'services'){
				$html .='Services';
			}elseif($slider->slider_type == 'buy-sale'){
				$html .='Buy/Sale';
			}
			$html .='</td>
			<td>
			<button onclick="getThisSlider(\'' . $slider->_id . '\', \'' . $tr . '\')" data-toggle="modal" data-target="#editModal" data-placement="bottom" title="edit"  class="btn btn-sm btn-info text-light"><i class="fa fa-edit"></i>
			</button>
			<button onclick="deleteSlider(\'' . $slider->_id . '\', \'' . $tr . '\')" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="delete"  class="btn btn-sm btn-danger text-light" ><i class="fa fa-trash"></i>
			</button>
			</td>
			</tr>';
		}
		return $html;
	}

	public function sliderTwo(){
		$data['sliders'] = Slider::where('role', 2)->orderBy('created_at','desc')->get();
		return view('admin.slider.slider-two', $data);
	}
}
