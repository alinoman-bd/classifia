<?php

namespace App\Http\Controllers\User;

use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MainCategory;
use App\SubCategory;
use App\InnerCategory;
use Illuminate\Support\Facades\Hash;
use Session;

use App\UsedCarModel;
use App\UsedCarGamybosPeriod;
use App\UsedCarFeatureEqpmentTitle;
use App\UsedCarFeatureEqpmentValue;
use App\MiniBusModel;
use App\MinibusFeatureEqpmentValue;

use App\BusesType;
use App\BusesMake;
use App\BusesFeatureEqpmentValue;

use App\MotorcycleMake;
use App\MotorcycleModel;
use App\MotorcycleType;
use App\MotorcycleCoolingSystemType;
use App\MotorcycleFeatureEqpmentTitle;
use App\MotorcycleFeatureEqpmentValue;

use App\CampersType;
use App\CampersMake;

use App\TrailerSemitrailersType;
use App\TrailerSemitrailersMake;
use App\TrailerSemitrailersAxlesMake;
use App\TrailerSemitrailersFeatureEqTitle;
use App\TrailerSemitrailersFeatureEqValue;

use App\ConstrctonNRoadconstrtonType;
use App\ConstrctonNRoadconstrtonMake;
use App\ConstrctonNRoadconstrtonTransmisionType;
use App\ConstrctonNRoadconstrtonFeatureEqpmentTitle;
use App\ConstrctonNRoadconstrtonFeatureEqpmentValue;

use App\StorageNLoadingEqType;
use App\StorageNLoadingEqMake;
use App\StorageNLoadingEqBoomType;
use App\StorageNLoadingEqFeatureEqTitle;
use App\StorageNLoadingEqFeatureEqValue;

use App\MunicipalMachineType;
use App\MunicipalMachineMake;
use App\MunicipalMachineFeatureEqTitle;
use App\MunicipalMachineFeatureEqValue;

use App\ConstructionMachinaryType;
use App\ConstructionMachinaryMake;

use App\AgriculturalImplementType;
use App\AgriculturalImplementMake;
use App\AgriculturalImplementFeatureEqValue;

use App\AgriculturalMachineryType;
use App\AgriculturalMachineryMake;
use App\AgriculturalMachineryFeatureEqTitle;
use App\AgriculturalMachineryFeatureEqValue;

use App\ForestMachinaryType;
use App\ForestMachinaryMake;
use App\ForestMachinaryFeatureEqTitle;
use App\ForestMachinaryFeatureEqValue;

// water category

use App\BoatsRaftsType;
use App\BoatsRaftsFeatureEqValue;

use App\JetSkisManufacturer;
use App\JetSkisHullMaterial;
use App\JetSkisFeatureEqTitle;
use App\JetSkisFeatureEqValue;

use App\KayaksCanoesType;
use App\KayaksCanoesFeatureEqValue;

use App\MotorboatsType;
use App\MotorboatsPerposeofBoat;
use App\MotorboatsHullMaterial;
use App\MotorboatsEngineType;
use App\MotorboatsTypeofBattery;
use App\MotorboatsFeatureEqTitle;
use App\MotorboatsFeatureEqValue;

use App\MotorsandEngineStartSystem;
use App\MotorsandEngineLegSize;
use App\MotorsandEnginFeatureEqValue;

use App\WaterTransportOtherFeatureEqValue;

use App\SailboatsType;
use App\SailboatRigType;
use App\SailboatStrWheelType;
use App\SailboatsFeatureEqTitle;
use App\SailboatsFeatureEqValue;

use App\WaterBikeFeatureEqValue;
use App\CarCommonRecord;

use App\ContactCity;
// house model
use App\RealEstateCity;
use App\House\MinimumRoom;
use App\House\HouseCommonRecord;

use App\House\Apartment;
use App\House\Plot;
use App\House\FirmsForest;
use App\House\LeisureHotel;
use App\House\Other;
use App\House\Office;
use App\House\TownHouse;
use App\House\Villa;
use App\House\Award;
use App\House\HighestPrice;

