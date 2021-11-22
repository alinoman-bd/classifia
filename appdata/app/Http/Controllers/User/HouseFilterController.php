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

// modify 
use App\PaymentInfo;
use App\Slider\Slider;
use App\Advertisement;

use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;




class HouseFilterController extends Controller
{

	public function houseBrowse() 
	{
		$data['category'] = MainCategory::where('cat_key', 'house')->first();
		$data['sub_cats'] = SubCategory::where('main_cat_id',$data['category']->_id)
		->orderBy('category_name', 'asc')
		->get();
		$data['sliders'] = Slider::where('slider_type', 'house')
		->orderBy('created_at','desc')
		->get();
		$data['feature_products'] = PaymentInfo::whereNotNull('advert_id')
		->with(['advertisement' => function($q) {
			return $q->where('cat', 'house')
			->orderBy('created_at','desc')
			->with('coverImage');
		}])
		->orderBy('created_at','desc')
		->limit(12)
		->get();
		$data['ad_products'] = PaymentInfo::whereNotNull('promot_id')
		->with(['advertisement' => function($q) {
			return $q->where('cat', 'house')
			->orderBy('created_at','desc')
			->with('coverImage');
		}])
		->orderBy('created_at','desc')
		->limit(4)
		->get();
		return view('frontend.category.house.house-browse',$data);
	}

