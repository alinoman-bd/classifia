@extends('frontend.app')
@section('style')
<style>
	.header-section {
		border-bottom: 1px solid #ddd;
	}
	.m-side-img a {
		height: 100%;
	}
	.setting a {
		display: inline-block;
	}
	.pagination {
		overflow-x: auto;
	}

	.pop-up {
		background: #fff;
		-webkit-box-shadow: 5px 7px 9px -4px #9e9e9e;
		-moz-box-shadow: 5px 7px 9px -4px #9e9e9e;
		box-shadow: 0px 4px 10px -6px #9e9e9e;
		border: 1px solid #80bdff;
		margin-top: 3px;
		border-radius: 3px;
		position: absolute;
		width: 100%;
		z-index: 1;
		max-height: 270px;
		overflow-y: auto;
		display: none;
	}
	.pop-up ul li {
		cursor: pointer;
		list-style: none;
		text-align: left;
		border-bottom: 1px solid #ddd;

	}
	.pop-up ul li:last-child {
		border-bottom: none;
	}
	.pop-up ul li span {
		color: #888;
		display: block;
		font-size: 16px;
		padding: 8px 15px;
		position: relative;
		text-transform: capitalize;
	}
	.pop-up ul li span:before {
		display: none;
		content: "\2192";
		position: absolute;
		top: 0;
		font-size: 23px;
		left: 10px;
	}
	.pop-up ul li span:hover {
		color: #fff;
		background: #DA233C;
	}
	.pop-up ul li span i {
		position: relative;
		top: 3px;
		margin-right: 8px;
		color: red;
	}
	.fav{
		position: absolute;
		right: 0;
		top: -5px;
	}
	.user-profile-section .m-side-list .m-side-img {
		width: 20% !important;
	}
	.user-profile-section .m-side-list .m-side-cnt {
		width: 80% !important;
		padding-right: 0;
	}
	.user-profile-section .map-sidebar .m-side-list .fav {
		transform: scale(1);
		transition: .4s ease all;
		cursor: pointer;
	}
	.user-profile-section .map-sidebar .m-side-list .fav:hover {
		transform: scale(1.5);
		color: #e2b715;
	}
	.search-item{
		display: none;
	}
</style>
@endsection
@section('content')

