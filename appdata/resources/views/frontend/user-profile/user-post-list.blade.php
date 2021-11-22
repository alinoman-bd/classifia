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

	<style>
	.header-section {
		border-bottom: 1px solid #ddd;
	}

	.user-profile-section .m-side-list .m-side-img {
		width: 17%;
	}
	.user-profile-section .m-side-list .usr-p-atr{
		width: 38%;

	}
	.user-profile-section .m-side-list .m-side-cnt {
		width: 45%;
		padding-right: 3%;
	}

	.user-profile-section .m-side-list .usr-p-atr .atr-a-txt {
		width: 70%;
	}

	.user-profile-section .m-side-list .usr-p-atr .atr-a-count{
		width: 30%;
	}
	.user-profile-section .m-side-list .usr-p-atr{
		font-size: 12px;
	}

	.select-panel-section {
		padding: 20px;
	}
</style>
</style>
@endsection
@section('content')
<section class="user-profile-section">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">User post list</li>
		</ol>
	</nav>
	<div class="row mar-0">
		@include('frontend.user-profile.user-sidebar')
		<div class=" col-lg-9 pad-0">
			<div class="user-cnt">
				<div class="user-tab">
					<div class="map-sidebar" id="returnData">
						<div class="map-sidebar" id="loaddata">
							@if($posts->count())
							@foreach($posts as $post)
							<div class="m-side-list mar-b-15">
								<div class="m-side-img">
									@if($post->cat == 'cars')
									@php $category = 'transport'; @endphp 
									@elseif($post->cat == 'house')
									@php $category = 'realestate'; @endphp
									@elseif($post->cat == 'job')
									@php $category = 'job'; @endphp
									@elseif($post->cat == 'services')
									@php $category = 'services'; @endphp
									@elseif($post->cat == 'buy-sale')
									@php $category = 'buy-sale'; @endphp
									@endif
									<a target="_blank" href="{{url('advertisement-details',['cat' => $category,'form_type' => $post->form_type, 'post_id' => $post->_id])}}">
										<img class="cover" src="{{asset('ad_thumbnail/'.@$post->coverImage->image) }}" alt="product">
									</a>
								</div>
								<div class="m-side-cnt">
									<a target="_blank" href="{{url('advertisement-details',['cat' => $category,'form_type' => $post->form_type,'post_id' => $post->_id])}}">
										<div class="loc-name"><i class="fas fa-map-marker-alt"></i> 
											{{$post->address}}
										</div>
										<div class="house-name">
											{{ucfirst($post->title)}}
										</div>
										<div class="house-name"style="font-size: 14px;">
											{{ucfirst($post->cat)}} | {{ucfirst($post->form_type)}}
										</div>
										<div class="house-name">
											$ {{$post->price}}
										</div>
									</a>
									<div class="setting"style="padding: 0">
										<a target="_blank" href="{{url('edit-advertisement',['cat' => $category,'form_type' => $post->form_type,'post_id' => $post->_id])}}">
											<span class="s-txt"><i class="fas fa-cog"></i>Edit</span></a>
										</a>
										<a href="">
											<span class="s-txt2"><i class="far fa-star"></i>Make VIP</span>
										</a>
										<span class="s-txt1" onclick="removeMyPost('<?= $post->_id?>')"><i class="fas fa-trash-alt"></i>Delete</span>
										<div class="house-price-len">
											<span class=""><i class="far fa-clock"></i> {{$post->created_at->diffForHumans()}}</span>
										</div>
									</div>
								</div>
								@if(@$post->paymentInfo)
								<div class="usr-p-atr">
									<div class="atr-a-txt">
										<div class="view-count">Package</div>
										<div class="view-count">Top Listed Validity</div>
										<div class="view-count">VIP Membership Validity</div>
										<div class="view-count">Total Payable Fee</div>
										<div class="view-count">Last Updated</div>
										<!-- <div class="view-count">ex</div> -->
									</div>
									<div class="atr-a-count">
										<div class="view-count">{{@$post->paymentInfo->package->package_title}}/€ {{@$post->paymentInfo->package->amount}}</div>
										@if($post->paymentInfo->promot_days)
										<div class="view-count">{{@$post->paymentInfo->promot_days - @$post->paymentInfo->created_at->diffInDays(now())}}&nbsp;days</div>
										@else
										<div class="view-count"><i>not set</i></div>
										@endif
										@if($post->paymentInfo->advert_days)
										<div class="view-count">{{@$post->paymentInfo->advert_days - @$post->paymentInfo->created_at->diffInDays(now())}}&nbsp;days</div>
										@else
										<div class="view-count"><i>not set</i></div>
										@endif
										<div class="view-count"> € {{@$post->paymentInfo->total_amount}}</div>
										<div class="view-count">  {{@$post->paymentInfo->updated_at->diffForHumans()}}</div>
										<!-- <div class="view-count">  {{@$post->paymentInfo->updated_at->diffInDays(now())}}</div> -->
									</div>
									<span onclick="thisPaymentInfo('<?= @$post->paymentInfo->_id?>')" style="cursor: pointer;"type="button" data-toggle="modal" data-target=".bd-example-modal-lg" ><i class="fa fa-edit"></i></span>
								</div>
								@endif
							</div>
							@endforeach
							{{$posts->links()}}
							@else
							<div class="alert alert-info">no post yet</div>
							<button class="btn btn-danger"><a class="ctm-li-a post-a text-light" href="{{url('/category?')}}">+Post listing</a></button>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<input type="text" id="paymentId" value="" name="" class="form-control">
					<section class="select-panel-section"style="background: initial;">
						<div class="adition-service">
							<div class="section-tlt">adition services</div>
							<div class="service-list">

								<div class="s-list">
									<div class="row mar-0">
										<div class="col-12 col-lg-4 pad-l-0 text-center">
											<div class="add-ser-txt">Top List <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 22 22">
												<g id="info_1_" data-name="info (1)" transform="translate(-1 -1)">
													<circle id="Ellipse_31" data-name="Ellipse 31" cx="10" cy="10" r="10" transform="translate(2 2)" stroke-width="2" stroke="#757575" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
													<line id="Line_63" data-name="Line 63" y1="4" transform="translate(12 12)" fill="none" stroke="#757575" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
													<line id="Line_64" data-name="Line 64" x2="0.01" transform="translate(12 8)" fill="none" stroke="#757575" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
												</g>
											</svg>
										</div>
									</div>
									<div class="col-12 col-sm-6  col-lg-4  pad-l-0">
										<div class="ctm-select">
											<div class="ctm-select-txt">
												<span class="select-icon"><img src="{{ asset('assets/img/calendar.png') }}" alt="lt flag"></span> 
												<span class="select-txt" id="category">-choose validity-</span>
												<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
											</div>
											<div class="ctm-option-box">
												@foreach(App\AdsValidity::all() as $valid)
												<div class="ctm-option" 
												onclick="setThisPrice('prom',<?=$valid->amount?>,'<?=$valid->_id?>',<?=$valid->days?>)" >{{$valid->ex_validity}}</div>
												@endforeach
											</div>
										</div>
									</div>
									<div class="col-12 col-sm-6  col-lg-2 pad-l-0 text-center">
										<button class="btn ser-btn">Pozicija 60</button>
									</div>
									<div class="col-12 col-sm-6  col-lg-2  pad-0 text-center">
										<div class="adition-price">
											&#128;<span class="cr-price" id="prmPrice">0.0</span>
										</div>
									</div>
								</div>
							</div>

							<div class="s-list">
								<div class="row mar-0">
									<div class="col-12 col-lg-4 pad-l-0 text-center">
										<div class="add-ser-txt">With VIP Membership<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 22 22">
											<g id="info_1_" data-name="info (1)" transform="translate(-1 -1)">
												<circle id="Ellipse_31" data-name="Ellipse 31" cx="10" cy="10" r="10" transform="translate(2 2)" stroke-width="2" stroke="#757575" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
												<line id="Line_63" data-name="Line 63" y1="4" transform="translate(12 12)" fill="none" stroke="#757575" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
												<line id="Line_64" data-name="Line 64" x2="0.01" transform="translate(12 8)" fill="none" stroke="#757575" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
											</g>
										</svg>
									</div>
								</div>
								<div class="col-12 col-sm-6  col-lg-4  pad-l-0">
									<div class="ctm-select">
										<div class="ctm-select-txt">
											<span class="select-icon"><img src="{{ asset('assets/img/calendar.png') }}" alt="lt flag"></span> 
											<span class="select-txt" id="category">-choose validity-</span>
											<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
										</div>
										<div class="ctm-option-box">
											@foreach(App\AdsValidity::all() as $valid)
											<div class="ctm-option"
											onclick="setThisPrice('advrt',<?=$valid->amount?>,'<?=$valid->_id?>',<?=$valid->days?>)" >{{$valid->ex_validity}}</div>
											@endforeach
										</div>
									</div>
								</div>
								<div class="col-12 col-sm-6  col-lg-2 pad-l-0 text-center">
									<button class="btn ser-btn">Pozicija 60</button>
								</div>
								<div class="col-12 col-sm-6  col-lg-2  pad-0 text-center">
									<div class="adition-price">
										&#128;<span class="cr-price" id="adPrice">0.0</span>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
				<div class="checkout">
					<div class="section-tlt">Checkout</div>
					<div class="row mar-0">
						<div class="col-lg-6 pad-l-0">
							<div class="order">
								<div class="order-tlt">Your order</div>
								<div class="order-list-all">
									<div class="order-list">
										<span class="order-name">Promotions</span>
										<span class="order-price">&#128; <span class="cr-price prom_pr_f">0.0</span></span>
										<input type="hidden" value="0" class="promot_price mark-price" name="promot_price">
										<input type="hidden" value="" class="promot_id form-control" name="promot_id">
										<input type="hidden" value="" class="promot_days form-control" name="promot_days">
									</div>
									<div class="order-list">
										<span class="order-name">With Membership</span>
										<span class="order-price">&#128; <span class="cr-price ad_pr_f">0.0</span></span>
										<input type="hidden" value="0" class="advert_price mark-price" name="advert_price">
										<input type="hidden" value="" class="advert_id form-control" name="advert_id">
										<input type="hidden" value="" class="advert_days form-control" name="advert_days">
									</div>

								</div>
								<div class="total-price">
									Total: &#128; <span class="cr-price ttl_price">0.0</span>
									<input type="hidden" id="totalPriceForPay" value="" class="ttl_price" name="ttl_price">
								</div>
							</div>
						</div>
						<div class="col-lg-6 pad-l-0">
							<div class="payment">
								<div class="payment-tlt text-center">Select payment method</div>
								<div class="payment-option">
									<div class="row mar-0">
										<div class="col-sm-6 pad-l-0">
											<div class="pay-acc">
												<input type="radio" style="visibility: hidden;" name="pay_method" id="payMethod" value="1">
												<span class="pay-slct"><img src="{{ asset('assets/img/check.png') }}" alt="lt flag"></span>
												<div class="pay-img non-pay-img "><img src="{{ asset('assets/img/Stripe.png') }}" alt="lt flag"></div>
												<div class="pay-img slct-pay-img"><img src="{{ asset('assets/img/Stripe.png') }}" alt="lt flag"></div>
											</div>
										</div>
										<div class="col-sm-6 pad-0">
											<div class="pay-acc pay-selected">
												<input type="radio" style="visibility: hidden;" checked="" name="pay_method" value="2">
												<span class="pay-slct"><img src="{{ asset('assets/img/check.png') }}" alt="lt flag"></span>
												<div class="pay-img non-pay-img "><img src="{{ asset('assets/img/paypal.png') }}" alt="lt flag"></div>
												<div class="pay-img slct-pay-img"><img src="{{ asset('assets/img/paypal.png') }}" alt="lt flag"></div>
											</div>
										</div>
									</div>
								</div>
								<!--  {{url('user-profile?',['method'=>'submit'])}} -->
								<div class="next-step">

									<a onclick="adValidityUpdate()" href="{{url('user-profile?')}}" class=" btn next-btn">Update</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section> 
		</div>
	</div>
</div>
</section>
@endsection
@section('script')
<script>
	window.delete_my_post ='<?= url('delete-my-post')?>'

	function deleteMyPost(cat,post_id,form_type){
		swal({		
			title: "Delete Item!",
			text: "Do you want to remove this product from your favourite list?",
			icon: "info",
			buttons: true,
			dangerMode: true,
		})
		.then((removePost) => {
			if (removePost) {
				$.ajax({
					url: window.delete_my_post,
					method: 'post',
					data: {
						cat: cat,
						post_id: post_id,
						form_type: form_type,
					},
					success: function(response){
						console.log(response);
						// $( "#userSidebar" ).load(window.location.href + " #userSidebar");
						$( "#returnData" ).load(window.location.href + " #returnData");
						swal(response, {
							icon: "success",
						});
					},
					error: function(res){
						console.log(res);
					}
				});
			} 
		});
	}
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection