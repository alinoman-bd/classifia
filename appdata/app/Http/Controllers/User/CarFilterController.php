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
// modify 

use App\PaymentInfo;
use App\Slider\Slider;
use App\Advertisement;



class CarFilterController extends Controller
{
	public function carBrowse() 
	{
		$data['category'] = MainCategory::where('cat_key','cars')->first();
		$data['sub_cats'] = SubCategory::where('main_cat_id',$data['category']->_id)
		->orderBy('category_name', 'asc')
		->get();
		$data['inner_categories'] = InnerCategory::orderBy('category_name')
		->get()
		->sortBy('category_name', SORT_NATURAL|SORT_FLAG_CASE);

		$data['feature_products'] = PaymentInfo::whereNotNull('advert_id')
		->with(['advertisement' => function($q) {
			return $q->where('cat', 'cars')
			->orderBy('created_at','desc')
			->with('coverImage');
		}])
		->orderBy('created_at','desc')
		->limit(12)
		->get();
		$data['ad_products'] = PaymentInfo::whereNotNull('promot_id')
		->with(['advertisement' => function($q) {
			return $q->where('cat', 'cars')
			->orderBy('created_at','desc')
			->with('coverImage');
		}])
		->orderBy('created_at','desc')
		->limit(4)
		->get();
		$data['sliders'] = Slider::where('slider_type', 'cars')->orderBy('created_at','desc')->get();
		// dd($data['feature_products']);
		return view('frontend.category.car.car-browse', $data);
	}



