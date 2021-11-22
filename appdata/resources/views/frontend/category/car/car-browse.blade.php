 @extends('frontend.app')
 @section('style')
 <style>
 	.item-list-p {
 		position: relative;
 	}
 	.car-service .col-lg-3 {
 		padding-right: 10px;
 	}
 	@media  screen and (max-width: 767px) {
 		.item-list-p .inner-cat .inner-c-l img {
 			width: 30px;
 		}
 		.item-list-p .inner-cat .inner-c-l {
 			font-size: 12px;
 			padding: 3px;
 		}
 		.rea-ss-nav .item-list-p .item-txt {
 			font-size: 13px;
 		}
 	}
 	@media (min-width: 992px) and (max-width: 1120px) {
 		.rea-ss-nav .search-service.car-service .col-lg-3 {
 			-ms-flex: 0 0 25%;
 			flex: 0 0 25%;
 			max-width: 25%;
 		}
 	}
 	@media screen and (max-width: 420px){
 		.car-service .col-4 {
 			flex: 0 0 50%;
 			max-width: 50%;
 		}
 	}
 	@media (min-width: 992px) and (max-width: 1080px){
 		.rea-ss-nav .item-list-p .item-txt {
 			font-size: 14px;
 		}
 	}
 </style>
 @endsection
 @section('content')

 <section class="ss-section rea-ss-section car-b-search">
 	<div class="search">
 		<nav aria-label="breadcrumb">
 			<ol class="breadcrumb">
 				<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
 				<li class="breadcrumb-item active" aria-current="page">car browse</li>
 			</ol>
 		</nav>
 		<div class="row">
 			<div class="col-md-7">
 				<div class="rea-ss-nav">
 					<ul class="nav nav-tabs" id="myTab" role="tablist">
 						<li class="nav-item">
 							<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">@lang('frontend.car.browse.search.car')</a>
 						</li>
 					</ul>
 					<div class="tab-content" id="myTabContent">
 						<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
 							<form action="{{url('search-car')}}" id="SearchForm" class="formForCarSearch" method="get"  enctype="multipart/form-data" >
 								@csrf
 								<div class="row mar-0">
 									<div class="col-12">
 										<div class="search-service car-service">
 											<div class="row ml-0 justify-content-center">
 												<div class="col-4  col-sm-3 col-md-4 col-lg-3 pad-l-0" data-original-title="All Category" data-toggle="tooltip" data-placement="left" title="">
 													<div class="item-list-p single-item-select  show-h-nav">
 														<div class="item-list">
 															<div class="item-icon">
 																
 																<span class="item-img"><img src="assets/img/home.jpg" alt="lt flag"></span>	
 																<span class="item-h-img"><img src="assets/img/home.jpg" alt="lt flag"></span>	
 															</div>
 														</div>
 														<input type="checkbox" class="cat-name" name="form_type[]" style="" value="all" />
 														<input type="hidden" class="cat-name-m" style="" value="all" />
 														<div class="item-txt">All Category</div>
 													</div>
 												</div>
 												@php $n = 1 @endphp
 												@foreach($sub_cats as $sub)
 												<div class="col-4 col-sm-3 col-md-4 col-lg-3 pad-l-0" data-original-title="{{$sub->category_name}}" data-toggle="tooltip" data-placement="left" title="">
 													<div class="item-list-p single-item-select @if(App\InnerCategory::where('sub_cat_id',$sub->_id)->get()->count() == 0) show-h-nav @else show-nav-con @endif">
 														<div class="item-list">
 															<input type="hidden" class="this_cat" value="{{$sub->slug}}">
 															<div class="item-icon">
 																<span class="item-img"><img src="{{ asset('assets/img/subCatIcon/'.$sub->icon)}}" alt="lt flag"></span>	
 																<span class="item-h-img"><img src="{{ asset('assets/img/subCatIcon/'.$sub->icon)}}" alt="lt flag"></span>	
 															</div>
 														</div>
 														<input type="checkbox" class="cat-name" name="form_type[]" style="" value="cat" />
 														<input type="hidden" class="cat-name-m" style="" value="{{$sub->category_name}}" />
 														<div class="item-txt">{{substr(ucfirst($sub->category_name),0,11)}}@if(strlen($sub->category_name) > 11)...@endif</div>
 														@if(App\InnerCategory::where('sub_cat_id',$sub->_id)->get()->count() > 0) 
 														<div class="inner-cat d-none">
 															<div class="arrow-up"></div>
 															@foreach($inner_categories as $inner)
 															@if($inner->sub_cat_id == $sub->_id)
 															<div class="inner-c-l show-h-nav"><img src="{{ asset('assets/img/innerCatIcon/'.$inner->icon)}}" alt="lt flag">{{ucfirst($inner->category_name)}}
 																<input type="hidden" class="this_inner_cat" value="{{$inner->slug}}">
 															</div>
 															@endif
 															@endforeach
 														</div>
 														@endif
 													</div>
 												</div>
 												@php ++$n @endphp
 												@endforeach
 												<input type="hidden" class="formType" id="formType" value="" name="form_type">
 											</div>
 										</div>
 									</div>
 									<div class="col-12">
 										<div class="select-cat-list">
 											<!-- <span class="select-cat">
 												All category 
 												<span class="cat-remove">X</span>
 											</span> -->
 										</div>
 										<div class="sh-extra">
 											<span class="extra">Expand <i class="fas fa-chevron-down"></i></span>
 											<span class="hide">Hide <i class="fas fa-chevron-up"></i></span>
 										</div>
 										<div class="extra-box car-extra">
 											@include('frontend.category.car.filter_fields')
 										</div>
 									</div>
 									<div class="col-12 search-btn">
 										<button class="btn" type="submit" id="search">SEARCH</button>
 									</div>
 								</div>
 							</form>
 						</div>
 					</div>
 				</div>
 			</div>
 			<div class="col-12 col-md-5">
 				<div class="row mar-0">
 					<div class="col-12 pad-0">
 						<div id="carouselExampleControls1" class="carousel slide" data-ride="carousel">
 							<div class="carousel-inner">
 								@php $n = 1 @endphp
 								@if($sliders->count())
 								@foreach($sliders as $slider)
 								<div class="carousel-item <?= $n == 1 ? 'active': '' ?>">
 									<a target="_blank" href="{{$slider->url}}">
 										<div class="home-slider-img">
 											<img class="cover" src="{{asset('assets/img/Sliders/'. $slider->slider)}}" alt="product">
 										</div>
 									</a>
 								</div>
 								@php ++$n @endphp
 								@endforeach
 								@else
 								<div class="carousel-item active">
 									<a href="#">
 										<div class="home-slider-img">
 											<img class="cover" src="{{asset('assets/img/Sliders/demo_1.jpg')}}" alt="slider">
 										</div>
 									</a>
 								</div>
 								@endif
 							</div>
 							<a class="carousel-control-prev" href="#carouselExampleControls1" role="button" data-slide="prev">
 								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
 								<span class="sr-only">Previous</span>
 							</a>
 							<a class="carousel-control-next" href="#carouselExampleControls1" role="button" data-slide="next">
 								<span class="carousel-control-next-icon" aria-hidden="true"></span>
 								<span class="sr-only">Next</span>
 							</a>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 </section>
 <section class="product-wrapper"style="background: #fff">
 	<div class="row mar-0">
 		<div class="col-12 pad-0">
 			<div class="section-tlt">@lang('frontend.home.heading.feature')</div>
 		</div>
 		<div class="col-10 pad-0">
 			<div class="posted">
 				<div class="row mar-0">
 					@if(@$feature_products)
 					@foreach($feature_products as $post)
 					@if($post->advertisement)
 					<div class="col-12 col-sm-6 col-md-4 col-lg-3 pad-l-0">
 						<div class="product-list">
 							<div class="product">
 								<div class="product-img-p">
 									<div class="product-img">
 										<img class="cover" src="{{('ad_thumbnail/'.@$post->advertisement->coverImage->image) }}" alt="product">
 									</div>
 									<span class="img-txt">@ {{str_replace("-"," ",ucfirst(@$post->advertisement->form_type))}}</span>
 									<span class="img-txt1">@ {{ucfirst(@$post->advertisement->type)}}</span>
 								</div>
 								<div class="product-txt">
 									<div class="product-price">${{@$post->advertisement->price}} 
 										<span class="fav" onclick="addToFavourite('<?= $post->advertisement['_id'] ?>')"style='top: 10px;right: 11px;'>
 											<i class="far fa-heart"></i>
 										</span>
 									</div>
 									<div class="product-tlt">{{ucfirst(@$post->advertisement->title)}}</div>
 									<div class="product-time">{{@$post->advertisement->created_at->diffForHumans()}}</div>
 									<div class="view-btn">
 										<a onclick="addToLastVisit('<?= $post->advertisement['_id'] ?>')" href="{{url('advertisement-details',['cat' => 'transport','form_type' => @$post->advertisement->form_type,'post_id' => @$post->advertisement->_id])}}" class="text-light" >@lang('frontend.button.view')</a>
 									</div>
 								</div>
 							</div>
 						</div>
 					</div>
 					@endif
 					@endforeach
 					@else
 					@lang('frontend.message.no.feature.product')
 					@endif
 				</div>
 			</div>
 		</div>
 		<div class="col-2 pad-0">
 			@foreach(@$ad_products as $post)
 			@if($post->advertisement)
 			<div class="col-12 col-sm-12 col-md-12 col-lg-12 pad-l-0"style="margin-bottom: 15px;">
 				<div class="product-list">
 					<div class="product">
 						<div class="product-img-p">
 							<div class="product-img">
 								<img class="cover" src="{{('ad_thumbnail/'.@$post->advertisement->coverImage->image) }}" alt="product">
 							</div>
 							<span class="img-txt">@ {{str_replace("-"," ",ucfirst(@$post->advertisement->form_type))}}</span>
 							<span class="img-txt1">@ {{ucfirst(@$post->advertisement->type)}}</span>
 						</div>
 						<div class="product-txt">
 							<div class="product-price">${{@$post->advertisement->price}} 
 								<span class="fav" onclick="addToFavourite('<?= $post->advertisement['_id'] ?>')"style='top: 10px;right: 11px;'>
 									<i class="far fa-heart"></i>
 								</span>
 							</div>
 							<div class="product-tlt">{{ucfirst(@$post->advertisement->title)}}</div>
 							<div class="product-time">{{@$post->advertisement->created_at->diffForHumans()}}</div>
 							<div class="view-btn"> 
 								<a onclick="addToLastVisit('<?= $post->advertisement['_id'] ?>')" href="{{url('advertisement-details',['cat' => 'transport','form_type' => @$post->advertisement->form_type,'post_id' => @$post->advertisement->_id])}}" class="text-light" >@lang('frontend.button.view')
 								</a>  
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 			@endif
 			@endforeach
 		</div>
 	</div>
 </section>
 @endsection
 @section('script')
 <script>
 	$(document).ready(function(){
 		$('[data-toggle="tooltip"]').tooltip(); 
 		var h =$(".item-list-p").height() - 3;
 		$(".inner-cat").css({'top': h+'px'});
 		$( window ).resize(function() {
 			var h =$(".item-list-p").height() - 3;
 			$(".inner-cat").css({'top': h+'px'});
 		});
 	});
 	var swiper = new Swiper('.ctm-container', {
 		slidesPerView: 5,
 		spaceBetween: 15,
 		loop: false,
 		navigation: {
 			nextEl: '.swiper-button-next',
 			prevEl: '.swiper-button-prev',
 		},

 		breakpoints: {
 			1400: {
 				slidesPerView: 4,
 			},
 			1000: {
 				slidesPerView: 3,
 			},
 			700: {
 				slidesPerView: 2,
 			},
 			450: {
 				slidesPerView: 1,
 			}
 		}
 	});


 	$(document).ready(function(){

 		$(".item-list-p").click(function(){
 			window.val = $(this).find('.this_cat').val();
 			// alert(val);
 		});

 		$('#search').click(function(){
 			// var aaa = $('.active').find('.this_cat').val();
 			// alert(aaa);
 			if ($('.item-list-p').hasClass('active')){

 				var activeElement = document.getElementsByClassName('item-list-p active');

 				var activeElementValue = activeElement[0].querySelector('.this_cat').value;

 				if (activeElementValue == '') {
 					var activeElement = document.getElementsByClassName('inner-c-l show-h-nav active');
 					var activeElementValue = activeElement[0].querySelector('.this_inner_cat').value;
 				}else{
 					// console.log(activeElementValue)
 				}
 			}
 			else{
 				// console.log(2);
 			}

 			
 		});

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
 </script>
 @endsection