// house model


use App\AgriculturalImplements;
use App\AgriculturalMachinery;
use App\ForestMachinery;
use App\UsedCar;
use App\ConstructionandRoadConstructionEquipment;
use App\ConstructionMachineryAccessories;
use App\MunicipalMachinery;
use App\StorageandLoadingEquipment;
use App\MinivansMinibus;
use App\Autotrains;
use App\SemiTrailerTrucks;
use App\Trucks;
use App\Motorcycles;
use App\TrailersandSemitrailers;
use App\Buses;
use App\RecreationalVehiclesCampare;
use App\Minibus;
use App\PassengerVan;
use App\BoatsRaft;
use App\PersonalWaterCraft;
use App\KayaksCanoe;
use App\Motorboat;
use App\MotorandEngine;
use App\WaterTransportOther;
use App\Sailboat;
use App\WaterBike;


use App\Package;
use App\AdsValidity;

use App\PaymentInfo;
use App\Language;
use App\Slider\Slider;

class CategoryController extends Controller
{
	public function insertValues(Request $request)
	{
		$data  = new HighestPrice;
		$data->max_price = intval($request->title);
		$data->save();
		return redirect()->back();
	}

	public function insertGamybos(Request $request)
	{
		$check_data = ForestMachinaryFeatureEqValue::where('value', $request->name)
			->where('title_id', $request->title_id)
			->first();
		if ($check_data) {
			return redirect()->back()->with('exist', 'data exist');
		} else {
			ForestMachinaryFeatureEqValue::create([
				'value' => $request->name,
				'title_id' => $request->title_id
			]);
			return redirect()->back()->with('message', 'data inserted');
		}
	}

	public function categoryForm($sub_cat = null, $inner_cat = null)
	{
		if ($inner_cat) {
			$data['cat'] = $inner_cat;
			$data['sub_cat'] = $sub_cat;
		} else {
			$data['cat'] = $sub_cat;
		}
		return view('frontend.category.car.category-form', $data);
	}