	public function searchHouse(Request $request){

		dd($request->all());
		if ($request->form_type) {
			$t_fm_tp = count($request->form_type);
			if ($t_fm_tp == 8) {
				$form_type = null;
			}else{
				$form_type = $request->form_type;
			}
		}
		$sale_rent = $request->sale_rent;
		$address = $request->address;
		if ($address) {
			$geodata = $this->getLatLng($address);
			$distance = $this->getDistance($geodata, 0);
		}
		
		$min_room = (int)$request->m_room;
		$living_area = (int)$request->living_area_max;
		$h_price = (int)$request->h_price;
		$new_development = $request->new_development;
		$keyword = $request->keyword;
		$form_type = $request->form_type;
		$lat = $request->lat;
		$lng = $request->lng;
		$data['form_type'] = $request->form_type;
		$data['address'] = $address;


		$data['houses']  = Advertisement::where('cat','house')
		->when($sale_rent, function($q) use($sale_rent) {
			$q->where('type',$sale_rent);
		})
		->when($form_type, function($q) use($form_type) {
			$q->whereIn('form_type',$form_type);
		})
		->when($min_room, function($q) use($min_room) {
			$q->where('room_nr','>=',$min_room);
		})
		->when($living_area, function($q) use($living_area) {
			$q->where('area','>=',$living_area);
		})
		->when($h_price, function($q) use($h_price) {
			$q->where('price','<=',$h_price);
		})
		->when($new_development, function($q) use($new_development) {
			$q->where('new_development',$new_development);
		})
		->when($keyword, function($q) use($keyword) {
			$q->where('keyword', 'like', '%"' . $keyword . '"%');
		})
		
		->with('paymentInfo.package','paymentInfo.promot','paymentInfo.advert','coverImage','userInfo')
		->orderBy('_id', 'desc')
		->get();
		$data['geodata'] = '';
		if (request()->address) {
			$data['houses']  = $this->filterByDistance($data['houses'], $geodata, $distance);
			$data['geodata'] = $geodata;
		}
		$data['sale_rent'] = $request->sale_rent;
		$data['category'] = MainCategory::where('cat_key', 'house')->first();
		$data['sub_cats'] = SubCategory::where('main_cat_id',$data['category']->_id)->orderBy('category_name', 'asc')->get();



		$data['houses'] = $this->paginate($data['houses'], $perPage = 12, $page = null, $options = ['path' => url()->current(), "pageName" => "page"]);

		// dd($data['houses']);
		return view('frontend.category.house.house-search-result', $data);

	}
	public function filterHouseAllField(Request $request){
		$form_type = $request->form_type;
		$title = $request->title;
		$address = $request->address;
		$room_min  = (int)$request->room_min;
		$room_max  = (int)$request->room_max;
		$water_distance  = (int)$request->water_distance;
		$award  = (int)$request->award;
		$price_min  = (int)$request->price_min;
		$price_max  = (int)$request->price_max;
		$living_area_min  = (int)$request->living_area_min;
		$living_area_max  = (int)$request->living_area_max;
		$min_year  = (int)$request->min_year;
		$max_year  = (int)$request->max_year;
		$per_sq_price_min  = (int)$request->per_sq_price_min;
		$per_sq_price_max  = (int)$request->per_sq_price_max;
		$new_development  = $request->new_development;
		$keyword  = $request->keyword;
		$house_type  = $request->house_type;

		if ($address) {
			$geodata = $this->getLatLng($address);
			$distance = $this->getDistance($geodata, $request->distance ?: 0);
		}

		$data['houses']  = Advertisement::where('cat','house')
		->when($title, function($q) use($title) {
			$q->where('title','LIKE',$title. '%');
		})
		->when($award, function($q) use($award) {
			$q->where('award',$award);
		})
		->when($form_type, function($q) use($form_type) {
			$q->whereIn('form_type',array_values($form_type));
		})
		->when($price_min && $price_max, function($q) use($price_min, $price_max) {
			$q->whereBetween('price', [$price_min,$price_max]);
		})		
		->when($price_min && $price_max == 0, function($q) use($price_min) {
			$q->where('price','>=',$price_min);
		})
		->when($price_max && $price_min == 0, function($q) use($price_max) {
			$q->where('price','<=',$price_max);
		})
		->when($water_distance, function($q) use($water_distance) {
			$q->where('water_distance',$water_distance);
		})
		->when($room_min && $room_max, function($q) use($room_min, $room_max) {
			$q->whereBetween('room_nr', [$room_min,$room_max]);
		})
		->when($room_min && $room_max == 0, function($q) use($room_min) {
			$q->where('room_nr','>=',$room_min);
		})
		->when($room_max && $room_min == 0, function($q) use($room_max) {
			$q->where('room_nr','<=',$room_max);
		})
		->when($living_area_min && $living_area_max, function($q) use($living_area_min, $living_area_max) {
			$q->whereBetween('area', [$living_area_min,$living_area_max]);
		})
		->when($living_area_min && $living_area_max == 0, function($q) use($living_area_min) {
			$q->where('area','>=',$living_area_min);
		})
		->when($living_area_max && $living_area_min == 0, function($q) use($living_area_max) {
			$q->where('area','<=',$living_area_max);
		})
		->when($min_year && $max_year, function($q) use($min_year, $max_year) {
			$q->whereBetween('built_year', [$min_year,$max_year]);
		})
		->when($min_year && $max_year == 0, function($q) use($min_year) {
			$q->where('built_year','>=',$min_year);
		})
		->when($max_year && $min_year == 0, function($q) use($max_year) {
			$q->where('built_year','<=',$max_year);
		})
		->when($per_sq_price_min && $per_sq_price_max, function($q) use($per_sq_price_min, $per_sq_price_max) {
			$q->whereBetween('per_Sqr_price', [$per_sq_price_min,$per_sq_price_max]);
		})
		->when($per_sq_price_min && $per_sq_price_max == 0, function($q) use($per_sq_price_min) {
			$q->where('per_Sqr_price','>=',$per_sq_price_min);
		})
		->when($per_sq_price_max && $per_sq_price_min == 0, function($q) use($per_sq_price_max) {
			$q->where('per_Sqr_price','<=',$per_sq_price_max);
		})
		->when($new_development, function($q) use($new_development) {
			$q->where('new_development',$new_development);
		})
		->when($keyword, function($q) use($keyword) {
			$q->where('keyword','LIKE',$keyword. '%');
		})
		->when($house_type, function($q) use($house_type) {
			$q->where('house_type', $house_type);
		})
		->orderBy('_id', 'desc')
		->get();
		$data['geodata'] = '';
		if ($address) {
			$data['houses']  = $this->filterByDistance($data['houses'], $geodata, $distance);
			$data['geodata'] = $geodata;
		}

		$data['houses'] = $this->paginate($data['houses'], $perPage = 2, $page = null, $options = ['path' => url()->current(), "pageName" => "page"]);

		$view = view('frontend.category.house.house-listing-section',$data)->render();
		return $view;
	}


