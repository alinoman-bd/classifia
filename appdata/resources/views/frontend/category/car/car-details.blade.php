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
 			<li class="breadcrumb-item active" aria-current="page">Car Details</li>
 		</ol>
 	</nav>
 	<div class="row mar-0">
 		<div class="col-12 col-lg-8 pad-l-0">
 			<div class="g-v d-none">
 				@foreach($images as $key => $value)
 				<a href="{{ asset('/carAdimages/'.$value->image) }}" data-g-itm='{{$key}}' data-fancybox="gallery">
 					<div class="content-img">
 						<img src="{{ asset('/carAdimages/'.$value->image) }}" alt="img">
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
 								<img class="cover" src="{{ asset('/carAdimages/'.$value->image) }}" alt="product">
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
 									<img class="cover" src="{{ asset('/carAdimages/'.$value->image) }}" alt="product">
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
 				<div class="phn-num"> <i class="fa fa-phone"></i> {{$advertisement->userInfo->contact_number}} </div>
 				<div class="address-txt-a">
 					<div class="address-tlt">Title </div>
 					<div class="address-txt">{{ucfirst($advertisement->title)}}</div>
 				</div>
 				@if($advertisement->seat_num)
 				<div class="address-txt-a">
 					<div class="address-tlt">Seat Number</div>
 					<div class="address-txt">{{$advertisement->seat_num}}</div>
 				</div>
 				@endif
 				@if($advertisement->train_type)
 				<div class="address-txt-a">
 					<div class="address-tlt">Auto Train Type</div>
 					<div class="address-txt">{{$advertisement->train_type}}</div>
 				</div>
 				@endif
 				@if($advertisement->make)
 				<div class="address-txt-a">
 					<div class="address-tlt">Make</div>
 					<div class="address-txt">{{ucfirst($advertisement->make)}}</div>
 				</div>
 				@endif
 				@if($advertisement->model)
 				<div class="address-txt-a">
 					<div class="address-tlt">Model</div>
 					<div class="address-txt">{{ucfirst($advertisement->model)}}</div>
 				</div>
 				@endif
 				@if($advertisement->manufature_year)
 				<div class="address-txt-a">
 					<div class="address-tlt">Manufature Year</div>
 					<div class="address-txt">
 						{{$advertisement->manufature_month}} / {{ucfirst($advertisement->manufature_year)}}
 					</div>
 				</div>
 				@endif
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
 					<a href="tel:{{$advertisement->userInfo->contact_number}}">
 						<button class="btn call-btn">
 							<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 21.89 21.93">
 								<path id="phone_2_" data-name="phone (2)" d="M22,16.92v3a2,2,0,0,1-2.18,2,19.79,19.79,0,0,1-8.63-3.07,19.5,19.5,0,0,1-6-6A19.79,19.79,0,0,1,2.12,4.18,2,2,0,0,1,4.11,2h3a2,2,0,0,1,2,1.72,12.84,12.84,0,0,0,.7,2.81,2,2,0,0,1-.45,2.11L8.09,9.91a16,16,0,0,0,6,6l1.27-1.27a2,2,0,0,1,2.11-.45,12.84,12.84,0,0,0,2.81.7A2,2,0,0,1,22,16.92Z" transform="translate(-1.111 -1)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
 							</svg>Call
 						</button>
 					</a>
 					<a href="mailto:{{$advertisement->userInfo->contact_mail}}">
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
 				<div class="col-12 col-md-6 col-lg-3 pad-l-0">
 					<div class="realestate-d-cnt cnt-after">
 						<table class="table">
 							<tbody>
 								@if($advertisement->minivan_type)
 								<tr>
 									<th>Minivan Type:</th>
 									<td>{{$advertisement->minivan_type}} </td>
 								</tr>
 								@endif
 								@if($advertisement->minibus_length)
 								<tr>
 									<th>Minibus Length:</th>
 									<td>{{$advertisement->minibus_length}} </td>
 								</tr>
 								@endif
 								@if($advertisement->minibus_height)
 								<tr>
 									<th>Minibus Height:</th>
 									<td>{{$advertisement->minibus_height}} </td>
 								</tr>
 								@endif
 								@if($advertisement->export_price)
 								<tr>
 									<th>Export Price:</th>
 									<td>{{$advertisement->export_price}} $</td>
 								</tr>
 								@endif
 								@if($advertisement->vat)
 								<tr>
 									<th>Vat:</th>
 									<td>{{$advertisement->vat}}</td>
 								</tr>
 								@endif
 								@if($advertisement->doors_number)
 								<tr>
 									<th>Number of doors:</th>
 									<td>{{$advertisement->doors_number}}</td>
 								</tr>
 								@endif
 								@if($advertisement->seat_number)
 								<tr>
 									<th>Number of Seats:</th>
 									<td>{{$advertisement->seat_number}}</td>
 								</tr>
 								@endif
 								@if($advertisement->str_wheel)
 								<tr>
 									<th>Steering Wheel:</th>
 									<td>{{$advertisement->str_wheel}}</td>
 								</tr>
 								@endif
 								@if($advertisement->wheel_size)
 								<tr>
 									<th>Wheel Size:</th>
 									<td>{{$advertisement->wheel_size}}</td>
 								</tr>
 								@endif
 								@if($advertisement->drivel_wheel)
 								<tr>
 									<th>Driven Wheels:</th>
 									<td>{{$advertisement->drivel_wheel}}</td>
 								</tr>
 								@endif
 								@if($advertisement->body_type)
 								<tr>
 									<th>Body Type:</th>
 									<td>{{$advertisement->body_type}}</td>
 								</tr>
 								@endif
 								@if($advertisement->color)
 								<tr>
 									<th>Color:</th>
 									<td>{{$advertisement->color}}</td>
 								</tr>
 								@endif
 								@if($advertisement->fuel_type)
 								<tr>
 									<th>Fuel Type:</th>
 									<td>{{$advertisement->fuel_type}}</td>
 								</tr>
 								@endif
 								@if($advertisement->fuel_tank_capacity)
 								<tr>
 									<th>Fuel Tank Capacity:</th>
 									<td>{{$advertisement->fuel_tank_capacity}}</td>
 								</tr>
 								@endif
 								@if($advertisement->mileage)
 								<tr>
 									<th>Mileage:</th>
 									<td>{{$advertisement->mileage}} {{$advertisement->mileage_unit}} </td>
 								</tr>
 								@endif
 								@if($advertisement->length)
 								<tr>
 									<th>Length:</th>
 									<td>{{$advertisement->length}} </td>
 								</tr>
 								@endif
 								@if($advertisement->width)
 								<tr>
 									<th>Width:</th>
 									<td>{{$advertisement->width}} </td>
 								</tr>
 								@endif
 								@if($advertisement->height)
 								<tr>
 									<th>Height:</th>
 									<td>{{$advertisement->height}} </td>
 								</tr>
 								@endif
 								@if($advertisement->volume)
 								<tr>
 									<th>Volume:</th>
 									<td>{{$advertisement->volume}} m³</td>
 								</tr>
 								@endif
 								@if($advertisement->layout)
 								<tr>
 									<th>Layout:</th>
 									<td>{{$advertisement->layout}} m³</td>
 								</tr>
 								@endif
 								@if($advertisement->lift_capacity)
 								<tr>
 									<th>lift Capacity:</th>
 									<td>{{$advertisement->lift_capacity}}</td>
 								</tr>
 								@endif
 							</tbody>
 						</table>
 					</div>
 				</div>
 				<div class="col-12 col-md-6 col-lg-3 pad-l-0">
 					<div class="realestate-d-cnt cnt-after">
 						<table class="table">
 							<tbody>
 								@if($advertisement->gear_box)
 								<tr>
 									<th>Gear Box:</th>
 									<td>{{$advertisement->gear_box}}</td>
 								</tr>
 								@endif
 								@if($advertisement->sleep_bed)
 								<tr>
 									<th>Sleep Bed:</th>
 									<td>{{$advertisement->sleep_bed}}</td>
 								</tr>
 								@endif

 								@if($advertisement->front_suspension)
 								<tr>
 									<th>Front Suspension:</th>
 									<td>{{$advertisement->front_suspension}}</td>
 								</tr>
 								@endif
 								@if($advertisement->rear_suspension)
 								<tr>
 									<th>Rear Suspension:</th>
 									<td>{{$advertisement->rear_suspension}}</td>
 								</tr>
 								@endif

 								@if($advertisement->gross_weight)
 								<tr>
 									<th>Gross Weight:</th>
 									<td>{{$advertisement->gross_weight}}</td>
 								</tr>
 								@endif

 								@if($advertisement->kerb_weight)
 								<tr>
 									<th>Kerb Weight:</th>
 									<td>{{$advertisement->kerb_weight}}</td>
 								</tr>
 								@endif
 								@if($advertisement->new_used)
 								<tr>
 									<th>New / Used:</th>
 									<td>{{$advertisement->new_used}}</td>
 								</tr>
 								@endif
 								
 								@if($advertisement->damage)
 								<tr>
 									<th>Damage:</th>
 									<td>{{$advertisement->damage}}</td>
 								</tr>
 								@endif
 								@if($advertisement->engn_capacity)
 								<tr>
 									<th>Engn Capacity:</th>
 									<td>{{$advertisement->engn_capacity}} cc</td>
 								</tr>
 								@endif
 								@if($advertisement->eng_capacity)
 								<tr>
 									<th>Engn Capacity:</th>
 									<td>{{$advertisement->eng_capacity}} cc</td>
 								</tr>
 								@endif
 								@if($advertisement->powerNumber)
 								<tr>
 									<th>Power:</th>
 									<td>{{$advertisement->powerNumber}} {{$advertisement->power_unit}}</td>
 								</tr>
 								@endif
 								@if($advertisement->power)
 								<tr>
 									<th>Power:</th>
 									<td>{{$advertisement->power}} {{$advertisement->power_unit}}</td>
 								</tr>
 								@endif
 								@if($advertisement->vin_number)
 								<tr>
 									<th>Vin Number:</th>
 									<td>{{$advertisement->vin_number}}</td>
 								</tr>
 								@endif
 								@if($advertisement->vin_num)
 								<tr>
 									<th>Vin Number:</th>
 									<td>{{$advertisement->vin_num}}</td>
 								</tr>
 								@endif
 								@if($advertisement->climate_contrl)
 								<tr>
 									<th>Climate Contrl:</th>
 									<td>{{$advertisement->climate_contrl}}</td>
 								</tr>
 								@endif
 								@if($advertisement->fuel_consumption_Urban)
 								<tr>
 									<th>Fuel Consumption Urban:</th>
 									<td>{{$advertisement->fuel_consumption_Urban}}</td>
 								</tr>
 								@endif
 								@if($advertisement->fuel_consumption_extra_urban)
 								<tr>
 									<th>Fuel Consumption Extra Urban:</th>
 									<td>{{$advertisement->fuel_consumption_extra_urban}}</td>
 								</tr>
 								@endif

 								@if($advertisement->fuel_consumption_combined)
 								<tr>
 									<th>Fuel Consumption Combined:</th>
 									<td>{{$advertisement->fuel_consumption_combined}}</td>
 								</tr>
 								@endif

 								@if($advertisement->euro_stndard)
 								<tr>
 									<th>Euro standard:</th>
 									<td>{{$advertisement->euro_stndard}}</td>
 								</tr>
 								@endif

 								
 								@if($advertisement->mot_exp_date)
 								<tr>
 									<th>MOT test expiry date:</th>
 									<td>{{$advertisement->mot_exp_mnth}} / {{$advertisement->mot_exp_date}}</td>
 								</tr>
 								@endif
 								@if($advertisement->country)
 								<tr>
 									<th>First Reg. Country:</th>
 									<td>{{$advertisement->mot_exp_mnth}} / {{$advertisement->country}}</td>
 								</tr>
 								@endif
 								
 							</tbody>
 						</table>
 					</div>
 				</div>
 				<div class="col-12 col-md-12 col-lg-6 pad-0">
 					<div class="realestate-d-cnt">
 						<h5>Features / Equipment</h5><hr>
 						@if($advertisement->feq_security)
 						<div class="r-cnt-itm">
 							<div class="r-cnt-itm-tlt">Security</div>
 							<div class="r-cnt-itm-txt">
 								<?php $values  = explode("," ,$advertisement->feq_security); ?>
 								@foreach($values as $val)
 								<span>{{$val}}</span>
 								@endforeach
 							</div>
 						</div>
 						@endif
 						@if($advertisement->feq_audio_video_equipment)
 						<div class="r-cnt-itm">
 							<div class="r-cnt-itm-tlt">Audio Video Equipment</div>
 							<div class="r-cnt-itm-txt">
 								<?php $values  = explode("," ,$advertisement->feq_audio_video_equipment); ?>
 								@foreach($values as $val)
 								<span>{{$val}}</span>
 								@endforeach
 							</div>
 						</div>
 						@endif
 						@if($advertisement->feq_exterior)
 						<div class="r-cnt-itm">
 							<div class="r-cnt-itm-tlt">Exterior</div>
 							<div class="r-cnt-itm-txt">
 								<?php $values  = explode("," ,$advertisement->feq_exterior); ?>
 								@foreach($values as $val)
 								<span>{{$val}}</span>
 								@endforeach
 							</div>
 						</div>
 						@endif
 						@if($advertisement->feq_electronics)
 						<div class="r-cnt-itm">
 							<div class="r-cnt-itm-tlt">Electronics</div>
 							<div class="r-cnt-itm-txt">
 								<?php $values  = explode("," ,$advertisement->feq_electronics); ?>
 								@foreach($values as $val)
 								<span>{{$val}}</span>
 								@endforeach
 							</div>
 						</div>
 						@endif
 						@if($advertisement->feq_interior)
 						<div class="r-cnt-itm">
 							<div class="r-cnt-itm-tlt">Interior</div>
 							<div class="r-cnt-itm-txt">
 								<?php $values  = explode("," ,$advertisement->feq_interior); ?>
 								@foreach($values as $val)
 								<span>{{$val}}</span>
 								@endforeach
 							</div>
 						</div>
 						@endif
 						@if($advertisement->feq_safety)
 						<div class="r-cnt-itm">
 							<div class="r-cnt-itm-tlt">Safety</div>
 							<div class="r-cnt-itm-txt">
 								<?php $values  = explode("," ,$advertisement->feq_safety); ?>
 								@foreach($values as $val)
 								<span>{{$val}}</span>
 								@endforeach
 							</div>
 						</div>
 						@endif
 						@if($advertisement->feq_tuning_improvements)
 						<div class="r-cnt-itm">
 							<div class="r-cnt-itm-tlt">Tuning Improvements</div>
 							<div class="r-cnt-itm-txt">
 								<?php $values  = explode("," ,$advertisement->feq_tuning_improvements); ?>
 								@foreach($values as $val)
 								<span>{{$val}}</span>
 								@endforeach
 							</div>
 						</div>
 						@endif
 						@if($advertisement->feq_minivan_features)
 						<div class="r-cnt-itm">
 							<div class="r-cnt-itm-tlt">Minivan Features</div>
 							<div class="r-cnt-itm-txt">
 								<?php $values  = explode("," ,$advertisement->feq_minivan_features); ?>
 								@foreach($values as $val)
 								<span>{{$val}}</span>
 								@endforeach
 							</div>
 						</div>
 						@endif
 						@if($advertisement->feq_other_features)
 						<div class="r-cnt-itm">
 							<div class="r-cnt-itm-tlt">Other Features</div>
 							<div class="r-cnt-itm-txt">
 								<?php $values  = explode("," ,$advertisement->feq_other_features); ?>
 								@foreach($values as $val)
 								<span>{{$val}}</span>
 								@endforeach
 							</div>
 						</div>
 						@endif
 						@if($advertisement->feq_other)
 						<div class="r-cnt-itm">
 							<div class="r-cnt-itm-tlt">Other Features</div>
 							<div class="r-cnt-itm-txt">
 								<?php $values  = explode("," ,$advertisement->feq_other); ?>
 								@foreach($values as $val)
 								<span>{{$val}}</span>
 								@endforeach
 							</div>
 						</div>
 						@endif
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 	<div class="details-des">
 		<div class="row mar-0">
 			<div class="col-12 col-sm-8 pad-l-0">
 				@if($advertisement->description)
 				<div class="details-des-tlt">Description</div>
 				<div class="details-des-txt">
 					<p> {{$advertisement->description}}</p>
 				</div>
 				@endif
 			</div>
 			@if($advertisement->video)
 			<div class="col-12 col-sm-8 pad-l-0">
 				<div class="details-des-tlt">Video</div>
 				<div class="details-des-txt">
 					<p> {{$advertisement->video}}</p>
 				</div>
 			</div>
 			@endif
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