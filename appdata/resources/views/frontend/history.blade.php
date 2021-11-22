@extends('frontend.app')
@section('style')
<style>
	.search-service .item-list {
		padding: 12px 0;
		width: 100%;
		margin: 0;
	}
	.swiper-button-prev, .swiper-button-next {
		height: auto;
		top: 65%;
	}
	.swiper-button-next {
		right: 0;
	}
	.map-sidebar .re-link {
		display: block;
	}
	@media screen and (max-width: 575px) {
		.search .col-12 {
			padding: 0;
		}
	}

	.select2-selection{
		padding: 7px;
	}
	.select2-selection__choice{
	}
	.swiper-slide{
		width: 65px !important;
	}
	.header-section {
		border-bottom: 1px solid #ddd;
	}
</style>
@endsection
@section('content')
<section class="realestate-search">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">History</li>
		</ol>
	</nav>
	<div class="search-box">
		<div class="row mar-0">
			<div class="col-md-8 offset-md-2 pad-0">
				<div class="map-sidebar" id="loaddata">
					@if(@$histories) 
					<h4>@lang('frontend.lastvisit.heading.history.yes')</h4>
					@foreach($histories as $post)
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
					@if($auth)
					{{$histories->links()}}
					@endif
					@else
					<h4>@lang('frontend.lastvisit.heading.history.no')</h4>
					@endif
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@section('script')
@endsection