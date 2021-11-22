@extends('frontend.app')
@section('style')
<style>
	.swiper-button-prev,
	.swiper-button-next {
		height: auto;
		top: 65%;
	}

	.swiper-button-next {
		right: 0;
	}

	@media screen and (max-width:575px) {
		.inner-cat-car .inner-cat .inner-c-l img {
			width: 30px;
		}

		.inner-cat-car .inner-cat .inner-c-l {
			font-size: 12px;
		}
	}

	.realestate-search .map-sidebar .m-side-list .fav {
		transform: scale(1);
		transition: .4s ease all;
		cursor: pointer;
	}

	.realestate-search .map-sidebar .m-side-list .fav:hover {
		transform: scale(1.5);
		color: #DA233C;
	}

	.search .search-btn button {
		height: 35px;
		line-height: 19px;
	}
</style>
@endsection
@section('content')
<section class=" ss-section realestate-search car-result">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">car search</li>
		</ol>
	</nav>
	<div class="search">
		<div class="row mar-0">
			<div class="col-12 col-sm-10 pad-0">
				<div class="search-service tab-w-name car-s-rslt search-tab ss d-block mb-3">
					<ul class="nav nav-pills nav-fill justify-content-center">
						<li class="nav-item" data-toggle="tooltip" data-placement="top" title="All Category">
							<div class="item-list slug-cat act-cat show-side-nav hide-car-inner-cat single-item-select">
								<input type="hidden" class="this_cat" value=" ">

								<input type="hidden" class="cat-name-m" style="" value="all" />
								<div class="item-icon">
									<span class="item-img"><img src="assets/img/home.jpg" alt="lt flag"></span>
									<span class="item-h-img"><img src="assets/img/home.jpg" alt="lt flag"></span>
									<span class="item-txt">All Category</span>
								</div>
							</div>
						</li>
						@foreach($sub_cats as $sub)
						<li class="nav-item" data-original-title="{{$sub->category_name}}" data-toggle="tooltip"
							data-placement="top" title="">
							<div
								class="item-list act-cat single-item-select show-nav-con @if(App\InnerCategory::where('sub_cat_id',$sub->_id)->get()->count() > 0) show-car-inner-cat inn_c @else hide-car-inner-cat show-side-nav slug-cat @endif ">
								<input type="hidden" class="this_cat" value="{{$sub->slug}}">

								<input type="hidden" class="cat-name-m" style="" value="{{$sub->category_name}}" />
								<div class="item-icon">
									<span class="item-img"><img src="{{ asset('assets/img/subCatIcon/'.$sub->icon)}}"
											alt="lt flag"></span>
									<span class="item-h-img"><img src="{{ asset('assets/img/subCatIcon/'.$sub->icon)}}"
											alt="lt flag"></span>
									<span class="item-txt">{{ucfirst($sub->category_name)}}</span>
								</div>
								@if(App\InnerCategory::where('sub_cat_id',$sub->_id)->get()->count() > 0)
								<div class="inner-cat new-inn d-none">
									<div class="arrow-up"></div>
									@foreach($inner_categories as $inner)
									@if($inner->sub_cat_id == $sub->_id)
									<div class="inner-c-l show-side-nav show-h-nav"><img
											src="{{ asset('assets/img/innerCatIcon/'.$inner->icon)}}"
											alt="lt flag">{{ucfirst($inner->category_name)}}
										<input type="hidden" class="this_inner_cat" value="{{$inner->slug}}">
									</div>
									@endif
									@endforeach
								</div>
								@endif
							</div>
						</li>
						@endforeach
					</ul>

					<div class="inner-cat-car d-none">
						@foreach($sub_cats as $sub)
						@if(App\InnerCategory::where('sub_cat_id',$sub->_id)->get()->count() > 0)
						<div class="inner-cat car-inner-cat-nav  d-none">
							<div class="arrow-up"></div>
							@foreach($inner_categories as $inner)
							@if($inner->sub_cat_id == $sub->_id)
							<div class="inner-c-l show-side-nav slug-cat act-innr">
								<img src="{{ asset('assets/img/innerCatIcon/'.$inner->icon)}}"
									alt="lt flag">{{ucfirst($inner->category_name)}}
								<input type="hidden" class="this_cat" value="{{$inner->slug}}">
								<input type="hidden" class="this_inner_cat" value="{{$inner->slug}}">
							</div>
							@endif
							@endforeach
						</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>
			<div class="col-12 col-sm-2 pad-r-0 search-btn">
				<button type="submit" form="filterCar" class="btn">search</button>
			</div>
		</div>


		<div class="select-cat-list">
			@if(request('form_type') == 'all' || request('form_type') == '')
			<span class="select-cat select-m-cat">All<span class="cat-remove">X</span></span>
			@else
			<span class="select-cat select-m-cat">{{request('form_type')}}<span class="cat-remove">X</span></span>
			@endif
		</div>


	</div>
