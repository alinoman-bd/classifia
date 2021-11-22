 @extends('frontend.app')
 @section('style')
 <link rel="stylesheet" type="text/css" href="{{ asset('assets/gallery/fancybox.css') }}">
 <style>
 	.address-btn {
 		display: flex;
 		align-items: center;
 		justify-content: flex-end;
 	}
 	.realestate-details .address-d {
 		padding: 30px;
 	}
 	.realestate-details .address-d .address-btn button {
 		width: 150px;
 		height: 65px;
 	}
 	.job-tlt-cnt {
 		padding-bottom: 10px;
 		margin-bottom: 10px;
 		border-bottom: 1px solid #ddd;
 	}
 	.job-salary, .job-tlt {
 		font-size: 25px;
 		font-weight: 700;
 	}
 	.job-salary-cur {
 		display: inline-flex;
 		align-items: center;
 	}
 	.job-salary {
 		padding-right: 10px;
 		color: #DA233C;
 	}
 	.job-cur {
 		color: #888;
 	}
 	.favo {
 		float: right;
 		line-height: 45px;

 	}
 	.favo i {
 		color: #DA233C;
 	}
 	.realestate-price-d .price-d {
 		background: #fff;
 		border-radius: 0;
 		border: none;
 		padding: 0;
 	}
 </style>
 @endsection
 @section('content')
 <section class="ss-section realestate-details">
 	<nav aria-label="breadcrumb">
 		<ol class="breadcrumb">
 			<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
 			<li class="breadcrumb-item active" aria-current="page">Job Details</li>
 		</ol>
 	</nav>
 	<div class="row mar-0">
 		<div class="col-3 col-lg-3 pad-l-0">
 			<img class="cover" src="{{asset('jobAdimages/'. $advertisement->coverImage->image)}}" alt="product">
 		</div>
 		<div class="col-12 col-lg-9 pad-0">
 			<div class="address-d">
 				<div class="job-tlt-cnt">
 					<span class="job-tlt text-capitalize mr-4">{{$advertisement->title}}</span>
 					<span class="job-salary-cur">
 						<span class="job-salary">{{$advertisement->salary_from}}$</span>
 						<span class="job-cur">{{$advertisement->salary_currency}}</span> 
 					</span>
 					<button style="background: #DA233C;background: #DA233C;position: absolute;right: 10px;top: 6px;" class="btn btn-sm text-light" onclick="addToFavourite('<?= $advertisement->_id ?>')" >Add to favourite <span class="fav"><i class="far fa-heart"></i></span></button>
 					<span class="favo">Isimine <i class="far fa-heart"></i> 7</span>
 				</div>
 				<div class="row mar-0">
 					<div class="col-6 col-sm-4 col-md-3 pad-l-0">
 						<div class="address-txt-a">
 							<div class="address-tlt">City:</div>
 							<div class="address-txt">{{@$advertisement->city}}</div>
 						</div>
 					</div>
 					<div class="col-6 col-sm-4 col-md-3 pad-l-0">
 						<div class="address-txt-a">
 							<div class="address-tlt">Salary From:</div>
 							<div class="address-txt">{{$advertisement->salary_from}} ({{$advertisement->salary_currency}})</div>
 						</div>
 					</div>
 					<div class="col-6 col-sm-4 col-md-3 pad-l-0">
 						<div class="address-txt-a">
 							<div class="address-tlt">Salary To:</div>
 							<div class="address-txt">{{$advertisement->salary_to}} ({{$advertisement->salary_currency}})</div>
 						</div>
 					</div>
 					<div class="col-6 col-sm-4 col-md-3 pad-l-0">
 						<div class="address-txt-a">
 							<div class="address-tlt">Salary Type:</div>
 							<div class="address-txt">
 								@if($advertisement->salary_type == 'month')
 								Per Month
 								@elseif($advertisement->salary_type == 'hour')
 								Per Hour
 								@elseif($advertisement->salary_type == 'year')
 								Per year
 								@elseif($advertisement->salary_type == 'project')
 								Per Project
 								@endif
 							</div>
 						</div>
 					</div>
 					<div class="col-6 col-sm-4 col-md-3 pad-l-0">
 						<div class="address-txt-a">
 							<div class="address-tlt">Contaact Mail:</div>
 							<div class="address-txt">
 								<a href="mailto:{{@$advertisement->userInfo->contact_mail}}" style='text-decoration: underline;'>{{@$advertisement->userInfo->contact_mail}}</a>
 							</div>
 						</div>
 					</div>
 					<div class="col-6 col-sm-4 col-md-3 pad-l-0">
 						<div class="address-txt-a">
 							<div class="address-tlt">Contact Number:</div>
 							<div class="address-txt">
 								<a href="tel:{{@$advertisement->userInfo->contact_number}}" style='text-decoration: underline;' >{{@$advertisement->userInfo->contact_number}}</a>
 							</div>
 						</div>
 					</div>
 				</div>
 				<div class="address-btn">
 					<a href="tel:{{@$advertisement->userInfo->contact_number}}">
 						<button class="btn m-0 mr-3 call-btn"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 21.89 21.93">
 							<path id="phone_2_" data-name="phone (2)" d="M22,16.92v3a2,2,0,0,1-2.18,2,19.79,19.79,0,0,1-8.63-3.07,19.5,19.5,0,0,1-6-6A19.79,19.79,0,0,1,2.12,4.18,2,2,0,0,1,4.11,2h3a2,2,0,0,1,2,1.72,12.84,12.84,0,0,0,.7,2.81,2,2,0,0,1-.45,2.11L8.09,9.91a16,16,0,0,0,6,6l1.27-1.27a2,2,0,0,1,2.11-.45,12.84,12.84,0,0,0,2.81.7A2,2,0,0,1,22,16.92Z" transform="translate(-1.111 -1)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
 						</svg>Call</button>
 					</a>
 					<a href="mailto:{{@$advertisement->userInfo->contact_mail}}">
 						<button class="btn w-btn"><svg xmlns="http://www.w3.org/2000/svg" width="22.785" height="18" viewBox="0 0 22.785 18">
 							<g id="mail_2_" data-name="mail (2)" transform="translate(1.393 1)">
 								<path id="Path_99" data-name="Path 99" d="M4,4H20a2.006,2.006,0,0,1,2,2V18a2.006,2.006,0,0,1-2,2H4a2.006,2.006,0,0,1-2-2V6A2.006,2.006,0,0,1,4,4Z" transform="translate(-2 -4)" fill="none" stroke="#da233c" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
 								<path id="Path_100" data-name="Path 100" d="M22,6,12,13,2,6" transform="translate(-2 -4)" fill="none" stroke="#da233c" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
 							</g>
 						</svg>Write</button>
 					</a>
 				</div>
 			</div>
 		</div>
 	</div>
 </section>
 <section class="realestate-price-d">
 	<div class="details-des">
 		<div class="row mar-0">
 			<div class="col-12 col-sm-9 pad-l-0">
 				<div class="price-d">
 					<div class="realestate-d-list">
 						<div class="single-d-list">
 							<div class="details-des-tlt">Address</div>
 							<div class="details-des-txt">
 								<p>{{$advertisement->address}}</p>
 							</div>
 						</div>
 						@if($advertisement->job_type)
 						<div class="single-d-list">
 							<div class="details-des-tlt">Job Type</div>
 							<div class="details-des-txt">
 								<p>
 									@php @$types = json_decode(@$advertisement->job_type); @endphp
 									@foreach(@$types as $jb_type) 
 									<span class="fa fa-check"></span> <span>{{@$jb_type}}</span><br>
 									@endforeach
 								</p>
 							</div>
 						</div>
 						@endif
 						@if(@$advertisement->job_category)
 						<div class="single-d-list">
 							<div class="details-des-tlt">Job Seactor</div>
 							<div class="details-des-txt">
 								<p>
 									@php $ad_cats = json_decode(@$advertisement->job_category); @endphp
 									@foreach(@$ad_cats as $jb_cat) 
 									<span class="fa fa-check"></span> <span>{{@$jb_cat}}</span><br>
 									@endforeach
 								</p>
 							</div>
 						</div>
 						@endif
 						<div class="single-d-list">
 							<div class="details-des-tlt">About Position</div>
 							<div class="details-des-txt">
 								<p>{{$advertisement->about_position}}</p>
 							</div>
 						</div>
 						<div class="single-d-list">
 							<div class="details-des-tlt">Requirements</div>
 							<div class="details-des-txt">
 								<p>{{$advertisement->requirements}}</p>
 							</div>
 						</div>
 						@if($advertisement->about_company)
 						<div class="single-d-list">
 							<div class="details-des-tlt">About Myself</div>
 							<div class="details-des-txt">
 								<p>{{@$advertisement->about_me}}</p>
 							</div>
 						</div>
 						@endif
 						
 						<div class="single-d-list">
 							<div class="details-des-tlt">About Company</div>
 							<div class="details-des-txt">
 								<p>{{@$advertisement->about_company}}</p>
 							</div>
 						</div>
 						
 					</div>
 				</div>
 			</div>
 			<div class="col-12 col-sm-3 pad-r-0">
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
 <!-- <script src="{{ asset('assets/js/jquery-ui.js')}}"></script>  -->
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