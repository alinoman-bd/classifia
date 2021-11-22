<?php

namespace App\Http\Controllers\User;

use DB;
use Image;
// use App\AllAd;
// use App\Buses;
// use App\Search;
// use App\Trucks;
// use App\Minibus;
// use App\UsedCar;
// use App\Sailboat;
// use App\BoatsRaft;
// use App\Motorboat;
// use App\WaterBike;
// use App\Autotrains;
// use App\KayaksCanoe;
// use App\Motorcycles;
// use App\PassengerVan;
// use App\MotorandEngine;
// use App\CarCommonRecord;
// use App\ForestMachinery;
// use App\MinivansMinibus;
// use App\CarAddPosterInfo;
// use App\SemiTrailerTrucks;
// use App\MunicipalMachinery;
// use App\PersonalWaterCraft;
// use App\WaterTransportOther;
// use App\AgriculturalMachinery;
// use App\AgriculturalImplements;
// use App\TrailersandSemitrailers;
// use App\StorageandLoadingEquipment;
// use App\RecreationalVehiclesCampare;
// use App\ConstructionMachineryAccessories;
// use App\ConstructionandRoadConstructionEquipment;
// use Illuminate\Support\Facades\Validator;

// register

// modify
use Session;
use App\User;
use App\Advertisement;
use App\UserInformation;
use App\Image as ImageModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Foundation\Auth\RegistersUsers;


class CarAdController extends Controller
{
	use RegistersUsers;
	public function checkLogin(Request $request)
	{
		$email = $request->email;
		$pass = $request->password;
		if (Auth::attempt(array('email' => $email, 'password' => $pass))) {
			return 1;
		} else {
			return 0;
		}
	}


	public function RegisterFromPg(Request $request)
	{
		if ($request->email && $request->confirm_pass && $request->password && $request->accountType) {
			if ($request->password == $request->confirm_pass) {
				$data =  User::create([
					'email' => $request->email,
					'acount_type' => intval($request->accountType),
					'password' => Hash::make($request->password),
				]);
				$info = new UserInformation;
				$info->user_id = $data->_id;
				$info->save();

				$email = $request->email;
				$pass = $request->password;
				if (Auth::attempt(array('email' => $email, 'password' => $pass))) {
					return 1;
				}
			} else {
				return 3;
			}
		} else {
			return 'all fields are required';
		}
	}


