 @extends('frontend.app')
 @section('style')
 <style>
 	.item-list-p {
 		position: relative;
 	}

 	.car-service .col-lg-3 {
 		padding-right: 10px;
 	}

 	@media screen and (max-width: 767px) {
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

 	@media screen and (max-width: 420px) {
 		.car-service .col-4 {
 			flex: 0 0 50%;
 			max-width: 50%;
 		}
 	}

 	@media (min-width: 992px) and (max-width: 1080px) {
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
 				<li class="breadcrumb-item active" aria-current="page">buy sale browse</li>
 			</ol>
 		</nav>
 		<div class="row">
 			<div class="col-md-7">
 				<div class="rea-ss-nav">
 					<ul class="nav nav-tabs" id="myTab" role="tablist">
 						<li class="nav-item">
 							<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">@lang('frontend.buysale.browse.tabtext')</a>
 						</li>
 						<!-- <li class="nav-item">
 							<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Rent</a>
 						</li> -->
 					</ul>
 					<div class="tab-content" id="myTabContent">
 						<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
 							<form action="{{url('search-buy-sale')}}" id="" class="formForBuySaleSearch" method="get" enctype="multipart/form-data">
 								@csrf
 								<div class="row mar-0">
 									<div class="col-12">
 										<div class="search-service car-service">
 											<div class="row ml-0 justify-content-center">
 												<div class="col-4  col-sm-3 col-md-4 col-lg-3 pad-l-0" data-original-title="All Category" data-toggle="tooltip" data-placement="left" title="">
 													<div class="item-list-p show-h-nav single-item-select">
 														<div class="item-list">
 															<div class="item-icon">

 																<span class="item-img"><img src="assets/img/home.jpg" alt="lt flag"></span>
 																<span class="item-h-img"><img src="assets/img/home.jpg" alt="lt flag"></span>
 															</div>
 														</div>
 														<input type="checkbox" class="cat-name" name="form_type[]" value="all" />
 														<input type="hidden" class="cat-name-m" value="all" />
 														<div class="item-txt">All Category</div>
 													</div>
 												</div>
 												@php $n = 1 @endphp
 												@foreach($sub_cats as $sub)
 												<div class="col-4 col-sm-3 col-md-4 col-lg-3 pad-l-0" data-original-title="{{$sub->category_name}}" data-toggle="tooltip" data-placement="left" title="">
 													<div class="item-list-p  sub single-item-select @if(App\InnerCategory::where('sub_cat_id',$sub->_id)->get()->count() == 0) show-h-nav @else show-nav-con @endif">
 														<div class="item-list">
 															<input type="hidden" class="this_cat" value="{{$sub->slug}}">
 															<div class="item-icon">
 																<span class="item-img"><img src="{{ asset('assets/img/subCatIcon/'.$sub->icon)}}" alt="lt flag"></span>
 																<span class="item-h-img"><img src="{{ asset('assets/img/subCatIcon/'.$sub->icon)}}" alt="lt flag"></span>
 															</div>
 														</div>
 														<input type="checkbox" class="cat-name" name="form_type[]" value="all" />
 														<input type="hidden" class="cat-name-m" value="{{$sub->category_name}}" />
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
 												<input type="text" class="formType form-control" id="formType" value="" name="form_type">
 												<input type="text" class="formType form-control" id="formType2" value="" name="form_type">
 											</div>
 										</div>
 									</div>
 									<div class="col-12">
 										<div class="select-cat-list">
 										</div>
 										<div class="sh-extra">
 											<span class="extra">@lang('frontend.label.expand') <i class="fas fa-chevron-down"></i></span>
 											<span class="hide">@lang('frontend.label.hide') <i class="fas fa-chevron-up"></i></span>
 										</div>
 										<div class="extra-box car-extra">
 											<div class="row mar-0 car-hide-nav">
 												<div class="col-12 col-sm-6 pad-l-0">
 													<div class="form-group">
 														<div class="col-12 p-0">
 															<label for="inputAddress">Title </label>
 														</div>
 														<div class="col-md-12 p-0">
 															<div class="form-group mb-3">
 																<input type="text" name="title" class="form-control" value="" placeholder="title">
 															</div>
 														</div>
 													</div>
 												</div>
 												<div class="col-12 col-sm-6 pad-l-0">
 													<div class="form-group">
 														<div class="col-12 p-0">
 															<label for="inputAddress">Price <span style="color:#DA233C; padding-left: 5px; ">$</span></label>
 														</div>
 														<div class="col-md-12 p-0">
 															<div class="form-group mb-3">
 																<input type="text" name="price" class="form-control" value="" placeholder="price">
 															</div>
 														</div>
 													</div>
 												</div>
 											</div>
 										</div>
 									</div>
 									<div class="col-12 search-btn">
 										<button class="btn" type="submit" id="search">@lang('frontend.button.search')</button>
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
 								<div class="carousel-item <?= $n == 1 ? 'active' : '' ?>">
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
 <section class="product-wrapper" style="background: #fff">
 	<div class="row mar-0">
 		<div class="col-12 pad-0">
 			<div class="section-tlt"> @lang('frontend.home.heading.feature')</div>
 		</div>
 		<div class="col-10 pad-0">
 			<div class="posted">
 				<div class="row mar-0">
 					@if(@$feature_products->count())
 					@foreach($feature_products as $post)
 					@if($post->advertisement)
 					<div class="col-12 col-sm-6 col-md-4 col-lg-3 pad-l-0">
 						<div class="product-list">
 							<div class="product">
 								<div class="product-img-p">
 									<div class="product-img">
 										<img class="cover" src="{{('ad_thumbnail/'.@$post->advertisement->coverImage->image) }}" alt="{{@$post->advertisement->coverImage->image}}">
 									</div>
 									<span class="img-txt">@ {{str_replace("-"," ",ucfirst(@$post->advertisement->form_type))}}</span>
 								</div>
 								<div class="product-txt">
 									<div class="product-price">${{@$post->advertisement->price}}
 										<span class="fav" onclick="addToFavourite('<?= $post->advertisement['_id'] ?>')" style='top: 10px;right: 11px;'>
 											<i class="far fa-heart"></i>
 										</span>
 									</div>
 									<div class="product-tlt">{{@$post->advertisement->title}}</div>
 									<div class="product-time">{{@$post->advertisement->created_at->diffForHumans()}}</div>
 									<div class="view-btn">
 										<a onclick="addToLastVisit('<?= $post->advertisement['_id'] ?>')" href="{{url('advertisement-details',['cat' => 'buy-sale','form_type' => @$post->advertisement->form_type,'post_id' => @$post->advertisement->_id])}}" class="text-light">@lang('frontend.button.view')</a>
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
 			@if($ad_products)
 			@foreach($ad_products as $post)
 			@if($post->advertisement)
 			<div class="col-12 col-sm-12 col-md-12 col-lg-12 pad-l-0" style="margin-bottom: 15px;">
 				<div class="product-list">
 					<div class="product">
 						<div class="product-img-p">
 							<div class="product-img">
 								<img class="cover" src="{{('ad_thumbnail/'.@$post->advertisement->coverImage->image) }}" alt="{{$post->advertisement->coverImage->image}}">
 							</div>
 							<span class="img-txt">{{ucfirst(@$post->advertisement->form_type)}}</span>
 						</div>
 						<div class="product-txt">
 							<div class="product-price">${{@$post->advertisement->price}} <span class="fav" onclick="addToFavourite('<?= $post->advertisement['_id'] ?>')"><i class="far fa-heart"></i></span></div>
 							<div class="product-tlt">{{@$post->advertisement->title}}</div>
 							<div class="product-time">{{@$post ? @$post->created_at->diffForHumans(): ''}}</div>
 							<div class="view-btn"> <a onclick="addToLastVisit('<?= $post->advertisement['_id'] ?>')" href="{{url('advertisement-details',['cat' => 'buy-sale','form_type' => @$post->advertisement->form_type,'post_id' => @$post->advertisement->_id])}}" class="text-light">@lang('frontend.button.view')</a> </div>
 						</div>
 					</div>
 				</div>
 			</div>
 			@endif
 			@endforeach
 			@endif
 		</div>
 	</div>
 </section>
 @endsection
 @section('script')
 <script>
 	$(document).ready(function() {
 		$('[data-toggle="tooltip"]').tooltip();
 		var h = $(".item-list-p").height() - 3;
 		$(".inner-cat").css({
 			'top': h + 'px'
 		});
 		$(window).resize(function() {
 			var h = $(".item-list-p").height() - 3;
 			$(".inner-cat").css({
 				'top': h + 'px'
 			});
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
 </script>
 @endsection