	// public function searchHouseByAddress(Request $request){
	// 	$form_type = $request->form_type;
	// 	$address = $request->address;
	// 	$sale_rent = $request->sale_rent;
	// 	$data['sale_rent'] = $request->sale_rent;
	// 	$data['houses'] = HouseCommonRecord::when($form_type, function($q) use($form_type) {
	// 		$q->where('form_type', $form_type);
	// 	})
	// 	->when($address, function($q) use($address) {
	// 		$q->where('region','LIKE',$address. '%');
	// 	})
	// 	->when($sale_rent, function($q) use($sale_rent) {
	// 		$q->where('type', $sale_rent);
	// 	})
	// 	->orderBy('_id','desc')
	// 	->paginate(12);
	// 	$view = view('frontend.category.house.house-listing-section',$data)->render();
	// 	return $view;
	// }

	public function filterHouseTop(Request $request){

		$address = $request->address; 
		$distance = $request->distance; 
		$form_type = $request->form_type; 

		$data['houses'] = HouseCommonRecord::when($address, function($q) use($address) {
			$q->where('region',$address);
		})
		->when($form_type, function($q) use($form_type) {
			$q->where('form_type',$form_type);
		})
		->get();

		
	}
	public function getActivemenuData(Request $request){
		$form_type = $request->form_type;
		$sale_rent = $request->sale_rent;
		$data['form_type'] = $request->form_type;
		$data['sale_rent'] = $request->sale_rent;
		$data['houses'] = HouseCommonRecord::when($form_type, function($q) use($form_type) {
			$q->where('form_type',$form_type);
		})
		->when($sale_rent, function($q) use($sale_rent) {
			$q->where('type',$sale_rent);
		})
		->with('houseAdposter')
		->orderBy('_id', 'desc')
		->paginate(12);
		$view = view('frontend.category.house.house-listing-section',$data)->render();
		return $view;

	}
	
	public function getLatLng($address){
		$address = $this->getGeoInfo($address);
		if (@$address['city']) {
			$center = str_replace(' ', '+', explode(' ', $address['city'])[0]);
			$center = str_replace(' ', '+', $center . ', ' .$address['country']);
		} elseif(@$address['state']){
			$center = str_replace(' ', '+', $address['state']);
			$center = str_replace(' ', '+', $center . ', ' .$address['country']);
		} else {
			$center = str_replace(' ', '+', $address['country']);
		}
		$json = file_get_contents("https://maps.google.com/maps/api/geocode/json?key=AIzaSyDgS793eWlCwsEaxw4bUz5xKYnxhvUMpnA&address=$center");
		$json = json_decode($json);
		
		$data['lat'] = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
		$data['lng'] = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
		$sLat = $json->{'results'}[0]->{'geometry'}->{'viewport'}->{'southwest'}->{'lat'};
		$sLng = $json->{'results'}[0]->{'geometry'}->{'viewport'}->{'southwest'}->{'lng'};
		$nLat = $json->{'results'}[0]->{'geometry'}->{'viewport'}->{'northeast'}->{'lat'};
		$nLng = $json->{'results'}[0]->{'geometry'}->{'viewport'}->{'northeast'}->{'lng'};
		
		if ($sLat > $nLat) {
			$data['bLat'] = $sLat;
			$data['bLng'] = $sLng;
		}
		else{
			$data['bLat'] = $nLat;
			$data['bLng'] = $nLng;
		}
		return $data;
	}