<section class="user-profile-section">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">search result</li>
		</ol>
	</nav>
	<div class="row mar-0">
		<div class="col-lg-3 pad-0" >
			<div class="user-info" id="userSidebar">
				<div class="search">
					<form action="{{url('search-result')}}" method="get">
						<div class="row mar-0">
							<div class="col-sm-12 col-lg-12 pad-l-0 pop-body">
								<div class="form-group position-relative">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><img src="{{ asset('assets/img/search1.svg') }}" class="search-img" alt="lt flag"></span>
										</div>
										<input name="title" value="{{$title}}" type="text" class="form-control search-i" placeholder="@lang('frontend.button.search')" aria-label="title" aria-describedby="basic-addon1" onkeyup="serachTitle(event,this.value)" autocomplete="off">
									</div>
									<div class="pop-up pop-dctr">
										<img class="loading" src="{{asset('assets/img/loading.gif')}}" alt="">
										<ul class="pop-rslt pl-0 m-0 doc_show" id="">
											<!-- title suggestion -->
										</ul>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-lg-12  pad-l-0">
								<div class="form-group">
									<div class="ctm-select">
										<span class="select-icon"><img src="{{ asset('assets/img/category.svg') }}" alt="lt flag"></span>
										<div class="ctm-select-txt">
											@if($category)
											<span class="select-txt" id="category">{{$category}}</span>
											@else
											<span class="select-txt" id="category">@lang('frontend.label.category')</span>
											@endif
										</div>
										<span class="select-arr"><img src="{{ asset('assets/img/down-ar.svg') }}" alt="lt flag"></span>
										<input type="hidden" value="{{$category}}" name="category" id="catBox">
										<div class="ctm-option-box">
											<div class="ctm-option" onclick="setCategory(' ')" >Category</div>
											@foreach($all_cat as $m_category)
											<?php
											$str = $m_category->category_name;
											if ($str == 'house') {
												$url = 'realestate-browse';
											}elseif($str == 'cars'){
												$url = 'car-browse';
											}elseif($str == 'job'){
												$url = 'job-browse';
											}elseif($str == 'buy / sale'){
												$url = 'buy-sale-browse';
											}elseif($str == 'services'){
												$url = 'services-browse';
											}else{
												$url = $str;
											}
											?>
											<div class="ctm-option" onclick="setCategory('<?= $m_category->cat_key ?>')" >{{$m_category->category_name}}</div>
											@endforeach
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-lg-12 pad-l-0">
								<div class="form-group">
									<div class="ctm-select">
										<span class="select-icon"><img src="{{ asset('assets/img/map-pin.svg') }}" alt="lt flag"></span>
										<div class="ctm-select-txt">
											@if($city)
											<span class="select-txt" id="category"><?= $city?></span>
											@else
											<span class="select-txt" id="category">@lang('frontend.label.city')</span>
											@endif
										</div>
										<span class="select-arr"><img src="{{ asset('assets/img/down-ar.svg') }}" alt="lt flag"></span>
										<input type="hidden" value="{{$city}}" name="city" class="cityBox">
										<div class="ctm-option-box">
											<div class="ctm-option" onclick="srchCity('city',' ')"  >City</div>
											<div class="ctm-option" onclick="srchCity('city','Plats')"  >Plats</div>
											<div class="ctm-option" onclick="srchCity('city','Stockholm')"  >Stockholm</div>
											<div class="ctm-option" onclick="srchCity('city','Skåne')"  >Skåne</div>
											<div class="ctm-option" onclick="srchCity('city','Göteborg')" >Göteborg</div>
											<div class="ctm-option" onclick="srchCity('city','Östergötland')" >Östergötland</div>
											<div class="ctm-option" onclick="srchCity('city','Norrbotten')" >Norrbotten</div>
											<div class="ctm-option" onclick="srchCity('city','Uppsala')" >Uppsala</div>
											<div class="ctm-option" onclick="srchCity('city','Jönköping')" >Jönköping</div>
											<div class="ctm-option" onclick="srchCity('city','Älvsborg')" >Älvsborg</div>
											<div class="ctm-option" onclick="srchCity('city','Västerbotten')" >Västerbotten</div>
											<div class="ctm-option" onclick="srchCity('city','Västmanland')" >Västmanland</div>
											<div class="ctm-option" onclick="srchCity('city','Dalarna')" >Dalarna</div>
											<div class="ctm-option" onclick="srchCity('city','Örebro')" >Örebro</div>
											<div class="ctm-option" onclick="srchCity('city','Södermanland')" >Södermanland</div>
											<div class="ctm-option" onclick="srchCity('city','Västernorrland')" >Västernorrland</div>
											<div class="ctm-option" onclick="srchCity('city','Gävleborg')" >Gävleborg</div>
											<div class="ctm-option" onclick="srchCity('city','Skaraborg')" >Skaraborg</div>
											<div class="ctm-option" onclick="srchCity('city','Halland')" >Halland</div>
											<div class="ctm-option" onclick="srchCity('city','Utomlands')" >Utomlands</div>
											<div class="ctm-option" onclick="srchCity('city','Blekinge')" >Blekinge</div>
											<div class="ctm-option" onclick="srchCity('city','Kronoberg')" >Kronoberg</div>
											<div class="ctm-option" onclick="srchCity('city','Kalmar')" >Kalmar</div>
											<div class="ctm-option" onclick="srchCity('city','Norge')" >Norge</div>
											<div class="ctm-option" onclick="srchCity('city','Jämtland')" >Jämtland</div>
											<div class="ctm-option" onclick="srchCity('city','Gotland')" >Gotland</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-lg-12 pad-l-0 search-btn">
								<button type="submit" class="btn">@lang('frontend.button.search')</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-lg-9 pad-0">
			<div class="map-sidebar" id="loaddata">
				@if(@$items)
				@foreach($items as $post)
				@if($post->cat == 'cars')
				@php $category = 'transpost'; @endphp
				@elseif($post->cat == 'house')
				@php $category = 'realestate'; @endphp
				@elseif($post->cat == 'job')
				@php $category = 'job'; @endphp
				@elseif($post->cat == 'services')
				@php $category = 'services'; @endphp
				@elseif($post->cat == 'buy-sale')
				@php $category = 'buy-sale'; @endphp
				@endif
				<div class="m-side-list mar-b-15 "> <!-- active -->
					<div class="m-side-img">
						<a onclick="addToLastVisit('<?= @$post->_id?>')" href="{{url('advertisement-details',['cat' => @$category,'form_type' => @$post->form_type,'post_id' => @$post->_id])}}" class="re-link">
							<img class="cover" src="{{asset('ad_thumbnail/'.@$post->coverImage->image) }}" alt="{{@$post->coverImage->type}}">
						</a>
					</div>
					<div class="m-side-cnt">
						<span class="fav" onclick="addToFavourite('<?= $post->_id ?>')"><i class="far fa-heart"></i></span>
						<a onclick="addToLastVisit('<?= @$post->_id?>')" href="{{url('advertisement-details',['cat' => @$category,'form_type' => @$post->form_type,'post_id' => @$post->_id])}}" class="re-link">
							<div class="star"><i class="far fa-star"></i> Features</div>
							<div class="loc-name"><i class="fas fa-map-marker-alt"></i>
								{{@$post->address}}
							</div>
							<div class="house-name">
								{{ucfirst(@$post->title)}}
							</div>
							<div class="house-name"style="font-size: 14px;">
								{{ucfirst(@$post->cat)}} | {{ucfirst(@$post->form_type)}}
							</div>
							<div class="house-name">
								$ {{@$post->price}}
							</div>
							<div class="house-price-len">
								<span class=""><i class="far fa-clock"></i>
									{{@$post->created_at?@$post->created_at->diffForHumans(): ''}}
								</span>
							</div>
						</div>
					</a>
				</div>
				@endforeach
				{{$items->links()}}
				@else
				<h4>no match found</h4>
				@endif
			</div>
		</div>
	</div>
</section>
@endsection
@section('script')
<script>
	function setCategory(value){
    // console.log(value.replace(" / ", "-"));
    $("#catBox").val(value.replace(" / ", "-"));
}
</script>
@endsection
