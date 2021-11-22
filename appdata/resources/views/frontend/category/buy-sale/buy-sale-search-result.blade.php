@extends('frontend.app')
@section('style')
<style>
	.swiper-button-prev,
	.swiper-button-next {
		height: auto;
		top: 65%;
	}

	.search .search-btn button {
		height: 35px;
		line-height: 19px;
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
</style>
@endsection
@section('content')
<section class=" ss-section realestate-search car-result">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">buy sale search</li>
		</ol>
	</nav>
	<div class="search">
		<div class="row mar-0">
			<div class="col-12 col-sm-10 pad-0">
				<div class="search-service tab-w-name car-s-rslt search-tab ss d-block mb-3">
					<ul class="nav nav-pills nav-fill justify-content-center">
						<li class="nav-item" data-toggle="tooltip" data-placement="top" title="All Category">
							<div
								class="item-list slug-cat-buy-sale single-item-select act-cat show-side-nav hide-car-inner-cat">
								<input type="hidden" class="this_cat" value="">

								<input type="hidden" class="cat-name-m" style="" value="All" />
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
								class="item-list act-cat single-item-select show-nav-con @if(App\InnerCategory::where('sub_cat_id',$sub->_id)->get()->count() > 0) show-car-inner-cat inn_c @else hide-car-inner-cat show-side-nav slug-cat-buy-sale @endif ">
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
								<div class="inner-cat d-none">
									<div class="arrow-up"></div>
									@foreach($inner_categories as $inner)
									@if($inner->sub_cat_id == $sub->_id)
									<div class="inner-c-l show-h-nav"><img
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
							<div class="inner-c-l show-side-nav slug-cat-buy-sale act-innr">
								<img src="{{ asset('assets/img/innerCatIcon/'.$inner->icon)}}"
									alt="lt flag">{{ucfirst($inner->category_name)}}
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
				<button type="submin" form="filterBuySale" class="btn">search</button>
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
	<div class="search-slct">
		<div class="slct-itm">
			<span>
				<svg xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" viewBox="0 0 20 20">
					<g id="grid" transform="translate(-2 -2)">
						<rect id="Rectangle_70" data-name="Rectangle 70" width="7" height="7" transform="translate(3 3)"
							stroke-width="2" stroke="#cacaca" stroke-linecap="round" stroke-linejoin="round"
							fill="none" />
						<rect id="Rectangle_71" data-name="Rectangle 71" width="7" height="7"
							transform="translate(14 3)" stroke-width="2" stroke="#cacaca" stroke-linecap="round"
							stroke-linejoin="round" fill="none" />
						<rect id="Rectangle_72" data-name="Rectangle 72" width="7" height="7"
							transform="translate(14 14)" stroke-width="2" stroke="#cacaca" stroke-linecap="round"
							stroke-linejoin="round" fill="none" />
						<rect id="Rectangle_73" data-name="Rectangle 73" width="7" height="7"
							transform="translate(3 14)" stroke-width="2" stroke="#cacaca" stroke-linecap="round"
							stroke-linejoin="round" fill="none" />
					</g>
				</svg>
			</span>
			<span>
				<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 14">
					<g id="list" transform="translate(-2 -5)">
						<line id="Line_17" data-name="Line 17" x2="13" transform="translate(8 6)" fill="none"
							stroke="#757575" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
						<line id="Line_18" data-name="Line 18" x2="13" transform="translate(8 12)" fill="none"
							stroke="#757575" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
						<line id="Line_19" data-name="Line 19" x2="13" transform="translate(8 18)" fill="none"
							stroke="#757575" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
						<line id="Line_20" data-name="Line 20" x2="0.01" transform="translate(3 6)" fill="none"
							stroke="#757575" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
						<line id="Line_21" data-name="Line 21" x2="0.01" transform="translate(3 12)" fill="none"
							stroke="#757575" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
						<line id="Line_22" data-name="Line 22" x2="0.01" transform="translate(3 18)" fill="none"
							stroke="#757575" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
					</g>
				</svg>

			</span>
			<span>Show items</span>
			<span>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10 pad-l-10">
						<span class="select-txt" id="city">category</span>
					</div>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					<div class="ctm-option-box">
						<div class="ctm-option">category</div>
						<div class="ctm-option">category</div>
						<div class="ctm-option">category</div>
						<div class="ctm-option">category</div>
					</div>
				</div>
			</span>
		</div>
	</div>
	<div class="search-box">
		<div class="row mar-0">
			<div class="col-md-5 col-lg-3 pad-0">
				<form id="filterBuySale" method="post">
					@csrf
					<input type="hidden" name="form_type" id="formType">
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
											<input type="number" name="min_price" class="form-control" placeholder="0"
												aria-label="Username" aria-describedby="basic-addon1">
										</div>
									</div>
									<div class="col-6 pad-r-0 price-i">
										<label for="basic-url">To</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">$</span>
											</div>
											<input type="number" name="max_price" class="form-control" placeholder="0"
												aria-label="Username" aria-describedby="basic-addon1">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row mar-0">
							<div class="col-12 p-0">
								<div class="form-group ctm-form-group">
									<label class="ctm-form-label">Title</label>
									<div class="form-cnt">
										<input type="text" class="form-control" name="title">
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 search-btn" style="margin-top: 20px;">
							<button class="btn btn-danger" type="submit" id="search">Seach</button>
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-7 pad-0">
				<div class="map-sidebar" id="loaddata">
					@include('frontend.category.buy-sale.buysale-listing-section')
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
	$(document).ready(function(){
		// $('.item-list').hover(function(event){
		// 	var relX = event.pageX - (event.pageX - $(this).offset().left);
		// 	console.log(relX);
		// }, function(){
 	// 	console.log(5);
		// });
	});
		
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


		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();   

			window.filter_buy_sale_by = '<?= url('filter-buy-sale-by-all-values')?>'
			window.check_actve_match_menu_buysale = '<?= url('get-active-menu-data-buy-sale')?>'
		});
</script>
@endsection