@extends('frontend.app')
@section('style')
<!-- style -->
<style>
	.in-cat-tab {
		border-left: 1px solid #ddd;
	}

	.sub-cat-tab {
		border-left: 1px solid #ddd;
	}

	.header-section {
		border-bottom: 1px solid #ddd;
	}

	.category-section {
		padding-top: 40px;
	}
</style>
@endsection
@section('content')
<section class="category-section sec-pad">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Category</li>
		</ol>
	</nav>
	<div class="services">
		<div class="section-tlt"><span>1.</span> Please choose category</div>
		<div class="row mar-0">
			@php $n = 1 @endphp
			@foreach($main_categories as $m_category)
			<div class="col-6 col-sm-4 col-md-3 col-lg-2 pad-l-0">
				<div class="item-list cat-m-li
 				@if($root)
 				<?= $root == $m_category->category_name ? 'active' : '' ?>
 				@else
 				<?= $n == 3 ? 'active' : '' ?>
 				@endif ">
					<div class="item-icon">
						<span class="item-img"><img src="{{ asset('assets/img/mainCatIcon/'.$m_category->icon1)}}" alt="lt flag"></span>
						<span class="item-h-img"><img src="{{ asset('assets/img/mainCatIcon/'.$m_category->icon2)}}" alt="lt flag"></span>
					</div>
					<div class="item-txt">{{$m_category->category_name}}</div>
				</div>
			</div>
			@php ++$n @endphp
			@endforeach
		</div>
	</div>
	<div class="category-menu-all">
		@php $n = 1 @endphp
		@foreach($main_categories as $m_category)
		@if($m_category->slug == "job-browse")
		<div class="category-menu d-none">
			<div class="section-tlt"><span>2.</span>Find or Get Job</div>
			<div class="job-cnt">
				<div class="rea-br-btn">
					<a href="{{url('job', 'find-job')}}"><button class="btn ctm-btn buy-btn">Find Job</button></a>
					<a href="{{url('job', 'get-job')}}"><button class="btn ctm-btn rent-btn">Get Job</button></a>
				</div>
			</div>
		</div>
		@elseif($m_category->slug == "buy-sale-browse")
		<div class="category-menu buy-sale-in-tab d-none">
			<div class="section-tlt"><span>2.</span>Buy sale Accessories</div>
			<div class="row mar-0">
				<div class="col-12 col-sm-6 col-md-4 pad-0">
					<div class="cat-tab">
						<div class="cat-ul ctm-cat-ul">
							@foreach($sub_categories as $sub_cat)
							@if($m_category->_id == $sub_cat->main_cat_id)
							<?php
							$check_inner = App\InnerCategory::where('sub_cat_id', $sub_cat->_id)->get();
							?>
							@if($check_inner->count() == 0)
							<?php $str  = urldecode($sub_cat->slug); ?>
							<a href="{{route('buy.sale',['sub_cat' => $str ])}}">
								@endif
								<div class="cat-li">
									<span class="cat-li-img">
										<img src="{{ asset('assets/img/subCatIcon/'.$sub_cat->icon)}}" alt="lt flag">
									</span>
									<span class="cat-li-h-img">
										<img src="{{ asset('assets/img/subCatIcon/'.$sub_cat->icon)}}" alt="lt flag">
									</span>
									{{$sub_cat->category_name}}
								</div>
							</a>
							@endif
							@endforeach
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-md-4 pad-0">
					@foreach($sub_categories as $sub_cat)
					@if($m_category->_id == $sub_cat->main_cat_id)
					<div class="sub-cat-tab d-none">
						<div class="cat-ul sub-cat-ul">
							@foreach($inner_categories as $inner_cat)
							@if($sub_cat->_id == $inner_cat->sub_cat_id && $m_category->_id == $inner_cat->main_cat_id)
							<?php
							$check_th_inner = App\ThirdInner::where('inner_cat_id', $inner_cat->_id)->get();
							?>
							@if($check_th_inner->count() == 0)
							<?php $str  = urldecode($inner_cat->slug); ?>
							<a href="{{route('buy.sale',['sub_cat' => $sub_cat->slug, 'inner_cat' => $str ])}}">
								<!--  -->
								@endif
								<div class="cat-li in-cat-show">
									<span class="cat-li-img">
										<img src="{{ asset('assets/img/innerCatIcon/'.$inner_cat->icon)}}" alt="img-alt">
									</span>
									<span class="cat-li-h-img">
										<img src="{{ asset('assets/img/innerCatIcon/'.$inner_cat->icon)}}" alt="img-alt">
									</span>{{$inner_cat->category_name}}
								</div>
							</a>
							@endif
							@endforeach
						</div>
					</div>
					@endif
					@endforeach
				</div>
				<div class="col-12 col-sm-6 col-md-4 pad-0">
					@php $in=0; @endphp
					@foreach($sub_categories as $sub_cat)
					@if($m_category->_id == $sub_cat->main_cat_id)
					@foreach($inner_categories as $inner_cat)
					@if($sub_cat->_id == $inner_cat->sub_cat_id && $m_category->_id == $inner_cat->main_cat_id)
					<div class="in-cat-tab d-none">
						<div class="cat-ul in-cat-ul">
							@foreach($third_inners as $th_inr)
							@if($inner_cat->_id == $th_inr->inner_cat_id && $sub_cat->_id == $th_inr->sub_cat_id)
							<?php $str  = urldecode($th_inr->slug); ?>
							<a href="{{route('buy.sale',['sub_cat' => $sub_cat->slug, 'inner_cat' => $inner_cat->slug, 'th_cat' => $str ])}}">
								<div class="cat-li">
									<span class="cat-li-img">
										<img src="http://ad2.igonet.lt/assets/img/subCatIcon/icon_1587880268.png" alt="img-alt">
									</span>
									<span class="cat-li-h-img">
										<img src="http://ad2.igonet.lt/assets/img/subCatIcon/icon_1587880268.png" alt="img-alt">
									</span>{{$th_inr->category_name}}
								</div>
							</a>
							@endif
							@endforeach
						</div>
					</div>
					@endif
					@endforeach
					@endif
					@endforeach
				</div>
			</div>
		</div>
		@elseif($m_category->slug == "services-browse")
		<div class="category-menu services-in-tab d-none">
			<div class="section-tlt"><span>2.</span>Type of Services</div>
			<div class="row mar-0">
				<div class="col-12 col-sm-6 col-md-4 pad-0">
					<div class="cat-tab">
						<div class="cat-ul ctm-cat-ul">
							@foreach($sub_categories as $sub_cat)
							@if($m_category->_id == $sub_cat->main_cat_id)
							<?php
							$check_inner = App\InnerCategory::where('sub_cat_id', $sub_cat->_id)->get();
							?>
							@if($check_inner->count() == 0)
							<?php $str  = urldecode($sub_cat->slug); ?>
							<a href="{{route('services',['sub_cat' => $str ])}}">
								@endif
								<div class="cat-li">
									<span class="cat-li-img">
										<img src="{{ asset('assets/img/subCatIcon/'.$sub_cat->icon)}}" alt="lt flag">
									</span>
									<span class="cat-li-h-img">
										<img src="{{ asset('assets/img/subCatIcon/'.$sub_cat->icon)}}" alt="lt flag">
									</span>
									{{$sub_cat->category_name}}
								</div>
							</a>
							@endif
							@endforeach
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-md-4 pad-0">
					@foreach($sub_categories as $sub_cat)
					@if($m_category->_id == $sub_cat->main_cat_id)
					<div class="sub-cat-tab d-none">
						<div class="cat-ul sub-cat-ul">
							@foreach($inner_categories as $inner_cat)
							@if($sub_cat->_id == $inner_cat->sub_cat_id && $m_category->_id == $inner_cat->main_cat_id)
							<?php
							$check_th_inner = App\ThirdInner::where('inner_cat_id', $inner_cat->_id)->get();
							?>
							@if($check_th_inner->count() == 0)
							<?php $str  = urldecode($inner_cat->slug); ?>
							<a href="{{route('services', ['sub_cat' => $sub_cat->slug, 'inner_cat' => $str ])}}">
								@endif
								<div class="cat-li in-cat-show">
									<span class="cat-li-img">
										<img src="{{ asset('assets/img/innerCatIcon/'.$inner_cat->icon)}}" alt="img-alt">
									</span>
									<span class="cat-li-h-img">
										<img src="{{ asset('assets/img/innerCatIcon/'.$inner_cat->icon)}}" alt="img-alt">
									</span>{{$inner_cat->category_name}}
								</div>
							</a>
							@endif
							@endforeach
						</div>
					</div>
					@endif
					@endforeach
				</div>
				<div class="col-12 col-sm-6 col-md-4 pad-0">
					@php $in=0; @endphp
					@foreach($sub_categories as $sub_cat)
					@if($m_category->_id == $sub_cat->main_cat_id)
					@foreach($inner_categories as $inner_cat)
					@if($sub_cat->_id == $inner_cat->sub_cat_id && $m_category->_id == $inner_cat->main_cat_id)
					<div class="in-cat-tab d-none">
						<div class="cat-ul in-cat-ul">
							@foreach($third_inners as $th_inr)
							@if($inner_cat->_id == $th_inr->inner_cat_id && $sub_cat->_id == $th_inr->sub_cat_id)
							<?php $str  = urldecode($th_inr->slug); ?>
							<a href="{{route('services', ['sub_cat' => $sub_cat->slug, 'inner_cat' => $inner_cat->slug, 'th_cat' => $str ])}}">
								<div class="cat-li">
									<span class="cat-li-img">
										<img src="http://ad2.igonet.lt/assets/img/subCatIcon/icon_1587880268.png" alt="img-alt">
									</span>
									<span class="cat-li-h-img">
										<img src="http://ad2.igonet.lt/assets/img/subCatIcon/icon_1587880268.png" alt="img-alt">
									</span>{{$th_inr->category_name}}
								</div>
							</a>
							@endif
							@endforeach
						</div>
					</div>
					@endif
					@endforeach
					@endif
					@endforeach
				</div>
			</div>
		</div>
		@elseif($m_category->slug == "car-browse")
		<div class="category-menu d-none">
			<div class="section-tlt"><span>2.</span>Type of Vehicle</div>
			<div class="row mar-0">
				<div class="col-12 col-sm-6 col-md-4 pad-0">
					<div class="cat-tab">
						<div class="cat-ul ctm-cat-ul">
							@foreach($sub_categories as $sub_cat)
							@if($m_category->_id == $sub_cat->main_cat_id)
							<?php
							$check_inner = App\InnerCategory::where('sub_cat_id', $sub_cat->_id)->get();
							?>
							@if($check_inner->count() == 0)
							<?php $str  = urldecode($sub_cat->slug); ?>
							<a href="{{route('transport', ['sub_cat' => $str ])}}">
								@endif
								<div class="cat-li">
									<span class="cat-li-img">
										<img src="{{ asset('assets/img/subCatIcon/'.$sub_cat->icon)}}" alt="lt flag">
									</span>
									<span class="cat-li-h-img">
										<img src="{{ asset('assets/img/subCatIcon/'.$sub_cat->icon)}}" alt="lt flag">
									</span>
									{{$sub_cat->category_name}}
								</div>
							</a>
							@endif
							@endforeach
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-md-4 pad-0">
					@foreach($sub_categories as $sub_cat)
					@if($m_category->_id == $sub_cat->main_cat_id)
					<div class="sub-cat-tab d-none">
						<div class="cat-ul sub-cat-ul">
							@foreach($inner_categories as $inner_cat)
							@if($sub_cat->_id == $inner_cat->sub_cat_id && $m_category->_id == $inner_cat->main_cat_id)
							<?php $str  = urldecode($inner_cat->slug); ?>
							<a href="{{ route('transport', ['sub_cat' => $sub_cat->slug, 'inner_cat' => $str ] ) }}">
								<div class="cat-li">
									<span class="cat-li-img">
										<img src="{{ asset('assets/img/innerCatIcon/'.$inner_cat->icon)}}" alt="img-alt">
									</span>
									<span class="cat-li-h-img">
										<img src="{{ asset('assets/img/innerCatIcon/'.$inner_cat->icon)}}" alt="img-alt">
									</span>{{$inner_cat->category_name}}
								</div>
							</a>
							@endif
							@endforeach
						</div>
					</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
		@else
		<div class="category-menu
 	@if($root)
 	<?= $root == 'house' ? 'car-menu' : 'd-none' ?>
 	@else
 	<?= $n == 3 ? 'car-menu' : 'd-none' ?>
 	@endif">
			<div class="section-tlt"><span>2.</span>Type of House</div>
			<div class="row mar-0">
				<div class="col-12 col-sm-6 col-md-4 pad-0">
					<div class="cat-tab">
						<div class="cat-ul ctm-cat-ul">
							@foreach($sub_categories as $sub_cat)
							@if($m_category->_id == $sub_cat->main_cat_id)
							<?php
							$check_inner = App\InnerCategory::where('sub_cat_id', $sub_cat->_id)->get();
							?>
							@if($check_inner->count() == 0)
							<?php $str  = urldecode($sub_cat->slug); ?>

							@if($m_category->slug !== 'realestate-browse')
							<a href="{{url('/editing',$str)}}">
								@endif
								<div class="cat-li">
									<span class="cat-li-img">
										<img src="{{ asset('assets/img/subCatIcon/'.$sub_cat->icon)}}" alt="lt flag">
									</span>
									<span class="cat-li-h-img">
										<img src="{{ asset('assets/img/subCatIcon/'.$sub_cat->icon)}}" alt="lt flag">
									</span>
									{{$sub_cat->category_name}}
								</div>
							</a>
							@else
							<div class="cat-li">
								<span class="cat-li-img">
									<img src="{{ asset('assets/img/subCatIcon/'.$sub_cat->icon)}}" alt="lt flag">
								</span>
								<span class="cat-li-h-img">
									<img src="{{ asset('assets/img/subCatIcon/'.$sub_cat->icon)}}" alt="lt flag">
								</span>
								{{$sub_cat->category_name}}
							</div>
							@endif
							@endif
							@endforeach
						</div>
					</div>
				</div>

				<div class="col-12 col-sm-6 col-md-4 pad-0">
					@foreach($sub_categories as $sub_cat)
					@if($m_category->_id == $sub_cat->main_cat_id)
					@if($m_category->slug == 'realestate-browse')
					<div class="sub-cat-tab d-none">
						<div class="cat-ul sub-cat-ul">
							<div class=" car-tab-cnt">
								<div class="rea-type-tlt">Action</div>
								<div class="rea-br-btn">
									<a href="{{url('house',[$sub_cat->slug,'sale'])}}"><button class="btn ctm-btn buy-btn">For Sale</button></a>
									<a href="{{url('house',[$sub_cat->slug,'rent'])}}"><button class="btn ctm-btn rent-btn">For Rent</button></a>
								</div>
							</div>
						</div>
					</div>
					@else
					<div class="sub-cat-tab d-none">
						<div class="cat-ul sub-cat-ul">
							@foreach($inner_categories as $inner_cat)
							@if($sub_cat->_id == $inner_cat->sub_cat_id && $m_category->_id == $inner_cat->main_cat_id)
							<?php $str  = urldecode($inner_cat->slug); ?>
							<!-- <a href="{{url('/editing', $sub_cat->category_name == 'cars' ? 'used-cars' : $str)}} -->
							<!-- "> -->
							<a href="{{url('editing',$str)}}">
								<div class="cat-li">
									<span class="cat-li-img">
										<img src="{{ asset('assets/img/innerCatIcon/'.$inner_cat->icon)}}" alt="img-alt">
									</span>
									<span class="cat-li-h-img">
										<img src="{{ asset('assets/img/innerCatIcon/'.$inner_cat->icon)}}" alt="img-alt">
									</span>{{$inner_cat->category_name}}
								</div>
							</a>
							<!-- </a> -->
							@endif
							@endforeach
						</div>
					</div>
					@endif
					@endif
					@endforeach
				</div>
			</div>
		</div>
		@endif
		@php ++$n @endphp
		@endforeach
	</div>
</section>
@endsection
@section('script')
@endsection