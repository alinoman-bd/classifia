 @extends('frontend.app')
 @section('style')
 <link rel="stylesheet" type="text/css" href="{{ asset('assets/gallery/fancybox.css') }}">
 <style>
 </style>
 @endsection

 @section('content')
 <section class="ss-section realestate-details">
 	<nav aria-label="breadcrumb">
 		<ol class="breadcrumb">
 			<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
 			<li class="breadcrumb-item active" aria-current="page">Buy Sale Details</li>
 		</ol>
 	</nav>
 	<div class="row mar-0">
 		<div class="col-12 col-lg-8 pad-l-0">
 			<div class="g-v d-none">
 				@foreach($images as $key => $value)
 				<a href="{{ asset('/buySaleImages/'.$value->image) }}" data-g-itm='{{$key}}' data-fancybox="gallery">
 					<div class="content-img">
 						<img src="{{ asset('/buySaleImages/'.$value->image) }}" alt="img">
 					</div>
 				</a>
 				@endforeach
 			</div>
 			<div class="gallery-slider">
 				<div class="swiper-container gallery-top">
 					<span class="z-btn"><i class="fas fa-search-plus" onclick="zoomProductImg(0)"></i></span>
 					<div class="swiper-wrapper">
 						@foreach($images as $key => $value)
 						<div class="swiper-slide">
 							<div class="slider-img hw-100">
 								<img class="cover" src="{{ asset('/buySaleImages/'.$value->image) }}" alt="product">
 							</div>
 						</div>
 						@endforeach
 					</div>
 					<!-- Add Arrows -->
 					<div class="swiper-button-next swiper-button-white" onclick="nextM()"></div>
 					<div class="swiper-button-prev swiper-button-white"></div>
 				</div>
 				<div class="gallery-nav">
 					<div class="swiper-container gallery-thumbs">
 						<div class="swiper-wrapper" >
 							@foreach($images as $key => $value)
 							<div class="swiper-slide" onclick="chanZId({{$key}})">
 								<div class="slider-img hw-100">
 									<img class="cover" src="{{ asset('/buySaleImages/'.$value->image) }}" alt="product">
 								</div>
 							</div>
 							@endforeach
 						</div>
 						<div class="all-img-show" onclick="zoomProductImg(0)">
 							<div class="more-img-txt">+ <span></span></div>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 		<div class="col-12 col-lg-4 pad-0">
 			<div class="address-d">
 				<div class="phn-num"> <i class="fa fa-phone"></i> {{@$advertisement->userInfo->contact_number}}</div>
 				

 				<div class="address-txt-a">
 					<div class="address-tlt">Title</div>
 					<div class="address-txt">
 						{{$advertisement->title}}		
 					</div>
 				</div>

 				<div class="address-txt-a">
 					<div class="address-tlt">Memorized <i class="far fa-heart"></i> 7</div>
 				</div>
 				<div class="address-txt-a">
 					<div class="address-tlt">Reviewed by</div>
 					<div class="address-txt">1368/251 (iš viso/šiandien)</div>
 				</div>
 				<div class="address-txt-a">
 					<button style="background: #DA233C" class="btn btn-sm text-light" onclick="addToFavourite('<?= $advertisement->_id ?>')" >Add to favourite <span class="fav"><i class="far fa-heart"></i></span></button>
 				</div>
 				<div class="address-btn">
 					<a href="tel:{{@$advertisement->userInfo->contact_number}}">
 						<button class="btn call-btn">
 							<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 21.89 21.93">
 								<path id="phone_2_" data-name="phone (2)" d="M22,16.92v3a2,2,0,0,1-2.18,2,19.79,19.79,0,0,1-8.63-3.07,19.5,19.5,0,0,1-6-6A19.79,19.79,0,0,1,2.12,4.18,2,2,0,0,1,4.11,2h3a2,2,0,0,1,2,1.72,12.84,12.84,0,0,0,.7,2.81,2,2,0,0,1-.45,2.11L8.09,9.91a16,16,0,0,0,6,6l1.27-1.27a2,2,0,0,1,2.11-.45,12.84,12.84,0,0,0,2.81.7A2,2,0,0,1,22,16.92Z" transform="translate(-1.111 -1)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
 							</svg>Call
 						</button>
 					</a>
 					<a href="mailto:{{@$advertisement->userInfo->contact_mail}}">
 						<button class="btn w-btn">
 							<svg xmlns="http://www.w3.org/2000/svg" width="22.785" height="18" viewBox="0 0 22.785 18">
 								<g id="mail_2_" data-name="mail (2)" transform="translate(1.393 1)">
 									<path id="Path_99" data-name="Path 99" d="M4,4H20a2.006,2.006,0,0,1,2,2V18a2.006,2.006,0,0,1-2,2H4a2.006,2.006,0,0,1-2-2V6A2.006,2.006,0,0,1,4,4Z" transform="translate(-2 -4)" fill="none" stroke="#da233c" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
 									<path id="Path_100" data-name="Path 100" d="M22,6,12,13,2,6" transform="translate(-2 -4)" fill="none" stroke="#da233c" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
 								</g>
 							</svg>Write
 						</button>
 					</a>
 				</div>
 			</div>
 		</div>
 	</div>
 </section>
 <section class="realestate-price-d">
 	<div class="price-d">
 		<div class="price-r">{{$advertisement->price}} $ <!-- <span>(1 073 €/m<sup>2</sup>)</span> --></div>
 		<div class="realestate-d-list">
 			<div class="row mar-0">
 				<div class="col-12 col-md-7 col-lg-4 pad-l-0">
 					<div class="realestate-d-cnt cnt-after">
 						<table class="table">
 							<tbody>
 								@if($advertisement->address)
 								<tr>
 									<th>Address:</th>
 									<td>{{$advertisement->address}}</td>
 								</tr>
 								@endif
 							</tbody>
 						</table>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 	<div class="details-des">
 		<div class="row mar-0">
 			<div class="col-12 col-sm-8 pad-l-0">
 				<div class="details-des-tlt">Description</div>
 				<div class="details-des-txt">
 					<p> {{$advertisement->description}}</p>
 				</div>
 			</div>
 			<div class="col-12 col-sm-4 pad-r-0">
 				<div class="ad">
 					ad
 				</div><div class="ad">
 					ad
 				</div><div class="ad">
 					ad
 				</div><div class="ad">
 					ad
 				</div>
 			</div>
 		</div>
 	</div>
 </section>

 <section class="product-wrapper similar-post">
 	<div class="row mar-0">
 		<div class="col-12 pad-0">
 			<div class="section-tlt"> Similar posts</div>
 		</div>
 		<div class="col-12 pad-0">
 			<div class="posted">
 				<div class="row mar-0">
 					<div class="col-12 col-sm-6 col-md-4 col-lg-3 pad-l-0">
 						<div class="product-list">
 							<div class="product">
 								<div class="product-img-p">
 									<div class="product-img">
 										<img class="cover" src="{{ asset('assets/img/car.jpg') }}" alt="product">
 									</div>
 									<span class="img-txt">@ Rigs</span>
 									<span class="img-txt1">@ cars</span>
 								</div>
 								<div class="product-txt">
 									<div class="product-price">$657585 <span class="fav"><i class="far fa-heart"></i></span></div>
 									<div class="product-tlt">Feature Products</div>
 									<div class="product-time">2 hrs ago</div>
 									<div class="view-btn">view +</div>
 								</div>
 							</div>
 						</div>
 					</div>
 					<div class="col-12 col-sm-6 col-md-4 col-lg-3 pad-l-0">
 						<div class="product-list">
 							<div class="product">
 								<div class="product-img-p">
 									<div class="product-img">
 										<img class="cover" src="{{ asset('assets/img/car.jpg') }}" alt="product">
 									</div>
 									<span class="img-txt">@ Rigs</span>
 									<span class="img-txt1">@ cars</span>
 								</div>
 								<div class="product-txt">
 									<div class="product-price">$657585 <span class="fav"><i class="far fa-heart"></i></span></div>
 									<div class="product-tlt">Feature Products</div>
 									<div class="product-time">2 hrs ago</div>
 									<div class="view-btn">view +</div>
 								</div>
 							</div>
 						</div>
 					</div>
 					<div class="col-12 col-sm-6 col-md-4 col-lg-3 pad-l-0">
 						<div class="product-list">
 							<div class="product">
 								<div class="product-img-p">
 									<div class="product-img">
 										<img class="cover" src="{{ asset('assets/img/car.jpg') }}" alt="product">
 									</div>
 									<span class="img-txt">@ Rigs</span>
 									<span class="img-txt1">@ cars</span>
 								</div>
 								<div class="product-txt">
 									<div class="product-price">$657585 <span class="fav"><i class="far fa-heart"></i></span></div>
 									<div class="product-tlt">Feature Products</div>
 									<div class="product-time">2 hrs ago</div>
 									<div class="view-btn">view +</div>
 								</div>
 							</div>
 						</div>
 					</div>
 					<div class="col-12 col-sm-6 col-md-4 col-lg-3 pad-l-0">
 						<div class="product-list">
 							<div class="product">
 								<div class="product-img-p">
 									<div class="product-img">
 										<img class="cover" src="{{ asset('assets/img/car.jpg') }}" alt="product">
 									</div>
 									<span class="img-txt">@ Rigs</span>
 									<span class="img-txt1">@ cars</span>
 								</div>
 								<div class="product-txt">
 									<div class="product-price">$657585 <span class="fav"><i class="far fa-heart"></i></span></div>
 									<div class="product-tlt">Feature Products</div>
 									<div class="product-time">2 hrs ago</div>
 									<div class="view-btn">view +</div>
 								</div>
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 </section>
 @endsection
 @section('script')
 <script src="{{ asset('assets/gallery/jquery.fancybox.js')}}"></script>
 <script>
 	
 	$(function() {
 		var count_all_item;
 		var count_all_item_v;
 		var count_itm;
 		$('.gallery-nav .swiper-slide').each(function(i, v) {
 			count_all_item=i;
 			if($(this).hasClass('swiper-slide-visible')){
 				count_all_item_v=i;	
 			}
 		});
 		count_itm=count_all_item-count_all_item_v;
 		$('.more-img-txt span').text(count_itm);
 		if(count_itm<=0) {
 			$('.all-img-show').hide();	
 		}
 	});

 </script>
 @endsection