	function getGeoInfo($address)
	{
		$apiKey  = 'AIzaSyDgS793eWlCwsEaxw4bUz5xKYnxhvUMpnA';

		$prag = 'address=' . str_replace(' ', '+', $address);

		$url     = "https://maps.googleapis.com/maps/api/geocode/json?{$prag}&key={$apiKey}";
		$resp    = json_decode(file_get_contents($url), true);

		if (@$resp['results'][0]) {
			$response = array();
			foreach ($resp['results'][0]['address_components'] as $addressComponet) {
				if (in_array('political', $addressComponet['types'])) {
					$response[] = $addressComponet['long_name'];
				}
			}
			$first  = '';
			$second = '';
			$third  = '';
			$fourth = '';
			$fifth  = '';
			if (@$response[0]) {
				$first  =  $response[0];
			}
			if (@$response[1]) {
				$second =  $response[1];
			}
			if (@$response[2]) {
				$third  =  $response[2];
			}
			if (@$response[3]) {
				$fourth =  $response[3];
			}
			if (@$response[4]) {
				$fifth  =  $response[4];
			}
			if ($first != '' && $second != '' && $third != '' && $fourth != '' && $fifth != '') {
				$data['city'] = $second;
				$data['state'] = $fourth;
				$data['country'] = $fifth;
			} else if ($first != '' && $second != '' && $third != '' && $fourth != '' && $fifth == '') {
				$data['city'] = $second;
				$data['state'] = $third;
				$data['country'] = $fourth;
			} else if ($first != '' && $second != '' && $third != '' && $fourth == '' && $fifth == '') {
				$data['city'] = $first;
				$data['state'] = $second;
				$data['country'] = $third;
			} else if ($first != '' && $second != '' && $third == '' && $fourth == '' && $fifth == '') {
				$data['state'] = $first;
				$data['country'] = $second;
			} else if ($first != '' && $second == '' && $third == '' && $fourth == '' && $fifth == '') {
				$data['country'] = $first;
			}
		}
		return $data;
	}
	
	public function getDistance($geodata, $distance)
	{
			// dd($geodata);
			// r = radius of the earth in statute miles
		$r = 3963.0;  
			// Convert lat or lng from decimal degrees into radians (divide by 57.2958)
		$lat1 = (float) $geodata['lat'] / 57.2958; 
		$lng1 = (float) $geodata['lng'] / 57.2958;
		$lat2 = (float) $geodata['bLat'] / 57.2958;
		$lng2 = (float) $geodata['bLng'] / 57.2958;
			// distance = circle radius from center to Northeast corner of bounds

		$d = $r * acos(sin($lat1) * sin($lat2) + cos($lat1) * cos($lat2) * cos($lng2 - $lng1));
		return $d + (int) $distance;
	}

	public function filterByDistance($houses, $geodata, $distance)
	{
		return $houses->filter(function($house) use($geodata, $distance){
			$r = 3963.0;  
			// Convert lat or lng from decimal degrees into radians (divide by 57.2958)
			$lat1 = (float) $geodata['lat'] / 57.2958; 
			$lng1 = (float) $geodata['lng'] / 57.2958;
			$lat2 = (float) $house->lat / 57.2958;
			$lng2 = (float) $house->lng / 57.2958;
			// distance = circle radius from center to Northeast corner of bounds
			
			$dis = $r * acos(sin($lat1) * sin($lat2) + cos($lat1) * cos($lat2) * cos($lng2 - $lng1));
			if ($dis <= $distance) {
				return $house;
			}
		});
	}



	public function paginate($items, $perPage = 12, $page = null, $options = [])
	{
		$page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

		$items = $items instanceof Collection ? $items : Collection::make($items);

		return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
	}
}