	public function filterCarAllField(Request $request){
		
		if ($request->form_type) {
			$form_type = $request->form_type;
			if($request->form_type == 'agricultural-implements'){
				$min_price = (int)$request->min_price;
				$max_price = (int)$request->max_price;
				$type = $request->type_ag_eq;
				$new_used = $request->new_used_ag_eq;
				$make = $request->make_ag_eq;
				$model = $request->model_ag_eq;
				$data['cars'] = Advertisement::where('cat','cars')->where('form_type',$form_type)
				->when($type, function($q) use($type) {
					$q->where('agri_imp_type', $type);
				})
				->when($min_price && $max_price, function($q) use($min_price, $max_price) {
					$q->whereBetween('price', [$min_price,$max_price]);
				})
				->when($min_price && $max_price == 0, function($q) use($min_price) {
					$q->where('price','>=',$min_price);
				})
				->when($max_price && $min_price == 0, function($q) use($max_price) {
					$q->where('price','<=',$max_price);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($make, function($q) use($make) {
					$q->where('make', $make);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->with('coverImage')
				->paginate(12);
			}elseif ($request->form_type == 'agricultural-machinery') {
				$min_price = (int)$request->min_price;
				$max_price = (int)$request->max_price;
				$type = $request->type_ag_mac;
				$new_used = $request->new_used_ag_mac;
				$make = $request->make_ag_mac;
				$model = $request->model_ag_mac;
				$data['cars'] = Advertisement::where('cat','cars')->where('form_type',$form_type)
				->when($type, function($q) use($type) {
					$q->where('agri_mach_type', $type);
				})
				->when($min_price && $max_price, function($q) use($min_price, $max_price) {
					$q->whereBetween('price', [$min_price,$max_price]);
				})
				->when($min_price && $max_price == 0, function($q) use($min_price) {
					$q->where('price','>=',$min_price);
				})
				->when($max_price && $min_price == 0, function($q) use($max_price) {
					$q->where('price','<=',$max_price);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($make, function($q) use($make) {
					$q->where('make', $make);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->with('coverImage')
				->paginate(12);
			}elseif ($request->form_type == 'forest-machinery') {
				$min_price = (int)$request->min_price;
				$max_price = (int)$request->max_price;
				$type = $request->type_frs_mac;
				$new_used = $request->new_used_frs_mac;
				$make = $request->make_frs_mac;
				$model = $request->model_frs_mac;
				$data['cars'] = Advertisement::where('cat','cars')->where('form_type',$form_type)
				->when($min_price && $max_price, function($q) use($min_price, $max_price) {
					$q->whereBetween('price', [$min_price,$max_price]);
				})
				->when($min_price && $max_price == 0, function($q) use($min_price) {
					$q->where('price','>=',$min_price);
				})
				->when($max_price && $min_price == 0, function($q) use($max_price) {
					$q->where('price','<=',$max_price);
				})
				->when($type, function($q) use($type) {
					$q->where('forest_mach_type', $type);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($make, function($q) use($make) {
					$q->where('make', $make);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->with('coverImage')
				->paginate(12);
			}elseif ($request->form_type == 'used-cars') {
				$min_price = (int)$request->min_price;
				$max_price = (int)$request->max_price;
				$make = $request->make_cars;
				$new_used = $request->new_used_cars;
				$body_type = $request->body_type_cars;
				$fuel_type  = $request->fuel_type_cars;
				$gear_box = $request->gear_box_cars;
				$doors_number = $request->doors_number_cars;
				$color = $request->color_cars;
				
				$data['cars'] = Advertisement::where('cat','cars')->where('form_type', $form_type)
				->when($min_price && $max_price, function($q) use($min_price, $max_price) {
					$q->whereBetween('price', [$min_price,$max_price]);
				})
				->when($min_price && $max_price == 0, function($q) use($min_price) {
					$q->where('price','>=',$min_price);
				})
				->when($max_price && $min_price == 0, function($q) use($max_price) {
					$q->where('price','<=',$max_price);
				})
				->when($make, function($q) use($make) {
					$q->where('make', $make);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($body_type, function($q) use($body_type) {
					$q->where('body_type', $body_type);
				})
				->when($fuel_type, function($q) use($fuel_type) {
					$q->where('fuel_type', $fuel_type);
				})
				->when($gear_box, function($q) use($gear_box) {
					$q->where('gear_box', $gear_box);
				})
				->when($doors_number, function($q) use($doors_number) {
					$q->where('doors_number', $doors_number);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->with('coverImage')
				->paginate(12);
			}elseif ($request->form_type == 'construction-and-road-construction-equipment') {
				$min_price = (int)$request->min_price;
				$max_price = (int)$request->max_price;
				$type = $request->type_const_mach;
				$make = $request->make_const_mach;
				$model = $request->model_const_mach;
				$data['cars'] = Advertisement::where('cat','cars')->where('form_type',$form_type)
				->when($min_price && $max_price, function($q) use($min_price, $max_price) {
					$q->whereBetween('price', [$min_price,$max_price]);
				})
				->when($min_price && $max_price == 0, function($q) use($min_price) {
					$q->where('price','>=',$min_price);
				})
				->when($max_price && $min_price == 0, function($q) use($max_price) {
					$q->where('price','<=',$max_price);
				})
				->when($type, function($q) use($type) {
					$q->where('forest_mach_type', $type);
				})
				->when($make, function($q) use($make) {
					$q->where('make', $make);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->with('coverImage')
				->paginate(12);
			}elseif ($request->form_type == 'construction-machinery-accessories') {
				$min_price = (int)$request->min_price;
				$max_price = (int)$request->max_price;
				$make = $request->make_cars;
				$model = $request->model_cars;
				$new_used = $request->new_used;
				$body_type = $request->body_type_cars;
				$fuel_type  = $request->fuel_type_cars;
				$gear_box = $request->gear_box_cars;
				$data['cars'] = Advertisement::where('cat','cars')->where('form_type',$form_type)
				->when($min_price && $max_price, function($q) use($min_price, $max_price) {
					$q->whereBetween('price', [$min_price,$max_price]);
				})
				->when($min_price && $max_price == 0, function($q) use($min_price) {
					$q->where('price','>=',$min_price);
				})
				->when($max_price && $min_price == 0, function($q) use($max_price) {
					$q->where('price','<=',$max_price);
				})
				->when($make, function($q) use($make) {
					$q->where('make', $make);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($body_type, function($q) use($body_type) {
					$q->where('body_type', $body_type);
				})
				->when($fuel_type, function($q) use($fuel_type) {
					$q->where('fuel_type', $fuel_type);
				})
				->when($gear_box, function($q) use($gear_box) {
					$q->where('gear_box', $gear_box);
				})
				->with('coverImage')
				->paginate(12);
			}elseif ($request->form_type == 'municipal-machinery') {
				$min_price = (int)$request->min_price;
				$max_price = (int)$request->max_price;
				$make = $request->make_muni_mach;
				$type = $request->type_muni_mach;
				$new_used = $request->new_used_muni_mach;
				$fuel_type  = $request->fuel_type_muni_mach;
				$gear_box = $request->gear_box_muni_mach;
				$str_wheel = $request->str_wheel_muni_mach;
				$color = $request->color_muni_mach;
				$data['cars'] = Advertisement::where('cat','cars')->where('form_type',$form_type)
				->when($min_price && $max_price, function($q) use($min_price, $max_price) {
					$q->whereBetween('price', [$min_price,$max_price]);
				})
				->when($min_price && $max_price == 0, function($q) use($min_price) {
					$q->where('price','>=',$min_price);
				})
				->when($max_price && $min_price == 0, function($q) use($max_price) {
					$q->where('price','<=',$max_price);
				})
				->when($make, function($q) use($make) {
					$q->where('make', $make);
				})
				->when($type, function($q) use($type) {
					$q->where('muni_mach_type', $type);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($fuel_type, function($q) use($fuel_type) {
					$q->where('fuel_type', $fuel_type);
				})
				->when($gear_box, function($q) use($gear_box) {
					$q->where('gear_box', $gear_box);
				})
				->when($str_wheel, function($q) use($str_wheel) {
					$q->where('str_wheel', $str_wheel);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->with('coverImage')
				->paginate(12);
			}elseif ($request->form_type == 'storage-and-loading-equipment') {
				$min_price = (int)$request->min_price;
				$max_price = (int)$request->max_price;
				$make = $request->make_storage;
				$model = $request->model_storage;
				$type = $request->type_storage;
				$new_used = $request->new_used_storage;
				$fuel_type  = $request->fuel_type_storage;
				$boom_type = $request->boom_type_storage;
				$color = $request->color_storage;
				$data['cars'] = Advertisement::where('cat','cars')->where('form_type',$form_type)
				->when($min_price && $max_price, function($q) use($min_price, $max_price) {
					$q->whereBetween('price', [$min_price,$max_price]);
				})
				->when($min_price && $max_price == 0, function($q) use($min_price) {
					$q->where('price','>=',$min_price);
				})
				->when($max_price && $min_price == 0, function($q) use($max_price) {
					$q->where('price','<=',$max_price);
				})
				->when($make, function($q) use($make) {
					$q->where('make', $make);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->when($type, function($q) use($type) {
					$q->where('storage_type', $type);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($fuel_type, function($q) use($fuel_type) {
					$q->where('fuel_type', $fuel_type);
				})
				->when($boom_type, function($q) use($boom_type) {
					$q->where('boom_type', $boom_type);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->with('coverImage')
				->paginate(12);
			}elseif ($request->form_type == 'minivans-minibus') {
				$min_price = (int)$request->min_price;
				$max_price = (int)$request->max_price;
				$type = $request->type_minivan;
				$make = $request->make_minivan;
				$new_used = $request->new_used_minivan;
				$fuel_type  = $request->fuel_type_minivan;
				$color = $request->color_minivan;
				$str_wheel = $request->str_wheel_minivan;
				$drivel_wheel = $request->drivel_wheel_minivan;
				$gear_box = $request->gear_box_minivan;
				$climate_contrl = $request->climate_contrl_minivan;
				$data['cars'] = Advertisement::where('cat','cars')->where('form_type',$form_type)
				->when($min_price && $max_price, function($q) use($min_price, $max_price) {
					$q->whereBetween('price', [$min_price,$max_price]);
				})
				->when($min_price && $max_price == 0, function($q) use($min_price) {
					$q->where('price','>=',$min_price);
				})
				->when($max_price && $min_price == 0, function($q) use($max_price) {
					$q->where('price','<=',$max_price);
				})
				->when($make, function($q) use($make) {
					$q->where('make', $make);
				})
				->when($type, function($q) use($type) {
					$q->where('type_minivan', $type);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($fuel_type, function($q) use($fuel_type) {
					$q->where('fuel_type', $fuel_type);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->when($str_wheel, function($q) use($str_wheel) {
					$q->where('str_wheel', $str_wheel);
				})
				->when($drivel_wheel, function($q) use($drivel_wheel) {
					$q->where('drivel_wheel', $drivel_wheel);
				})
				->when($gear_box, function($q) use($gear_box) {
					$q->where('gear_box', $gear_box);
				})
				->when($climate_contrl, function($q) use($climate_contrl) {
					$q->where('climate_contrl', $climate_contrl);
				})
				->with('coverImage')
				->paginate(12);
			}elseif ($request->form_type == 'autotrains') {
				$min_price = (int)$request->min_price;
				$max_price = (int)$request->max_price;
				$type = $request->type_autotrains;
				$make = $request->make_autotrains;
				$model = $request->model_autotrains;
				$new_used = $request->new_used_autotrains;
				$fuel_type  = $request->fuel_type_autotrains;
				$color = $request->color_autotrains;
				$str_wheel = $request->str_wheel_autotrains;
				$sleep_bed = $request->sleep_bed_autotrains;
				$gear_box = $request->gear_box_autotrains;
				$layout = $request->layout_autotrains;
				$data['cars'] = Advertisement::where('cat','cars')->where('form_type',$form_type)
				->when($min_price && $max_price, function($q) use($min_price, $max_price) {
					$q->whereBetween('price', [$min_price,$max_price]);
				})
				->when($min_price && $max_price == 0, function($q) use($min_price) {
					$q->where('price','>=',$min_price);
				})
				->when($max_price && $min_price == 0, function($q) use($max_price) {
					$q->where('price','<=',$max_price);
				})
				->when($make, function($q) use($make) {
					$q->where('make', $make);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->when($type, function($q) use($type) {
					$q->where('train_type', $type);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($fuel_type, function($q) use($fuel_type) {
					$q->where('fuel_type', $fuel_type);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->when($sleep_bed, function($q) use($sleep_bed) {
					$q->where('sleep_bed', $sleep_bed);
				})
				->when($gear_box, function($q) use($gear_box) {
					$q->where('gear_box', $gear_box);
				})
				->when($layout, function($q) use($layout) {
					$q->where('layout', $layout);
				})
				->with('coverImage')
				->paginate(12);
			}elseif ($request->form_type == 'semi-trailer-trucks') {
				$min_price = (int)$request->min_price;
				$max_price = (int)$request->max_price;
				$make = $request->make_trailer_trucks;
				$model = $request->model_trailer_trucks;
				$new_used = $request->new_used_trailer_trucks;
				$color = $request->color_trailer_trucks;
				$str_wheel = $request->str_wheel_trailer_trucks;
				$sleep_bed = $request->sleep_bed_trailer_trucks;
				$gear_box = $request->gear_box_trailer_trucks;
				$layout = $request->layout_trailer_trucks;
				$data['cars'] = Advertisement::where('cat','cars')->where('form_type',$form_type)
				->when($min_price && $max_price, function($q) use($min_price, $max_price) {
					$q->whereBetween('price', [$min_price,$max_price]);
				})
				->when($min_price && $max_price == 0, function($q) use($min_price) {
					$q->where('price','>=',$min_price);
				})
				->when($max_price && $min_price == 0, function($q) use($max_price) {
					$q->where('price','<=',$max_price);
				})
				->when($make, function($q) use($make) {
					$q->where('make', $make);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($str_wheel, function($q) use($str_wheel) {
					$q->where('str_wheel', $str_wheel);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->when($sleep_bed, function($q) use($sleep_bed) {
					$q->where('sleep_bed', $sleep_bed);
				})
				->when($gear_box, function($q) use($gear_box) {
					$q->where('gear_box', $gear_box);
				})
				->when($layout, function($q) use($layout) {
					$q->where('layout', $layout);
				})
				->with('coverImage')
				->paginate(12);
			}elseif ($request->form_type == 'trucks') {
				$min_price = (int)$request->min_price;
				$max_price = (int)$request->max_price;
				$type = $request->type_trucks;
				$make = $request->make_trucks;
				$model = $request->model_trucks;
				$new_used = $request->new_used_trucks;
				$fuel_type = $request->fuel_type_trucks;
				$color = $request->color_trucks;
				$str_wheel = $request->str_wheel_trucks;
				$sleep_bed = $request->sleep_bed_trucks;
				$gear_box = $request->gear_box_trucks;
				$layout = $request->layout_trucks;
				$data['cars'] = Advertisement::where('cat','cars')->where('form_type',$form_type)
				->when($min_price && $max_price, function($q) use($min_price, $max_price) {
					$q->whereBetween('price', [$min_price,$max_price]);
				})
				->when($min_price && $max_price == 0, function($q) use($min_price) {
					$q->where('price','>=',$min_price);
				})
				->when($max_price && $min_price == 0, function($q) use($max_price) {
					$q->where('price','<=',$max_price);
				})
				->when($type, function($q) use($type) {
					$q->where('truck_type', $type);
				})
				->when($make, function($q) use($make) {
					$q->where('make', $make);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($fuel_type, function($q) use($fuel_type) {
					$q->where('fuel_type', $fuel_type);
				})
				->when($str_wheel, function($q) use($str_wheel) {
					$q->where('str_wheel', $str_wheel);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->when($sleep_bed, function($q) use($sleep_bed) {
					$q->where('sleep_bed', $sleep_bed);
				})
				->when($gear_box, function($q) use($gear_box) {
					$q->where('gear_box', $gear_box);
				})
				->when($layout, function($q) use($layout) {
					$q->where('layout', $layout);
				})
				->with('coverImage')
				->paginate(12);
			}elseif ($request->form_type == 'motorcycles') {
				$min_price = (int)$request->min_price;
				$max_price = (int)$request->max_price;
				$type = $request->type_motorcycles;
				$make = $request->make_motorcycles;
				$new_used = $request->new_used_motorcycles;
				$fuel_type = $request->fuel_type_motorcycles;
				$engine_type = $request->engine_type_motorcycles;
				$color = $request->color_motorcycles;
				$cooling_type = $request->cooling_type_motorcycles;
				$data['cars'] = Advertisement::where('cat','cars')->where('form_type',$form_type)
				->when($min_price && $max_price, function($q) use($min_price, $max_price) {
					$q->whereBetween('price', [$min_price,$max_price]);
				})
				->when($min_price && $max_price == 0, function($q) use($min_price) {
					$q->where('price','>=',$min_price);
				})
				->when($max_price && $min_price == 0, function($q) use($max_price) {
					$q->where('price','<=',$max_price);
				})
				->when($type, function($q) use($type) {
					$q->where('motorcycle_type', $type);
				})
				->when($make, function($q) use($make) {
					$q->where('make', $make);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($fuel_type, function($q) use($fuel_type) {
					$q->where('fuel_type', $fuel_type);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->when($engine_type, function($q) use($engine_type) {
					$q->where('engine_type', $engine_type);
				})
				->when($cooling_type, function($q) use($cooling_type) {
					$q->where('cooling_type', $cooling_type);
				})
				->with('coverImage')
				->paginate(12);
			}elseif ($request->form_type == 'trailers-and-semitrailers') {
				$min_price = (int)$request->min_price;
				$max_price = (int)$request->max_price;
				$trailer = $request->trailer_semitrailers;
				$type = $request->type_semitrailers;
				$make = $request->make_semitrailers;
				$model = $request->model_semitrailers;
				$new_used = $request->new_used_semitrailers;
				$alx_make = $request->alx_make_semitrailers;
				$semi_axl_num = $request->semi_axl_num_semitrailers;
				$color = $request->color_semitrailers;
				$data['cars'] = Advertisement::where('cat','cars')->where('form_type',$form_type)
				->when($min_price && $max_price, function($q) use($min_price, $max_price) {
					$q->whereBetween('price', [$min_price,$max_price]);
				})
				->when($min_price && $max_price == 0, function($q) use($min_price) {
					$q->where('price','>=',$min_price);
				})
				->when($max_price && $min_price == 0, function($q) use($max_price) {
					$q->where('price','<=',$max_price);
				})
				->when($trailer, function($q) use($trailer) {
					$q->where('trailer', $trailer);
				})
				->when($type, function($q) use($type) {
					$q->where('trailer_type', $type);
				})
				->when($make, function($q) use($make) {
					$q->where('make', $make);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($alx_make, function($q) use($alx_make) {
					$q->where('alx_make', $alx_make);
				})
				->when($semi_axl_num, function($q) use($semi_axl_num) {
					$q->where('semi_axl_num', $semi_axl_num);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->with('coverImage')
				->paginate(12);
			}elseif ($request->form_type == 'buses') {
				$min_price = (int)$request->min_price;
				$max_price = (int)$request->max_price;
				$type = $request->type_bus;
				$make = $request->make_bus;
				$model = $request->model_bus;
				$seat_num = $request->seat_num_bus;
				$new_used = $request->new_used_bus;
				$fuel_type = $request->fuel_type_bus;
				$str_wheel = $request->str_wheel_bus;
				$gear_box = $request->gear_box_bus;
				$climate_contrl = $request->climate_contrl_bus;
				$color = $request->color_bus;
				$doors_number = $request->doors_number_bus;
				$data['cars'] = Advertisement::where('cat','cars')->where('form_type',$form_type)
				->when($min_price && $max_price, function($q) use($min_price, $max_price) {
					$q->whereBetween('price', [$min_price,$max_price]);
				})
				->when($min_price && $max_price == 0, function($q) use($min_price) {
					$q->where('price','>=',$min_price);
				})
				->when($max_price && $min_price == 0, function($q) use($max_price) {
					$q->where('price','<=',$max_price);
				})
				->when($type, function($q) use($type) {
					$q->where('bus_type', $type);
				})
				->when($make, function($q) use($make) {
					$q->where('make', $make);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->when($seat_num, function($q) use($seat_num) {
					$q->where('seat_num', $seat_num);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($fuel_type, function($q) use($fuel_type) {
					$q->where('fuel_type', $fuel_type);
				})
				->when($str_wheel, function($q) use($str_wheel) {
					$q->where('str_wheel', $str_wheel);
				})
				->when($gear_box, function($q) use($gear_box) {
					$q->where('gear_box', $gear_box);
				})
				->when($climate_contrl, function($q) use($climate_contrl) {
					$q->where('climate_contrl', $climate_contrl);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->when($doors_number, function($q) use($doors_number) {
					$q->where('doors_number', $doors_number);
				})
				->with('coverImage')
				->paginate(12);
			}elseif ($request->form_type == 'recreational-vehicles-campers') {
				$min_price = (int)$request->min_price;
				$max_price = (int)$request->max_price;
				$type = $request->type_vehicles_campers;
				$make = $request->make_vehicles_campers;
				$model = $request->model_vehicles_campers;
				$new_used = $request->new_used_vehicles_campers;
				$bed_num = $request->bed_num_vehicles_campers;
				$seat_num = $request->seat_num_vehicles_campers;
				$fuel_type = $request->fuel_type_vehicles_campers;
				$str_wheel = $request->str_wheel_vehicles_campers;
				$gear_box = $request->gear_box_vehicles_campers;
				$climate_contrl = $request->climate_contrl_vehicles_campers;
				$drivel_wheel = $request->drivel_wheel_vehicles_campers;
				$color = $request->color_vehicles_campers;
				$data['cars'] = Advertisement::where('cat','cars')->where('form_type',$form_type)
				->when($min_price && $max_price, function($q) use($min_price, $max_price) {
					$q->whereBetween('price', [$min_price,$max_price]);
				})
				->when($min_price && $max_price == 0, function($q) use($min_price) {
					$q->where('price','>=',$min_price);
				})
				->when($max_price && $min_price == 0, function($q) use($max_price) {
					$q->where('price','<=',$max_price);
				})
				->when($type, function($q) use($type) {
					$q->where('campare_type', $type);
				})
				->when($make, function($q) use($make) {
					$q->where('make', $make);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->when($bed_num, function($q) use($bed_num) {
					$q->where('bed_num', $bed_num);
				})
				->when($seat_num, function($q) use($seat_num) {
					$q->where('seat_num', $seat_num);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($fuel_type, function($q) use($fuel_type) {
					$q->where('fuel_type', $fuel_type);
				})
				->when($str_wheel, function($q) use($str_wheel) {
					$q->where('str_wheel', $str_wheel);
				})
				->when($gear_box, function($q) use($gear_box) {
					$q->where('gear_box', $gear_box);
				})
				->when($climate_contrl, function($q) use($climate_contrl) {
					$q->where('climate_contrl', $climate_contrl);
				})
				->when($drivel_wheel, function($q) use($drivel_wheel) {
					$q->where('drivel_wheel', $drivel_wheel);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->with('coverImage')
				->paginate(12);
			}elseif ($request->form_type == 'minibus') {
				$min_price = (int)$request->min_price;
				$max_price = (int)$request->max_price;
				$type = $request->type_minibus;
				$make = $request->make_minibus;
				$new_used = $request->new_used_minibus;
				$fuel_type = $request->fuel_type_minibus;
				$str_wheel = $request->str_wheel_minibus;
				$gear_box = $request->gear_box_minibus;
				$climate_contrl = $request->climate_contrl_minibus;
				$drivel_wheel = $request->drivel_wheel_minibus;
				$color = $request->color_minibus;
				$data['cars'] = Advertisement::where('cat','cars')->where('form_type',$form_type)
				->when($min_price && $max_price, function($q) use($min_price, $max_price) {
					$q->whereBetween('price', [$min_price,$max_price]);
				})
				->when($min_price && $max_price == 0, function($q) use($min_price) {
					$q->where('price','>=',$min_price);
				})
				->when($max_price && $min_price == 0, function($q) use($max_price) {
					$q->where('price','<=',$max_price);
				})
				->when($type, function($q) use($type) {
					$q->where('minivan_type', $type);
				})
				->when($make, function($q) use($make) {
					$q->where('make', $make);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($fuel_type, function($q) use($fuel_type) {
					$q->where('fuel_type', $fuel_type);
				})
				->when($str_wheel, function($q) use($str_wheel) {
					$q->where('str_wheel', $str_wheel);
				})
				->when($gear_box, function($q) use($gear_box) {
					$q->where('gear_box', $gear_box);
				})
				->when($climate_contrl, function($q) use($climate_contrl) {
					$q->where('climate_contrl', $climate_contrl);
				})
				->when($drivel_wheel, function($q) use($drivel_wheel) {
					$q->where('drivel_wheel', $drivel_wheel);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->with('coverImage')
				->paginate(12);
			}elseif ($request->form_type == 'passenger-vans') {
				$min_price = (int)$request->min_price;
				$max_price = (int)$request->max_price;
				$make = $request->make_passenger_vans;
				$new_used = $request->new_used_passenger_vans;
				$body_type = $request->body_type_passenger_vans;
				$fuel_type = $request->fuel_type_passenger_vans;
				$gear_box = $request->gear_box_passenger_vans;
				$doors_number = $request->doors_number_passenger_vans;
				$color = $request->color_passenger_vans;
				$data['cars'] = Advertisement::where('cat','cars')->where('form_type',$form_type)
				->when($min_price && $max_price, function($q) use($min_price, $max_price) {
					$q->whereBetween('price', [$min_price,$max_price]);
				})
				->when($min_price && $max_price == 0, function($q) use($min_price) {
					$q->where('price','>=',$min_price);
				})
				->when($max_price && $min_price == 0, function($q) use($max_price) {
					$q->where('price','<=',$max_price);
				})
				->when($make, function($q) use($make) {
					$q->where('make', $make);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($body_type, function($q) use($body_type) {
					$q->where('body_type', $body_type);
				})
				->when($fuel_type, function($q) use($fuel_type) {
					$q->where('fuel_type', $fuel_type);
				})
				->when($gear_box, function($q) use($gear_box) {
					$q->where('gear_box', $gear_box);
				})
				->when($doors_number, function($q) use($doors_number) {
					$q->where('doors_number', $doors_number);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->with('coverImage')
				->paginate(12);
			}elseif ($request->form_type == 'boats-rafts') {
				$min_price = (int)$request->min_price;
				$max_price = (int)$request->max_price;
				$type = $request->type_boat_raft;
				$model = $request->model_boat_raft;
				$new_used = $request->new_used_boat_raft;
				$seat_num = $request->seat_num_boat_rafts;
				$fuel_type = $request->fuel_type_boat_raft;
				$color = $request->color_boat_raft;
				$data['cars'] = Advertisement::where('cat','cars')->where('form_type',$form_type)
				->when($min_price && $max_price, function($q) use($min_price, $max_price) {
					$q->whereBetween('price', [$min_price,$max_price]);
				})
				->when($min_price && $max_price == 0, function($q) use($min_price) {
					$q->where('price','>=',$min_price);
				})
				->when($max_price && $min_price == 0, function($q) use($max_price) {
					$q->where('price','<=',$max_price);
				})
				->when($type, function($q) use($type) {
					$q->where('boat_raft_type', $type);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($seat_num, function($q) use($seat_num) {
					$q->where('seat_num', $seat_num);
				})
				->when($fuel_type, function($q) use($fuel_type) {
					$q->where('fuel_type', $fuel_type);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->with('coverImage')
				->paginate(12);
			}elseif ($request->form_type == 'personal-watercraft') {
				$min_price = (int)$request->min_price;
				$max_price = (int)$request->max_price;
				$watercraft_manufacturer = $request->manufacturer_watercraft;
				$model = $request->model_watercraft;
				$new_used = $request->new_used_watercraft;
				$seat_num = $request->seat_num_watercraft;
				$fuel_type = $request->fuel_type_watercraft;
				$eng_type = $request->eng_type_watercraft;
				$color = $request->color_watercraft;
				$data['cars'] = Advertisement::where('cat','cars')->where('form_type',$form_type)
				->when($min_price && $max_price, function($q) use($min_price, $max_price) {
					$q->whereBetween('price', [$min_price,$max_price]);
				})
				->when($min_price && $max_price == 0, function($q) use($min_price) {
					$q->where('price','>=',$min_price);
				})
				->when($max_price && $min_price == 0, function($q) use($max_price) {
					$q->where('price','<=',$max_price);
				})
				->when($watercraft_manufacturer, function($q) use($watercraft_manufacturer) {
					$q->where('watercraft_manufacturer', $watercraft_manufacturer);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($seat_num, function($q) use($seat_num) {
					$q->where('seat_num', $seat_num);
				})
				->when($fuel_type, function($q) use($fuel_type) {
					$q->where('fuel_type', $fuel_type);
				})
				->when($eng_type, function($q) use($eng_type) {
					$q->where('eng_type', $eng_type);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->with('coverImage')
				->paginate(12);
			}elseif ($request->form_type == 'kayaks-canoes') {
				$min_price = (int)$request->min_price;
				$max_price = (int)$request->max_price;
				$kay_can = $request->kay_can;
				$type = $request->kay_can_type;
				$model = $request->model_kay_can;
				$new_used = $request->new_used_kay_can;
				$manufacturer = $request->manufacturer_kay_can;
				$seat_num = $request->seat_num_kay_can;
				$color = $request->color_kay_can;
				$data['cars'] = Advertisement::where('cat','cars')->where('form_type',$form_type)
				->when($min_price && $max_price, function($q) use($min_price, $max_price) {
					$q->whereBetween('price', [$min_price,$max_price]);
				})
				->when($min_price && $max_price == 0, function($q) use($min_price) {
					$q->where('price','>=',$min_price);
				})
				->when($max_price && $min_price == 0, function($q) use($max_price) {
					$q->where('price','<=',$max_price);
				})
				->when($kay_can, function($q) use($kay_can) {
					$q->where('kay_can', $kay_can);
				})
				->when($type, function($q) use($type) {
					$q->where('kay_can_type', $type);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($seat_num, function($q) use($seat_num) {
					$q->where('seat_num', $seat_num);
				})
				->when($manufacturer, function($q) use($manufacturer) {
					$q->where('manufacturer', $manufacturer);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->with('coverImage')
				->paginate(12);
			}elseif ($request->form_type == 'motorboats') {
				$min_price = (int)$request->min_price;
				$max_price = (int)$request->max_price;
				$boat_purpose = $request->boat_purpose;
				$type = $request->type_motorboats;
				$model = $request->model_motorboats;
				$new_used = $request->new_used;
				$manufacturer = $request->manufacturer_motorboats;
				$fuel_type = $request->fuel_type_motorboats;
				$eng_type = $request->eng_type_motorboats;
				$eng_num = $request->eng_num_motorboats;
				$color = $request->color_kay_can;
				$data['cars'] = Advertisement::where('cat','cars')->where('form_type',$form_type)
				->when($min_price && $max_price, function($q) use($min_price, $max_price) {
					$q->whereBetween('price', [$min_price,$max_price]);
				})
				->when($min_price && $max_price == 0, function($q) use($min_price) {
					$q->where('price','>=',$min_price);
				})
				->when($max_price && $min_price == 0, function($q) use($max_price) {
					$q->where('price','<=',$max_price);
				})
				->when($boat_purpose, function($q) use($boat_purpose) {
					$q->where('boat_purpose', $boat_purpose);
				})
				->when($type, function($q) use($type) {
					$q->where('motorboat_type', $type);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($manufacturer, function($q) use($manufacturer) {
					$q->where('manufacturer', $manufacturer);
				})
				->when($fuel_type, function($q) use($fuel_type) {
					$q->where('fuel_type', $fuel_type);
				})
				->when($eng_type, function($q) use($eng_type) {
					$q->where('eng_type', $eng_type);
				})
				->when($eng_num, function($q) use($eng_num) {
					$q->where('eng_num', $eng_num);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->with('coverImage')
				->paginate(12);
			}elseif ($request->form_type == 'motors-and-engines') {
				$min_price = (int)$request->min_price;
				$max_price = (int)$request->max_price;
				$new_used = $request->new_used_engines;
				$fuel_type = $request->fuel_type_engines;
				$eng_type = $request->eng_type_engines;
				$eng_make = $request->eng_make_engines;
				$eng_model = $request->eng_model_engines;
				$data['cars'] = Advertisement::where('cat','cars')->where('form_type',$form_type)
				->when($min_price && $max_price, function($q) use($min_price, $max_price) {
					$q->whereBetween('price', [$min_price,$max_price]);
				})
				->when($min_price && $max_price == 0, function($q) use($min_price) {
					$q->where('price','>=',$min_price);
				})
				->when($max_price && $min_price == 0, function($q) use($max_price) {
					$q->where('price','<=',$max_price);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($fuel_type, function($q) use($fuel_type) {
					$q->where('fuel_type', $fuel_type);
				})
				->when($eng_type, function($q) use($eng_type) {
					$q->where('eng_type', $eng_type);
				})
				->when($eng_make, function($q) use($eng_make) {
					$q->where('eng_make', $eng_make);
				})
				->when($eng_model, function($q) use($eng_model) {
					$q->where('eng_model', $eng_model);
				})
				->with('coverImage')
				->paginate(12);
			}elseif ($request->form_type == 'water-transport-other') {
				$min_price = (int)$request->min_price;
				$max_price = (int)$request->max_price;
				$product_name = $request->product_name;
				$manufacturer = $request->manufacturer_other;
				$model = $request->model_other;
				$new_used = $request->new_used_other;
				$fuel_type = $request->fuel_type_other;
				$seat_num = $request->seat_num_other;
				$color= $request->color_other;
				$data['cars'] = Advertisement::where('cat','cars')->where('form_type',$form_type)
				->when($min_price && $max_price, function($q) use($min_price, $max_price) {
					$q->whereBetween('price', [$min_price,$max_price]);
				})
				->when($min_price && $max_price == 0, function($q) use($min_price) {
					$q->where('price','>=',$min_price);
				})
				->when($max_price && $min_price == 0, function($q) use($max_price) {
					$q->where('price','<=',$max_price);
				})
				->when($product_name, function($q) use($product_name) {
					$q->where('product_name', $product_name);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->when($manufacturer, function($q) use($manufacturer) {
					$q->where('manufacturer', $manufacturer);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($fuel_type, function($q) use($fuel_type) {
					$q->where('fuel_type', $fuel_type);
				})
				->when($seat_num, function($q) use($seat_num) {
					$q->where('seat_num', $seat_num);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->with('coverImage')
				->paginate(12);
			}elseif ($request->form_type == 'sailboats') {
				$min_price = (int)$request->min_price;
				$max_price = (int)$request->max_price;
				$manufacturer = $request->manufacturer_sailboats;
				$model = $request->model_sailboats;
				$new_used = $request->new_used_sailboats;
				$type = $request->sailboat_type;
				$fuel_type = $request->fuel_type_sailboats;
				$eng_type = $request->eng_type_sailboats;
				$eng_num = $request->eng_num_sailboats;
				$rig_type = $request->rig_type_sailboats;
				$str_wheel = $request->str_wheel_sailboats;
				$color= $request->color_sailboats;
				$data['cars'] = Advertisement::where('cat','cars')->where('form_type',$form_type)
				->when($min_price && $max_price, function($q) use($min_price, $max_price) {
					$q->whereBetween('price', [$min_price,$max_price]);
				})
				->when($min_price && $max_price == 0, function($q) use($min_price) {
					$q->where('price','>=',$min_price);
				})
				->when($max_price && $min_price == 0, function($q) use($max_price) {
					$q->where('price','<=',$max_price);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->when($manufacturer, function($q) use($manufacturer) {
					$q->where('manufacturer', $manufacturer);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($type, function($q) use($type) {
					$q->where('sailboat_type', $type);
				})
				->when($fuel_type, function($q) use($fuel_type) {
					$q->where('fuel_type', $fuel_type);
				})
				->when($eng_type, function($q) use($eng_type) {
					$q->where('eng_type', $eng_type);
				})
				->when($rig_type, function($q) use($rig_type) {
					$q->where('rig_type', $rig_type);
				})
				->when($eng_num, function($q) use($eng_num) {
					$q->where('eng_num', $eng_num);
				})
				->when($str_wheel, function($q) use($str_wheel) {
					$q->where('str_wheel', $str_wheel);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->with('coverImage')
				->paginate(12);
			}elseif ($request->form_type == 'water-bikes') {
				$min_price = (int)$request->min_price;
				$max_price = (int)$request->max_price;
				$manufacturer = $request->manufacturer_water_bikes;
				$model = $request->model_water_bikes;
				$new_used = $request->new_used_water_bikes;
				$seat_num = $request->seat_num_water_bikes;
				$color= $request->color_water_bikes;
				$data['cars'] = Advertisement::where('cat','cars')->where('form_type',$form_type)
				->when($min_price && $max_price, function($q) use($min_price, $max_price) {
					$q->whereBetween('price', [$min_price,$max_price]);
				})
				->when($min_price && $max_price == 0, function($q) use($min_price) {
					$q->where('price','>=',$min_price);
				})
				->when($max_price && $min_price == 0, function($q) use($max_price) {
					$q->where('price','<=',$max_price);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->when($manufacturer, function($q) use($manufacturer) {
					$q->where('manufacturer', $manufacturer);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($seat_num, function($q) use($seat_num) {
					$q->where('seat_num', $seat_num);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->with('coverImage')
				->paginate(12);
			}
		}else{
			$min_price = (int)$request->min_price;
			$max_price = (int)$request->max_price;
			$data['cars'] = Advertisement::where('cat','cars')
			->when($min_price && $max_price, function($q) use($min_price, $max_price) {
				$q->whereBetween('price', [$min_price,$max_price]);
			})
			->when($min_price && $max_price == 0, function($q) use($min_price) {
				$q->where('price','>=',$min_price);
			})
			->when($max_price && $min_price == 0, function($q) use($max_price) {
				$q->where('price','<=',$max_price);
			})
			->with('coverImage')
			->paginate(12);	
		}
		$view = view('frontend.category.car.car-listing-section',$data)->render();
		return json_encode($view);
	}

	// function activeMenuData(Request $request){
	// 	if ($request->form_type) {
	// 		if ($request->form_type == 'used-cars') {
	// 			$data['cars'] = Advertisement::with('userInfo')->get();
	// 		}elseif ($request->form_type == 'motorcycles') {
	// 			$data['cars'] = Advertisement::with('userInfo')->get();
	// 		}elseif ($request->form_type == 'trailers-and-semitrailers') {
	// 			$data['cars'] = Advertisement::with('userInfo')->get();
	// 		}elseif($request->form_type == 'agricultural-implements'){
	// 			$data['cars'] = Advertisement::with('userInfo')->get();
	// 		}elseif ($request->form_type == 'agricultural-machinery') {
	// 			$data['cars'] = Advertisement::with('userInfo')->get();
	// 		}elseif ($request->form_type == 'forest-machinery') {
	// 			$data['cars'] = Advertisement::with('userInfo')->get();
	// 		}elseif ($request->form_type == 'construction-and-road-construction-equipment') {
	// 			$data['cars'] = Advertisement::with('userInfo')->get();
	// 		}elseif ($request->form_type == 'construction-machinery-accessories') {
	// 			$data['cars'] = Advertisement::with('userInfo')->get();
	// 		}elseif ($request->form_type == 'municipal-machinery') {
	// 			$data['cars'] = Advertisement::with('userInfo')->get();
	// 		}elseif ($request->form_type == 'storage-and-loading-equipment') {
	// 			$data['cars'] = Advertisement::with('userInfo')->get();
	// 		}elseif ($request->form_type == 'minivans-minibus') {
	// 			$data['cars'] = Advertisement::with('userInfo')->get();
	// 		}elseif ($request->form_type == 'autotrains') {
	// 			$data['cars'] = Advertisement::with('userInfo')->get();
	// 		}elseif ($request->form_type == 'semi-trailer-trucks') {
	// 			$data['cars'] = Advertisement::with('userInfo')->get();
	// 		}elseif ($request->form_type == 'trucks') {
	// 			$data['cars'] = Advertisement::with('userInfo')->get();
	// 		}elseif ($request->form_type == 'buses') {
	// 			$data['cars'] = Advertisement::with('userInfo')->get();
	// 		}elseif ($request->form_type == 'recreational-vehicles-campers') {
	// 			$data['cars'] = Advertisement::with('userInfo')->get();
	// 		}elseif ($request->form_type == 'minibus') {
	// 			$data['cars'] = Advertisement::with('userInfo')->get();
	// 		}elseif ($request->form_type == 'passenger-vans') {
	// 			$data['cars'] = Advertisement::with('userInfo')->get();
	// 		}elseif ($request->form_type == 'boats-rafts') {
	// 			$data['cars'] = Advertisement::with('userInfo')->get();
	// 		}elseif ($request->form_type == 'personal-watercraft') {
	// 			$data['cars'] = Advertisement::with('userInfo')->get();
	// 		}elseif ($request->form_type == 'kayaks-canoes') {
	// 			$data['cars'] = Advertisement::with('userInfo')->get();
	// 		}elseif ($request->form_type == 'motorboats') {
	// 			$data['cars'] = Advertisement::with('userInfo')->get();
	// 		}elseif ($request->form_type == 'motors-and-engines') {
	// 			$data['cars'] = Advertisement::with('userInfo')->get();
	// 		}elseif ($request->form_type == 'water-transport-other') {
	// 			$data['cars'] = Advertisement::with('userInfo')->get();
	// 		}elseif ($request->form_type == 'sailboats') {
	// 			$data['cars'] = Advertisement::with('userInfo')->get();
	// 		}elseif ($request->form_type == 'water-bikes') {
	// 			$data['cars'] = Advertisement::with('userInfo')->get();
	// 		}
	// 		$data['form_type'] = $request->form_type;
	// 	}else{	
	// 		$data['cars'] = Advertisement::with('userInfo')->get();		
	// 	}
	// 	$html = '';
	// 	if($data['cars']->count() == 0){
	// 		$html .='<h1>No Match Found!</h1>';
	// 	}else{
	// 		foreach ($data['cars'] as $car) {
	// 			if ($car->car_form) {
	// 				$form_type = $car->car_form;
	// 				$post_id = $car->post_id;
	// 			}else{
	// 				$form_type  = $data['form_type'];
	// 				$post_id = $car->_id;
	// 			}
	// 			$html.='<div class="m-side-list mar-b-15 ">';
	// 			$img = json_decode($car->image);
	// 			$html.='<div class="m-side-img">
	// 			<a href="'.url('view-car-details', ['post_id' => $post_id, 'cat' => $form_type]).'">
	// 			<img class="cover" src="'.('carAdimages/'.$car->basic_img) .'" alt="product"/>
	// 			</a>
	// 			</div>
	// 			<div class="m-side-cnt">
	// 			<span class="fav" onclick="addToFavourite(\'cars\',\''.$post_id.'\',\''.$form_type.'\')"><i class="far fa-heart"></i></span>
	// 			<a href="'.url('view-car-details', ['post_id' => $post_id, 'cat' => $form_type]).'">';
	// 			if($car->car_form){
	// 				$html.='<div class="house-name">'.str_replace("-"," ",ucfirst($car->car_form)).'</div>';
	// 			}elseif($form_type){
	// 				$html.='<div class="house-name">'.str_replace("-"," ",ucfirst($form_type)).'</div>';
	// 			}
	// 			$html.='<div class="house-price-len"><span class="h-price">'.$car->price.'&#128;</span></div>
	// 			<div class="house-price-len">
	// 			<span class=""><i class="far fa-clock"></i>'.$car->created_at->diffForHumans().'</span>
	// 			</div>
	// 			</a>
	// 			</div>
	// 			</div>';
	// 		}
	// 	}
	// 	return $html;
	// }
	// cars search area
	public function searchCar(Request $request){
		$form_type = $request->form_type;
		$price = $request->price;
		if ($request->form_type) {
			$totalRe = count(array_filter($request->all()));
			if($request->form_type == 'agricultural-implements'){
				$price = (int)$request->price_ag_eq;
				$type = $request->type_ag_eq;
				$new_used = $request->new_used_ag_eq;
				$make = $request->make_ag_eq;
				$model = $request->model_ag_eq;
				$data['cars'] = Advertisement::where('cat','cars')
				->when($price, function($q) use($price) {
					$q->where('price','>=', $price);
				})
				->when($type, function($q) use($type) {
					$q->where('agri_imp_type', $type);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($make, function($q) use($make) {
					$q->where('make', $make);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->with('userInfo')
				->paginate(12);
				
			}elseif ($request->form_type == 'agricultural-machinery') {
				$price = (int)$request->price_ag_mac;
				$type = $request->type_ag_mac;
				$new_used = $request->new_used_ag_mac;
				$make = $request->make_ag_mac;
				$model = $request->model_ag_mac;
				$data['cars'] = Advertisement::where('cat','cars')
				->when($price, function($q) use($price) {
					$q->where('price','>=', $price);
				})
				->when($type, function($q) use($type) {
					$q->where('agri_mach_type', $type);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($make, function($q) use($make) {
					$q->where('make', $make);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->with('userInfo')
				->paginate(12);
			}elseif ($request->form_type == 'forest-machinery') {
				$price = (int)$request->price_frs_mac;
				$type = $request->type_frs_mac;
				$new_used = $request->new_used_frs_mac;
				$make = $request->make_frs_mac;
				$model = $request->model_frs_mac;
				$data['cars'] = Advertisement::where('cat','cars')
				->when($price, function($q) use($price) {
					$q->where('price','>=', $price);
				})
				->when($type, function($q) use($type) {
					$q->where('forest_mach_type', $type);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($make, function($q) use($make) {
					$q->where('make', $make);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->with('userInfo')
				->paginate(12);
			}elseif ($request->form_type == 'used-cars') {
				$price = (int)$request->price_cars;
				$make = $request->make_cars;
				$new_used = $request->new_used_cars;
				$body_type = $request->body_type_cars;
				$fuel_type  = $request->fuel_type_cars;
				$gear_box = $request->gear_box_cars;
				$doors_number = $request->doors_number_cars;
				$color = $request->color_cars;
				
				$data['cars'] = Advertisement::where('cat','cars')
				->when($price, function($q) use($price) {
					$q->where('price','>=', $price);
				})
				->when($make, function($q) use($make) {
					$q->where('make', $make);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($body_type, function($q) use($body_type) {
					$q->where('body_type', $body_type);
				})
				->when($fuel_type, function($q) use($fuel_type) {
					$q->where('fuel_type', $fuel_type);
				})
				->when($gear_box, function($q) use($gear_box) {
					$q->where('gear_box', $gear_box);
				})
				->when($doors_number, function($q) use($doors_number) {
					$q->where('doors_number', $doors_number);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->with('userInfo')
				->paginate(12);
			}elseif ($request->form_type == 'construction-and-road-construction-equipment') {
				$price = (int)$request->price_const_mach;
				$type = $request->type_const_mach;
				$make = $request->make_const_mach;
				$model = $request->model_const_mach;
				$data['cars'] = Advertisement::where('cat','cars')
				->when($price, function($q) use($price) {
					$q->where('price','>=', $price);
				})
				->when($type, function($q) use($type) {
					$q->where('forest_mach_type', $type);
				})
				->when($make, function($q) use($make) {
					$q->where('make', $make);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->with('userInfo')
				->paginate(12);
			}elseif ($request->form_type == 'construction-machinery-accessories') {
				$price = (int)$request->price_cars;
				$make = $request->make_cars;
				$model = $request->model_cars;
				$new_used = $request->new_used;
				$body_type = $request->body_type_cars;
				$fuel_type  = $request->fuel_type_cars;
				$gear_box = $request->gear_box_cars;
				$data['cars'] = Advertisement::where('cat','cars')
				->when($price, function($q) use($price) {
					$q->where('price','>=', $price);
				})
				->when($make, function($q) use($make) {
					$q->where('make', $make);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($body_type, function($q) use($body_type) {
					$q->where('body_type', $body_type);
				})
				->when($fuel_type, function($q) use($fuel_type) {
					$q->where('fuel_type', $fuel_type);
				})
				->when($gear_box, function($q) use($gear_box) {
					$q->where('gear_box', $gear_box);
				})
				->with('userInfo')
				->paginate(12);
			}elseif ($request->form_type == 'municipal-machinery') {
				$price = (int)$request->price_muni_mach;
				$make = $request->make_muni_mach;
				$type = $request->type_muni_mach;
				$new_used = $request->new_used_muni_mach;
				$fuel_type  = $request->fuel_type_muni_mach;
				$gear_box = $request->gear_box_muni_mach;
				$str_wheel = $request->str_wheel_muni_mach;
				$color = $request->color_muni_mach;
				$data['cars'] = Advertisement::where('cat','cars')
				->when($price, function($q) use($price) {
					$q->where('price','>=', $price);
				})
				->when($make, function($q) use($make) {
					$q->where('make', $make);
				})
				->when($type, function($q) use($type) {
					$q->where('muni_mach_type', $type);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($fuel_type, function($q) use($fuel_type) {
					$q->where('fuel_type', $fuel_type);
				})
				->when($gear_box, function($q) use($gear_box) {
					$q->where('gear_box', $gear_box);
				})
				->when($str_wheel, function($q) use($str_wheel) {
					$q->where('str_wheel', $str_wheel);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->with('userInfo')
				->paginate(12);
			}elseif ($request->form_type == 'storage-and-loading-equipment') {
				$price = (int)$request->price_storage;
				$make = $request->make_storage;
				$model = $request->model_storage;
				$type = $request->type_storage;
				$new_used = $request->new_used_storage;
				$fuel_type  = $request->fuel_type_storage;
				$boom_type = $request->boom_type_storage;
				$color = $request->color_storage;
				$data['cars'] = Advertisement::where('cat','cars')
				->when($price, function($q) use($price) {
					$q->where('price','>=', $price);
				})
				->when($make, function($q) use($make) {
					$q->where('make', $make);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->when($type, function($q) use($type) {
					$q->where('storage_type', $type);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($fuel_type, function($q) use($fuel_type) {
					$q->where('fuel_type', $fuel_type);
				})
				->when($boom_type, function($q) use($boom_type) {
					$q->where('boom_type', $boom_type);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->with('userInfo')
				->paginate(12);
			}elseif ($request->form_type == 'minivans-minibus') {
				$price = (int)$request->price_minivan;
				$type = $request->type_minivan;
				$make = $request->make_minivan;
				$new_used = $request->new_used_minivan;
				$fuel_type  = $request->fuel_type_minivan;
				$color = $request->color_minivan;
				$str_wheel = $request->str_wheel_minivan;
				$drivel_wheel = $request->drivel_wheel_minivan;
				$gear_box = $request->gear_box_minivan;
				$climate_contrl = $request->climate_contrl_minivan;
				$data['cars'] = Advertisement::where('cat','cars')
				->when($price, function($q) use($price) {
					$q->where('price','>=', $price);
				})
				->when($make, function($q) use($make) {
					$q->where('make', $make);
				})
				->when($type, function($q) use($type) {
					$q->where('type_minivan', $type);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($fuel_type, function($q) use($fuel_type) {
					$q->where('fuel_type', $fuel_type);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->when($str_wheel, function($q) use($str_wheel) {
					$q->where('str_wheel', $str_wheel);
				})
				->when($drivel_wheel, function($q) use($drivel_wheel) {
					$q->where('drivel_wheel', $drivel_wheel);
				})
				->when($gear_box, function($q) use($gear_box) {
					$q->where('gear_box', $gear_box);
				})
				->when($climate_contrl, function($q) use($climate_contrl) {
					$q->where('climate_contrl', $climate_contrl);
				})
				->with('userInfo')
				->paginate(12);
			}elseif ($request->form_type == 'autotrains') {
				$price = (int)$request->price_autotrains;
				$type = $request->type_autotrains;
				$make = $request->make_autotrains;
				$model = $request->model_autotrains;
				$new_used = $request->new_used_autotrains;
				$fuel_type  = $request->fuel_type_autotrains;
				$color = $request->color_autotrains;
				$str_wheel = $request->str_wheel_autotrains;
				$sleep_bed = $request->sleep_bed_autotrains;
				$gear_box = $request->gear_box_autotrains;
				$layout = $request->layout_autotrains;
				$data['cars'] = Advertisement::where('cat','cars')
				->when($price, function($q) use($price) {
					$q->where('price','>=', $price);
				})
				->when($make, function($q) use($make) {
					$q->where('make', $make);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->when($type, function($q) use($type) {
					$q->where('train_type', $type);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($fuel_type, function($q) use($fuel_type) {
					$q->where('fuel_type', $fuel_type);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->when($sleep_bed, function($q) use($sleep_bed) {
					$q->where('sleep_bed', $sleep_bed);
				})
				->when($gear_box, function($q) use($gear_box) {
					$q->where('gear_box', $gear_box);
				})
				->when($layout, function($q) use($layout) {
					$q->where('layout', $layout);
				})
				->with('userInfo')
				->paginate(12);
			}elseif ($request->form_type == 'semi-trailer-trucks') {
				$price = (int)$request->price_trailer_trucks;
				$make = $request->make_trailer_trucks;
				$model = $request->model_trailer_trucks;
				$new_used = $request->new_used_trailer_trucks;
				$color = $request->color_trailer_trucks;
				$str_wheel = $request->str_wheel_trailer_trucks;
				$sleep_bed = $request->sleep_bed_trailer_trucks;
				$gear_box = $request->gear_box_trailer_trucks;
				$layout = $request->layout_trailer_trucks;
				$data['cars'] = Advertisement::where('cat','cars')
				->when($price, function($q) use($price) {
					$q->where('price','>=', $price);
				})
				->when($make, function($q) use($make) {
					$q->where('make', $make);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($str_wheel, function($q) use($str_wheel) {
					$q->where('str_wheel', $str_wheel);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->when($sleep_bed, function($q) use($sleep_bed) {
					$q->where('sleep_bed', $sleep_bed);
				})
				->when($gear_box, function($q) use($gear_box) {
					$q->where('gear_box', $gear_box);
				})
				->when($layout, function($q) use($layout) {
					$q->where('layout', $layout);
				})
				->with('userInfo')
				->paginate(12);
			}elseif ($request->form_type == 'trucks') {
				$price = (int)$request->price_trucks;
				$type = $request->type_trucks;
				$make = $request->make_trucks;
				$model = $request->model_trucks;
				$new_used = $request->new_used_trucks;
				$fuel_type = $request->fuel_type_trucks;
				$color = $request->color_trucks;
				$str_wheel = $request->str_wheel_trucks;
				$sleep_bed = $request->sleep_bed_trucks;
				$gear_box = $request->gear_box_trucks;
				$layout = $request->layout_trucks;
				$data['cars'] = Advertisement::where('cat','cars')
				->when($price, function($q) use($price) {
					$q->where('price','>=', $price);
				})
				->when($type, function($q) use($type) {
					$q->where('truck_type', $type);
				})
				->when($make, function($q) use($make) {
					$q->where('make', $make);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($fuel_type, function($q) use($fuel_type) {
					$q->where('fuel_type', $fuel_type);
				})
				->when($str_wheel, function($q) use($str_wheel) {
					$q->where('str_wheel', $str_wheel);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->when($sleep_bed, function($q) use($sleep_bed) {
					$q->where('sleep_bed', $sleep_bed);
				})
				->when($gear_box, function($q) use($gear_box) {
					$q->where('gear_box', $gear_box);
				})
				->when($layout, function($q) use($layout) {
					$q->where('layout', $layout);
				})
				->with('userInfo')
				->paginate(12);
			}elseif ($request->form_type == 'motorcycles') {
				$price = (int)$request->price_motorcycles;
				$type = $request->type_motorcycles;
				$make = $request->make_motorcycles;
				$new_used = $request->new_used_motorcycles;
				$fuel_type = $request->fuel_type_motorcycles;
				$engine_type = $request->engine_type_motorcycles;
				$color = $request->color_motorcycles;
				$cooling_type = $request->cooling_type_motorcycles;
				$data['cars'] = Advertisement::where('cat','cars')
				->when($price, function($q) use($price) {
					$q->where('price','>=', $price);
				})
				->when($type, function($q) use($type) {
					$q->where('motorcycle_type', $type);
				})
				->when($make, function($q) use($make) {
					$q->where('make', $make);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($fuel_type, function($q) use($fuel_type) {
					$q->where('fuel_type', $fuel_type);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->when($engine_type, function($q) use($engine_type) {
					$q->where('engine_type', $engine_type);
				})
				->when($cooling_type, function($q) use($cooling_type) {
					$q->where('cooling_type', $cooling_type);
				})
				->with('userInfo')
				->paginate(12);
			}elseif ($request->form_type == 'trailers-and-semitrailers') {
				$price = (int)$request->price_semitrailers;
				$trailer = $request->trailer_semitrailers;
				$type = $request->type_semitrailers;
				$make = $request->make_semitrailers;
				$model = $request->model_semitrailers;
				$new_used = $request->new_used_semitrailers;
				$alx_make = $request->alx_make_semitrailers;
				$semi_axl_num = $request->semi_axl_num_semitrailers;
				$color = $request->color_semitrailers;
				$data['cars'] = Advertisement::where('cat','cars')
				->when($price, function($q) use($price) {
					$q->where('price','>=', $price);
				})
				->when($trailer, function($q) use($trailer) {
					$q->where('trailer', $trailer);
				})
				->when($type, function($q) use($type) {
					$q->where('trailer_type', $type);
				})
				->when($make, function($q) use($make) {
					$q->where('make', $make);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($alx_make, function($q) use($alx_make) {
					$q->where('alx_make', $alx_make);
				})
				->when($semi_axl_num, function($q) use($semi_axl_num) {
					$q->where('semi_axl_num', $semi_axl_num);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->with('userInfo')
				->paginate(12);
			}elseif ($request->form_type == 'buses') {
				$price = (int)$request->price_bus;
				$type = $request->type_bus;
				$make = $request->make_bus;
				$model = $request->model_bus;
				$seat_num = $request->seat_num_bus;
				$new_used = $request->new_used_bus;
				$fuel_type = $request->fuel_type_bus;
				$str_wheel = $request->str_wheel_bus;
				$gear_box = $request->gear_box_bus;
				$climate_contrl = $request->climate_contrl_bus;
				$color = $request->color_bus;
				$doors_number = $request->doors_number_bus;
				$data['cars'] = Advertisement::where('cat','cars')
				->when($price, function($q) use($price) {
					$q->where('price','>=', $price);
				})
				->when($type, function($q) use($type) {
					$q->where('bus_type', $type);
				})
				->when($make, function($q) use($make) {
					$q->where('make', $make);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->when($seat_num, function($q) use($seat_num) {
					$q->where('seat_num', $seat_num);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($fuel_type, function($q) use($fuel_type) {
					$q->where('fuel_type', $fuel_type);
				})
				->when($str_wheel, function($q) use($str_wheel) {
					$q->where('str_wheel', $str_wheel);
				})
				->when($gear_box, function($q) use($gear_box) {
					$q->where('gear_box', $gear_box);
				})
				->when($climate_contrl, function($q) use($climate_contrl) {
					$q->where('climate_contrl', $climate_contrl);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->when($doors_number, function($q) use($doors_number) {
					$q->where('doors_number', $doors_number);
				})
				->with('userInfo')
				->paginate(12);
			}elseif ($request->form_type == 'recreational-vehicles-campers') {
				$price = (int)$request->price_vehicles_campers;
				$type = $request->type_vehicles_campers;
				$make = $request->make_vehicles_campers;
				$model = $request->model_vehicles_campers;
				$new_used = $request->new_used_vehicles_campers;
				$bed_num = $request->bed_num_vehicles_campers;
				$seat_num = $request->seat_num_vehicles_campers;
				$fuel_type = $request->fuel_type_vehicles_campers;
				$str_wheel = $request->str_wheel_vehicles_campers;
				$gear_box = $request->gear_box_vehicles_campers;
				$climate_contrl = $request->climate_contrl_vehicles_campers;
				$drivel_wheel = $request->drivel_wheel_vehicles_campers;
				$color = $request->color_vehicles_campers;
				$data['cars'] = Advertisement::where('cat','cars')
				->when($price, function($q) use($price) {
					$q->where('price','>=', $price);
				})
				->when($type, function($q) use($type) {
					$q->where('campare_type', $type);
				})
				->when($make, function($q) use($make) {
					$q->where('make', $make);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->when($bed_num, function($q) use($bed_num) {
					$q->where('bed_num', $bed_num);
				})
				->when($seat_num, function($q) use($seat_num) {
					$q->where('seat_num', $seat_num);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($fuel_type, function($q) use($fuel_type) {
					$q->where('fuel_type', $fuel_type);
				})
				->when($str_wheel, function($q) use($str_wheel) {
					$q->where('str_wheel', $str_wheel);
				})
				->when($gear_box, function($q) use($gear_box) {
					$q->where('gear_box', $gear_box);
				})
				->when($climate_contrl, function($q) use($climate_contrl) {
					$q->where('climate_contrl', $climate_contrl);
				})
				->when($drivel_wheel, function($q) use($drivel_wheel) {
					$q->where('drivel_wheel', $drivel_wheel);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->with('userInfo')
				->paginate(12);
			}elseif ($request->form_type == 'minibus') {
				$price = (int)$request->price_minibus;
				$type = $request->type_minibus;
				$make = $request->make_minibus;
				$new_used = $request->new_used_minibus;
				$fuel_type = $request->fuel_type_minibus;
				$str_wheel = $request->str_wheel_minibus;
				$gear_box = $request->gear_box_minibus;
				$climate_contrl = $request->climate_contrl_minibus;
				$drivel_wheel = $request->drivel_wheel_minibus;
				$color = $request->color_minibus;
				$data['cars'] = Advertisement::where('cat','cars')
				->when($price, function($q) use($price) {
					$q->where('price','>=', $price);
				})
				->when($type, function($q) use($type) {
					$q->where('minivan_type', $type);
				})
				->when($make, function($q) use($make) {
					$q->where('make', $make);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($fuel_type, function($q) use($fuel_type) {
					$q->where('fuel_type', $fuel_type);
				})
				->when($str_wheel, function($q) use($str_wheel) {
					$q->where('str_wheel', $str_wheel);
				})
				->when($gear_box, function($q) use($gear_box) {
					$q->where('gear_box', $gear_box);
				})
				->when($climate_contrl, function($q) use($climate_contrl) {
					$q->where('climate_contrl', $climate_contrl);
				})
				->when($drivel_wheel, function($q) use($drivel_wheel) {
					$q->where('drivel_wheel', $drivel_wheel);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->with('userInfo')
				->paginate(12);
			}elseif ($request->form_type == 'passenger-vans') {
				$price = (int)$request->price_passenger_vans;
				$make = $request->make_passenger_vans;
				$new_used = $request->new_used_passenger_vans;
				$body_type = $request->body_type_passenger_vans;
				$fuel_type = $request->fuel_type_passenger_vans;
				$gear_box = $request->gear_box_passenger_vans;
				$doors_number = $request->doors_number_passenger_vans;
				$color = $request->color_passenger_vans;
				$data['cars'] = Advertisement::where('cat','cars')
				->when($price, function($q) use($price) {
					$q->where('price','>=', $price);
				})
				->when($make, function($q) use($make) {
					$q->where('make', $make);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($body_type, function($q) use($body_type) {
					$q->where('body_type', $body_type);
				})
				->when($fuel_type, function($q) use($fuel_type) {
					$q->where('fuel_type', $fuel_type);
				})
				->when($gear_box, function($q) use($gear_box) {
					$q->where('gear_box', $gear_box);
				})
				->when($doors_number, function($q) use($doors_number) {
					$q->where('doors_number', $doors_number);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->with('userInfo')
				->paginate(12);
			}elseif ($request->form_type == 'boats-rafts') {
				$price = (int)$request->price_boat_raft;
				$type = $request->type_boat_raft;
				$model = $request->model_boat_raft;
				$new_used = $request->new_used_boat_raft;
				$seat_num = $request->seat_num_boat_rafts;
				$fuel_type = $request->fuel_type_boat_raft;
				$color = $request->color_boat_raft;
				$data['cars'] = Advertisement::where('cat','cars')
				->when($price, function($q) use($price) {
					$q->where('price','>=', $price);
				})
				->when($type, function($q) use($type) {
					$q->where('boat_raft_type', $type);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($seat_num, function($q) use($seat_num) {
					$q->where('seat_num', $seat_num);
				})
				->when($fuel_type, function($q) use($fuel_type) {
					$q->where('fuel_type', $fuel_type);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->with('userInfo')
				->paginate(12);
			}elseif ($request->form_type == 'personal-watercraft') {
				$price = (int)$request->price_watercraft;
				$watercraft_manufacturer = $request->manufacturer_watercraft;
				$model = $request->model_watercraft;
				$new_used = $request->new_used_watercraft;
				$seat_num = $request->seat_num_watercraft;
				$fuel_type = $request->fuel_type_watercraft;
				$eng_type = $request->eng_type_watercraft;
				$color = $request->color_watercraft;
				$data['cars'] = Advertisement::where('cat','cars')
				->when($price, function($q) use($price) {
					$q->where('price','>=', $price);
				})
				->when($watercraft_manufacturer, function($q) use($watercraft_manufacturer) {
					$q->where('watercraft_manufacturer', $watercraft_manufacturer);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($seat_num, function($q) use($seat_num) {
					$q->where('seat_num', $seat_num);
				})
				->when($fuel_type, function($q) use($fuel_type) {
					$q->where('fuel_type', $fuel_type);
				})
				->when($eng_type, function($q) use($eng_type) {
					$q->where('eng_type', $eng_type);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->with('userInfo')
				->paginate(12);
			}elseif ($request->form_type == 'kayaks-canoes') {
				$price = (int)$request->price_kay_can;
				$kay_can = $request->kay_can;
				$type = $request->kay_can_type;
				$model = $request->model_kay_can;
				$new_used = $request->new_used_kay_can;
				$manufacturer = $request->manufacturer_kay_can;
				$seat_num = $request->seat_num_kay_can;
				$color = $request->color_kay_can;
				$data['cars'] = Advertisement::where('cat','cars')
				->when($price, function($q) use($price) {
					$q->where('price','>=', $price);
				})
				->when($kay_can, function($q) use($kay_can) {
					$q->where('kay_can', $kay_can);
				})
				->when($type, function($q) use($type) {
					$q->where('kay_can_type', $type);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($seat_num, function($q) use($seat_num) {
					$q->where('seat_num', $seat_num);
				})
				->when($manufacturer, function($q) use($manufacturer) {
					$q->where('manufacturer', $manufacturer);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->with('userInfo')
				->paginate(12);
			}elseif ($request->form_type == 'motorboats') {
				$price = (int)$request->price_motorboats;
				$boat_purpose = $request->boat_purpose;
				$type = $request->type_motorboats;
				$model = $request->model_motorboats;
				$new_used = $request->new_used;
				$manufacturer = $request->manufacturer_motorboats;
				$fuel_type = $request->fuel_type_motorboats;
				$eng_type = $request->eng_type_motorboats;
				$eng_num = $request->eng_num_motorboats;
				$color = $request->color_kay_can;
				$data['cars'] = Advertisement::where('cat','cars')
				->when($price, function($q) use($price) {
					$q->where('price','>=', $price);
				})
				->when($boat_purpose, function($q) use($boat_purpose) {
					$q->where('boat_purpose', $boat_purpose);
				})
				->when($type, function($q) use($type) {
					$q->where('motorboat_type', $type);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($manufacturer, function($q) use($manufacturer) {
					$q->where('manufacturer', $manufacturer);
				})
				->when($fuel_type, function($q) use($fuel_type) {
					$q->where('fuel_type', $fuel_type);
				})
				->when($eng_type, function($q) use($eng_type) {
					$q->where('eng_type', $eng_type);
				})
				->when($eng_num, function($q) use($eng_num) {
					$q->where('eng_num', $eng_num);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->with('userInfo')
				->paginate(12);
			}elseif ($request->form_type == 'motors-and-engines') {
				$price = (int)$request->price_engines;
				$new_used = $request->new_used_engines;
				$fuel_type = $request->fuel_type_engines;
				$eng_type = $request->eng_type_engines;
				$eng_make = $request->eng_make_engines;
				$eng_model = $request->eng_model_engines;
				$data['cars'] = Advertisement::where('cat','cars')
				->when($price, function($q) use($price) {
					$q->where('price','>=', $price);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($fuel_type, function($q) use($fuel_type) {
					$q->where('fuel_type', $fuel_type);
				})
				->when($eng_type, function($q) use($eng_type) {
					$q->where('eng_type', $eng_type);
				})
				->when($eng_make, function($q) use($eng_make) {
					$q->where('eng_make', $eng_make);
				})
				->when($eng_model, function($q) use($eng_model) {
					$q->where('eng_model', $eng_model);
				})
				->with('userInfo')
				->paginate(12);
			}elseif ($request->form_type == 'water-transport-other') {
				$price = (int)$request->price_other;
				$product_name = $request->product_name;
				$manufacturer = $request->manufacturer_other;
				$model = $request->model_other;
				$new_used = $request->new_used_other;
				$fuel_type = $request->fuel_type_other;
				$seat_num = $request->seat_num_other;
				$color= $request->color_other;
				$data['cars'] = Advertisement::where('cat','cars')
				->when($price, function($q) use($price) {
					$q->where('price','>=', $price);
				})
				->when($product_name, function($q) use($product_name) {
					$q->where('product_name', $product_name);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->when($manufacturer, function($q) use($manufacturer) {
					$q->where('manufacturer', $manufacturer);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($fuel_type, function($q) use($fuel_type) {
					$q->where('fuel_type', $fuel_type);
				})
				->when($seat_num, function($q) use($seat_num) {
					$q->where('seat_num', $seat_num);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->with('userInfo')
				->paginate(12);
			}elseif ($request->form_type == 'sailboats') {
				$price = (int)$request->price_sailboats;
				$manufacturer = $request->manufacturer_sailboats;
				$model = $request->model_sailboats;
				$new_used = $request->new_used_sailboats;
				$type = $request->sailboat_type;
				$fuel_type = $request->fuel_type_sailboats;
				$eng_type = $request->eng_type_sailboats;
				$eng_num = $request->eng_num_sailboats;
				$rig_type = $request->rig_type_sailboats;
				$str_wheel = $request->str_wheel_sailboats;
				$color= $request->color_sailboats;
				$data['cars'] = Advertisement::where('cat','cars')
				->when($price, function($q) use($price) {
					$q->where('price','>=', $price);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->when($manufacturer, function($q) use($manufacturer) {
					$q->where('manufacturer', $manufacturer);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($type, function($q) use($type) {
					$q->where('sailboat_type', $type);
				})
				->when($fuel_type, function($q) use($fuel_type) {
					$q->where('fuel_type', $fuel_type);
				})
				->when($eng_type, function($q) use($eng_type) {
					$q->where('eng_type', $eng_type);
				})
				->when($rig_type, function($q) use($rig_type) {
					$q->where('rig_type', $rig_type);
				})
				->when($eng_num, function($q) use($eng_num) {
					$q->where('eng_num', $eng_num);
				})
				->when($str_wheel, function($q) use($str_wheel) {
					$q->where('str_wheel', $str_wheel);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->with('userInfo')
				->paginate(12);
			}elseif ($request->form_type == 'water-bikes') {
				$price = (int)$request->price_water_bikes;
				$manufacturer = $request->manufacturer_water_bikes;
				$model = $request->model_water_bikes;
				$new_used = $request->new_used_water_bikes;
				$seat_num = $request->seat_num_water_bikes;
				$color= $request->color_water_bikes;
				$data['cars'] = Advertisement::where('cat','cars')
				->when($price, function($q) use($price) {
					$q->where('price','>=', $price);
				})
				->when($model, function($q) use($model) {
					$q->where('model', $model);
				})
				->when($manufacturer, function($q) use($manufacturer) {
					$q->where('manufacturer', $manufacturer);
				})
				->when($new_used, function($q) use($new_used) {
					$q->where('new_used', $new_used);
				})
				->when($seat_num, function($q) use($seat_num) {
					$q->where('seat_num', $seat_num);
				})
				->when($color, function($q) use($color) {
					$q->where('color', $color);
				})
				->with('userInfo')
				->paginate(12);
			}
		}else{
			$data['cars'] = Advertisement::where('cat','cars')
			->when($price, function($q) use($price) {
				$q->where('price','>=', $price);
			})
			->orderBy('_id','desc')
			->with('coverImage')
			->paginate(12);
		}


		$data['category'] = MainCategory::where('cat_key', 'cars')->first();
		$data['sub_cats'] = SubCategory::where('main_cat_id',$data['category']->_id)
		->orderBy('category_name', 'asc')
		->get();
		$data['inner_categories'] = InnerCategory::orderBy('category_name')
		->get()
		->sortBy('category_name', SORT_NATURAL|SORT_FLAG_CASE);
		return view('frontend.category.car.car-search-result', $data);
	}

}