</section>
<section class="realestate-search car-result">
	<div class="search-box">
		<div class="row mar-0">
			<div class="col-md-5 col-lg-3 pad-0">
				<form id="filterCar" method="post">
					@csrf
					<div class="realestate-search-sidebar sidebar-s-n">
						<div class="rea-price mar-b-15">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><img
											src="{{ asset('assets/img/search1.svg') }}" class="search-img"
											alt="lt flag"></span>
								</div>
								<input type="text" class="form-control search-i" placeholder="Search"
									aria-label="Username" aria-describedby="basic-addon1">
							</div>
							<div class="realestate-search-tlt">Price</div>
							<div class="price-box pb-3">
								<div class="row mar-0">
									<div class=" col-6 pad-0 price-i">
										<label for="basic-url">From</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">$</span>
											</div>
											<input type="number" name="min_price" class="form-control" placeholder="100"
												aria-label="Username" aria-describedby="basic-addon1">
										</div>
									</div>
									<div class="col-6 pad-r-0 price-i">
										<label for="basic-url">To</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">$</span>
											</div>
											<input type="number" name="max_price" class="form-control"
												placeholder="4000" aria-label="Username"
												aria-describedby="basic-addon1">
										</div>
									</div>
								</div>
							</div>
							<input type="hidden" class="formType" name="form_type">
						</div>
						@include('frontend.category.car.sidebar-nav')
						<div class="col-12 search-btn" style="margin-top: 20px;">
							<button class="btn btn-danger" type="submit" id="search">Seach</button>
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-7 pad-0">
				<div class="map-sidebar" id="loaddata">
					@include('frontend.category.car.car-listing-section')
				</div>
			</div>
			<div class=" col-12 col-md-2 pad-0">
				<div class="ad">
					ad
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@section('script')
<script>
	var swiper = new Swiper('.ctm-container-s-car', {
			slidesPerView: 9,
			spaceBetween: 5,
			loop: false,
			navigation: {
				nextEl: '.swiper-button-next-s',
				prevEl: '.swiper-button-prev-s',
			},

			breakpoints: {
				991: {
					slidesPerView: 6,
				},
				767: {
					slidesPerView: 4,
				},
				575: {
					slidesPerView: 6,
				},
				450: {
					slidesPerView: 5,
				},
				380: {
					slidesPerView: 4,
				}
			}
		});

		function setThis(filed,item){
			if (filed == 'make_cars') {
				$("input[name='make_cars']").val(item);
			}else if(filed == 'gear_box_cars'){
				$("input[name='gear_box_cars']").val(item);
			}else if(filed == 'fuel_type_cars'){
				$("input[name='fuel_type_cars']").val(item);
			}else if(filed == 'body_type_cars'){
				$("input[name='body_type_cars']").val(item);
			}else if(filed == 'new_used_cars'){
				$("input[name='new_used_cars']").val(item);
			}else if(filed == 'doors_number_cars'){
				$("input[name='doors_number_cars']").val(item);
			}else if(filed == 'color_cars'){
				$("input[name='color_cars']").val(item);
			}else if(filed == 'type_ag_eq'){
				$("input[name='type_ag_eq']").val(item);
			}else if(filed == 'new_used_ag_eq'){
				$("input[name='new_used_ag_eq']").val(item);
			}else if(filed == 'make_ag_eq'){
				$("input[name='make_ag_eq']").val(item);
			}else if(filed == 'type_ag_mac'){
				$("input[name='type_ag_mac']").val(item);
			}else if(filed == 'new_used_ag_mac'){
				$("input[name='new_used_ag_mac']").val(item);
			}else if(filed == 'make_ag_mac'){
				$("input[name='make_ag_mac']").val(item);
			}else if(filed == 'type_frs_mac'){
				$("input[name='type_frs_mac']").val(item);
			}else if(filed == 'new_used_frs_mac'){
				$("input[name='new_used_frs_mac']").val(item);
			}else if(filed == 'make_frs_mac'){
				$("input[name='make_frs_mac']").val(item);
			}else if(filed == 'type_road_const'){
				$("input[name='type_road_const']").val(item);
			}else if(filed == 'make_road_const'){
				$("input[name='make_road_const']").val(item);
			}else if(filed == 'new_used_road_const'){
				$("input[name='new_used_road_const']").val(item);
			}else if(filed == 'str_wheel_road_const'){
				$("input[name='str_wheel_road_const']").val(item);
			}else if(filed == 'color_road_const'){
				$("input[name='color_road_const']").val(item);
			}else if(filed == 'type_motorcycles'){
				$("input[name='type_motorcycles']").val(item);
			}else if(filed == 'new_used_motorcycles'){
				$("input[name='new_used_motorcycles']").val(item);
			}else if(filed == 'make_motorcycles'){
				$("input[name='make_motorcycles']").val(item);
			}else if(filed == 'cooling_type_motorcycles'){
				$("input[name='cooling_type_motorcycles']").val(item);
			}else if(filed == 'fuel_type_motorcycles'){
				$("input[name='fuel_type_motorcycles']").val(item);
			}else if(filed == 'engine_type_motorcycles'){
				$("input[name='engine_type_motorcycles']").val(item);
			}else if(filed == 'color_motorcycles'){
				$("input[name='color_motorcycles']").val(item);
			}else if(filed == 'trailer_semitrailers'){
				$("input[name='trailer_semitrailers']").val(item);
			}else if(filed == 'type_semitrailers'){
				$("input[name='type_semitrailers']").val(item);
			}else if(filed == 'new_used_semitrailers'){
				$("input[name='new_used_semitrailers']").val(item);
			}else if(filed == 'make_semitrailers'){
				$("input[name='make_semitrailers']").val(item);
			}else if(filed == 'alx_make_semitrailers'){
				$("input[name='alx_make_semitrailers']").val(item);
			}else if(filed == 'semi_axl_num_semitrailers'){
				$("input[name='semi_axl_num_semitrailers']").val(item);
			}else if(filed == 'color_semitrailers'){
				$("input[name='color_semitrailers']").val(item);
			}else if(filed == 'type_const_mach'){
				$("input[name='type_const_mach']").val(item);
			}else if(filed == 'make_const_mach'){
				$("input[name='make_const_mach']").val(item);
			}else if(filed == 'str_wheel_muni_mach'){
				$("input[name='str_wheel_muni_mach']").val(item);
			}else if(filed == 'color_muni_mach'){
				$("input[name='color_muni_mach']").val(item);
			}else if(filed == 'gear_box_muni_mach'){
				$("input[name='gear_box_muni_mach']").val(item);
			}else if(filed == 'fuel_type_muni_mach'){
				$("input[name='fuel_type_muni_mach']").val(item);
			}else if(filed == 'new_used_muni_mach'){
				$("input[name='new_used_muni_mach']").val(item);
			}else if(filed == 'make_muni_mach'){
				$("input[name='make_muni_mach']").val(item);
			}else if(filed == 'type_muni_mach'){
				$("input[name='type_muni_mach']").val(item);
			}else if(filed == 'type_storage'){
				$("input[name='type_storage']").val(item);
			}else if(filed == 'make_storage'){
				$("input[name='make_storage']").val(item);
			}else if(filed == 'new_used_storage'){
				$("input[name='new_used_storage']").val(item);
			}else if(filed == 'fuel_type_storage'){
				$("input[name='fuel_type_storage']").val(item);
			}else if(filed == 'boom_type_storage'){
				$("input[name='boom_type_storage']").val(item);
			}else if(filed == 'color_storage'){
				$("input[name='color_storage']").val(item);
			}else if(filed == 'trans_type_storage'){
				$("input[name='trans_type_storage']").val(item);
			}else if(filed == 'climate_contrl_minivan'){
				$("input[name='climate_contrl_minivan']").val(item);
			}else if(filed == 'gear_box_minivan'){
				$("input[name='gear_box_minivan']").val(item);
			}else if(filed == 'drivel_wheel_minivan'){
				$("input[name='drivel_wheel_minivan']").val(item);
			}else if(filed == 'color_minivan'){
				$("input[name='color_minivan']").val(item);
			}else if(filed == 'str_wheel_minivan'){
				$("input[name='str_wheel_minivan']").val(item);
			}else if(filed == 'fuel_type_minivan'){
				$("input[name='fuel_type_minivan']").val(item);
			}else if(filed == 'new_used_minivan'){
				$("input[name='new_used_minivan']").val(item);
			}else if(filed == 'make_minivan'){
				$("input[name='make_minivan']").val(item);
			}else if(filed == 'type_minivan'){
				$("input[name='type_minivan']").val(item);
			}else if(filed == 'type_autotrains'){
				$("input[name='type_autotrains']").val(item);
			}else if(filed == 'make_autotrains'){
				$("input[name='make_autotrains']").val(item);
			}else if(filed == 'new_used_autotrains'){
				$("input[name='new_used_autotrains']").val(item);
			}else if(filed == 'fuel_type_autotrains'){
				$("input[name='fuel_type_autotrains']").val(item);
			}else if(filed == 'str_wheel_autotrains'){
				$("input[name='str_wheel_autotrains']").val(item);
			}else if(filed == 'color_autotrains'){
				$("input[name='color_autotrains']").val(item);
			}else if(filed == 'sleep_bed_autotrains'){
				$("input[name='sleep_bed_autotrains']").val(item);
			}else if(filed == 'gear_box_autotrains'){
				$("input[name='gear_box_autotrains']").val(item);
			}else if(filed == 'layout_autotrains'){
				$("input[name='layout_autotrains']").val(item);
			}else if(filed == 'make_trailer_trucks'){
				$("input[name='make_trailer_trucks']").val(item);
			}else if(filed == 'new_used_trailer_trucks'){
				$("input[name='new_used_trailer_trucks']").val(item);
			}else if(filed == 'str_wheel_trailer_trucks'){
				$("input[name='str_wheel_trailer_trucks']").val(item);
			}else if(filed == 'color_trailer_trucks'){
				$("input[name='color_trailer_trucks']").val(item);
			}else if(filed == 'sleep_bed_trailer_trucks'){
				$("input[name='sleep_bed_trailer_trucks']").val(item);
			}else if(filed == 'gear_box_trailer_trucks'){
				$("input[name='gear_box_trailer_trucks']").val(item);
			}else if(filed == 'layout_trailer_trucks'){
				$("input[name='layout_trailer_trucks']").val(item);
			}else if(filed == 'layout_trucks'){
				$("input[name='layout_trucks']").val(item);
			}else if(filed == 'color_trucks'){
				$("input[name='color_trucks']").val(item);
			}else if(filed == 'sleep_bed_trucks'){
				$("input[name='sleep_bed_trucks']").val(item);
			}else if(filed == 'gear_box_trucks'){
				$("input[name='gear_box_trucks']").val(item);
			}else if(filed == 'str_wheel_trucks'){
				$("input[name='str_wheel_trucks']").val(item);
			}else if(filed == 'fuel_type_trucks'){
				$("input[name='fuel_type_trucks']").val(item);
			}else if(filed == 'new_used_trucks'){
				$("input[name='new_used_trucks']").val(item);
			}else if(filed == 'make_trucks'){
				$("input[name='make_trucks']").val(item);
			}else if(filed == 'type_trucks'){
				$("input[name='type_trucks']").val(item);
			}else if(filed == 'type_bus'){
				$("input[name='type_bus']").val(item);
			}else if(filed == 'make_bus'){
				$("input[name='make_bus']").val(item);
			}else if(filed == 'new_used_bus'){
				$("input[name='new_used_bus']").val(item);
			}else if(filed == 'fuel_type_bus'){
				$("input[name='fuel_type_bus']").val(item);
			}else if(filed == 'str_wheel_bus'){
				$("input[name='str_wheel_bus']").val(item);
			}else if(filed == 'gear_box_bus'){
				$("input[name='gear_box_bus']").val(item);
			}else if(filed == 'climate_contrl_bus'){
				$("input[name='climate_contrl_bus']").val(item);
			}else if(filed == 'color_bus'){
				$("input[name='color_bus']").val(item);
			}else if(filed == 'doors_number_bus'){
				$("input[name='doors_number_bus']").val(item);
			}else if(filed == 'type_vehicles_campers'){
				$("input[name='type_vehicles_campers']").val(item);
			}else if(filed == 'make_vehicles_campers'){
				$("input[name='make_vehicles_campers']").val(item);
			}else if(filed == 'new_used_vehicles_campers'){
				$("input[name='new_used_vehicles_campers']").val(item);
			}else if(filed == 'fuel_type_vehicles_campers'){
				$("input[name='fuel_type_vehicles_campers']").val(item);
			}else if(filed == 'str_wheel_vehicles_campers'){
				$("input[name='str_wheel_vehicles_campers']").val(item);
			}else if(filed == 'gear_box_vehicles_campers'){
				$("input[name='gear_box_vehicles_campers']").val(item);
			}else if(filed == 'climate_contrl_vehicles_campers'){
				$("input[name='climate_contrl_vehicles_campers']").val(item);
			}else if(filed == 'drivel_wheel_vehicles_campers'){
				$("input[name='drivel_wheel_vehicles_campers']").val(item);
			}else if(filed == 'color_vehicles_campers'){
				$("input[name='color_vehicles_campers']").val(item);
			}else if(filed == 'climate_contrl_minibus'){
				$("input[name='climate_contrl_minibus']").val(item);
			}else if(filed == 'gear_box_minibus'){
				$("input[name='gear_box_minibus']").val(item);
			}else if(filed == 'drivel_wheel_minibus'){
				$("input[name='drivel_wheel_minibus']").val(item);
			}else if(filed == 'color_minibus'){
				$("input[name='color_minibus']").val(item);
			}else if(filed == 'str_wheel_minibus'){
				$("input[name='str_wheel_minibus']").val(item);
			}else if(filed == 'fuel_type_minibus'){
				$("input[name='fuel_type_minibus']").val(item);
			}else if(filed == 'new_used_minibus'){
				$("input[name='new_used_minibus']").val(item);
			}else if(filed == 'make_minibus'){
				$("input[name='make_minibus']").val(item);
			}else if(filed == 'type_minibus'){
				$("input[name='type_minibus']").val(item);
			}else if (filed == 'make_passenger_vans') {
				$("input[name='make_passenger_vans']").val(item);
			}else if(filed == 'gear_box_passenger_vans'){
				$("input[name='gear_box_passenger_vans']").val(item);
			}else if(filed == 'fuel_type_passenger_vans'){
				$("input[name='fuel_type_passenger_vans']").val(item);
			}else if(filed == 'body_type_passenger_vans'){
				$("input[name='body_type_passenger_vans']").val(item);
			}else if(filed == 'new_used_passenger_vans'){
				$("input[name='new_used_passenger_vans']").val(item);
			}else if(filed == 'color_passenger_vans'){
				$("input[name='color_passenger_vans']").val(item);
			}else if(filed == 'doors_number_passenger_vans'){
				$("input[name='doors_number_passenger_vans']").val(item);
			}else if(filed == 'type_boat_raft'){
				$("input[name='type_boat_raft']").val(item);
			}else if(filed == 'new_used_boat_raft'){
				$("input[name='new_used_boat_raft']").val(item);
			}else if(filed == 'fuel_type_boat_raft'){
				$("input[name='fuel_type_boat_raft']").val(item);
			}else if(filed == 'color_boat_raft'){
				$("input[name='color_boat_raft']").val(item);
			}else if(filed == 'manufacturer_watercraft'){
				$("input[name='manufacturer_watercraft']").val(item);
			}else if(filed == 'new_used_watercraft'){
				$("input[name='new_used_watercraft']").val(item);
			}else if(filed == 'fuel_type_watercraft'){
				$("input[name='fuel_type_watercraft']").val(item);
			}else if(filed == 'eng_type_watercraft'){
				$("input[name='eng_type_watercraft']").val(item);
			}else if(filed == 'color_watercraft'){
				$("input[name='color_watercraft']").val(item);
			}else if(filed == 'kay_can'){
				$("input[name='kay_can']").val(item);
			}else if(filed == 'type_kay_can'){
				$("input[name='type_kay_can']").val(item);
			}else if(filed == 'new_used_kay_can'){
				$("input[name='new_used_kay_can']").val(item);
			}else if(filed == 'color_kay_can'){
				$("input[name='color_kay_can']").val(item);
			}else if(filed == 'boat_purpose'){
				$("input[name='boat_purpose']").val(item);
			}else if(filed == 'type_motorboats'){
				$("input[name='type_motorboats']").val(item);
			}else if(filed == 'new_used_motorboats'){
				$("input[name='new_used_motorboats']").val(item);
			}else if(filed == 'fuel_type_motorboats'){
				$("input[name='fuel_type_motorboats']").val(item);
			}else if(filed == 'eng_type_motorboats'){
				$("input[name='eng_type_motorboats']").val(item);
			}else if(filed == 'eng_num_motorboats'){
				$("input[name='eng_num_motorboats']").val(item);
			}else if(filed == 'color_motorboats'){
				$("input[name='color_motorboats']").val(item);
			}else if(filed == 'eng_type_engines'){
				$("input[name='eng_type_engines']").val(item);
			}else if(filed == 'new_used_engines'){
				$("input[name='new_used_engines']").val(item);
			}else if(filed == 'fuel_type_engines'){
				$("input[name='fuel_type_engines']").val(item);
			}else if(filed == 'new_used_other'){
				$("input[name='new_used_other']").val(item);
			}else if(filed == 'fuel_type_other'){
				$("input[name='fuel_type_other']").val(item);
			}else if(filed == 'color_other'){
				$("input[name='color_other']").val(item);
			}else if(filed == 'new_used_sailboats'){
				$("input[name='new_used_sailboats']").val(item);
			}else if(filed == 'sailboat_type'){
				$("input[name='sailboat_type']").val(item);
			}else if(filed == 'fuel_type_sailboats'){
				$("input[name='fuel_type_sailboats']").val(item);
			}else if(filed == 'eng_type_sailboats'){
				$("input[name='eng_type_sailboats']").val(item);
			}else if(filed == 'eng_num_sailboats'){
				$("input[name='eng_num_sailboats']").val(item);
			}else if(filed == 'rig_type_sailboats'){
				$("input[name='rig_type_sailboats']").val(item);
			}else if(filed == 'str_wheel_sailboats'){
				$("input[name='str_wheel_sailboats']").val(item);
			}else if(filed == 'color_sailboats'){
				$("input[name='color_sailboats']").val(item);
			}else if(filed == 'new_used_water_bikes'){
				$("input[name='new_used_water_bikes']").val(item);
			}else if(filed == 'color_water_bikes'){
				$("input[name='color_water_bikes']").val(item);
			}
		}


		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();   


			window.filter_car = '<?= url('filter-car-by-all-values')?>'
			window.check_actve_match_menu_cars = '<?= url('get-active-menu-data-cars')?>'
		});
</script>
@endsection