	public function insertForm(Request $request)
	{
		$images_arr = [];
		if ($request->hasFile('files')) {
			foreach ($request->file('files') as $key => $image) {
				$name = 'car_alt_' . time() . $key . '.' . $image->getClientOriginalExtension();
				$image->move('carAdimages', $name);
				$images_arr[$key]['type'] = 'alt';
				$images_arr[$key]['image'] = $name;
			}
		}
		if ($request->hasFile('cover')) {
			$image = $request->file('cover');
			$image_name = 'car_thumbnail_' . time() . '.' . $image->getClientOriginalExtension();
			$destinationPath = 'ad_thumbnail';
			$resize_image = Image::make($image->getRealPath());
			$resize_image->resize(250, 180, function ($constraint) {
				$constraint->aspectRatio();
			})->save($destinationPath . '/' . $image_name);

			$image->move('carAdimages', $image_name);
			$n = count($images_arr);
			$images_arr[$n]['type'] = 'cover';
			$images_arr[$n]['image'] = $image_name;
		}
		if ($request->form_type == 'agricultural-implements') {
			if ($request->features_eq) {
				$features_eq = implode(",", $request->features_eq);
			} else {
				$features_eq = null;
			}
			$data = new Advertisement;
			$data->cat = 'cars';
			$data->form_type = $request->form_type;
			$data->sub_cat = $request->sub_cat ?: null;
			$data->title = $request->title;
			$data->price = intval($request->price);
			$data->agri_imp_type = $request->agri_imp_type;
			$data->new_used = $request->new_used;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->ope_width = $request->ope_width;
			$data->make = $request->make;
			$data->model = $request->model;
			$data->frames = $request->frames;
			$data->export_price = $request->export_price;
			$data->feq = $features_eq;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->description = $request->description;
			$data->video = $request->video;
			$data->featured = 0;
			$data->suspend = 0;
			$data->user_id = Auth::user()->_id;
			$data->save();
		} elseif ($request->form_type == 'agricultural-machinery') {

			if ($request->features_eq1) {
				$feq_additional_equipment = implode(",", $request->features_eq1);
			} else {
				$feq_additional_equipment = null;
			}
			if ($request->features_eq2) {
				$feq_electronics = implode(",", $request->features_eq2);
			} else {
				$feq_electronics = null;
			}
			if ($request->features_eq3) {
				$feq_interior = implode(",", $request->features_eq3);
			} else {
				$feq_interior = null;
			}
			if ($request->features_eq4) {
				$feq_safety = implode(",", $request->features_eq4);
			} else {
				$feq_safety = null;
			}

			if ($request->features_eq5) {
				$feq_other = implode(",", $request->features_eq5);
			} else {
				$feq_other = null;
			}

			$data = new Advertisement;
			$data->cat = 'cars';
			$data->form_type = $request->form_type;
			$data->sub_cat = $request->sub_cat ?: null;
			$data->title = $request->title;
			$data->price = intval($request->price);
			$data->agri_mach_type = $request->agri_mach_type;
			$data->new_used = $request->new_used;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->ope_width = $request->ope_width;
			$data->make = $request->make;
			$data->model = $request->model;
			$data->work_hour = $request->work_hour;
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->export_price = $request->export_price;
			$data->feq_additional_equipment = $feq_additional_equipment;
			$data->feq_electronics = $feq_electronics;
			$data->feq_safety = $feq_safety;
			$data->feq_interior = $feq_interior;
			$data->feq_other = $feq_other;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->description = $request->description;
			$data->video = $request->video;
			$data->featured = 0;
			$data->suspend = 0;
			$data->user_id = Auth::user()->_id;
			$data->save();
		} elseif ($request->form_type == 'forest-machinery') {

			if ($request->features_eq1) {
				$feq_additional_equipment = implode(",", $request->features_eq1);
			} else {
				$feq_additional_equipment = null;
			}
			if ($request->features_eq2) {
				$feq_electronics = implode(",", $request->features_eq2);
			} else {
				$feq_electronics = null;
			}
			if ($request->features_eq3) {
				$feq_safety = implode(",", $request->features_eq3);
			} else {
				$feq_safety = null;
			}
			if ($request->features_eq4) {
				$feq_interior = implode(",", $request->features_eq4);
			} else {
				$feq_interior = null;
			}

			if ($request->features_eq5) {
				$feq_other = implode(",", $request->features_eq5);
			} else {
				$feq_other = null;
			}

			$data = new Advertisement;
			$data->cat = 'cars';
			$data->form_type = $request->form_type;
			$data->sub_cat = $request->sub_cat ?: null;
			$data->title = $request->title;
			$data->price = intval($request->price);
			$data->forest_mach_type = $request->forest_mach_type;
			$data->new_used = $request->new_used;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->make = $request->make;
			$data->model = $request->model;
			$data->work_hour = $request->work_hour;
			$data->layout = $request->layout;
			$data->export_price = $request->export_price;
			$data->wheel_width = $request->wheel_width;
			$data->range = $request->range;
			$data->lifting_moment = $request->lifting_moment;
			$data->feq_additional_equipment = $feq_additional_equipment;
			$data->feq_electronics = $feq_electronics;
			$data->feq_safety = $feq_safety;
			$data->feq_interior = $feq_interior;
			$data->feq_other = $feq_other;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->description = $request->description;
			$data->video = $request->video;
			$data->featured = 0;
			$data->suspend = 0;
			$data->user_id = Auth::user()->_id;
			$data->save();
		} elseif ($request->form_type == 'used-cars') {

			if ($request->features_eq1) {
				$feq_security = implode(",", $request->features_eq1);
			} else {
				$feq_security = null;
			}
			if ($request->features_eq2) {
				$feq_audio_video_equipment = implode(",", $request->features_eq2);
			} else {
				$feq_audio_video_equipment = null;
			}
			if ($request->features_eq3) {
				$feq_exterior = implode(",", $request->features_eq3);
			} else {
				$feq_exterior = null;
			}
			if ($request->features_eq4) {
				$feq_electronics = implode(",", $request->features_eq4);
			} else {
				$feq_electronics = null;
			}
			if ($request->features_eq5) {
				$feq_interior = implode(",", $request->features_eq5);
			} else {
				$feq_interior = null;
			}
			if ($request->features_eq6) {
				$feq_safety = implode(",", $request->features_eq6);
			} else {
				$feq_safety = null;
			}
			if ($request->features_eq7) {
				$feq_tuning_improvements = implode(",", $request->features_eq7);
			} else {
				$feq_tuning_improvements = null;
			}
			if ($request->features_eq8) {
				$feq_other_features = implode(",", $request->features_eq8);
			} else {
				$feq_other_features = null;
			}
			if ($request->features_eq9) {
				$feq_minivan_features = implode(",", $request->features_eq9);
			} else {
				$feq_minivan_features = null;
			}

			$data = new Advertisement;
			$data->cat = 'cars';
			$data->form_type = $request->form_type;
			$data->sub_cat = $request->sub_cat ?: null;
			$data->title = $request->title;
			$data->make = $request->make;
			$data->model = $request->model;
			$data->manufature_yea = intval($request->manufature_year);
			$data->manufature_mont = intval($request->manufature_month);
			$data->body_type = $request->body_type;
			$data->fuel_type = $request->fuel_type;
			$data->gear_box = $request->gear_box;
			$data->doors_number = $request->doors_number;
			$data->damage = $request->damage;
			$data->str_wheel = $request->str_wheel;
			$data->color = $request->color;
			$data->price = intval($request->price);
			$data->engn_capacity = $request->engn_capacity;
			$data->powerNumber = $request->powerNumber;
			$data->power_unit = $request->power_unit;
			$data->vin_number = $request->vin_number;
			$data->mileage = $request->mileage;
			$data->mileage_unit = $request->mileage_unit;
			$data->seat_number = $request->seat_number;
			$data->drivel_wheel = $request->drivel_wheel;
			$data->wheel_size = $request->wheel_size;
			$data->export_price = $request->export_price;
			$data->climate_contrl = $request->climate_contrl;
			$data->fuel_consumption_Urban = $request->fuel_consumption_Urban;
			$data->fuel_consumption_extra_urban = $request->fuel_consumption_extra_urban;
			$data->fuel_consumption_combined = $request->fuel_consumption_combined;
			$data->euro_stndard = $request->euro_stndard;
			$data->mot_exp_date = $request->mot_exp_date;
			$data->mot_exp_mnth = $request->mot_exp_mnth;
			$data->country = $request->country;
			$data->feq_security = $feq_security;
			$data->feq_audio_video_equipment = $feq_audio_video_equipment;
			$data->feq_exterior = $feq_exterior;
			$data->feq_electronics = $feq_electronics;
			$data->feq_interior = $feq_interior;
			$data->feq_safety = $feq_safety;
			$data->feq_tuning_improvements = $feq_tuning_improvements;
			$data->feq_other_features = $feq_other_features;
			$data->feq_minivan_features = $feq_minivan_features;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->description = $request->description;
			$data->video = $request->video;
			$data->featured = 0;
			$data->suspend = 0;
			$data->user_id = Auth::user()->_id;
			$data->save();
		} elseif ($request->form_type == 'construction-and-road-construction-equipment') {

			if ($request->features_eq1) {
				$feq_electronics = implode(",", $request->features_eq1);
			} else {
				$feq_electronics = null;
			}
			if ($request->features_eq2) {
				$feq_kabina = implode(",", $request->features_eq2);
			} else {
				$feq_kabina = null;
			}
			if ($request->features_eq3) {
				$feq_additional_equipment = implode(",", $request->features_eq3);
			} else {
				$feq_additional_equipment = null;
			}
			if ($request->features_eq4) {
				$feq_safety = implode(",", $request->features_eq4);
			} else {
				$feq_safety = null;
			}

			if ($request->features_eq5) {
				$feq_other = implode(",", $request->features_eq5);
			} else {
				$feq_other = null;
			}

			$data = new Advertisement;
			$data->cat = 'cars';
			$data->form_type = $request->form_type;
			$data->sub_cat = $request->sub_cat ?: null;
			$data->title = $request->title;
			$data->road_const_type = $request->road_const_type;
			$data->new_used = $request->new_used;
			$data->work_hour = $request->work_hour;
			$data->volume = $request->volume;
			$data->make = $request->make;
			$data->model = $request->model;
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->trans_type = $request->trans_type;
			$data->price = intval($request->price);
			$data->vat = $request->vat;
			$data->kerb_weight = $request->kerb_weight;
			$data->gross_weight = $request->gross_weight;
			$data->export_price = $request->export_price;
			$data->lifting_height = $request->lifting_height;
			$data->boom_length = $request->boom_length;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->damage = $request->damage;
			$data->lifting_capacity = $request->lifting_capacity;
			$data->digging_depth = $request->digging_depth;
			$data->layout = $request->layout;
			$data->euro_std = $request->euro_std;
			$data->str_wheel = $request->str_wheel;
			$data->vin_num = $request->vin_num;
			$data->color = $request->color;
			$data->feq_electronics = $feq_electronics;
			$data->feq_kabina = $feq_kabina;
			$data->feq_additional_equipment = $feq_additional_equipment;
			$data->feq_safety = $feq_safety;
			$data->feq_other = $feq_other;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->description = $request->description;
			$data->video = $request->video;
			$data->featured = 0;
			$data->suspend = 0;
			$data->user_id = Auth::user()->_id;
			$data->save();
		} elseif ($request->form_type == 'construction-machinery-accessories') {

			if ($request->features_eq) {
				$features_eq = implode(",", $request->features_eq);
			} else {
				$features_eq = null;
			}
			$data = new Advertisement;
			$data->cat = 'cars';
			$data->form_type = $request->form_type;
			$data->sub_cat = $request->sub_cat ?: null;
			$data->title = $request->title;
			$data->const_mach_type = $request->const_mach_type;
			$data->new_used = $request->new_used;
			$data->make = $request->make;
			$data->model = $request->model;
			$data->price = intval($request->price);
			$data->vat = $request->vat;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->volume = $request->volume;
			$data->weight = $request->weight;
			$data->length = $request->length;
			$data->width = $request->width;
			$data->feq = $features_eq;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->description = $request->description;
			$data->video = $request->video;
			$data->featured = 0;
			$data->suspend = 0;
			$data->user_id = Auth::user()->_id;
			$data->save();
		} elseif ($request->form_type == 'municipal-machinery') {

			if ($request->features_eq1) {
				$feq_electronics = implode(",", $request->features_eq1);
			} else {
				$feq_electronics = null;
			}
			if ($request->features_eq2) {
				$feq_kabina = implode(",", $request->features_eq2);
			} else {
				$feq_kabina = null;
			}
			if ($request->features_eq3) {
				$feq_additional_equipment = implode(",", $request->features_eq3);
			} else {
				$feq_additional_equipment = null;
			}
			if ($request->features_eq4) {
				$feq_safety = implode(",", $request->features_eq4);
			} else {
				$feq_safety = null;
			}

			if ($request->features_eq5) {
				$feq_other = implode(",", $request->features_eq5);
			} else {
				$feq_other = null;
			}

			$data = new Advertisement;
			$data->cat = 'cars';
			$data->form_type = $request->form_type;
			$data->sub_cat = $request->sub_cat ?: null;
			$data->title = $request->title;
			$data->muni_mach_type = $request->muni_mach_type;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->work_hour = $request->work_hour;
			$data->make = $request->make;
			$data->model = $request->model;
			$data->kerb_weight = $request->kerb_weight;
			$data->gross_weight = $request->gross_weight;
			$data->price = intval($request->price);
			$data->vat = $request->vat;
			$data->export_price = $request->export_price;
			$data->layout = $request->layout;
			$data->damage = $request->damage;
			$data->new_used = $request->new_used;
			$data->fuel_type = $request->fuel_type;
			$data->gear_box = $request->gear_box;
			$data->volume = $request->volume;
			$data->lifting_capacity = $request->lifting_capacity;
			$data->euro_stndard = $request->euro_stndard;
			$data->color = $request->color;
			$data->str_wheel = $request->str_wheel;
			$data->vin_num = $request->vin_num;
			$data->feq_electronics = $feq_electronics;
			$data->feq_kabina = $feq_kabina;
			$data->feq_additional_equipment = $feq_additional_equipment;
			$data->feq_safety = $feq_safety;
			$data->feq_other = $feq_other;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->description = $request->description;
			$data->video = $request->video;
			$data->featured = 0;
			$data->suspend = 0;
			$data->user_id = Auth::user()->_id;
			$data->save();
		} elseif ($request->form_type == 'storage-and-loading-equipment') {

			if ($request->features_eq1) {
				$feq_kabina = implode(",", $request->features_eq1);
			} else {
				$feq_kabina = null;
			}
			if ($request->features_eq2) {
				$feq_additional_equipment = implode(",", $request->features_eq2);
			} else {
				$feq_additional_equipment = null;
			}
			if ($request->features_eq3) {
				$feq_safety = implode(",", $request->features_eq3);
			} else {
				$feq_safety = null;
			}
			if ($request->features_eq4) {
				$feq_other = implode(",", $request->features_eq4);
			} else {
				$feq_other = null;
			}

			$data = new Advertisement;
			$data->cat = 'cars';
			$data->form_type = $request->form_type;
			$data->sub_cat = $request->sub_cat ?: null;
			$data->title = $request->title;
			$data->storage_type = $request->storage_type;
			$data->make = $request->make;
			$data->model = $request->model;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->price = intval($request->price);
			$data->vat = $request->vat;
			$data->export_price = $request->export_price;
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->damage = $request->damage;
			$data->new_used = $request->new_used;
			$data->boom_type = $request->boom_type;
			$data->lifting_height = $request->lifting_height;
			$data->fuel_type = $request->fuel_type;
			$data->trans_type = $request->trans_type;
			$data->struc_height = $request->struc_height;
			$data->fr_lift_height = $request->fr_lift_height;
			$data->kerb_weight = $request->kerb_weight;
			$data->work_hour = $request->work_hour;
			$data->fork_length = $request->fork_length;
			$data->lifting_capacity = $request->lifting_capacity;
			$data->length = $request->length;
			$data->height = $request->height;
			$data->width = $request->width;
			$data->color = $request->color;
			$data->vin_num = $request->vin_num;
			$data->feq_kabina = $feq_kabina;
			$data->feq_additional_equipment = $feq_additional_equipment;
			$data->feq_safety = $feq_safety;
			$data->feq_other = $feq_other;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->description = $request->description;
			$data->video = $request->video;
			$data->featured = 0;
			$data->suspend = 0;
			$data->user_id = Auth::user()->_id;
			$data->save();
		} elseif ($request->form_type == 'minivans-minibus') {

			if ($request->features_eq1) {
				$feq_security = implode(",", $request->features_eq1);
			} else {
				$feq_security = null;
			}
			if ($request->features_eq2) {
				$feq_audio_video_equipment = implode(",", $request->features_eq2);
			} else {
				$feq_audio_video_equipment = null;
			}
			if ($request->features_eq3) {
				$feq_exterior = implode(",", $request->features_eq3);
			} else {
				$feq_exterior = null;
			}
			if ($request->features_eq4) {
				$feq_electronics = implode(",", $request->features_eq4);
			} else {
				$feq_electronics = null;
			}
			if ($request->features_eq5) {
				$feq_interior = implode(",", $request->features_eq5);
			} else {
				$feq_interior = null;
			}
			if ($request->features_eq6) {
				$feq_safety = implode(",", $request->features_eq6);
			} else {
				$feq_safety = null;
			}
			if ($request->features_eq7) {
				$feq_other = implode(",", $request->features_eq7);
			} else {
				$feq_other = null;
			}
			$data = new Advertisement;
			$data->cat = 'cars';
			$data->form_type = $request->form_type;
			$data->sub_cat = $request->sub_cat ?: null;
			$data->title = $request->title;
			$data->make = $request->make;
			$data->model = $request->model;
			$data->eng_capacity = $request->eng_capacity;
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->minivan_type = $request->minivan_type;
			$data->price = intval($request->price);
			$data->vat = $request->vat;
			$data->export_price = $request->export_price;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->fuel_type = $request->fuel_type;
			$data->str_wheel = $request->str_wheel;
			$data->damage = $request->damage;
			$data->seat_number = $request->seat_number;
			$data->gear_box = $request->gear_box;
			$data->gross_weight = $request->gross_weight;
			$data->kerb_weight = $request->kerb_weight;
			$data->new_used = $request->new_used;
			$data->drivel_wheel = $request->drivel_wheel;
			$data->fuel_tank_capacity = $request->fuel_tank_capacity;
			$data->mot_exp_date = $request->mot_exp_date;
			$data->mot_exp_mnth = $request->mot_exp_mnth;
			$data->minibus_length = $request->minibus_length;
			$data->minibus_height = $request->minibus_height;
			$data->mileage = $request->mileage;
			$data->mileage_unit = $request->mileage_unit;
			$data->vin_num = $request->vin_num;
			$data->climate_contrl = $request->climate_contrl;
			$data->euro_stndard = $request->euro_stndard;
			$data->color = $request->color;
			$data->country = $request->country;
			$data->feq_security = $feq_security;
			$data->feq_audio_video_equipment = $feq_audio_video_equipment;
			$data->feq_exterior = $feq_exterior;
			$data->feq_electronics = $feq_electronics;
			$data->feq_interior = $feq_interior;
			$data->feq_safety = $feq_safety;
			$data->feq_other = $feq_other;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->description = $request->description;
			$data->video = $request->video;
			$data->featured = 0;
			$data->suspend = 0;
			$data->user_id = Auth::user()->_id;
			$data->save();
		} elseif ($request->form_type == 'autotrains') {

			if ($request->features_eq1) {
				$feq_security = implode(",", $request->features_eq1);
			} else {
				$feq_security = null;
			}
			if ($request->features_eq2) {
				$feq_audio_video_equipment = implode(",", $request->features_eq2);
			} else {
				$feq_audio_video_equipment = null;
			}
			if ($request->features_eq3) {
				$feq_exterior = implode(",", $request->features_eq3);
			} else {
				$feq_exterior = null;
			}
			if ($request->features_eq4) {
				$feq_electronics = implode(",", $request->features_eq4);
			} else {
				$feq_electronics = null;
			}
			if ($request->features_eq5) {
				$feq_interior = implode(",", $request->features_eq5);
			} else {
				$feq_interior = null;
			}
			if ($request->features_eq6) {
				$feq_safety = implode(",", $request->features_eq6);
			} else {
				$feq_safety = null;
			}
			if ($request->features_eq7) {
				$feq_other = implode(",", $request->features_eq7);
			} else {
				$feq_other = null;
			}

			$data = new Advertisement;
			$data->cat = 'cars';
			$data->form_type = $request->form_type;
			$data->sub_cat = $request->sub_cat ?: null;
			$data->title = $request->title;
			$data->train_type = $request->train_type;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->gross_weight = $request->gross_weight;
			$data->kerb_weight = $request->kerb_weight;
			$data->make = $request->make;
			$data->model = $request->model;
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->mileage = $request->mileage;
			$data->mileage_unit = $request->mileage_unit;
			$data->price = intval($request->price);
			$data->vat = $request->vat;
			$data->length = $request->length;
			$data->width = $request->width;
			$data->fuel_type = $request->fuel_type;
			$data->color = $request->color;
			$data->height = $request->height;
			$data->volume = $request->volume;
			$data->layout = $request->layout;
			$data->euro_stndard = $request->euro_stndard;
			$data->lift_capacity = $request->lift_capacity;
			$data->fuel_tank_capacity = $request->fuel_tank_capacity;
			$data->damage = $request->damage;
			$data->new_used = $request->new_used;
			$data->front_suspension = $request->front_suspension;
			$data->rear_suspension = $request->rear_suspension;
			$data->mot_exp_date = $request->mot_exp_date;
			$data->mot_exp_mnth = $request->mot_exp_mnth;
			$data->str_wheel = $request->str_wheel;
			$data->gear_box = $request->gear_box;
			$data->sleep_bed = $request->sleep_bed;
			$data->vin_num = $request->vin_num;
			$data->feq_security = $feq_security;
			$data->feq_audio_video_equipment = $feq_audio_video_equipment;
			$data->feq_exterior = $feq_exterior;
			$data->feq_electronics = $feq_electronics;
			$data->feq_interior = $feq_interior;
			$data->feq_safety = $feq_safety;
			$data->feq_other = $feq_other;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->description = $request->description;
			$data->video = $request->video;
			$data->featured = 0;
			$data->suspend = 0;
			$data->user_id = Auth::user()->_id;
			$data->save();
		} elseif ($request->form_type == 'semi-trailer-trucks') {

			if ($request->features_eq1) {
				$feq_security = implode(",", $request->features_eq1);
			} else {
				$feq_security = null;
			}
			if ($request->features_eq2) {
				$feq_audio_video_equipment = implode(",", $request->features_eq2);
			} else {
				$feq_audio_video_equipment = null;
			}
			if ($request->features_eq3) {
				$feq_exterior = implode(",", $request->features_eq3);
			} else {
				$feq_exterior = null;
			}
			if ($request->features_eq4) {
				$feq_electronics = implode(",", $request->features_eq4);
			} else {
				$feq_electronics = null;
			}
			if ($request->features_eq5) {
				$feq_interior = implode(",", $request->features_eq5);
			} else {
				$feq_interior = null;
			}
			if ($request->features_eq6) {
				$feq_safety = implode(",", $request->features_eq6);
			} else {
				$feq_safety = null;
			}
			if ($request->features_eq7) {
				$feq_other = implode(",", $request->features_eq7);
			} else {
				$feq_other = null;
			}
			$data = new Advertisement;
			$data->cat = 'cars';
			$data->form_type = $request->form_type;
			$data->sub_cat = $request->sub_cat ?: null;
			$data->title = $request->title;
			$data->make = $request->make;
			$data->model = $request->model;
			$data->kerb_weight = $request->kerb_weight;
			$data->gross_weight = $request->gross_weight;
			$data->price = intval($request->price);
			$data->vat = $request->vat;
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->mileage = $request->mileage;
			$data->mileage_unit = $request->mileage_unit;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->sleep_bed = $request->sleep_bed;
			$data->front_suspension = $request->front_suspension;
			$data->rear_suspension = $request->rear_suspension;
			$data->new_used = $request->new_used;
			$data->damage = $request->damage;
			$data->mot_exp_date = $request->mot_exp_date;
			$data->mot_exp_mnth = $request->mot_exp_mnth;
			$data->fuel_tank_capacity = $request->fuel_tank_capacity;
			$data->euro_stndard = $request->euro_stndard;
			$data->layout = $request->layout;
			$data->gear_box = $request->gear_box;
			$data->color = $request->color;
			$data->str_wheel = $request->str_wheel;
			$data->vin_num = $request->vin_num;
			$data->semi_trailer_type = $request->semi_trailer_type;
			$data->semi_trailer_manufacturer = $request->semi_trailer_manufacturer;
			$data->semi_trailer_model = $request->semi_trailer_model;
			$data->semi_trailer_suspension = $request->semi_trailer_suspension;
			$data->semi_manufature_year = intval($request->semi_manufature_year);
			$data->semi_manufature_month = intval($request->semi_manufature_month);
			$data->semi_mot_exp_date = $request->semi_mot_exp_date;
			$data->mot_exp_mnth = $request->mot_exp_mnth;
			$data->semi_gross_weight = $request->semi_gross_weight;
			$data->semi_kerb_weight = $request->semi_kerb_weight;
			$data->semi_length = $request->semi_length;
			$data->semi_width = $request->semi_width;
			$data->semi_height = $request->semi_height;
			$data->semi_capacity = $request->semi_capacity;
			$data->alx_make = $request->alx_make;
			$data->semi_axl_num = $request->semi_axl_num;
			$data->semi_damage = $request->semi_damage;
			$data->semi_color = $request->semi_color;
			$data->semi_new_used = $request->semi_new_used;
			$data->semi_vin_num = $request->semi_vin_num;
			$data->feq_security = $feq_security;
			$data->feq_audio_video_equipment = $feq_audio_video_equipment;
			$data->feq_exterior = $feq_exterior;
			$data->feq_electronics = $feq_electronics;
			$data->feq_interior = $feq_interior;
			$data->feq_safety = $feq_safety;
			$data->feq_other = $feq_other;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->description = $request->description;
			$data->video = $request->video;
			$data->featured = 0;
			$data->suspend = 0;
			$data->user_id = Auth::user()->_id;
			$data->save();
		} elseif ($request->form_type == 'trucks') {

			if ($request->features_eq1) {
				$feq_security = implode(",", $request->features_eq1);
			} else {
				$feq_security = null;
			}
			if ($request->features_eq2) {
				$feq_audio_video_equipment = implode(",", $request->features_eq2);
			} else {
				$feq_audio_video_equipment = null;
			}
			if ($request->features_eq3) {
				$feq_exterior = implode(",", $request->features_eq3);
			} else {
				$feq_exterior = null;
			}
			if ($request->features_eq4) {
				$feq_electronics = implode(",", $request->features_eq4);
			} else {
				$feq_electronics = null;
			}
			if ($request->features_eq5) {
				$feq_interior = implode(",", $request->features_eq5);
			} else {
				$feq_interior = null;
			}
			if ($request->features_eq6) {
				$feq_safety = implode(",", $request->features_eq6);
			} else {
				$feq_safety = null;
			}
			if ($request->features_eq7) {
				$feq_other = implode(",", $request->features_eq7);
			} else {
				$feq_other = null;
			}

			$data = new Advertisement;
			$data->cat = 'cars';
			$data->form_type = $request->form_type;
			$data->sub_cat = $request->sub_cat ?: null;
			$data->title = $request->title;
			$data->truck_type = $request->truck_type;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->gross_weight = $request->gross_weight;
			$data->kerb_weight = $request->kerb_weight;
			$data->make = $request->make;
			$data->model = $request->model;
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->mileage = $request->mileage;
			$data->mileage_unit = $request->mileage_unit;
			$data->price = intval($request->price);
			$data->vat = $request->vat;
			$data->length = $request->length;
			$data->width = $request->width;
			$data->fuel_type = $request->fuel_type;
			$data->color = $request->color;
			$data->height = $request->height;
			$data->volume = $request->volume;
			$data->layout = $request->layout;
			$data->euro_stndard = $request->euro_stndard;
			$data->lift_capacity = $request->lift_capacity;
			$data->fuel_tank_capacity = $request->fuel_tank_capacity;
			$data->damage = $request->damage;
			$data->new_used = $request->new_used;
			$data->front_suspension = $request->front_suspension;
			$data->rear_suspension = $request->rear_suspension;
			$data->mot_exp_date = $request->mot_exp_date;
			$data->mot_exp_mnth = $request->mot_exp_mnth;
			$data->str_wheel = $request->str_wheel;
			$data->gear_box = $request->gear_box;
			$data->sleep_bed = $request->sleep_bed;
			$data->vin_num = $request->vin_num;
			$data->feq_security = $feq_security;
			$data->feq_audio_video_equipment = $feq_audio_video_equipment;
			$data->feq_exterior = $feq_exterior;
			$data->feq_electronics = $feq_electronics;
			$data->feq_interior = $feq_interior;
			$data->feq_safety = $feq_safety;
			$data->feq_other = $feq_other;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->description = $request->description;
			$data->video = $request->video;
			$data->featured = 0;
			$data->suspend = 0;
			$data->user_id = Auth::user()->_id;
			$data->save();
		} elseif ($request->form_type == 'motorcycles') {

			if ($request->features_eq1) {
				$feq_security = implode(",", $request->features_eq1);
			} else {
				$feq_security = null;
			}
			if ($request->features_eq2) {
				$feq_audio_video_equipment = implode(",", $request->features_eq2);
			} else {
				$feq_audio_video_equipment = null;
			}
			if ($request->features_eq3) {
				$feq_exterior = implode(",", $request->features_eq3);
			} else {
				$feq_exterior = null;
			}
			if ($request->features_eq4) {
				$feq_electronics = implode(",", $request->features_eq4);
			} else {
				$feq_electronics = null;
			}
			if ($request->features_eq5) {
				$feq_interior = implode(",", $request->features_eq5);
			} else {
				$feq_interior = null;
			}
			if ($request->features_eq6) {
				$feq_safety = implode(",", $request->features_eq6);
			} else {
				$feq_safety = null;
			}
			if ($request->features_eq7) {
				$feq_other = implode(",", $request->features_eq7);
			} else {
				$feq_other = null;
			}
			$data = new Advertisement;
			$data->cat = 'cars';
			$data->form_type = $request->form_type;
			$data->sub_cat = $request->sub_cat ?: null;
			$data->title = $request->title;
			$data->make = $request->make;
			$data->model = $request->model;
			$data->eng_capacity = $request->eng_capacity;
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->price = intval($request->price);
			$data->export_price = $request->export_price;
			$data->motorcycle_type = $request->motorcycle_type;
			$data->cooling_type = $request->cooling_type;
			$data->mileage = $request->mileage;
			$data->mileage_unit = $request->mileage_unit;
			$data->fuel_type = $request->fuel_type;
			$data->damage = $request->damage;
			$data->new_used = $request->new_used;
			$data->mot_exp_date = $request->mot_exp_date;
			$data->mot_exp_mnth = $request->mot_exp_mnth;
			$data->kerb_weight = $request->kerb_weight;
			$data->gear_box = $request->gear_box;
			$data->engine_type = $request->engine_type;
			$data->color = $request->color;
			$data->reg_type = $request->reg_type;
			$data->euro_stndard = $request->euro_stndard;
			$data->country = $request->country;
			$data->feq_security = $feq_security;
			$data->feq_audio_video_equipment = $feq_audio_video_equipment;
			$data->feq_exterior = $feq_exterior;
			$data->feq_electronics = $feq_electronics;
			$data->feq_interior = $feq_interior;
			$data->feq_safety = $feq_safety;
			$data->feq_other = $feq_other;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->description = $request->description;
			$data->video = $request->video;
			$data->featured = 0;
			$data->suspend = 0;
			$data->user_id = Auth::user()->_id;
			$data->save();
		} elseif ($request->form_type == 'trailers-and-semitrailers') {

			if ($request->features_eq1) {
				$feq_trim_level = implode(",", $request->features_eq1);
			} else {
				$feq_trim_level = null;
			}
			if ($request->features_eq2) {
				$feq_additional_equipment = implode(",", $request->features_eq2);
			} else {
				$feq_additional_equipment = null;
			}
			if ($request->features_eq3) {
				$feq_other = implode(",", $request->features_eq3);
			} else {
				$feq_other = null;
			}

			$data = new Advertisement;
			$data->cat = 'cars';
			$data->form_type = $request->form_type;
			$data->sub_cat = $request->sub_cat ?: null;
			$data->title = $request->title;
			$data->trailer = $request->trailer;
			$data->trailer_type = $request->trailer_type;
			$data->gross_weight = $request->gross_weight;
			$data->curb_weight = $request->curb_weight;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->make = $request->make;
			$data->model = $request->model;
			$data->suspension = $request->suspension;
			$data->price = intval($request->price);
			$data->vat = $request->vat;
			$data->length = $request->length;
			$data->width = $request->width;
			$data->alx_make = $request->alx_make;
			$data->semi_axl_num = $request->semi_axl_num;
			$data->height = $request->height;
			$data->volume = $request->volume;
			$data->damage = $request->damage;
			$data->new_used = $request->new_used;
			$data->color = $request->color;
			$data->mot_exp_date = $request->mot_exp_date;
			$data->mot_exp_mnth = $request->mot_exp_mnth;
			$data->vin_num = $request->vin_num;
			$data->feq_trim_level = $feq_trim_level;
			$data->feq_additional_equipment = $feq_additional_equipment;
			$data->feq_other = $feq_other;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->description = $request->description;
			$data->video = $request->video;
			$data->featured = 0;
			$data->suspend = 0;
			$data->user_id = Auth::user()->_id;
			$data->save();
		} elseif ($request->form_type == 'buses') {

			if ($request->features_eq1) {
				$feq_security = implode(",", $request->features_eq1);
			} else {
				$feq_security = null;
			}
			if ($request->features_eq2) {
				$feq_audio_video_equipment = implode(",", $request->features_eq2);
			} else {
				$feq_audio_video_equipment = null;
			}
			if ($request->features_eq3) {
				$feq_exterior = implode(",", $request->features_eq3);
			} else {
				$feq_exterior = null;
			}
			if ($request->features_eq4) {
				$feq_electronics = implode(",", $request->features_eq4);
			} else {
				$feq_electronics = null;
			}
			if ($request->features_eq5) {
				$feq_interior = implode(",", $request->features_eq5);
			} else {
				$feq_interior = null;
			}
			if ($request->features_eq6) {
				$feq_safety = implode(",", $request->features_eq6);
			} else {
				$feq_safety = null;
			}
			if ($request->features_eq7) {
				$feq_other = implode(",", $request->features_eq7);
			} else {
				$feq_other = null;
			}
			$data = new Advertisement;
			$data->cat = 'cars';
			$data->form_type = $request->form_type;
			$data->sub_cat = $request->sub_cat ?: null;
			$data->title = $request->title;
			$data->bus_type = $request->bus_type;
			$data->seat_num = $request->seat_num;
			$data->eng_capacity = $request->eng_capacity;
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->make = $request->make;
			$data->model = $request->model;
			$data->damage = $request->damage;
			$data->mileage = $request->mileage;
			$data->mileage_unit = $request->mileage_unit;
			$data->price = intval($request->price);
			$data->vat = $request->vat;
			$data->gross_weight = $request->gross_weight;
			$data->kerb_weight = $request->kerb_weight;
			$data->export_price = $request->export_price;
			$data->fuel_type = $request->fuel_type;
			$data->gear_box = $request->gear_box;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->new_used = $request->new_used;
			$data->climate_contrl = $request->climate_contrl;
			$data->doors_number = $request->doors_number;
			$data->length = $request->length;
			$data->width = $request->width;
			$data->str_wheel = $request->str_wheel;
			$data->vin_num = $request->vin_num;
			$data->euro_stndard = $request->euro_stndard;
			$data->fuel_tank_capacity = $request->fuel_tank_capacity;
			$data->mot_exp_date = $request->mot_exp_date;
			$data->mot_exp_mnth = $request->mot_exp_mnth;
			$data->country = $request->country;
			$data->color = $request->color;
			$data->feq_security = $feq_security;
			$data->feq_audio_video_equipment = $feq_audio_video_equipment;
			$data->feq_exterior = $feq_exterior;
			$data->feq_electronics = $feq_electronics;
			$data->feq_interior = $feq_interior;
			$data->feq_safety = $feq_safety;
			$data->feq_other = $feq_other;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->description = $request->description;
			$data->video = $request->video;
			$data->featured = 0;
			$data->suspend = 0;
			$data->user_id = Auth::user()->_id;
			$data->save();
		} elseif ($request->form_type == 'recreational-vehicles-campers') {

			if ($request->features_eq1) {
				$feq_security = implode(",", $request->features_eq1);
			} else {
				$feq_security = null;
			}
			if ($request->features_eq2) {
				$feq_audio_video_equipment = implode(",", $request->features_eq2);
			} else {
				$feq_audio_video_equipment = null;
			}
			if ($request->features_eq3) {
				$feq_exterior = implode(",", $request->features_eq3);
			} else {
				$feq_exterior = null;
			}
			if ($request->features_eq4) {
				$feq_electronics = implode(",", $request->features_eq4);
			} else {
				$feq_electronics = null;
			}
			if ($request->features_eq5) {
				$feq_interior = implode(",", $request->features_eq5);
			} else {
				$feq_interior = null;
			}
			if ($request->features_eq6) {
				$feq_safety = implode(",", $request->features_eq6);
			} else {
				$feq_safety = null;
			}
			if ($request->features_eq7) {
				$feq_other = implode(",", $request->features_eq7);
			} else {
				$feq_other = null;
			}
			$data = new Advertisement;
			$data->cat = 'cars';
			$data->form_type = $request->form_type;
			$data->sub_cat = $request->sub_cat ?: null;
			$data->title = $request->title;
			$data->campare_type = $request->campare_type;
			$data->eng_capacity = $request->eng_capacity;
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->make = $request->make;
			$data->model = $request->model;
			$data->bed_num = $request->bed_num;
			$data->seat_num = $request->seat_num;
			$data->price = intval($request->price);
			$data->vat = $request->vat;
			$data->gross_weight = $request->gross_weight;
			$data->kerb_weight = $request->kerb_weight;
			$data->export_price = $request->export_price;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->fuel_tank_capacity = $request->fuel_tank_capacity;
			$data->water_tank_capacity = $request->water_tank_capacity;
			$data->damage = $request->damage;
			$data->new_used = $request->new_used;
			$data->septic_tank = $request->septic_tank;
			$data->mileage = $request->mileage;
			$data->mileage_unit = $request->mileage_unit;
			$data->gear_box = $request->gear_box;
			$data->fuel_type = $request->fuel_type;
			$data->str_wheel = $request->str_wheel;
			$data->drivel_wheel = $request->drivel_wheel;
			$data->length = $request->length;
			$data->width = $request->width;
			$data->climate_contrl = $request->climate_contrl;
			$data->color = $request->color;
			$data->euro_stndard = $request->euro_stndard;
			$data->mot_exp_date = $request->mot_exp_date;
			$data->mot_exp_mnth = $request->mot_exp_mnth;
			$data->country = $request->country;
			$data->vin_num = $request->vin_num;
			$data->feq_security = $feq_security;
			$data->feq_audio_video_equipment = $feq_audio_video_equipment;
			$data->feq_exterior = $feq_exterior;
			$data->feq_electronics = $feq_electronics;
			$data->feq_interior = $feq_interior;
			$data->feq_safety = $feq_safety;
			$data->feq_other = $feq_other;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->description = $request->description;
			$data->video = $request->video;
			$data->featured = 0;
			$data->suspend = 0;
			$data->user_id = Auth::user()->_id;
			$data->save();
		} elseif ($request->form_type == 'minibus') {

			if ($request->features_eq1) {
				$feq_security = implode(",", $request->features_eq1);
			} else {
				$feq_security = null;
			}
			if ($request->features_eq2) {
				$feq_audio_video_equipment = implode(",", $request->features_eq2);
			} else {
				$feq_audio_video_equipment = null;
			}
			if ($request->features_eq3) {
				$feq_exterior = implode(",", $request->features_eq3);
			} else {
				$feq_exterior = null;
			}
			if ($request->features_eq4) {
				$feq_electronics = implode(",", $request->features_eq4);
			} else {
				$feq_electronics = null;
			}
			if ($request->features_eq5) {
				$feq_interior = implode(",", $request->features_eq5);
			} else {
				$feq_interior = null;
			}
			if ($request->features_eq6) {
				$feq_safety = implode(",", $request->features_eq6);
			} else {
				$feq_safety = null;
			}
			if ($request->features_eq7) {
				$feq_other = implode(",", $request->features_eq7);
			} else {
				$feq_other = null;
			}

			$data = new Advertisement;
			$data->cat = 'cars';
			$data->form_type = $request->form_type;
			$data->sub_cat = $request->sub_cat ?: null;
			$data->title = $request->title;
			$data->make = $request->make;
			$data->model = $request->model;
			$data->eng_capacity = $request->eng_capacity;
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->minivan_type = $request->minivan_type;
			$data->price = intval($request->price);
			$data->vat = $request->vat;
			$data->export_price = $request->export_price;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->fuel_type = $request->fuel_type;
			$data->str_wheel = $request->str_wheel;
			$data->damage = $request->damage;
			$data->seat_number = $request->seat_number;
			$data->gear_box = $request->gear_box;
			$data->gross_weight = $request->gross_weight;
			$data->kerb_weight = $request->kerb_weight;
			$data->new_used = $request->new_used;
			$data->drivel_wheel = $request->drivel_wheel;
			$data->fuel_tank_capacity = $request->fuel_tank_capacity;
			$data->mot_exp_date = $request->mot_exp_date;
			$data->mot_exp_mnth = $request->mot_exp_mnth;
			$data->minibus_length = $request->minibus_length;
			$data->minibus_height = $request->minibus_height;
			$data->mileage = $request->mileage;
			$data->mileage_unit = $request->mileage_unit;
			$data->vin_num = $request->vin_num;
			$data->climate_contrl = $request->climate_contrl;
			$data->euro_stndard = $request->euro_stndard;
			$data->color = $request->color;
			$data->country = $request->country;
			$data->feq_security = $feq_security;
			$data->feq_audio_video_equipment = $feq_audio_video_equipment;
			$data->feq_exterior = $feq_exterior;
			$data->feq_electronics = $feq_electronics;
			$data->feq_interior = $feq_interior;
			$data->feq_safety = $feq_safety;
			$data->feq_other = $feq_other;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->description = $request->description;
			$data->video = $request->video;
			$data->featured = 0;
			$data->suspend = 0;
			$data->user_id = Auth::user()->_id;
			$data->save();
		} elseif ($request->form_type == 'passenger-vans') {


			if ($request->features_eq1) {
				$feq_security = implode(",", $request->features_eq1);
			} else {
				$feq_security = null;
			}
			if ($request->features_eq2) {
				$feq_audio_video_equipment = implode(",", $request->features_eq2);
			} else {
				$feq_audio_video_equipment = null;
			}
			if ($request->features_eq3) {
				$feq_exterior = implode(",", $request->features_eq3);
			} else {
				$feq_exterior = null;
			}
			if ($request->features_eq4) {
				$feq_electronics = implode(",", $request->features_eq4);
			} else {
				$feq_electronics = null;
			}
			if ($request->features_eq5) {
				$feq_interior = implode(",", $request->features_eq5);
			} else {
				$feq_interior = null;
			}
			if ($request->features_eq6) {
				$feq_safety = implode(",", $request->features_eq6);
			} else {
				$feq_safety = null;
			}
			if ($request->features_eq7) {
				$feq_tuning_improvements = implode(",", $request->features_eq7);
			} else {
				$feq_tuning_improvements = null;
			}
			if ($request->features_eq8) {
				$feq_other_features = implode(",", $request->features_eq8);
			} else {
				$feq_other_features = null;
			}
			if ($request->features_eq9) {
				$feq_minivan_features = implode(",", $request->features_eq9);
			} else {
				$feq_minivan_features = null;
			}

			$data = new Advertisement;
			$data->cat = 'cars';
			$data->form_type = $request->form_type;
			$data->sub_cat = $request->sub_cat ?: null;
			$data->title = $request->title;
			$data->make = $request->make;
			$data->model = $request->model;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->body_type = $request->body_type;
			$data->fuel_type = $request->fuel_type;
			$data->gear_box = $request->gear_box;
			$data->doors_number = $request->doors_number;
			$data->damage = $request->damage;
			$data->str_wheel = $request->str_wheel;
			$data->color = $request->color;
			$data->price = intval($request->price);
			$data->engn_capacity = $request->engn_capacity;
			$data->powerNumber = $request->powerNumber;
			$data->power_unit = $request->power_unit;
			$data->vin_number = $request->vin_number;
			$data->mileage = $request->mileage;
			$data->mileage_unit = $request->mileage_unit;
			$data->seat_number = $request->seat_number;
			$data->drivel_wheel = $request->drivel_wheel;
			$data->wheel_size = $request->wheel_size;
			$data->export_price = $request->export_price;
			$data->climate_contrl = $request->climate_contrl;
			$data->fuel_consumption_Urban = $request->fuel_consumption_Urban;
			$data->fuel_consumption_extra_urban = $request->fuel_consumption_extra_urban;
			$data->fuel_consumption_combined = $request->fuel_consumption_combined;
			$data->euro_stndard = $request->euro_stndard;
			$data->mot_exp_date = $request->mot_exp_date;
			$data->mot_exp_mnth = $request->mot_exp_mnth;
			$data->country = $request->country;
			$data->feq_security = $feq_security;
			$data->feq_audio_video_equipment = $feq_audio_video_equipment;
			$data->feq_exterior = $feq_exterior;
			$data->feq_electronics = $feq_electronics;
			$data->feq_interior = $feq_interior;
			$data->feq_safety = $feq_safety;
			$data->feq_tuning_improvements = $feq_tuning_improvements;
			$data->feq_other_features = $feq_other_features;
			$data->feq_minivan_features = $feq_minivan_features;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->description = $request->description;
			$data->video = $request->video;
			$data->featured = 0;
			$data->suspend = 0;
			$data->user_id = Auth::user()->_id;
			$data->save();
		} elseif ($request->form_type == 'boats-rafts') {

			if ($request->features_eq) {
				$features_eq = implode(",", $request->features_eq);
			} else {
				$features_eq = null;
			}
			$data = new Advertisement;
			$data->cat = 'cars';
			$data->form_type = $request->form_type;
			$data->sub_cat = $request->sub_cat ?: null;
			$data->title = $request->title;
			$data->boat_raft_type = $request->boat_raft_type;
			$data->seat_num = $request->seat_num;
			$data->manufacturer = $request->manufacturer;
			$data->model = $request->model;
			$data->price = intval($request->price);
			$data->export_price = $request->export_price;
			$data->new_used = $request->new_used;
			$data->damage = $request->damage;
			$data->overall_length = $request->overall_length;
			$data->overall_width = $request->overall_width;
			$data->inner_length = $request->inner_length;
			$data->inner_width = $request->inner_width;
			$data->height = $request->height;
			$data->weight = $request->weight;
			$data->weight_capacity = $request->weight_capacity;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->fuel_type = $request->fuel_type;
			$data->color = $request->color;
			$data->feq = $features_eq;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->description = $request->description;
			$data->video = $request->video;
			$data->featured = 0;
			$data->suspend = 0;
			$data->user_id = Auth::user()->_id;
			$data->save();
		} elseif ($request->form_type == 'personal-watercraft') {

			if ($request->features_eq1) {
				$feq_additional_equipment = implode(",", $request->features_eq1);
			} else {
				$feq_additional_equipment = null;
			}
			if ($request->features_eq2) {
				$feq_electronics = implode(",", $request->features_eq2);
			} else {
				$feq_electronics = null;
			}
			if ($request->features_eq3) {
				$feq_other = implode(",", $request->features_eq3);
			} else {
				$feq_other = null;
			}
			$data = new Advertisement;
			$data->cat = 'cars';
			$data->form_type = $request->form_type;
			$data->sub_cat = $request->sub_cat ?: null;
			$data->title = $request->title;
			$data->watercraft_manufacturer = $request->watercraft_manufacturer;
			$data->model = $request->model;
			$data->seat_num = $request->seat_num;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->price = intval($request->price);
			$data->export_price = $request->export_price;
			$data->new_used = $request->new_used;
			$data->damage = $request->damage;
			$data->length = $request->length;
			$data->width = $request->width;
			$data->height = $request->height;
			$data->weight = $request->weight;
			$data->weight_capacity = $request->weight_capacity;
			$data->eng_capacity = $request->eng_capacity;
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->fuel_type = $request->fuel_type;
			$data->fuel_tank_capacity = $request->fuel_tank_capacity;
			$data->eng_type = $request->eng_type;
			$data->cylinder_num = $request->cylinder_num;
			$data->eng_make = $request->eng_make;
			$data->eng_model = $request->eng_model;
			$data->storage_capacity = $request->storage_capacity;
			$data->hull_mat = $request->hull_mat;
			$data->color = $request->color;
			$data->country = $request->country;
			$data->feq_additional_equipment = $feq_additional_equipment;
			$data->feq_electronics = $feq_electronics;
			$data->feq_other = $feq_other;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->description = $request->description;
			$data->video = $request->video;
			$data->featured = 0;
			$data->suspend = 0;
			$data->user_id = Auth::user()->_id;
			$data->save();
		} elseif ($request->form_type == 'kayaks-canoes') {

			if ($request->features_eq) {
				$features_eq = implode(",", $request->features_eq);
			} else {
				$features_eq = null;
			}
			$data = new Advertisement;
			$data->cat = 'cars';
			$data->form_type = $request->form_type;
			$data->sub_cat = $request->sub_cat ?: null;
			$data->title = $request->title;
			$data->kay_can = $request->kay_can;
			$data->kay_can_type = $request->kay_can_type;
			$data->manufacturer = $request->manufacturer;
			$data->model = $request->model;
			$data->price = intval($request->price);
			$data->export_price = $request->export_price;
			$data->seat_num = $request->seat_num;
			$data->new_used = $request->new_used;
			$data->damage = $request->damage;
			$data->hull_mat = $request->hull_mat;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->overall_length = $request->overall_length;
			$data->overall_width = $request->overall_width;
			$data->inner_length = $request->inner_length;
			$data->inner_width = $request->inner_width;
			$data->height = $request->height;
			$data->weight = $request->weight;
			$data->weight_capacity = $request->weight_capacity;
			$data->color = $request->color;
			$data->feq = $features_eq;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->description = $request->description;
			$data->video = $request->video;
			$data->featured = 0;
			$data->suspend = 0;
			$data->user_id = Auth::user()->_id;
			$data->save();
		} elseif ($request->form_type == 'motorboats') {

			if ($request->features_eq1) {
				$feq_additional_equipment = implode(",", $request->features_eq1);
			} else {
				$feq_additional_equipment = null;
			}
			if ($request->features_eq2) {
				$feq_audio_video_equipment = implode(",", $request->features_eq2);
			} else {
				$feq_audio_video_equipment = null;
			}
			if ($request->features_eq3) {
				$feq_electronics = implode(",", $request->features_eq3);
			} else {
				$feq_electronics = null;
			}
			if ($request->features_eq4) {
				$feq_other = implode(",", $request->features_eq4);
			} else {
				$feq_other = null;
			}

			$data = new Advertisement;
			$data->cat = 'cars';
			$data->form_type = $request->form_type;
			$data->sub_cat = $request->sub_cat ?: null;
			$data->title = $request->title;
			$data->motorboat_type = $request->motorboat_type;
			$data->boat_purpose = $request->boat_purpose;
			$data->manufacturer = $request->manufacturer;
			$data->model = $request->model;
			$data->price = intval($request->price);
			$data->export_price = $request->export_price;
			$data->manufature_yea = intval($request->manufature_year);
			$data->manufature_mont = intval($request->manufature_month);
			$data->new_used = $request->new_used;
			$data->damage = $request->damage;
			$data->fuel_type = $request->fuel_type;
			$data->overall_length = $request->overall_length;
			$data->draft = $request->draft;
			$data->beam = $request->beam;
			$data->hull_mat = $request->hull_mat;
			$data->color = $request->color;
			$data->eng_type = $request->eng_type;
			$data->eng_num = $request->eng_num;
			$data->eng_capacity = $request->eng_capacity;
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->eng_make = $request->eng_make;
			$data->eng_model = $request->eng_model;
			$data->fuel_tank_capacity = $request->fuel_tank_capacity;
			$data->frsh_water_capacity = $request->frsh_water_capacity;
			$data->hold_tank_capacity = $request->hold_tank_capacity;
			$data->passenger_num = $request->passenger_num;
			$data->berth_num = $request->berth_num;
			$data->cabin_num = $request->cabin_num;
			$data->shower_num = $request->shower_num;
			$data->tiolet_num = $request->tiolet_num;
			$data->light_displacement = $request->light_displacement;
			$data->weight = $request->weight;
			$data->batterie_type = $request->batterie_type;
			$data->batterie_capacity = $request->batterie_capacity;
			$data->country = $request->country;
			$data->feq_additional_equipment = $feq_additional_equipment;
			$data->feq_audio_video_equipment = $feq_audio_video_equipment;
			$data->feq_electronics = $feq_electronics;
			$data->feq_other = $feq_other;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->description = $request->description;
			$data->video = $request->video;
			$data->featured = 0;
			$data->suspend = 0;
			$data->user_id = Auth::user()->_id;
			$data->save();
		} elseif ($request->form_type == 'motors-and-engines') {

			if ($request->features_eq) {
				$features_eq = implode(",", $request->features_eq);
			} else {
				$features_eq = null;
			}
			$data = new Advertisement;
			$data->cat = 'cars';
			$data->form_type = $request->form_type;
			$data->sub_cat = $request->sub_cat ?: null;
			$data->title = $request->title;
			$data->eng_type = $request->eng_type;
			$data->price = intval($request->price);
			$data->export_price = $request->export_price;
			$data->eng_make = $request->eng_make;
			$data->eng_model = $request->eng_model;
			$data->eng_capacity = $request->eng_capacity;
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->fuel_type = $request->fuel_type;
			$data->new_used = $request->new_used;
			$data->cylinder_num = $request->cylinder_num;
			$data->revolution = $request->revolution;
			$data->start_system = $request->start_system;
			$data->leg_size = $request->leg_size;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->fuel_tank_capacity = $request->fuel_tank_capacity;
			$data->weight = $request->weight;
			$data->feq = $features_eq;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->description = $request->description;
			$data->video = $request->video;
			$data->featured = 0;
			$data->suspend = 0;
			$data->user_id = Auth::user()->_id;
			$data->save();
		} elseif ($request->form_type == 'water-transport-other') {

			if ($request->features_eq) {
				$features_eq = implode(",", $request->features_eq);
			} else {
				$features_eq = null;
			}
			$data = new Advertisement;
			$data->cat = 'cars';
			$data->form_type = $request->form_type;
			$data->sub_cat = $request->sub_cat ?: null;
			$data->title = $request->title;
			$data->product_name = $request->product_name;
			$data->price = intval($request->price);
			$data->export_price = $request->export_price;
			$data->manufacturer = $request->manufacturer;
			$data->model = $request->model;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->new_used = $request->new_used;
			$data->damage = $request->damage;
			$data->length = $request->length;
			$data->width = $request->width;
			$data->height = $request->height;
			$data->weight = $request->weight;
			$data->weight_capacity = $request->weight_capacity;
			$data->seat_num = $request->seat_num;
			$data->hull_mat = $request->hull_mat;
			$data->fuel_type = $request->fuel_type;
			$data->eng_capacity = $request->eng_capacity;
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->color = $request->color;
			$data->feq = $features_eq;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->description = $request->description;
			$data->video = $request->video;
			$data->featured = 0;
			$data->suspend = 0;
			$data->user_id = Auth::user()->_id;
			$data->save();
		} elseif ($request->form_type == 'sailboats') {

			if ($request->features_eq1) {
				$feq_additional_equipment = implode(",", $request->features_eq1);
			} else {
				$feq_additional_equipment = null;
			}
			if ($request->features_eq2) {
				$feq_audio_video_equipment = implode(",", $request->features_eq2);
			} else {
				$feq_audio_video_equipment = null;
			}
			if ($request->features_eq3) {
				$feq_electronics = implode(",", $request->features_eq3);
			} else {
				$feq_electronics = null;
			}
			if ($request->features_eq4) {
				$feq_other = implode(",", $request->features_eq4);
			} else {
				$feq_other = null;
			}
			$data = new Advertisement;
			$data->cat = 'cars';
			$data->form_type = $request->form_type;
			$data->sub_cat = $request->sub_cat ?: null;
			$data->title = $request->title;
			$data->manufacturer = $request->manufacturer;
			$data->model = $request->model;
			$data->manufature_yea = intval($request->manufature_year);
			$data->manufature_mont = intval($request->manufature_month);
			$data->sailboat_type = $request->sailboat_type;
			$data->price = intval($request->price);
			$data->export_price = $request->export_price;
			$data->new_used = $request->new_used;
			$data->damage = $request->damage;
			$data->overall_length = $request->overall_length;
			$data->length_unit = $request->length_unit;
			$data->draft = $request->draft;
			$data->beam = $request->beam;
			$data->beam_unit = $request->beam_unit;
			$data->hull_mat = $request->hull_mat;
			$data->color = $request->color;
			$data->rig_type = $request->rig_type;
			$data->sail_area = $request->sail_area;
			$data->cabin_num = $request->cabin_num;
			$data->berth_num = $request->berth_num;
			$data->str_wheel = $request->str_wheel;
			$data->fresh_water_capacity = $request->fresh_water_capacity;
			$data->hold_tank_capacity = $request->hold_tank_capacity;
			$data->fuel_tank_capacity = $request->fuel_tank_capacity;
			$data->fuel_type = $request->fuel_type;
			$data->eng_type = $request->eng_type;
			$data->eng_num = $request->eng_num;
			$data->eng_capacity = $request->eng_capacity;
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->eng_make = $request->eng_make;
			$data->eng_model = $request->eng_model;
			$data->light_displacement = $request->light_displacement;
			$data->weight = $request->weight;
			$data->shower_num = $request->shower_num;
			$data->tiolet_num = $request->tiolet_num;
			$data->batterie_type = $request->batterie_type;
			$data->batterie_capacity = $request->batterie_capacity;
			$data->country = $request->country;
			$data->feq_additional_equipment = $feq_additional_equipment;
			$data->feq_audio_video_equipment = $feq_audio_video_equipment;
			$data->feq_electronics = $feq_electronics;
			$data->feq_other = $feq_other;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->description = $request->description;
			$data->video = $request->video;
			$data->featured = 0;
			$data->suspend = 0;
			$data->user_id = Auth::user()->_id;
			$data->save();
		} elseif ($request->form_type == 'water-bikes') {

			if ($request->features_eq) {
				$features_eq = implode(",", $request->features_eq);
			} else {
				$features_eq = null;
			}
			$data = new Advertisement;
			$data->cat = 'cars';
			$data->form_type = $request->form_type;
			$data->sub_cat = $request->sub_cat ?: null;
			$data->title = $request->title;
			$data->manufacturer = $request->manufacturer;
			$data->model = $request->model;
			$data->seat_num = $request->seat_num;
			$data->new_used = $request->new_used;
			$data->price = intval($request->price);
			$data->export_price = $request->export_price;
			$data->damage = $request->damage;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->length = $request->length;
			$data->width = $request->width;
			$data->height = $request->height;
			$data->weight = $request->weight;
			$data->weight_capacity = $request->weight_capacity;
			$data->hull_mat = $request->hull_mat;
			$data->color = $request->color;
			$data->feq = $features_eq;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->description = $request->description;
			$data->video = $request->video;
			$data->featured = 0;
			$data->suspend = 0;
			$data->user_id = Auth::user()->_id;
			$data->save();
		}
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


	public function updateCarPost(Request $request)
	{


		$images_arr = [];
		if ($request->hasFile('files')) {
			foreach ($request->file('files') as $key => $image) {
				$name = 'transport_alt_' . time() . $key . '.' . $image->getClientOriginalExtension();
				$image->move('carAdimages', $name);
				$images_arr[$key]['type'] = 'alt';
				$images_arr[$key]['image'] = $name;
			}
		}
		if ($request->hasFile('cover')) {
			$c = ImageModel::where('post_id', $request->post_id)->where('type', 'cover')->first();
			if ($c) {
				$cover = $c['image'];
				$c_thumb = 'ad_thumbnail/' . $cover;
				$c_alt = 'carAdimages/' . $cover;
				if (file_exists($c_thumb)) {
					unlink($c_thumb);
				}
				if (file_exists($c_alt)) {
					unlink($c_alt);
				}
				$c->delete();
			}
			$image = $request->file('cover');
			$image_name = 'transport_thumbnail_' . time() . '.' . $image->getClientOriginalExtension();
			$destinationPath = 'ad_thumbnail';
			$resize_image = Image::make($image->getRealPath());
			$resize_image->resize(250, 180, function ($constraint) {
				$constraint->aspectRatio();
			})->save($destinationPath . '/' . $image_name);

			$image->move('carAdimages', $image_name);
			$n = count($images_arr);
			$images_arr[$n]['type'] = 'cover';
			$images_arr[$n]['image'] = $image_name;
		}


		if ($request->cat == 'agricultural-implements') {
			if ($request->features_eq) {
				$features_eq = implode(",", $request->features_eq);
			}
			$data = Advertisement::where('_id', $request->post_id)->first();
			$data->title = $request->title;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->agri_imp_type = $request->agri_imp_type;
			$data->new_used = $request->new_used;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->ope_width = $request->ope_width;
			$data->make = $request->make;
			$data->model = $request->model;
			$data->frames = $request->frames;
			$data->price = intval($request->price);
			$data->export_price = $request->export_price;
			if ($request->features_eq) {
				$data->feq = $features_eq;
			}
			$data->description = $request->description;

			$data->video = $request->video;
			$data->save();
		} elseif ($request->cat == 'agricultural-machinery') {

			if ($request->features_eq1) {
				$feq_additional_equipment = implode(",", $request->features_eq1);
			}
			if ($request->features_eq2) {
				$feq_electronics = implode(",", $request->features_eq2);
			}
			if ($request->features_eq3) {
				$feq_interior = implode(",", $request->features_eq3);
			}
			if ($request->features_eq4) {
				$feq_safety = implode(",", $request->features_eq4);
			}
			if ($request->features_eq5) {
				$feq_other = implode(",", $request->features_eq5);
			}

			$data = Advertisement::where('_id', $request->post_id)->first();
			$data->title = $request->title;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->agri_mach_type = $request->agri_mach_type;
			$data->new_used = $request->new_used;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->ope_width = $request->ope_width;
			$data->make = $request->make;
			$data->model = $request->model;
			$data->work_hour = $request->work_hour;
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->price = intval($request->price);
			$data->export_price = $request->export_price;
			if ($request->features_eq1) {
				$data->feq_additional_equipment = $feq_additional_equipment;
			}
			if ($request->features_eq2) {
				$data->feq_electronics = $feq_electronics;
			}
			if ($request->features_eq3) {
				$data->feq_interior = $feq_interior;
			}
			if ($request->features_eq4) {
				$data->feq_safety = $feq_safety;
			}
			if ($request->features_eq5) {
				$data->feq_other = $feq_other;
			}
			$data->description = $request->description;

			$data->video = $request->video;
			$data->save();
		} elseif ($request->cat == 'forest-machinery') {

			if ($request->features_eq1) {
				$feq_additional_equipment = implode(",", $request->features_eq1);
			}
			if ($request->features_eq2) {
				$feq_electronics = implode(",", $request->features_eq2);
			}
			if ($request->features_eq3) {
				$feq_safety = implode(",", $request->features_eq3);
			}
			if ($request->features_eq4) {
				$feq_interior = implode(",", $request->features_eq4);
			}

			if ($request->features_eq5) {
				$feq_other = implode(",", $request->features_eq5);
			}

			$data = Advertisement::where('_id', $request->post_id)->first();
			$data->title = $request->title;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->address = $request->address;
			$data->forest_mach_type = $request->forest_mach_type;
			$data->new_used = $request->new_used;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->make = $request->make;
			$data->model = $request->model;
			$data->work_hour = $request->work_hour;
			$data->layout = $request->layout;
			$data->price = intval($request->price);
			$data->export_price = $request->export_price;
			$data->wheel_width = $request->wheel_width;
			$data->range = $request->range;
			$data->lifting_moment = $request->lifting_moment;

			if ($request->features_eq1) {
				$data->feq_additional_equipment = $feq_additional_equipment;
			}
			if ($request->features_eq2) {
				$data->feq_electronics = $feq_electronics;
			}
			if ($request->features_eq3) {
				$data->feq_safety = $feq_safety;
			}
			if ($request->features_eq4) {
				$data->feq_interior = $feq_interior;
			}
			if ($request->features_eq5) {
				$data->feq_other = $feq_other;
			}
			$data->description = $request->description;

			$data->video = $request->video;
			$data->save();
		} elseif ($request->cat == 'used-cars') {

			if ($request->features_eq1) {
				$feq_security = implode(",", $request->features_eq1);
			}
			if ($request->features_eq2) {
				$feq_audio_video_equipment = implode(",", $request->features_eq2);
			}
			if ($request->features_eq3) {
				$feq_exterior = implode(",", $request->features_eq3);
			}
			if ($request->features_eq4) {
				$feq_electronics = implode(",", $request->features_eq4);
			}
			if ($request->features_eq5) {
				$feq_interior = implode(",", $request->features_eq5);
			}
			if ($request->features_eq6) {
				$feq_safety = implode(",", $request->features_eq6);
			}
			if ($request->features_eq7) {
				$feq_tuning_improvements = implode(",", $request->features_eq7);
			}
			if ($request->features_eq8) {
				$feq_other_features = implode(",", $request->features_eq8);
			}
			if ($request->features_eq9) {
				$feq_minivan_features = implode(",", $request->features_eq9);
			}

			$data = Advertisement::where('_id', $request->post_id)->first();
			$data->title = $request->title;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->make = $request->make;
			$data->model = $request->model;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->body_type = $request->body_type;
			$data->fuel_type = $request->fuel_type;
			$data->gear_box = $request->gear_box;
			$data->doors_number = $request->doors_number;
			$data->damage = $request->damage;
			$data->str_wheel = $request->str_wheel;
			$data->color = $request->color;
			$data->price = intval($request->price);
			$data->engn_capacity = $request->engn_capacity;
			$data->powerNumber = $request->powerNumber;
			$data->power_unit = $request->power_unit;
			$data->vin_number = $request->vin_number;
			$data->mileage = $request->mileage;
			$data->mileage_unit = $request->mileage_unit;
			$data->seat_number = $request->seat_number;
			$data->drivel_wheel = $request->drivel_wheel;
			$data->wheel_size = $request->wheel_size;
			$data->export_price = $request->export_price;
			$data->climate_contrl = $request->climate_contrl;
			$data->fuel_consumption_Urban = $request->fuel_consumption_Urban;
			$data->fuel_consumption_extra_urban = $request->fuel_consumption_extra_urban;
			$data->fuel_consumption_combined = $request->fuel_consumption_combined;
			$data->euro_stndard = $request->euro_stndard;
			$data->mot_exp_date = $request->mot_exp_date;
			$data->mot_exp_mnth = $request->mot_exp_mnth;
			$data->country = $request->country;

			if ($request->features_eq1) {
				$data->feq_security = $feq_security;
			}
			if ($request->features_eq2) {
				$data->feq_audio_video_equipment = $feq_audio_video_equipment;
			}
			if ($request->features_eq3) {
				$data->feq_exterior = $feq_exterior;
			}
			if ($request->features_eq4) {
				$data->feq_electronics = $feq_electronics;
			}
			if ($request->features_eq5) {
				$data->feq_interior = $feq_interior;
			}
			if ($request->features_eq6) {
				$data->feq_safety = $feq_safety;
			}
			if ($request->features_eq7) {
				$data->feq_tuning_improvements = $feq_tuning_improvements;
			}
			if ($request->features_eq8) {
				$data->feq_other_features = $feq_other_features;
			}
			if ($request->features_eq9) {
				$data->feq_minivan_features = $feq_minivan_features;
			}
			$data->description = $request->description;

			$data->video = $request->video;
			$data->save();
		} elseif ($request->cat == 'construction-and-road-construction-equipment') {

			if ($request->features_eq1) {
				$feq_electronics = implode(",", $request->features_eq1);
			}
			if ($request->features_eq2) {
				$feq_kabina = implode(",", $request->features_eq2);
			}
			if ($request->features_eq3) {
				$feq_additional_equipment = implode(",", $request->features_eq3);
			}
			if ($request->features_eq4) {
				$feq_safety = implode(",", $request->features_eq4);
			}
			if ($request->features_eq5) {
				$feq_other = implode(",", $request->features_eq5);
			}
			$data = Advertisement::where('_id', $request->post_id)->first();
			$data->title = $request->title;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->road_const_type = $request->road_const_type;
			$data->new_used = $request->new_used;
			$data->work_hour = $request->work_hour;
			$data->volume = $request->volume;
			$data->make = $request->make;
			$data->model = $request->model;
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->trans_type = $request->trans_type;
			$data->price = intval($request->price);
			$data->vat = $request->vat;
			$data->kerb_weight = $request->kerb_weight;
			$data->gross_weight = $request->gross_weight;
			$data->export_price = $request->export_price;
			$data->lifting_height = $request->lifting_height;
			$data->boom_length = $request->boom_length;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->damage = $request->damage;
			$data->lifting_capacity = $request->lifting_capacity;
			$data->digging_depth = $request->digging_depth;
			$data->layout = $request->layout;
			$data->euro_std = $request->euro_std;
			$data->str_wheel = $request->str_wheel;
			$data->vin_num = $request->vin_num;
			$data->color = $request->color;
			if ($request->features_eq1) {
				$data->feq_electronics = $feq_electronics;
			}
			if ($request->features_eq2) {
				$data->feq_kabina = $feq_kabina;
			}
			if ($request->features_eq3) {
				$data->feq_additional_equipment = $feq_additional_equipment;
			}
			if ($request->features_eq4) {
				$data->feq_safety = $feq_safety;
			}
			if ($request->features_eq5) {
				$data->feq_other = $feq_other;
			}
			$data->description = $request->description;

			$data->video = $request->video;
			$data->save();
		} elseif ($request->cat == 'construction-machinery-accessories') {

			if ($request->features_eq) {
				$features_eq = implode(",", $request->features_eq);
			}
			$data = Advertisement::where('_id', $request->post_id)->first();
			$data->title = $request->title;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->const_mach_type = $request->const_mach_type;
			$data->new_used = $request->new_used;
			$data->make = $request->make;
			$data->model = $request->model;
			$data->price = intval($request->price);
			$data->vat = $request->vat;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->volume = $request->volume;
			$data->weight = $request->weight;
			$data->length = $request->length;
			$data->width = $request->width;
			if ($request->features_eq) {
				$data->feq = $features_eq;
			}
			$data->description = $request->description;

			$data->video = $request->video;
			$data->save();
		} elseif ($request->cat == 'municipal-machinery') {

			if ($request->features_eq1) {
				$feq_electronics = implode(",", $request->features_eq1);
			}
			if ($request->features_eq2) {
				$feq_kabina = implode(",", $request->features_eq2);
			}
			if ($request->features_eq3) {
				$feq_additional_equipment = implode(",", $request->features_eq3);
			}
			if ($request->features_eq4) {
				$feq_safety = implode(",", $request->features_eq4);
			}

			if ($request->features_eq5) {
				$feq_other = implode(",", $request->features_eq5);
			}

			$data = Advertisement::where('_id', $request->post_id)->first();
			$data->title = $request->title;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->muni_mach_type = $request->muni_mach_type;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->work_hour = $request->work_hour;
			$data->make = $request->make;
			$data->model = $request->model;
			$data->kerb_weight = $request->kerb_weight;
			$data->gross_weight = $request->gross_weight;
			$data->price = intval($request->price);
			$data->vat = $request->vat;
			$data->export_price = $request->export_price;
			$data->layout = $request->layout;
			$data->damage = $request->damage;
			$data->new_used = $request->new_used;
			$data->fuel_type = $request->fuel_type;
			$data->gear_box = $request->gear_box;
			$data->volume = $request->volume;
			$data->lifting_capacity = $request->lifting_capacity;
			$data->euro_stndard = $request->euro_stndard;
			$data->color = $request->color;
			$data->str_wheel = $request->str_wheel;
			$data->vin_num = $request->vin_num;
			if ($request->features_eq1) {
				$data->feq_electronics = $feq_electronics;
			}
			if ($request->features_eq2) {
				$data->feq_kabina = $feq_kabina;
			}
			if ($request->features_eq3) {
				$data->feq_additional_equipment = $feq_additional_equipment;
			}
			if ($request->features_eq4) {
				$data->feq_safety = $feq_safety;
			}
			if ($request->features_eq5) {
				$data->feq_other = $feq_other;
			}
			$data->description = $request->description;

			$data->video = $request->video;
			$data->save();
		} elseif ($request->cat == 'storage-and-loading-equipment') {

			if ($request->features_eq1) {
				$feq_kabina = implode(",", $request->features_eq1);
			}
			if ($request->features_eq2) {
				$feq_additional_equipment = implode(",", $request->features_eq2);
			}
			if ($request->features_eq3) {
				$feq_safety = implode(",", $request->features_eq3);
			}
			if ($request->features_eq4) {
				$feq_other = implode(",", $request->features_eq4);
			}

			$data = Advertisement::where('_id', $request->post_id)->first();
			$data->title = $request->title;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->storage_type = $request->storage_type;
			$data->make = $request->make;
			$data->model = $request->model;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->price = intval($request->price);
			$data->vat = $request->vat;
			$data->export_price = $request->export_price;
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->damage = $request->damage;
			$data->new_used = $request->new_used;
			$data->boom_type = $request->boom_type;
			$data->lifting_height = $request->lifting_height;
			$data->fuel_type = $request->fuel_type;
			$data->trans_type = $request->trans_type;
			$data->struc_height = $request->struc_height;
			$data->fr_lift_height = $request->fr_lift_height;
			$data->kerb_weight = $request->kerb_weight;
			$data->work_hour = $request->work_hour;
			$data->fork_length = $request->fork_length;
			$data->lifting_capacity = $request->lifting_capacity;
			$data->length = $request->length;
			$data->height = $request->height;
			$data->width = $request->width;
			$data->color = $request->color;
			$data->vin_num = $request->vin_num;
			if ($request->features_eq1) {
				$data->feq_kabina = $feq_kabina;
			}
			if ($request->features_eq2) {
				$data->feq_additional_equipment = $feq_additional_equipment;
			}
			if ($request->features_eq3) {
				$data->feq_safety = $feq_safety;
			}
			if ($request->features_eq4) {
				$data->feq_other = $feq_other;
			}
			$data->description = $request->description;

			$data->video = $request->video;
			$data->save();
		} elseif ($request->cat == 'minivans-minibus') {

			if ($request->features_eq1) {
				$feq_security = implode(",", $request->features_eq1);
			}
			if ($request->features_eq2) {
				$feq_audio_video_equipment = implode(",", $request->features_eq2);
			}
			if ($request->features_eq3) {
				$feq_exterior = implode(",", $request->features_eq3);
			}
			if ($request->features_eq4) {
				$feq_electronics = implode(",", $request->features_eq4);
			}
			if ($request->features_eq5) {
				$feq_interior = implode(",", $request->features_eq5);
			}
			if ($request->features_eq6) {
				$feq_safety = implode(",", $request->features_eq6);
			}
			if ($request->features_eq7) {
				$feq_other = implode(",", $request->features_eq7);
			}

			$data = Advertisement::where('_id', $request->post_id)->first();
			$data->title = $request->title;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->make = $request->make;
			$data->model = $request->model;
			$data->eng_capacity = $request->eng_capacity;
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->minivan_type = $request->minivan_type;
			$data->price = intval($request->price);
			$data->vat = $request->vat;
			$data->export_price = $request->export_price;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->fuel_type = $request->fuel_type;
			$data->str_wheel = $request->str_wheel;
			$data->damage = $request->damage;
			$data->seat_number = $request->seat_number;
			$data->gear_box = $request->gear_box;
			$data->gross_weight = $request->gross_weight;
			$data->kerb_weight = $request->kerb_weight;
			$data->new_used = $request->new_used;
			$data->drivel_wheel = $request->drivel_wheel;
			$data->fuel_tank_capacity = $request->fuel_tank_capacity;
			$data->mot_exp_date = $request->mot_exp_date;
			$data->mot_exp_mnth = $request->mot_exp_mnth;
			$data->minibus_length = $request->minibus_length;
			$data->minibus_height = $request->minibus_height;
			$data->mileage = $request->mileage;
			$data->mileage_unit = $request->mileage_unit;
			$data->vin_num = $request->vin_num;
			$data->climate_contrl = $request->climate_contrl;
			$data->euro_stndard = $request->euro_stndard;
			$data->color = $request->color;
			$data->country = $request->country;
			if ($request->features_eq1) {
				$data->feq_security = $feq_security;
			}
			if ($request->features_eq2) {
				$data->feq_audio_video_equipment = $feq_audio_video_equipment;
			}
			if ($request->features_eq3) {
				$data->feq_exterior = $feq_exterior;
			}
			if ($request->features_eq4) {
				$data->feq_electronics = $feq_electronics;
			}
			if ($request->features_eq5) {
				$data->feq_interior = $feq_interior;
			}
			if ($request->features_eq6) {
				$data->feq_safety = $feq_safety;
			}
			if ($request->features_eq7) {
				$data->feq_other = $feq_other;
			}
			$data->description = $request->description;

			$data->video = $request->video;
			$data->save();
		} elseif ($request->cat == 'autotrains') {

			if ($request->features_eq1) {
				$feq_security = implode(",", $request->features_eq1);
			}
			if ($request->features_eq2) {
				$feq_audio_video_equipment = implode(",", $request->features_eq2);
			}
			if ($request->features_eq3) {
				$feq_exterior = implode(",", $request->features_eq3);
			}
			if ($request->features_eq4) {
				$feq_electronics = implode(",", $request->features_eq4);
			}
			if ($request->features_eq5) {
				$feq_interior = implode(",", $request->features_eq5);
			}
			if ($request->features_eq6) {
				$feq_safety = implode(",", $request->features_eq6);
			}
			if ($request->features_eq7) {
				$feq_other = implode(",", $request->features_eq7);
			}

			$data = Advertisement::where('_id', $request->post_id)->first();
			$data->title = $request->title;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->train_type = $request->train_type;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->gross_weight = $request->gross_weight;
			$data->kerb_weight = $request->kerb_weight;
			$data->make = $request->make;
			$data->model = $request->model;
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->mileage = $request->mileage;
			$data->mileage_unit = $request->mileage_unit;
			$data->price = intval($request->price);
			$data->vat = $request->vat;
			$data->length = $request->length;
			$data->width = $request->width;
			$data->fuel_type = $request->fuel_type;
			$data->color = $request->color;
			$data->height = $request->height;
			$data->volume = $request->volume;
			$data->layout = $request->layout;
			$data->euro_stndard = $request->euro_stndard;
			$data->lift_capacity = $request->lift_capacity;
			$data->fuel_tank_capacity = $request->fuel_tank_capacity;
			$data->damage = $request->damage;
			$data->new_used = $request->new_used;
			$data->front_suspension = $request->front_suspension;
			$data->rear_suspension = $request->rear_suspension;
			$data->mot_exp_date = $request->mot_exp_date;
			$data->mot_exp_mnth = $request->mot_exp_mnth;
			$data->str_wheel = $request->str_wheel;
			$data->gear_box = $request->gear_box;
			$data->sleep_bed = $request->sleep_bed;
			$data->vin_num = $request->vin_num;
			if ($request->features_eq1) {
				$data->feq_security = $feq_security;
			}
			if ($request->features_eq2) {
				$data->feq_audio_video_equipment = $feq_audio_video_equipment;
			}
			if ($request->features_eq3) {
				$data->feq_exterior = $feq_exterior;
			}
			if ($request->features_eq4) {
				$data->feq_electronics = $feq_electronics;
			}
			if ($request->features_eq5) {
				$data->feq_interior = $feq_interior;
			}
			if ($request->features_eq6) {
				$data->feq_safety = $feq_safety;
			}
			if ($request->features_eq7) {
				$data->feq_other = $feq_other;
			}
			$data->description = $request->description;

			$data->video = $request->video;
			$data->save();
		} elseif ($request->cat == 'semi-trailer-trucks') {

			if ($request->features_eq1) {
				$feq_security = implode(",", $request->features_eq1);
			}
			if ($request->features_eq2) {
				$feq_audio_video_equipment = implode(",", $request->features_eq2);
			}
			if ($request->features_eq3) {
				$feq_exterior = implode(",", $request->features_eq3);
			}
			if ($request->features_eq4) {
				$feq_electronics = implode(",", $request->features_eq4);
			}
			if ($request->features_eq5) {
				$feq_interior = implode(",", $request->features_eq5);
			}
			if ($request->features_eq6) {
				$feq_safety = implode(",", $request->features_eq6);
			}
			if ($request->features_eq7) {
				$feq_other = implode(",", $request->features_eq7);
			}

			$data = Advertisement::where('_id', $request->post_id)->first();
			$data->title = $request->title;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->make = $request->make;
			$data->model = $request->model;
			$data->kerb_weight = $request->kerb_weight;
			$data->gross_weight = $request->gross_weight;
			$data->price = intval($request->price);
			$data->vat = $request->vat;
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->mileage = $request->mileage;
			$data->mileage_unit = $request->mileage_unit;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->sleep_bed = $request->sleep_bed;
			$data->front_suspension = $request->front_suspension;
			$data->rear_suspension = $request->rear_suspension;
			$data->new_used = $request->new_used;
			$data->damage = $request->damage;
			$data->mot_exp_date = $request->mot_exp_date;
			$data->mot_exp_mnth = $request->mot_exp_mnth;
			$data->fuel_tank_capacity = $request->fuel_tank_capacity;
			$data->euro_stndard = $request->euro_stndard;
			$data->layout = $request->layout;
			$data->gear_box = $request->gear_box;
			$data->color = $request->color;
			$data->str_wheel = $request->str_wheel;
			$data->vin_num = $request->vin_num;
			$data->semi_trailer_type = $request->semi_trailer_type;
			$data->semi_trailer_manufacturer = $request->semi_trailer_manufacturer;
			$data->semi_trailer_model = $request->semi_trailer_model;
			$data->semi_trailer_suspension = $request->semi_trailer_suspension;
			$data->semi_manufature_year = $request->semi_manufature_year;
			$data->semi_manufature_month = $request->semi_manufature_month;
			$data->semi_mot_exp_date = $request->semi_mot_exp_date;
			$data->mot_exp_mnth = $request->mot_exp_mnth;
			$data->semi_gross_weight = $request->semi_gross_weight;
			$data->semi_kerb_weight = $request->semi_kerb_weight;
			$data->semi_length = $request->semi_length;
			$data->semi_width = $request->semi_width;
			$data->semi_height = $request->semi_height;
			$data->semi_capacity = $request->semi_capacity;
			$data->alx_make = $request->alx_make;
			$data->semi_axl_num = $request->semi_axl_num;
			$data->semi_damage = $request->semi_damage;
			$data->semi_color = $request->semi_color;
			$data->semi_new_used = $request->semi_new_used;
			$data->semi_vin_num = $request->semi_vin_num;
			if ($request->features_eq1) {
				$data->feq_security = $feq_security;
			}
			if ($request->features_eq2) {
				$data->feq_audio_video_equipment = $feq_audio_video_equipment;
			}
			if ($request->features_eq3) {
				$data->feq_exterior = $feq_exterior;
			}
			if ($request->features_eq4) {
				$data->feq_electronics = $feq_electronics;
			}
			if ($request->features_eq5) {
				$data->feq_interior = $feq_interior;
			}
			if ($request->features_eq6) {
				$data->feq_safety = $feq_safety;
			}
			if ($request->features_eq7) {
				$data->feq_other = $feq_other;
			}
			$data->description = $request->description;

			$data->video = $request->video;
			$data->save();
		} elseif ($request->cat == 'trucks') {

			if ($request->features_eq1) {
				$feq_security = implode(",", $request->features_eq1);
			}
			if ($request->features_eq2) {
				$feq_audio_video_equipment = implode(",", $request->features_eq2);
			}
			if ($request->features_eq3) {
				$feq_exterior = implode(",", $request->features_eq3);
			}
			if ($request->features_eq4) {
				$feq_electronics = implode(",", $request->features_eq4);
			}
			if ($request->features_eq5) {
				$feq_interior = implode(",", $request->features_eq5);
			}
			if ($request->features_eq6) {
				$feq_safety = implode(",", $request->features_eq6);
			}
			if ($request->features_eq7) {
				$feq_other = implode(",", $request->features_eq7);
			}

			$data = Advertisement::where('_id', $request->post_id)->first();
			$data->title = $request->title;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->truck_type = $request->truck_type;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->gross_weight = $request->gross_weight;
			$data->kerb_weight = $request->kerb_weight;
			$data->make = $request->make;
			$data->model = $request->model;
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->mileage = $request->mileage;
			$data->mileage_unit = $request->mileage_unit;
			$data->price = intval($request->price);
			$data->vat = $request->vat;
			$data->length = $request->length;
			$data->width = $request->width;
			$data->fuel_type = $request->fuel_type;
			$data->color = $request->color;
			$data->height = $request->height;
			$data->volume = $request->volume;
			$data->layout = $request->layout;
			$data->euro_stndard = $request->euro_stndard;
			$data->lift_capacity = $request->lift_capacity;
			$data->fuel_tank_capacity = $request->fuel_tank_capacity;
			$data->damage = $request->damage;
			$data->new_used = $request->new_used;
			$data->front_suspension = $request->front_suspension;
			$data->rear_suspension = $request->rear_suspension;
			$data->mot_exp_date = $request->mot_exp_date;
			$data->mot_exp_mnth = $request->mot_exp_mnth;
			$data->str_wheel = $request->str_wheel;
			$data->gear_box = $request->gear_box;
			$data->sleep_bed = $request->sleep_bed;
			$data->vin_num = $request->vin_num;
			if ($request->features_eq1) {
				$data->feq_security = $feq_security;
			}
			if ($request->features_eq2) {
				$data->feq_audio_video_equipment = $feq_audio_video_equipment;
			}
			if ($request->features_eq3) {
				$data->feq_exterior = $feq_exterior;
			}
			if ($request->features_eq4) {
				$data->feq_electronics = $feq_electronics;
			}
			if ($request->features_eq5) {
				$data->feq_interior = $feq_interior;
			}
			if ($request->features_eq6) {
				$data->feq_safety = $feq_safety;
			}
			if ($request->features_eq7) {
				$data->feq_other = $feq_other;
			}
			$data->description = $request->description;

			$data->video = $request->video;
			$data->save();
		} elseif ($request->cat == 'motorcycles') {

			if ($request->features_eq1) {
				$feq_security = implode(",", $request->features_eq1);
			}
			if ($request->features_eq2) {
				$feq_audio_video_equipment = implode(",", $request->features_eq2);
			}
			if ($request->features_eq3) {
				$feq_exterior = implode(",", $request->features_eq3);
			}
			if ($request->features_eq4) {
				$feq_electronics = implode(",", $request->features_eq4);
			}
			if ($request->features_eq5) {
				$feq_interior = implode(",", $request->features_eq5);
			}
			if ($request->features_eq6) {
				$feq_safety = implode(",", $request->features_eq6);
			}
			if ($request->features_eq7) {
				$feq_other = implode(",", $request->features_eq7);
			}

			$data = Advertisement::where('_id', $request->post_id)->first();
			$data->title = $request->title;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->make = $request->make;
			$data->model = $request->model;
			$data->eng_capacity = $request->eng_capacity;
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->price = intval($request->price);
			$data->export_price = $request->export_price;
			$data->motorcycle_type = $request->motorcycle_type;
			$data->cooling_type = $request->cooling_type;
			$data->mileage = $request->mileage;
			$data->mileage_unit = $request->mileage_unit;
			$data->fuel_type = $request->fuel_type;
			$data->damage = $request->damage;
			$data->new_used = $request->new_used;
			$data->mot_exp_date = $request->mot_exp_date;
			$data->mot_exp_mnth = $request->mot_exp_mnth;
			$data->kerb_weight = $request->kerb_weight;
			$data->gear_box = $request->gear_box;
			$data->engine_type = $request->engine_type;
			$data->color = $request->color;
			$data->reg_type = $request->reg_type;
			$data->euro_stndard = $request->euro_stndard;
			$data->country = $request->country;
			if ($request->features_eq1) {
				$data->feq_security = $feq_security;
			}
			if ($request->features_eq2) {
				$data->feq_audio_video_equipment = $feq_audio_video_equipment;
			}
			if ($request->features_eq3) {
				$data->feq_exterior = $feq_exterior;
			}
			if ($request->features_eq4) {
				$data->feq_electronics = $feq_electronics;
			}
			if ($request->features_eq5) {
				$data->feq_interior = $feq_interior;
			}
			if ($request->features_eq6) {
				$data->feq_safety = $feq_safety;
			}
			if ($request->features_eq7) {
				$data->feq_other = $feq_other;
			}
			$data->description = $request->description;

			$data->video = $request->video;
			$data->save();
		} elseif ($request->cat == 'trailers-and-semitrailers') {

			if ($request->features_eq1) {
				$feq_trim_level = implode(",", $request->features_eq1);
			}
			if ($request->features_eq2) {
				$feq_additional_equipment = implode(",", $request->features_eq2);
			}
			if ($request->features_eq3) {
				$feq_other = implode(",", $request->features_eq3);
			}

			$data = Advertisement::where('_id', $request->post_id)->first();
			$data->title = $request->title;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->traile = $request->trailer;
			$data->trailer_typ = $request->trailer_type;
			$data->gross_weigh = $request->gross_weight;
			$data->curb_weigh = $request->curb_weight;
			$data->manufature_yea = $request->manufature_year;
			$data->manufature_mont = $request->manufature_month;
			$data->mak = $request->make;
			$data->mode = $request->model;
			$data->suspensio = $request->suspension;
			$data->price = intval($request->price);
			$data->va = $request->vat;
			$data->lengt = $request->length;
			$data->widt = $request->width;
			$data->alx_mak = $request->alx_make;
			$data->semi_axl_nu = $request->semi_axl_num;
			$data->heigh = $request->height;
			$data->volum = $request->volume;
			$data->damag = $request->damage;
			$data->new_use = $request->new_used;
			$data->colo = $request->color;
			$data->mot_exp_dat = $request->mot_exp_date;
			$data->mot_exp_mnt = $request->mot_exp_mnth;
			$data->vin_nu = $request->vin_num;
			if ($request->features_eq1) {
				$data->feq_trim_leve = $feq_trim_level;
			}
			if ($request->features_eq2) {
				$data->feq_additional_equipmen = $feq_additional_equipment;
			}
			if ($request->features_eq3) {
				$data->feq_othe = $feq_other;
			}
			$data->descriptio = $request->description;

			$data->vide = $request->video;
			$data->save();
		} elseif ($request->cat == 'buses') {

			if ($request->features_eq1) {
				$feq_security = implode(",", $request->features_eq1);
			}
			if ($request->features_eq2) {
				$feq_audio_video_equipment = implode(",", $request->features_eq2);
			}
			if ($request->features_eq3) {
				$feq_exterior = implode(",", $request->features_eq3);
			}
			if ($request->features_eq4) {
				$feq_electronics = implode(",", $request->features_eq4);
			}
			if ($request->features_eq5) {
				$feq_interior = implode(",", $request->features_eq5);
			}
			if ($request->features_eq6) {
				$feq_safety = implode(",", $request->features_eq6);
			}
			if ($request->features_eq7) {
				$feq_other = implode(",", $request->features_eq7);
			}

			$data = Advertisement::where('_id', $request->post_id)->first();
			$data->title = $request->title;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->bus_type = $request->bus_type;
			$data->seat_num = $request->seat_num;
			$data->eng_capacity = $request->eng_capacity;
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->make = $request->make;
			$data->model = $request->model;
			$data->damage = $request->damage;
			$data->mileage = $request->mileage;
			$data->mileage_unit = $request->mileage_unit;
			$data->price = intval($request->price);
			$data->vat = $request->vat;
			$data->gross_weight = $request->gross_weight;
			$data->kerb_weight = $request->kerb_weight;
			$data->export_price = $request->export_price;
			$data->fuel_type = $request->fuel_type;
			$data->gear_box = $request->gear_box;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->new_used = $request->new_used;
			$data->climate_contrl = $request->climate_contrl;
			$data->doors_number = $request->doors_number;
			$data->length = $request->length;
			$data->width = $request->width;
			$data->str_wheel = $request->str_wheel;
			$data->vin_num = $request->vin_num;
			$data->euro_stndard = $request->euro_stndard;
			$data->fuel_tank_capacity = $request->fuel_tank_capacity;
			$data->mot_exp_date = $request->mot_exp_date;
			$data->mot_exp_mnth = $request->mot_exp_mnth;
			$data->country = $request->country;
			$data->color = $request->color;
			if ($request->features_eq1) {
				$data->feq_security = $feq_security;
			}
			if ($request->features_eq2) {
				$data->feq_audio_video_equipment = $feq_audio_video_equipment;
			}
			if ($request->features_eq3) {
				$data->feq_exterior = $feq_exterior;
			}
			if ($request->features_eq4) {
				$data->feq_electronics = $feq_electronics;
			}
			if ($request->features_eq5) {
				$data->feq_interior = $feq_interior;
			}
			if ($request->features_eq6) {
				$data->feq_safety = $feq_safety;
			}
			if ($request->features_eq7) {
				$data->feq_other = $feq_other;
			}
			$data->description = $request->description;

			$data->video = $request->video;
			$data->save();
		} elseif ($request->cat == 'recreational-vehicles-campers') {

			if ($request->features_eq1) {
				$feq_security = implode(",", $request->features_eq1);
			}
			if ($request->features_eq2) {
				$feq_audio_video_equipment = implode(",", $request->features_eq2);
			}
			if ($request->features_eq3) {
				$feq_exterior = implode(",", $request->features_eq3);
			}
			if ($request->features_eq4) {
				$feq_electronics = implode(",", $request->features_eq4);
			}
			if ($request->features_eq5) {
				$feq_interior = implode(",", $request->features_eq5);
			}
			if ($request->features_eq6) {
				$feq_safety = implode(",", $request->features_eq6);
			}
			if ($request->features_eq7) {
				$feq_other = implode(",", $request->features_eq7);
			}

			$data = Advertisement::where('_id', $request->post_id)->first();
			$data->title = $request->title;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->campare_type = $request->campare_type;
			$data->eng_capacity = $request->eng_capacity;
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->make = $request->make;
			$data->model = $request->model;
			$data->bed_num = $request->bed_num;
			$data->seat_num = $request->seat_num;
			$data->price = intval($request->price);
			$data->vat = $request->vat;
			$data->gross_weight = $request->gross_weight;
			$data->kerb_weight = $request->kerb_weight;
			$data->export_price = $request->export_price;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->fuel_tank_capacity = $request->fuel_tank_capacity;
			$data->water_tank_capacity = $request->water_tank_capacity;
			$data->damage = $request->damage;
			$data->new_used = $request->new_used;
			$data->septic_tank = $request->septic_tank;
			$data->mileage = $request->mileage;
			$data->mileage_unit = $request->mileage_unit;
			$data->gear_box = $request->gear_box;
			$data->fuel_type = $request->fuel_type;
			$data->str_wheel = $request->str_wheel;
			$data->drivel_wheel = $request->drivel_wheel;
			$data->length = $request->length;
			$data->width = $request->width;
			$data->climate_contrl = $request->climate_contrl;
			$data->color = $request->color;
			$data->euro_stndard = $request->euro_stndard;
			$data->mot_exp_date = $request->mot_exp_date;
			$data->mot_exp_mnth = $request->mot_exp_mnth;
			$data->country = $request->country;
			$data->vin_num = $request->vin_num;
			if ($request->features_eq1) {
				$data->feq_security = $feq_security;
			}
			if ($request->features_eq2) {
				$data->feq_audio_video_equipment = $feq_audio_video_equipment;
			}
			if ($request->features_eq3) {
				$data->feq_exterior = $feq_exterior;
			}
			if ($request->features_eq4) {
				$data->feq_electronics = $feq_electronics;
			}
			if ($request->features_eq5) {
				$data->feq_interior = $feq_interior;
			}
			if ($request->features_eq6) {
				$data->feq_safety = $feq_safety;
			}
			if ($request->features_eq7) {
				$data->feq_other = $feq_other;
			}
			$data->description = $request->description;

			$data->video = $request->video;
			$data->save();
		} elseif ($request->cat == 'minibus') {

			if ($request->features_eq1) {
				$feq_security = implode(",", $request->features_eq1);
			}
			if ($request->features_eq2) {
				$feq_audio_video_equipment = implode(",", $request->features_eq2);
			}
			if ($request->features_eq3) {
				$feq_exterior = implode(",", $request->features_eq3);
			}
			if ($request->features_eq4) {
				$feq_electronics = implode(",", $request->features_eq4);
			}
			if ($request->features_eq5) {
				$feq_interior = implode(",", $request->features_eq5);
			}
			if ($request->features_eq6) {
				$feq_safety = implode(",", $request->features_eq6);
			}
			if ($request->features_eq7) {
				$feq_other = implode(",", $request->features_eq7);
			}

			$data = Advertisement::where('_id', $request->post_id)->first();
			$data->title = $request->title;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->make = $request->make;
			$data->model = $request->model;
			$data->eng_capacity = $request->eng_capacity;
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->minivan_type = $request->minivan_type;
			$data->price = intval($request->price);
			$data->vat = $request->vat;
			$data->export_price = $request->export_price;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->fuel_type = $request->fuel_type;
			$data->str_wheel = $request->str_wheel;
			$data->damage = $request->damage;
			$data->seat_number = $request->seat_number;
			$data->gear_box = $request->gear_box;
			$data->gross_weight = $request->gross_weight;
			$data->kerb_weight = $request->kerb_weight;
			$data->new_used = $request->new_used;
			$data->drivel_wheel = $request->drivel_wheel;
			$data->fuel_tank_capacity = $request->fuel_tank_capacity;
			$data->mot_exp_date = $request->mot_exp_date;
			$data->mot_exp_mnth = $request->mot_exp_mnth;
			$data->minibus_length = $request->minibus_length;
			$data->minibus_height = $request->minibus_height;
			$data->mileage = $request->mileage;
			$data->mileage_unit = $request->mileage_unit;
			$data->vin_num = $request->vin_num;
			$data->climate_contrl = $request->climate_contrl;
			$data->euro_stndard = $request->euro_stndard;
			$data->color = $request->color;
			$data->country = $request->country;
			if ($request->features_eq1) {
				$data->feq_security = $feq_security;
			}
			if ($request->features_eq2) {
				$data->feq_audio_video_equipment = $feq_audio_video_equipment;
			}
			if ($request->features_eq3) {
				$data->feq_exterior = $feq_exterior;
			}
			if ($request->features_eq4) {
				$data->feq_electronics = $feq_electronics;
			}
			if ($request->features_eq5) {
				$data->feq_interior = $feq_interior;
			}
			if ($request->features_eq6) {
				$data->feq_safety = $feq_safety;
			}
			if ($request->features_eq7) {
				$data->feq_other = $feq_other;
			}
			$data->description = $request->description;

			$data->video = $request->video;
			$data->save();
		} elseif ($request->cat == 'passenger-vans') {


			if ($request->features_eq1) {
				$feq_security = implode(",", $request->features_eq1);
			} else {
				$feq_security = null;
			}
			if ($request->features_eq2) {
				$feq_audio_video_equipment = implode(",", $request->features_eq2);
			} else {
				$feq_audio_video_equipment = null;
			}
			if ($request->features_eq3) {
				$feq_exterior = implode(",", $request->features_eq3);
			} else {
				$feq_exterior = null;
			}
			if ($request->features_eq4) {
				$feq_electronics = implode(",", $request->features_eq4);
			} else {
				$feq_electronics = null;
			}
			if ($request->features_eq5) {
				$feq_interior = implode(",", $request->features_eq5);
			} else {
				$feq_interior = null;
			}
			if ($request->features_eq6) {
				$feq_safety = implode(",", $request->features_eq6);
			} else {
				$feq_safety = null;
			}
			if ($request->features_eq7) {
				$feq_tuning_improvements = implode(",", $request->features_eq7);
			} else {
				$feq_tuning_improvements = null;
			}
			if ($request->features_eq8) {
				$feq_other_features = implode(",", $request->features_eq8);
			} else {
				$feq_other_features = null;
			}
			if ($request->features_eq9) {
				$feq_minivan_features = implode(",", $request->features_eq9);
			} else {
				$feq_minivan_features = null;
			}

			$data = Advertisement::where('_id', $request->post_id)->first();
			$data->title = $request->title;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->make = $request->make;
			$data->model = $request->model;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->body_type = $request->body_type;
			$data->fuel_type = $request->fuel_type;
			$data->gear_box = $request->gear_box;
			$data->doors_number = $request->doors_number;
			$data->damage = $request->damage;
			$data->str_wheel = $request->str_wheel;
			$data->color = $request->color;
			$data->price = intval($request->price);
			$data->engn_capacity = $request->engn_capacity;
			$data->powerNumber = $request->powerNumber;
			$data->power_unit = $request->power_unit;
			$data->vin_number = $request->vin_number;
			$data->mileage = $request->mileage;
			$data->mileage_unit = $request->mileage_unit;
			$data->seat_number = $request->seat_number;
			$data->drivel_wheel = $request->drivel_wheel;
			$data->wheel_size = $request->wheel_size;
			$data->export_price = $request->export_price;
			$data->climate_contrl = $request->climate_contrl;
			$data->fuel_consumption_Urban = $request->fuel_consumption_Urban;
			$data->fuel_consumption_extra_urban = $request->fuel_consumption_extra_urban;
			$data->fuel_consumption_combined = $request->fuel_consumption_combined;
			$data->euro_stndard = $request->euro_stndard;
			$data->mot_exp_date = $request->mot_exp_date;
			$data->mot_exp_mnth = $request->mot_exp_mnth;
			$data->country = $request->country;
			if ($request->features_eq1) {
				$data->feq_security = $feq_security;
			}
			if ($request->features_eq2) {
				$data->feq_audio_video_equipment = $feq_audio_video_equipment;
			}
			if ($request->features_eq3) {
				$data->feq_exterior = $feq_exterior;
			}
			if ($request->features_eq4) {
				$data->feq_electronics = $feq_electronics;
			}
			if ($request->features_eq5) {
				$data->feq_interior = $feq_interior;
			}
			if ($request->features_eq6) {
				$data->feq_safety = $feq_safety;
			}
			if ($request->features_eq7) {
				$data->feq_tuning_improvements = $feq_tuning_improvements;
			}
			if ($request->features_eq8) {
				$data->feq_other_features = $feq_other_features;
			}
			if ($request->features_eq9) {
				$data->feq_minivan_features = $feq_minivan_features;
			}
			$data->description = $request->description;

			$data->video = $request->video;
			$data->save();
		} elseif ($request->cat == 'boats-rafts') {

			if ($request->features_eq) {
				$features_eq = implode(",", $request->features_eq);
			}
			$data = Advertisement::where('_id', $request->post_id)->first();
			$data->title = $request->title;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->boat_raft_type = $request->boat_raft_type;
			$data->seat_num = $request->seat_num;
			$data->manufacturer = $request->manufacturer;
			$data->model = $request->model;
			$data->price = intval($request->price);
			$data->export_price = $request->export_price;
			$data->new_used = $request->new_used;
			$data->damage = $request->damage;
			$data->overall_length = $request->overall_length;
			$data->overall_width = $request->overall_width;
			$data->inner_length = $request->inner_length;
			$data->inner_width = $request->inner_width;
			$data->height = $request->height;
			$data->weight = $request->weight;
			$data->weight_capacity = $request->weight_capacity;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->fuel_type = $request->fuel_type;
			$data->color = $request->color;
			if ($request->features_eq) {
				$data->feq = $features_eq;
			}
			$data->description = $request->description;

			$data->video = $request->video;
			$data->save();
		} elseif ($request->cat == 'personal-watercraft') {

			if ($request->features_eq1) {
				$feq_additional_equipment = implode(",", $request->features_eq1);
			}
			if ($request->features_eq2) {
				$feq_electronics = implode(",", $request->features_eq2);
			}
			if ($request->features_eq3) {
				$feq_other = implode(",", $request->features_eq3);
			}

			$data = Advertisement::where('_id', $request->post_id)->first();
			$data->title = $request->title;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->watercraft_manufacturer = $request->watercraft_manufacturer;
			$data->model = $request->model;
			$data->seat_num = $request->seat_num;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->price = intval($request->price);
			$data->export_price = $request->export_price;
			$data->new_used = $request->new_used;
			$data->damage = $request->damage;
			$data->length = $request->length;
			$data->width = $request->width;
			$data->height = $request->height;
			$data->weight = $request->weight;
			$data->weight_capacity = $request->weight_capacity;
			$data->eng_capacity = $request->eng_capacity;
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->fuel_type = $request->fuel_type;
			$data->fuel_tank_capacity = $request->fuel_tank_capacity;
			$data->eng_type = $request->eng_type;
			$data->cylinder_num = $request->cylinder_num;
			$data->eng_make = $request->eng_make;
			$data->eng_model = $request->eng_model;
			$data->storage_capacity = $request->storage_capacity;
			$data->hull_mat = $request->hull_mat;
			$data->color = $request->color;
			$data->country = $request->country;
			if ($request->features_eq1) {
				$data->feq_additional_equipment = $feq_additional_equipment;
			}
			if ($request->features_eq2) {
				$data->feq_electronics = $feq_electronics;
			}
			if ($request->features_eq3) {
				$data->feq_other = $feq_other;
			}
			$data->description = $request->description;

			$data->video = $request->video;
			$data->save();
		} elseif ($request->cat == 'kayaks-canoes') {

			if ($request->features_eq) {
				$features_eq = implode(",", $request->features_eq);
			}
			$data = Advertisement::where('_id', $request->post_id)->first();
			$data->title = $request->title;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->kay_can = $request->kay_can;
			$data->kay_can_type = $request->kay_can_type;
			$data->manufacturer = $request->manufacturer;
			$data->model = $request->model;
			$data->price = intval($request->price);
			$data->export_price = $request->export_price;
			$data->seat_num = $request->seat_num;
			$data->new_used = $request->new_used;
			$data->damage = $request->damage;
			$data->hull_mat = $request->hull_mat;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->overall_length = $request->overall_length;
			$data->overall_width = $request->overall_width;
			$data->inner_length = $request->inner_length;
			$data->inner_width = $request->inner_width;
			$data->height = $request->height;
			$data->weight = $request->weight;
			$data->weight_capacity = $request->weight_capacity;
			$data->color = $request->color;
			if ($request->features_eq) {
				$data->feq = $features_eq;
			}
			$data->description = $request->description;

			$data->video = $request->video;
			$data->save();
		} elseif ($request->cat == 'motorboats') {

			if ($request->features_eq1) {
				$feq_additional_equipment = implode(",", $request->features_eq1);
			}
			if ($request->features_eq2) {
				$feq_audio_video_equipment = implode(",", $request->features_eq2);
			}
			if ($request->features_eq3) {
				$feq_electronics = implode(",", $request->features_eq3);
			}
			if ($request->features_eq4) {
				$feq_other = implode(",", $request->features_eq4);
			}

			$data = Advertisement::where('_id', $request->post_id)->first();
			$data->title = $request->title;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->motorboat_type = $request->motorboat_type;
			$data->boat_purpose = $request->boat_purpose;
			$data->manufacturer = $request->manufacturer;
			$data->model = $request->model;
			$data->price = intval($request->price);
			$data->export_price = $request->export_price;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->new_used = $request->new_used;
			$data->damage = $request->damage;
			$data->fuel_type = $request->fuel_type;
			$data->overall_length = $request->overall_length;
			$data->draft = $request->draft;
			$data->beam = $request->beam;
			$data->hull_mat = $request->hull_mat;
			$data->color = $request->color;
			$data->eng_type = $request->eng_type;
			$data->eng_num = $request->eng_num;
			$data->eng_capacity = $request->eng_capacity;
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->eng_make = $request->eng_make;
			$data->eng_model = $request->eng_model;
			$data->fuel_tank_capacity = $request->fuel_tank_capacity;
			$data->frsh_water_capacity = $request->frsh_water_capacity;
			$data->hold_tank_capacity = $request->hold_tank_capacity;
			$data->passenger_num = $request->passenger_num;
			$data->berth_num = $request->berth_num;
			$data->cabin_num = $request->cabin_num;
			$data->shower_num = $request->shower_num;
			$data->tiolet_num = $request->tiolet_num;
			$data->light_displacement = $request->light_displacement;
			$data->weight = $request->weight;
			$data->batterie_type = $request->batterie_type;
			$data->batterie_capacity = $request->batterie_capacity;
			$data->country = $request->country;
			if ($request->features_eq1) {
				$data->feq_additional_equipment = $feq_additional_equipment;
			}
			if ($request->features_eq2) {
				$data->feq_audio_video_equipment = $feq_audio_video_equipment;
			}
			if ($request->features_eq3) {
				$data->feq_electronics = $feq_electronics;
			}
			if ($request->features_eq4) {
				$data->feq_other = $feq_other;
			}
			$data->description = $request->description;

			$data->video = $request->video;
			$data->save();
		} elseif ($request->cat == 'motors-and-engines') {

			if ($request->features_eq) {
				$features_eq = implode(",", $request->features_eq);
			}
			$data = Advertisement::where('_id', $request->post_id)->first();
			$data->title = $request->title;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->eng_type = $request->eng_type;
			$data->price = intval($request->price);
			$data->export_price = $request->export_price;
			$data->eng_make = $request->eng_make;
			$data->eng_model = $request->eng_model;
			$data->eng_capacity = $request->eng_capacity;
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->fuel_type = $request->fuel_type;
			$data->new_used = $request->new_used;
			$data->cylinder_num = $request->cylinder_num;
			$data->revolution = $request->revolution;
			$data->start_system = $request->start_system;
			$data->leg_size = $request->leg_size;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->fuel_tank_capacity = $request->fuel_tank_capacity;
			$data->weight = $request->weight;
			if ($request->features_eq) {
				$data->feq = $features_eq;
			}
			$data->description = $request->description;

			$data->video = $request->video;
			$data->save();
		} elseif ($request->cat == 'water-transport-other') {

			if ($request->features_eq) {
				$features_eq = implode(",", $request->features_eq);
			}
			$data = Advertisement::where('_id', $request->post_id)->first();
			$data->title = $request->title;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->product_name = $request->product_name;
			$data->price = intval($request->price);
			$data->export_price = $request->export_price;
			$data->manufacturer = $request->manufacturer;
			$data->model = $request->model;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->new_used = $request->new_used;
			$data->damage = $request->damage;
			$data->length = $request->length;
			$data->width = $request->width;
			$data->height = $request->height;
			$data->weight = $request->weight;
			$data->weight_capacity = $request->weight_capacity;
			$data->seat_num = $request->seat_num;
			$data->hull_mat = $request->hull_mat;
			$data->fuel_type = $request->fuel_type;
			$data->eng_capacity = $request->eng_capacity;
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->color = $request->color;
			if ($request->features_eq) {
				$data->feq = $features_eq;
			}
			$data->description = $request->description;

			$data->video = $request->video;
			$data->save();
		} elseif ($request->cat == 'sailboats') {

			if ($request->features_eq1) {
				$feq_additional_equipment = implode(",", $request->features_eq1);
			}
			if ($request->features_eq2) {
				$feq_audio_video_equipment = implode(",", $request->features_eq2);
			}
			if ($request->features_eq3) {
				$feq_electronics = implode(",", $request->features_eq3);
			}
			if ($request->features_eq4) {
				$feq_other = implode(",", $request->features_eq4);
			}
			$data = Advertisement::where('_id', $request->post_id)->first();
			$data->title = $request->title;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->manufacturer = $request->manufacturer;
			$data->model = $request->model;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->sailboat_type = $request->sailboat_type;
			$data->price = intval($request->price);
			$data->export_price = $request->export_price;
			$data->new_used = $request->new_used;
			$data->damage = $request->damage;
			$data->overall_length = $request->overall_length;
			$data->length_unit = $request->length_unit;
			$data->draft = $request->draft;
			$data->beam = $request->beam;
			$data->beam_unit = $request->beam_unit;
			$data->hull_mat = $request->hull_mat;
			$data->color = $request->color;
			$data->rig_type = $request->rig_type;
			$data->sail_area = $request->sail_area;
			$data->cabin_num = $request->cabin_num;
			$data->berth_num = $request->berth_num;
			$data->str_wheel = $request->str_wheel;
			$data->fresh_water_capacity = $request->fresh_water_capacity;
			$data->hold_tank_capacity = $request->hold_tank_capacity;
			$data->fuel_tank_capacity = $request->fuel_tank_capacity;
			$data->fuel_type = $request->fuel_type;
			$data->eng_type = $request->eng_type;
			$data->eng_num = $request->eng_num;
			$data->eng_capacity = $request->eng_capacity;
			$data->power = $request->power;
			$data->power_unit = $request->power_unit;
			$data->eng_make = $request->eng_make;
			$data->eng_model = $request->eng_model;
			$data->light_displacement = $request->light_displacement;
			$data->weight = $request->weight;
			$data->shower_num = $request->shower_num;
			$data->tiolet_num = $request->tiolet_num;
			$data->batterie_type = $request->batterie_type;
			$data->batterie_capacity = $request->batterie_capacity;
			$data->country = $request->country;
			if ($request->features_eq1) {
				$data->feq_additional_equipment = $feq_additional_equipment;
			}
			if ($request->features_eq2) {
				$data->feq_audio_video_equipment = $feq_audio_video_equipment;
			}
			if ($request->features_eq3) {
				$data->feq_electronics = $feq_electronics;
			}
			if ($request->features_eq4) {
				$data->feq_other = $feq_other;
			}
			$data->description = $request->description;

			$data->video = $request->video;
			$data->save();
		} elseif ($request->cat == 'water-bikes') {

			if ($request->features_eq) {
				$features_eq = implode(",", $request->features_eq);
			}
			$data = Advertisement::where('_id', $request->post_id)->first();
			$data->title = $request->title;
			$data->city = $request->city;
			$data->address = $request->address;
			$data->manufacturer = $request->manufacturer;
			$data->model = $request->model;
			$data->seat_num = $request->seat_num;
			$data->new_used = $request->new_used;
			$data->price = intval($request->price);
			$data->export_price = $request->export_price;
			$data->damage = $request->damage;
			$data->manufature_year = intval($request->manufature_year);
			$data->manufature_month = intval($request->manufature_month);
			$data->length = $request->length;
			$data->width = $request->width;
			$data->height = $request->height;
			$data->weight = $request->weight;
			$data->weight_capacity = $request->weight_capacity;
			$data->hull_mat = $request->hull_mat;
			$data->color = $request->color;
			if ($request->features_eq) {
				$data->feq = $features_eq;
			}
			$data->description = $request->description;

			$data->video = $request->video;
			$data->save();
		}
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