	public function buySaleForm($sub_cat = null, $inner_cat = null, $th_cat = null)
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
		return view('frontend.category.buy-sale.category-form', $data);
	}
	public function getModels(Request $request)
	{
		if ($request->type == 'minibus') {
			$models = MiniBusModel::where('minibus_make_id', $request->id)->get();
		} elseif ($request->type == 'used-car') {
			$models = UsedCarModel::where('used_car_make_id', $request->id)->orderBy('model_name')->get()->sortBy('model_name', SORT_NATURAL | SORT_FLAG_CASE);
		} elseif ($request->type == 'motorcycle') {
			$models = MotorcycleModel::where('make_id', $request->id)->get();
		}
		$html = '';
		foreach ($models as $value) {
			$html .= '<div class="ctm-option" onclick="setThis(' . '\'model\'' . ',' . '\'' . $value->model_name . '\')" >' . ucfirst($value->model_name) . '</div>';
		}
		return $html;
	}
	public function getPeriods(Request $request)
	{
		$periods = UsedCarGamybosPeriod::where('used_car_model_id', $request->id)->get();
		$html = '';
		foreach ($periods as $value) {
			$html .= '<div class="ctm-option" onclick="setThis(\'' . $value->_id . '\')" >' . ucfirst($value->gamybos_periods_name) . '</div>';
		}
		return $html;
	}
	public function getCities(Request $request)
	{
		$cities = ContactCity::where('country_id', $request->id)->orderBy('city')->get()->sortBy('city', SORT_NATURAL | SORT_FLAG_CASE);
		$html = '';
		foreach ($cities as $value) {
			$html .= '<div class="ctm-option" onclick="setThisContactInfoVal(' . '\'contact_city\'' . ',' . '\'' . $value->city . '\')" >' . ucfirst($value->city) . '</div>';
		}
		return $html;
	}
	// house functions
	public function getCitiesOfRegion(Request $request)
	{
		$cities = RealEstateCity::where('country_id', $request->id)->orderBy('city')->get()->sortBy('city', SORT_NATURAL | SORT_FLAG_CASE);
		$html = '';
		foreach ($cities as $value) {
			$html .= '<div class="ctm-option" onclick="setThis(' . '\'municipalities\'' . ',' . '\'' . $value->city . '\')" >' . ucfirst($value->city) . '</div>';
		}
		return $html;
	}


	// public function carsSearchR() 
	// {
	// 	$data['cars'] = CarCommonRecord::with('carAdposter')->orderBy('_id','desc')->limit(12)->get();
	// 	$data['category'] = MainCategory::where('category_name', 'cars')->first();
	// 	$data['sub_cats'] = SubCategory::where('main_cat_id',$data['category']->_id)->orderBy('category_name', 'asc')->get();
	// 	$data['inner_categories'] = InnerCategory::orderBy('category_name')->get()->sortBy('category_name', SORT_NATURAL|SORT_FLAG_CASE);
	// 	// dd($data['cars']);
	// 	return view('frontend.category.car.car-search-result', $data);
	// }
	// public function carDetails($post_id, $cat){
	// 	$data['post_id'] = $post_id;
	// 	$data['cat'] = $cat;


	// 	if($cat == 'agricultural-implements'){
	// 		$data['car_info'] = AgriculturalImplements::where('_id', $post_id)->with('CarAddPosterInfo')->first();
	// 	}elseif ($cat == 'agricultural-machinery') {
	// 		$data['car_info'] = AgriculturalMachinery::where('_id', $post_id)->with('CarAddPosterInfo')->first();
	// 	}elseif ($cat == 'forest-machinery') {
	// 		$data['car_info'] = ForestMachinery::where('_id', $post_id)->with('CarAddPosterInfo')->first();
	// 	}elseif ($cat == 'used-cars') {
	// 		$data['car_info'] = UsedCar::where('_id', $post_id)->with('CarAddPosterInfo','CarCommonRecord')->first();
	// 	}elseif ($cat == 'construction-and-road-construction-equipment') {
	// 		$data['car_info'] = ConstructionandRoadConstructionEquipment::where('_id', $post_id)->with('CarAddPosterInfo')->first();
	// 	}elseif ($cat == 'construction-machinery-accessories') {
	// 		$data['car_info'] = ConstructionMachineryAccessories::where('_id', $post_id)->with('CarAddPosterInfo')->first();
	// 	}elseif ($cat == 'municipal-machinery') {
	// 		$data['car_info'] = MunicipalMachinery::where('_id', $post_id)->with('CarAddPosterInfo')->first();
	// 	}elseif ($cat == 'storage-and-loading-equipment') {
	// 		$data['car_info'] = StorageandLoadingEquipment::where('_id', $post_id)->with('CarAddPosterInfo')->first();
	// 	}elseif ($cat == 'minivans-minibus') {
	// 		$data['car_info'] = MinivansMinibus::where('_id', $post_id)->with('CarAddPosterInfo')->first();
	// 	}elseif ($cat == 'autotrains') {
	// 		$data['car_info'] = Autotrains::where('_id', $post_id)->with('CarAddPosterInfo')->first();
	// 	}elseif ($cat == 'semi-trailer-trucks') {
	// 		$data['car_info'] = SemiTrailerTrucks::where('_id', $post_id)->with('CarAddPosterInfo')->first();
	// 	}elseif ($cat == 'trucks') {
	// 		$data['car_info'] = Trucks::where('_id', $post_id)->with('CarAddPosterInfo')->first();
	// 	}elseif ($cat == 'motorcycles') {
	// 		$data['car_info'] = Motorcycles::where('_id', $post_id)->with('CarAddPosterInfo')->first();
	// 	}elseif ($cat == 'trailers-and-semitrailers') {
	// 		$data['car_info'] = TrailersandSemitrailers::where('_id', $post_id)->with('CarAddPosterInfo')->first();
	// 	}elseif ($cat == 'buses') {
	// 		$data['car_info'] = Buses::where('_id', $post_id)->with('CarAddPosterInfo')->first();
	// 	}elseif ($cat == 'recreational-vehicles-campers') {
	// 		$data['car_info'] = RecreationalVehiclesCampare::where('_id', $post_id)->with('CarAddPosterInfo')->first();
	// 	}elseif ($cat == 'minibus') {
	// 		$data['car_info'] = Minibus::where('_id', $post_id)->with('CarAddPosterInfo')->first();
	// 	}elseif ($cat == 'passenger-vans') {
	// 		$data['car_info'] = PassengerVan::where('_id', $post_id)->with('CarAddPosterInfo')->first();
	// 	}elseif ($cat == 'boats-rafts') {
	// 		$data['car_info'] = BoatsRaft::where('_id', $post_id)->with('CarAddPosterInfo')->first();
	// 	}elseif ($cat == 'personal-watercraft') {
	// 		$data['car_info'] = PersonalWaterCraft::where('_id', $post_id)->with('CarAddPosterInfo')->first();
	// 	}elseif ($cat == 'kayaks-canoes') {
	// 		$data['car_info'] = KayaksCanoe::where('_id', $post_id)->with('CarAddPosterInfo')->first();
	// 	}elseif ($cat == 'motorboats') {
	// 		$data['car_info'] = Motorboat::where('_id', $post_id)->with('CarAddPosterInfo')->first();
	// 	}elseif ($cat == 'motors-and-engines') {
	// 		$data['car_info'] = MotorandEngine::where('_id', $post_id)->with('CarAddPosterInfo')->first();
	// 	}elseif ($cat == 'water-transport-other') {
	// 		$data['car_info'] = WaterTransportOther::where('_id', $post_id)->with('CarAddPosterInfo')->first();
	// 	}elseif ($cat == 'sailboats') {
	// 		$data['car_info'] = Sailboat::where('_id', $post_id)->with('CarAddPosterInfo')->first();
	// 	}elseif ($cat == 'water-bikes') {
	// 		$data['car_info'] = WaterBike::where('_id', $post_id)->with('CarAddPosterInfo')->first();
	// 	}
	// 	// dd($data['car_info']);
	// 	return view('frontend.category.car.car-details', $data);
	// }




	// public function realestateSearch()
	// {	
	// 	$data['houses'] = HouseCommonRecord::with('houseAdposter')->orderBy('_id', 'desc')->paginate(12);
	// 	return view('frontend.category.house.house-search-result', $data);
	// }




	// function filterHouseField(Request $request){
	// 	if ($request->form_type == "apartments") {
	// 		$data['houses']  = HouseCommonRecord::where($request->field, $request->value)->get();
	// 	}elseif ($request->form_type == 'forest-farm') {
	// 		$data['houses'] = HouseCommonRecord::where($request->field, $request->value)->get();
	// 	}elseif ($request->form_type == 'country-house') {
	// 		$data['houses'] = HouseCommonRecord::where($request->field, $request->value)->get();
	// 	}elseif ($request->form_type == 'other') {
	// 		$data['houses'] = HouseCommonRecord::where($request->field, $request->value)->get();
	// 	}elseif ($request->form_type == 'plots') {
	// 		$data['houses'] = HouseCommonRecord::where($request->field, $request->value)->get();
	// 	}elseif ($request->form_type == 'townhouse') {
	// 		$data['houses'] = HouseCommonRecord::where($request->field, $request->value)->get();
	// 	}elseif ($request->form_type == 'villas') {
	// 		$data['houses'] = HouseCommonRecord::where($request->field, $request->value)->get();
	// 	}
	// 	$data['form_type'] = $request->form_type;
	// 	$html = '';
	// 	if($data['houses']->count() == 0){
	// 		$html .='<h1>No Match Found!</h1>';
	// 	}
	// 	else{
	// 		foreach ($data['houses'] as $house) {
	// 			$html.='<a href="'.url('view-house-details', ['post_id' => $house->_id, 'cat' => $request->form_type]).'">
	// 			<div class="m-side-list mar-b-15 ">';
	// 			$img = json_decode($house->image);
	// 			$html.='<div class="m-side-img"><img class="cover" src="'.('houseAdimages/'.$house->cover).'" alt="product"></div>
	// 			<div class="m-side-cnt">
	// 			<span class="fav"><i class="far fa-heart"></i></span>
	// 			<div class="star"><i class="far fa-star"></i> Features</div>
	// 			<div class="loc-name"><i class="fas fa-map-marker-alt"></i>'.$house->municipalities.','.$house->region.'</div>
	// 			<div class="house-name">'.str_replace("-"," ",ucfirst($data['form_type'])).'</div>				
	// 			<div class="house-price-len"><span class="h-price">'.$house->price.'$</span></div>
	// 			<div class="house-price-len">
	// 			<span class="h-len-txt">'.$house->area.'m<sup>2</sup></span>
	// 			<span class="h-len-txt1">'.ucfirst($house->form_type).'</span>
	// 			</div>
	// 			<div class="house-price-len">
	// 			<span class=""><i class="far fa-clock"></i>'.$house->created_at->diffForHumans().'</span>
	// 			</div>
	// 			</div>
	// 			</div>
	// 			</a>';
	// 		}
	// 	}
	// 	return $html;
	// }
	// public function checkSubHseField(Request $request){		
	// 	$area = $request->area; 		
	// 	$keyword = $request->keyword; 		
	// 	$region = $request->region; 
	// 	if ($area && $keyword && $region) {
	// 		if ($request->form_type == "apartments") {
	// 			$data['houses']  = Apartment::
	// 			where('area', $area)
	// 			->where('keyword', $keyword)
	// 			->where('region', $region)
	// 			->get();
	// 		}elseif ($request->form_type == 'forest-farm') {
	// 			$data['houses'] = FirmsForest::
	// 			where('area', $area)
	// 			->where('keyword', $keyword)
	// 			->where('region', $region)
	// 			->get();
	// 		}elseif ($request->form_type == 'country-house') {
	// 			$data['houses'] = Office::
	// 			where('area', $area)
	// 			->where('keyword', $keyword)
	// 			->where('region', $region)
	// 			->get();
	// 		}elseif ($request->form_type == 'other') {
	// 			$data['houses'] = Other::
	// 			where('area', $area)
	// 			->where('keyword', $keyword)
	// 			->where('region', $region)
	// 			->get();
	// 		}elseif ($request->form_type == 'plots') {
	// 			$data['houses'] = Plot::
	// 			where('area', $area)
	// 			->where('keyword', $keyword)
	// 			->where('region', $region)
	// 			->get();
	// 		}elseif ($request->form_type == 'townhouse') {
	// 			$data['houses'] = TownHouse::
	// 			where('area', $area)
	// 			->where('keyword', $keyword)
	// 			->where('region', $region)
	// 			->get();
	// 		}elseif ($request->form_type == 'villas') {
	// 			$data['houses'] = Villa::
	// 			where('area', $area)
	// 			->where('keyword', $keyword)
	// 			->where('region', $region)
	// 			->get();
	// 		}
	// 	}

	// 	// if has area & keyword
	// 	if ($area && $keyword) {
	// 		if ($request->form_type == "apartments") {
	// 			$data['houses']  = Apartment::
	// 			where('area', $area)
	// 			->where('keyword', $keyword)
	// 			->get();
	// 		}elseif ($request->form_type == 'forest-farm') {
	// 			$data['houses'] = FirmsForest::
	// 			where('area', $area)
	// 			->where('keyword', $keyword)
	// 			->get();
	// 		}elseif ($request->form_type == 'country-house') {
	// 			$data['houses'] = Office::
	// 			where('area', $area)
	// 			->where('keyword', $keyword)
	// 			->get();
	// 		}elseif ($request->form_type == 'other') {
	// 			$data['houses'] = Other::
	// 			where('area', $area)
	// 			->where('keyword', $keyword)
	// 			->get();
	// 		}elseif ($request->form_type == 'plots') {
	// 			$data['houses'] = Plot::
	// 			where('area', $area)
	// 			->where('keyword', $keyword)
	// 			->get();
	// 		}elseif ($request->form_type == 'townhouse') {
	// 			$data['houses'] = TownHouse::
	// 			where('area', $area)
	// 			->where('keyword', $keyword)
	// 			->get();
	// 		}elseif ($request->form_type == 'villas') {
	// 			$data['houses'] = Villa::
	// 			where('area', $area)
	// 			->where('keyword', $keyword)
	// 			->get();
	// 		}
	// 	}
	// 	// if has area & region
	// 	if ($area && $region) {
	// 		if ($request->form_type == "apartments") {
	// 			$data['houses']  = Apartment::
	// 			where('area', $area)
	// 			->where('region', $region)
	// 			->get();
	// 		}elseif ($request->form_type == 'forest-farm') {
	// 			$data['houses'] = FirmsForest::
	// 			where('area', $area)
	// 			->where('region', $region)
	// 			->get();
	// 		}elseif ($request->form_type == 'country-house') {
	// 			$data['houses'] = Office::
	// 			where('area', $area)
	// 			->where('region', $region)
	// 			->get();
	// 		}elseif ($request->form_type == 'other') {
	// 			$data['houses'] = Other::
	// 			where('area', $area)
	// 			->where('region', $region)
	// 			->get();
	// 		}elseif ($request->form_type == 'plots') {
	// 			$data['houses'] = Plot::
	// 			where('area', $area)
	// 			->where('region', $region)
	// 			->get();
	// 		}elseif ($request->form_type == 'townhouse') {
	// 			$data['houses'] = TownHouse::
	// 			where('area', $area)
	// 			->where('region', $region)
	// 			->get();
	// 		}elseif ($request->form_type == 'villas') {
	// 			$data['houses'] = Villa::
	// 			where('area', $area)
	// 			->where('region', $region)
	// 			->get();
	// 		}
	// 	}
	// 	// if has keyword & region
	// 	if ($keyword && $region) {
	// 		if ($request->form_type == "apartments") {
	// 			$data['houses']  = Apartment::
	// 			where('keyword', $keyword)
	// 			->where('region', $region)
	// 			->get();
	// 		}elseif ($request->form_type == 'forest-farm') {
	// 			$data['houses'] = FirmsForest::
	// 			where('keyword', $keyword)
	// 			->where('region', $region)
	// 			->get();
	// 		}elseif ($request->form_type == 'country-house') {
	// 			$data['houses'] = Office::
	// 			where('keyword', $keyword)
	// 			->where('region', $region)
	// 			->get();
	// 		}elseif ($request->form_type == 'other') {
	// 			$data['houses'] = Other::
	// 			where('keyword', $keyword)
	// 			->where('region', $region)
	// 			->get();
	// 		}elseif ($request->form_type == 'plots') {
	// 			$data['houses'] = Plot::
	// 			where('keyword', $keyword)
	// 			->where('region', $region)
	// 			->get();
	// 		}elseif ($request->form_type == 'townhouse') {
	// 			$data['houses'] = TownHouse::
	// 			where('keyword', $keyword)
	// 			->where('region', $region)
	// 			->get();
	// 		}elseif ($request->form_type == 'villas') {
	// 			$data['houses'] = Villa::
	// 			where('keyword', $keyword)
	// 			->where('region', $region)
	// 			->get();
	// 		}
	// 	}
	// 		// if has only area
	// 	if ($area) {
	// 		if ($request->form_type == "apartments") {
	// 			$data['houses']  = Apartment::where('area', $area)->get();
	// 		}elseif ($request->form_type == 'forest-farm') {
	// 			$data['houses'] = FirmsForest::where('area', $area)->get();
	// 		}elseif ($request->form_type == 'country-house') {
	// 			$data['houses'] = Office::where('area', $area)->get();
	// 		}elseif ($request->form_type == 'other') {
	// 			$data['houses'] = Other::where('area', $area)->get();
	// 		}elseif ($request->form_type == 'plots') {
	// 			$data['houses'] = Plot::where('area', $area)->get();
	// 		}elseif ($request->form_type == 'townhouse') {
	// 			$data['houses'] = TownHouse::where('area', $area)->get();
	// 		}elseif ($request->form_type == 'villas') {
	// 			$data['houses'] = Villa::where('area', $area)->get();
	// 		}
	// 	}
	// 	// if has only keyword
	// 	if ($keyword) {	
	// 		if ($request->form_type == "apartments") {
	// 			$data['houses']  = Apartment::where('keyword', $keyword)->get();
	// 		}elseif ($request->form_type == 'forest-farm') {
	// 			$data['houses'] = FirmsForest::where('keyword', $keyword)->get();
	// 		}elseif ($request->form_type == 'country-house') {
	// 			$data['houses'] = Office::where('keyword', $keyword)->get();
	// 		}elseif ($request->form_type == 'other') {
	// 			$data['houses'] = Other::where('keyword', $keyword)->get();
	// 		}elseif ($request->form_type == 'plots') {
	// 			$data['houses'] = Plot::where('keyword', $keyword)->get();
	// 		}elseif ($request->form_type == 'townhouse') {
	// 			$data['houses'] = TownHouse::where('keyword', $keyword)->get();
	// 		}elseif ($request->form_type == 'villas') {
	// 			$data['houses'] = Villa::where('keyword', $keyword)->get();
	// 		}
	// 	}
	// 	// if has only region
	// 	if ($region) {
	// 		if ($request->form_type == 'apartments') {
	// 			$data['houses']  = Apartment::where('region', $region)->get();
	// 		}elseif ($request->form_type == 'forest-farm') {
	// 			$data['houses'] = FirmsForest::where('region', $region)->get();
	// 		}elseif ($request->form_type == 'country-house') {
	// 			$data['houses'] = Office::where('region', $region)->get();
	// 		}elseif ($request->form_type == 'other') {
	// 			$data['houses'] = Other::where('region', $region)->get();
	// 		}elseif ($request->form_type == 'plots') {
	// 			$data['houses'] = Plot::where('region', $region)->get();
	// 		}elseif ($request->form_type == 'townhouse') {
	// 			$data['houses'] = TownHouse::where('region', $region)->get();
	// 		}elseif ($request->form_type == 'villas') {
	// 			$data['houses'] = Villa::where('region', $region)->get();
	// 		}
	// 	}

	// 	$data['form_type'] = $request->form_type;
	// 	$html = '';
	// 	if($data['houses']->count() == 0){
	// 		$html .='<h1>No Match Found!</h1>';
	// 	}
	// 	else{
	// 		foreach ($data['houses'] as $house) {
	// 			$html.='<a href="'.url('view-house-details', ['post_id' => $house->_id, 'cat' => $request->form_type]).'">
	// 			<div class="m-side-list mar-b-15 ">';
	// 			$img = json_decode($house->image);
	// 			$html.='<div class="m-side-img"><img class="cover" src="'.('houseAdimages/'.$house->cover).'" alt="product"></div>
	// 			<div class="m-side-cnt">
	// 			<span class="fav"><i class="far fa-heart"></i></span>
	// 			<div class="star"><i class="far fa-star"></i> Features</div>
	// 			<div class="loc-name"><i class="fas fa-map-marker-alt"></i>'.$house->municipalities.','.$house->region.'</div>
	// 			<div class="house-name">'.str_replace("-"," ",ucfirst($data['form_type'])).'</div>				
	// 			<div class="house-price-len"><span class="h-price">'.$house->price.'$</span></div>
	// 			<div class="house-price-len">
	// 			<span class="h-len-txt">'.$house->area.'m<sup>2</sup></span>
	// 			<span class="h-len-txt1">'.ucfirst($house->form_type).'</span>
	// 			</div>
	// 			<div class="house-price-len">
	// 			<span class=""><i class="far fa-clock"></i>'.$house->created_at->diffForHumans().'</span>
	// 			</div>
	// 			</div>
	// 			</div>
	// 			</a>';
	// 		}
	// 	}
	// 	return $html;
	// }

}
