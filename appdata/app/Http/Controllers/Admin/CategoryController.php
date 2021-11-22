<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MainCategory;
use App\SubCategory;
use App\InnerCategory;
use App\ThirdInner;
use App\Language;
use App\Languageable;
use Storage;
use Image;

class CategoryController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:admin');
	}
	public function category()
	{	
		$data['main_categories'] = MainCategory::orderBy('category_name', 'asc')->with('languages')->get();
		// dd($data['main_categories']);
		return view('admin.category.main-category', $data);
	}
	public function storeMainCat(Request $request)
	{
		$icon1 = $request->file('icon1');
		$icon_name1 = 'icon1_'.time() . '.' . $icon1->getClientOriginalExtension();
		$icon1->move(('assets/img/mainCatIcon'), $icon_name1);

		$icon2 = $request->file('icon2');
		$icon_name2 = 'icon2_'.time() . '.' . $icon2->getClientOriginalExtension();
		$icon2->move(('assets/img/mainCatIcon'), $icon_name2);

		MainCategory::create([
			'category_name' => strtolower($request->category_name), 
			'icon1' => $icon_name1,	
			'icon2' => $icon_name2
		]);

		$main_categories = MainCategory::orderBy('category_name', 'asc')->get();
		// return json_encode($main_categories);
		$tr = 0;
		$html = 'ggg';
		foreach ($main_categories as $mainCat) {	
			$html .='<tr class="tr-'.++$tr.'">
			<td><img src="'.asset('assets/img/mainCatIcon/'. $mainCat->icon1).'" height="50" width="50" alt="'.$mainCat->category_name.'"></td>
			<td class="text-capitalize cat_nam">'.$mainCat->category_name.'</td>
			<td>
			<button onclick="getThisMainCat(\'' . $mainCat->_id . '\', \'' . $tr . '\')" data-toggle="modal" data-target="#editModal" data-placement="bottom" title="edit"  class="btn btn-sm btn-info text-light"><i class="fa fa-edit"></i>
			</button>
			<button onclick="deleteMainCat(\'' . $mainCat->_id . '\', \'' . $tr . '\')" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="delete"  class="btn btn-sm btn-danger text-light" ><i class="fa fa-trash"></i>
			</button>
			</td>
			</tr>';
		}
		return json_encode($html);
	}
	
	public function editMainCat(Request $request){
		$data = MainCategory::find($request->id);
		return $data;
	}
	
	public function updateMainCat(Request $request){
		$name1 = MainCategory::where('_id',$request->editID)->first()->icon1;
		if ($request->icon1) {
			$path = 'assets/img/mainCatIcon/'.$name1;
			unlink($path);
			$icon1 = $request->file('icon1');
			$icon_name1 = 'icon1_'.time() . '.' . $icon1->getClientOriginalExtension();
			$icon1->move(('assets/img/mainCatIcon'), $icon_name1);
		}else{
			$icon_name1 = $name1;
		}
		$name2 = MainCategory::where('_id',$request->editID)->first()->icon2;
		if ($request->icon2) {
			$path = 'assets/img/mainCatIcon/'.$name2;
			unlink($path);
			$icon2 = $request->file('icon2');
			$icon_name2 = 'icon2_'.time() . '.' . $icon2->getClientOriginalExtension();
			$icon2->move(('assets/img/mainCatIcon'), $icon_name2);
		}else{
			$icon_name2 = $name2;
		}
		$data  = MainCategory::where('_id',$request->editID)->update([
			'category_name' => strtolower($request->category_name),
			'icon1' =>$icon_name1,
			'icon2' =>$icon_name2
		]);
		$res['items'] = MainCategory::where('_id',$request->editID)->with('languages')->first();
		$res['tr'] = $request->tr;

		foreach(Language::all() as $lang){
			$key = $lang->key.'_category_name';
			if ($request->$key) {
				$language = new Languageable;
				$language->key = $lang->key;
				$language->value = $request->$key;

				$res['items']->languages()->save($language);
			}

		}

		return $res;
	}

	public function deleteMainCat(Request $request){
		$data = MainCategory::where('_id',$request->id)->first();
		$path1 = 'assets/img/mainCatIcon/'.$data->icon1;
		unlink($path1);
		$path2 = 'assets/img/mainCatIcon/'.$data->icon2;
		unlink($path2);
		$delete = MainCategory::where('_id', $request->id)->delete();
		$deleteSub = SubCategory::where('main_cat_id',$request->id)->delete();
		$deleteSub = InnerCategory::where('main_cat_id',$request->id)->delete();
		$main_categories = MainCategory::orderBy('category_name', 'asc')->get();
		$tr = 0;
		$html = '';
		foreach ($main_categories as $mainCat) {	
			$html .='<tr class="tr-'.++$tr.'">
			<td><img src="'.asset('assets/img/mainCatIcon/'. $mainCat->icon1).'" height="50" width="50" alt="'.$mainCat->category_name.'"></td>
			<td class="text-capitalize cat_nam">'.$mainCat->category_name.'</td>
			<td>
			<button onclick="getThisMainCat(\'' . $mainCat->_id . '\', \'' . $tr . '\')" data-toggle="modal" data-target="#editModal" data-placement="bottom" title="edit"  class="btn btn-sm btn-info text-light"><i class="fa fa-edit"></i>
			</button>
			<button onclick="deleteMainCat(\'' . $mainCat->_id . '\', \'' . $tr . '\')" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="delete"  class="btn btn-sm btn-danger text-light" ><i class="fa fa-trash"></i>
			</button>
			</td>
			</tr>';
		}
		return $html;
	}
	
	public function subCategory()
	{	
		$data['sub_categories'] = SubCategory::orderBy('category_name', 'asc')->with('languages')->get();
		// dd($data['sub_categories']);
		return view('admin.category.sub-category', $data);
	}
	public function storeSubCat(Request $request)
	{
		$icon = $request->file('icon');
		$icon_name = 'icon_'.time() . '.' . $icon->getClientOriginalExtension();
		$icon->move(('assets/img/subCatIcon'), $icon_name);

		SubCategory::create([
			'category_name' => strtolower($request->category_name),
			'main_cat_id' => $request->main_cat_id,
			'slug' => $request->slug,
			'icon' => $icon_name,
		]);
		$sub_categories = SubCategory::orderBy('category_name', 'asc')->get();
		$tr = 0;
		$html = '';
		foreach ($sub_categories as $subCat) {	
			$html .='<tr class="tr-'.++$tr.'">
			<td><img src="'.asset('assets/img/subCatIcon/'. $subCat->icon).'" height="50" width="50" alt="'.$subCat->category_name.'"></td>
			<td class="text-capitalize cat_nam">'.$subCat->category_name.'</td>
			<td class="text-capitalize cat_nam">'.$subCat->mainCategory->category_name.'</td>
			<td>
			<button onclick="getThisSubCat(\'' . $subCat->_id . '\', \'' . $tr . '\')" data-toggle="modal" data-target="#editModal" data-placement="bottom" title="edit"  class="btn btn-sm btn-info text-light"><i class="fa fa-edit"></i>
			</button>
			<button onclick="deleteSubCat(\'' . $subCat->_id . '\', \'' . $tr . '\')" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="delete"  class="btn btn-sm btn-danger text-light" ><i class="fa fa-trash"></i>
			</button>
			</td>
			</tr>';
		}
		return json_encode($html);
	}
	public function editSubCat(Request $request){
		$data = SubCategory::find($request->id);
		return $data;
	}
	
	public function updateSubCat(Request $request){

		$name1 = SubCategory::where('_id',$request->editID)->first()->icon;
		if ($request->icon) {
			$path = 'assets/img/subCatIcon/'.$name1;
			unlink($path);
			$icon = $request->file('icon');
			$icon_name = 'icon_'.time() . '.' . $icon->getClientOriginalExtension();
			$icon->move(('assets/img/subCatIcon'), $icon_name);
		}else{
			$icon_name = $name1;
		}
		$data = SubCategory::where('_id',$request->editID)->update([
			'category_name' => strtolower($request->category_name),
			'main_cat_id' => $request->main_cat_id,
			'icon' => $icon_name,
			'slug' => $request->slug,
		]);
		$res = [];
		$res['items'] = SubCategory::where('_id', $request->editID)->with('mainCategory')->first();
		$res['tr'] = $request->tr;

		foreach(Language::all() as $lang){
			$key = $lang->key.'_sub_category_name';
			if ($request->$key) {
				$language = new Languageable;
				$language->key = $lang->key;
				$language->value = $request->$key;

				$res['items']->languages()->save($language);
			}

		}
		return $res;
	}
	public function deleteSubCat(Request $request){
		$data = SubCategory::where('_id',$request->id)->first();
		$path = 'assets/img/subCatIcon/'.$data->icon;
		unlink($path);
		$delete = SubCategory::where('_id', $request->id)->delete();
		$deleteinner = InnerCategory::where('sub_cat_id',$request->id)->delete();
		$sub_categories = SubCategory::orderBy('category_name', 'asc')->get();
		$tr = 0;
		$html = '';
		foreach ($sub_categories as $subCat) {	
			$html .='<tr class="tr-'.++$tr.'">
			<td><img src="'.asset('assets/img/subCatIcon/'. $subCat->icon).'" height="50" width="50" alt="'.$subCat->category_name.'"></td>
			<td class="text-capitalize cat_nam">'.$subCat->category_name.'</td>
			<td class="text-capitalize cat_nam">'.$subCat->mainCategory->category_name.'</td>
			<td>
			<button onclick="getThisSubCat(\'' . $subCat->_id . '\', \'' . $tr . '\')" data-toggle="modal" data-target="#editModal" data-placement="bottom" title="edit"  class="btn btn-sm btn-info text-light"><i class="fa fa-edit"></i>
			</button>
			<button onclick="deleteSubCat(\'' . $subCat->_id . '\', \'' . $tr . '\')" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="delete"  class="btn btn-sm btn-danger text-light" ><i class="fa fa-trash"></i>
			</button>
			</td>
			</tr>';
		}
		return $html;
	}

	public function innerSubCategory(){
		$data['inner_categories'] = InnerCategory::orderBy('category_name', 'asc')->get();
		return view('admin.category.inner-category', $data);
	}
	
	public function getAllSubCats(Request $request){
		$subs = SubCategory::where('main_cat_id', $request->id)->get();
		$html = '';
		foreach ($subs as $sub) {
			$html .='<option value="'.$sub->_id.'">' . $sub->category_name . '</option>';
		}
		return $html;
	}
	

	public function storeInnerCat(Request $request)
	{
		$icon = $request->file('icon');
		$icon_name = 'icon_'.time() . '.' . $icon->getClientOriginalExtension();
		$icon->move(('assets/img/innerCatIcon'), $icon_name);

		InnerCategory::create([
			'category_name' => strtolower($request->category_name),
			'main_cat_id' => $request->main_cat_id,
			'sub_cat_id' => $request->sub_cat_id,
			'slug' => $request->slug,
			'icon' => $icon_name,
		]);
		$inner_categories = InnerCategory::orderBy('category_name', 'asc')->get();
		$tr = 0;
		$html = '';
		foreach ($inner_categories as $innerCat) {	
			$html .='<tr class="tr-'.++$tr.'">
			<td><img src="'.asset('assets/img/innerCatIcon/'. $innerCat->icon).'" height="50" width="50" alt="'.$innerCat->category_name.'"></td>
			<td class="text-capitalize cat_nam">'.$innerCat->category_name.'</td>
			<td class="text-capitalize cat_nam">'.$innerCat->subCategory->category_name.'</td>
			<td class="text-capitalize cat_nam">'.$innerCat->mainCategory->category_name.'</td>
			<td>
			<button onclick="getThisInnerCat(\'' . $innerCat->_id . '\', \'' . $tr . '\')" data-toggle="modal" data-target="#editModal" data-placement="bottom" title="edit"  class="btn btn-sm btn-info text-light"><i class="fa fa-edit"></i>
			</button>
			<button onclick="deleteInnerCat(\'' . $innerCat->_id . '\', \'' . $tr . '\')" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="delete"  class="btn btn-sm btn-danger text-light" ><i class="fa fa-trash"></i>
			</button>
			</td>
			</tr>';
		}
		return json_encode($html);
	}
	public function editInnerCat(Request $request){
		$data['inr_cat_data'] = InnerCategory::where('_id',$request->id)
		->with('mainCategory','subCategory')
		->first();
		$sub_cat_data = SubCategory::where('main_cat_id', $data['inr_cat_data']->mainCategory->_id)->get();
		$html = '';
		foreach ($sub_cat_data as $value) {
			$html .= '<option value="' . $value->_id . '" ';
			$html .= ($value->_id == $data['inr_cat_data']->subCategory->_id) ? 'selected' : '';
			$html .= '>' . $value->category_name . '</option>';
		}
		$data['html'] = $html;
		return $data;
	}
	
	public function updateInnerCat(Request $request){
		$items = InnerCategory::orderBy('category_name','desc')->get();
			foreach($items as $item){
				$path = 'assets/img/innerCatIcon/'.$item->icon;
				if (!file_exists($path)){
					$image = $request->file('icon');
					$image_name = 'icon_'.time() . '.' . $image->getClientOriginalExtension();
					$destinationPath = 'assets/img/innerCatIcon';
					$resize_image = Image::make($image->getRealPath());
					$resize_image->resize(2620, 2620, function($constraint){
						$constraint->aspectRatio();
					})->save($destinationPath . '/' . $image_name);
					$item->icon = $image_name;
					$item->save();
				}
			}
			return 1;
			exit();
			$image->move('houseAdimages', $image_name);
		// $icon_name = 'icon_'.time() . '.' . $icon->getClientOriginalExtension();
		// $destinationPath =	('assets/img/innerCatIcon');
		// $icon->move($destinationPath, $icon_name);
			// foreach($name1 as  $img){
			// 	$icon->copy($destinationPath, $icon_name);
			// 	$img->icon = $icon_name;
			// 	$img->save();
			// }
			// $path = public_path().'assets/img/innerCatIcon/icon_1587894171.png';
			// $destinationPath = public_path().'assets/img/innerCatIcon/nn/icon_1587894171.png';
			// Storage::copy($path, 'assets/img/innerCatIcon/nn/icon_1587894171.png');
   
			dd('Copy File dont.');
			return 1;
		exit();
		$name1 = InnerCategory::where('_id',$request->editID)->first()->icon;
		if ($request->icon) {
			$path = 'assets/img/innerCatIcon/'.$name1;
			unlink($path);
			$icon = $request->file('icon');
			$icon_name = 'icon_'.time() . '.' . $icon->getClientOriginalExtension();
			$icon->move(('assets/img/innerCatIcon'), $icon_name);
		}else{
			$icon_name = $name1;
		}
		InnerCategory::where('_id', $request->editID)->update([
			'category_name' => strtolower($request->category_name),
			'slug' => $request->slug,
			'main_cat_id' => $request->main_cat_id,
			'sub_cat_id' => $request->sub_cat_id,
			'icon' => $icon_name,
			'slug' => $request->slug,
		]);
		$res = [];
		$res['items'] = InnerCategory::where('_id', $request->editID)->with('mainCategory','subCategory')->first();
		$res['tr'] = $request->tr;

		foreach(Language::all() as $lang){
			$key = $lang->key.'_inner_category_name';
			if ($request->$key) {
				$language = new Languageable;
				$language->key = $lang->key;
				$language->value = $request->$key;

				$res['items']->languages()->save($language);
			}

		}
		return $res;
	}

	public function deleteInnerCat(Request $request){
		$data = InnerCategory::where('_id',$request->id)->first();
		$path = 'assets/img/innerCatIcon/'.$data->icon;
		unlink($path);
		$delete = InnerCategory::where('_id', $request->id)->delete();

		$inner_categories = InnerCategory::orderBy('category_name', 'asc')->get();
		$tr = 0;
		$html = '';
		foreach ($inner_categories as $innerCat) {	
			$html .='<tr class="tr-'.++$tr.'">
			<td><img src="'.asset('assets/img/innerCatIcon/'. $innerCat->icon).'" height="50" width="50" alt="'.$innerCat->category_name.'"></td>
			<td class="text-capitalize cat_nam">'.$innerCat->category_name.'</td>
			<td class="text-capitalize cat_nam">'.$innerCat->subCategory->category_name.'</td>
			<td class="text-capitalize cat_nam">'.$innerCat->mainCategory->category_name.'</td>
			<td>
			<button onclick="getThisInnerCat(\'' . $innerCat->_id . '\', \'' . $tr . '\')" data-toggle="modal" data-target="#editModal" data-placement="bottom" title="edit"  class="btn btn-sm btn-info text-light"><i class="fa fa-edit"></i>
			</button>
			<button onclick="deleteInnerCat(\'' . $innerCat->_id . '\', \'' . $tr . '\')" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="delete"  class="btn btn-sm btn-danger text-light" ><i class="fa fa-trash"></i>
			</button>
			</td>
			</tr>';
		}
		return $html;
	}
	

	public function thirdInnerCategory(){
		$data['thrd_inner_cats'] = ThirdInner::orderBy('category_name', 'asc')->get();
		return view('admin.category.third-inner', $data);
	}


	public function getAllInnerCats(Request $request){
		$inners = InnerCategory::where('sub_cat_id', $request->id)->get();
		$html = '';
		foreach ($inners as $inner) {
			$html .='<option value="'.$inner->_id.'">' . $inner->category_name . '</option>';
		}
		return $html;
	}
	public function storeThrdInnerCat(Request $request)
	{
		$icon = $request->file('icon');
		$icon_name = 'icon_'.time() . '.' . $icon->getClientOriginalExtension();
		$icon->move(('assets/img/thirdInnerCatIcon'), $icon_name);

		ThirdInner::create([
			'category_name' => strtolower($request->category_name),
			'main_cat_id' => $request->main_cat_id,
			'sub_cat_id' => $request->sub_cat_id,
			'inner_cat_id' => $request->inner_cat_id,
			'slug' => $request->slug,
			'icon' => $icon_name,
		]);
		$data['thrd_inner_cats'] = ThirdInner::orderBy('category_name', 'asc')->get();
		$data['tr'] = 0;
		$view = view('admin.category.thrd-inr-listing-section',$data)->render();
		return json_encode($view);
	}

	public function editThrdInnerCat(Request $request){
		$data['thrd_cat_data'] = ThirdInner::where('_id',$request->id)
		->with('mainCategory','subCategory','innerCategory')
		->first();

		$sub_cat_data = SubCategory::where('main_cat_id', $data['thrd_cat_data']->mainCategory->_id)->get();
		$inr_cat_data = InnerCategory::where('sub_cat_id', $data['thrd_cat_data']->subCategory->_id)->get();

		$html_sub = '';
		foreach ($sub_cat_data as $value) {
			$html_sub .= '<option value="' . $value->_id . '" ';
			$html_sub .= ($value->_id == $data['thrd_cat_data']->subCategory->_id) ? 'selected' : '';
			$html_sub .= '>' . $value->category_name . '</option>';
		}
		$data['sub'] = $html_sub;

		$html_inner = '';
		foreach ($inr_cat_data as $value) {
			$html_inner .= '<option value="' . $value->_id . '" ';
			$html_inner .= ($value->_id == $data['thrd_cat_data']->innerCategory->_id) ? 'selected' : '';
			$html_inner .= '>' . $value->category_name . '</option>';
		}
		$data['inner'] = $html_inner;
		return $data;
	}


	public function updateThrdInnerCat(Request $request){

		
		$name1 = ThirdInner::where('_id',$request->editID)->first()->icon;
		if ($request->icon) {
			$path = 'assets/img/thirdInnerCatIcon/'.$name1;
			unlink($path);
			$icon = $request->file('icon');
			$icon_name = 'icon_'.time() . '.' . $icon->getClientOriginalExtension();
			$icon->move(('assets/img/thirdInnerCatIcon'), $icon_name);
		}else{
			$icon_name = $name1;
		}
		ThirdInner::where('_id', $request->editID)->update([
			'category_name' => strtolower($request->category_name),
			'main_cat_id' => $request->main_cat_id,
			'sub_cat_id' => $request->sub_cat_id,
			'inner_cat_id' => $request->inner_cat_id,
			'slug' => $request->slug,
			'icon' => $icon_name,
		]);
		$res = [];
		$res['items'] = ThirdInner::where('_id', $request->editID)->with('mainCategory','subCategory','innerCategory')->first();
		$res['tr'] = $request->tr;
		foreach(Language::all() as $lang){
			$key = $lang->key.'_third_inner_category_name';
			if ($request->$key) {
				$language = new Languageable;
				$language->key = $lang->key;
				$language->value = $request->$key;
				$res['items']->languages()->save($language);
			}

		}
		return $res;
	}
	public function deleteThrdInnerCat(Request $request){
		$data = ThirdInner::where('_id',$request->id)->first();
		$path = 'assets/img/thirdInnerCatIcon/'.$data->icon;
		unlink($path);
		$delete = ThirdInner::where('_id', $request->id)->delete();
	}

}
