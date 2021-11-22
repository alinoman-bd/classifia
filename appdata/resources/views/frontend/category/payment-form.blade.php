<div class="paymentForm d-none" id="paymentForm" style="background: #f6f7f959">
	<section class="select-panel-section"style="background: initial;">
		<div class="section-tlt">@lang('frontend.payment.select.service')</div>
		<div class="plane-all">
			@php  $packages = App\Package::all(); @endphp
			<div class="row mar-0">
				<div class="col-md-4 pad-0">
					<div class="plane basic-plane text-center">
						<div class="plane-itm">
							<div class="plane-tlt">{{$packages[0]->package_title}}</div>
						</div>
						<div class="plane-txt">Boost position</div>
						<div class="plane-price-save"><del>&#128;12</del><span class="save-txt">save {{$packages[0]->discount_value}}%</span> </div>
						<div class="plane-cr-price"><del>&#128;</del><span class="cr-price">{{$packages[0]->amount}}</span> <span>/mo</span> </div>
						<div class="select-txt">
							<div class="">Lorem ipsum feature one</div>
							<div class="">Lorem ipsum feature one</div>
							<div class="">Lorem ipsum feature one</div> 
						</div>
						<div class="selected-b">
							<button onclick="setThisPrice('package',<?=$packages[0]->amount?>,'<?=$packages[0]->_id?>',1)" class="btn slct-btn" data-toggle="modal" data-target="#plane_modal">
								<span class="non-slct">select</span>
								<span class="slct">
									<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 22.416 22.027">
										<g id="check-circle_1_" data-name="check-circle (1)" transform="translate(-0.998 -0.982)">
											<path id="Path_115" data-name="Path 115" d="M22,11.08V12a10,10,0,1,1-5.93-9.14" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
											<path id="Path_116" data-name="Path 116" d="M22,4,12,14.01l-3-3" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
										</g>
									</svg>
								selected</span> 
							</button>
						</div>
					</div>
				</div>
				<div class="col-md-4 pad-0">
					<div class="plane populer-plane text-center selected">
						<div class="plane-itm">
							<div class="plane-tlt">{{$packages[1]->package_title}}</div>
						</div>
						<div class="plane-txt">Mark listing</div>
						<div class="plane-price-save"><del>&#128;12</del><span class="save-txt">save {{$packages[1]->discount_value}}%</span> </div>
						<div class="plane-cr-price"><del>&#128;</del><span class="cr-price">{{$packages[1]->amount}}</span> <span>/mo</span> </div>
						<div class="select-txt">
							<div class="">Lorem ipsum feature one</div>
							<div class="">Lorem ipsum feature one</div>
							<div class="">Lorem ipsum feature one</div> 
						</div>
						<div class="selected-b">
							<button onclick="setThisPrice('package',<?=$packages[1]->amount?>,'<?=$packages[1]->_id?>',1)"  class="btn slct-btn" data-toggle="modal" data-target="#plane_modal">
								<span class="non-slct">select</span>
								<span class="slct">
									<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 22.416 22.027">
										<g id="check-circle_1_" data-name="check-circle (1)" transform="translate(-0.998 -0.982)">
											<path id="Path_115" data-name="Path 115" d="M22,11.08V12a10,10,0,1,1-5.93-9.14" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
											<path id="Path_116" data-name="Path 116" d="M22,4,12,14.01l-3-3" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
										</g>
									</svg>
								selected</span> 
							</button>
						</div>
					</div>
				</div>
				<div class="col-md-4 pad-0">
					<div class="plane best-plane text-center">
						<div class="plane-itm">
							<div class="plane-tlt">{{$packages[2]->package_title}}</div>
						</div>
						<div class="plane-txt">Boost position</div>
						<div class="plane-price-save"><del>&#128;12</del><span class="save-txt">save {{$packages[2]->discount_value}}%</span> </div>
						<div class="plane-cr-price"><del>&#128;</del><span class="cr-price">{{$packages[2]->amount}}</span> <span>/mo</span> </div>
						<div class="select-txt">
							<div class="">Lorem ipsum feature one</div>
							<div class="">Lorem ipsum feature one</div>
							<div class="">Lorem ipsum feature one</div> 
						</div>
						<div class="selected-b">
							<button onclick="setThisPrice('package',<?=$packages[2]->amount?>,'<?=$packages[2]->_id?>',1)" class="btn slct-btn"  data-toggle="modal" data-target="#plane_modal">
								<span class="non-slct">select</span>
								<span class="slct">
									<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 22.416 22.027">
										<g id="check-circle_1_" data-name="check-circle (1)" transform="translate(-0.998 -0.982)">
											<path id="Path_115" data-name="Path 115" d="M22,11.08V12a10,10,0,1,1-5.93-9.14" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
											<path id="Path_116" data-name="Path 116" d="M22,4,12,14.01l-3-3" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
										</g>
									</svg>
								selected</span> 
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="adition-service">
			<div class="section-tlt">@lang('frontend.payment.additional.service')</div>
			<div class="service-list">
				
				<div class="s-list">
					<div class="row mar-0">
						<div class="col-12 col-lg-3 pad-l-0 text-center">
							<div class="add-ser-txt">@lang('frontend.payment.list.top')<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 22 22">
								<g id="info_1_" data-name="info (1)" transform="translate(-1 -1)">
									<circle id="Ellipse_31" data-name="Ellipse 31" cx="10" cy="10" r="10" transform="translate(2 2)" stroke-width="2" stroke="#757575" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
									<line id="Line_63" data-name="Line 63" y1="4" transform="translate(12 12)" fill="none" stroke="#757575" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
									<line id="Line_64" data-name="Line 64" x2="0.01" transform="translate(12 8)" fill="none" stroke="#757575" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
								</g>
							</svg>
						</div>
					</div>
					<div class="col-12 col-sm-6  col-lg-3  pad-l-0">
						<div class="ctm-select">
							<div class="ctm-select-txt">
								<span class="select-icon"><img src="{{ asset('assets/img/calendar.png') }}" alt="lt flag"></span> 
								<span class="select-txt" id="category">@lang('frontend.payment.choose.validity')</span>
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
					<div class="col-12 col-lg-3 pad-l-0 text-center">
						<div class="add-ser-txt">@lang('frontend.payment.vip.member')<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 22 22">
							<g id="info_1_" data-name="info (1)" transform="translate(-1 -1)">
								<circle id="Ellipse_31" data-name="Ellipse 31" cx="10" cy="10" r="10" transform="translate(2 2)" stroke-width="2" stroke="#757575" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
								<line id="Line_63" data-name="Line 63" y1="4" transform="translate(12 12)" fill="none" stroke="#757575" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
								<line id="Line_64" data-name="Line 64" x2="0.01" transform="translate(12 8)" fill="none" stroke="#757575" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
							</g>
						</svg>
					</div>
				</div>
				<div class="col-12 col-sm-6  col-lg-3  pad-l-0">
					<div class="ctm-select">
						<div class="ctm-select-txt">
							<span class="select-icon"><img src="{{ asset('assets/img/calendar.png') }}" alt="lt flag"></span> 
							<span class="select-txt" id="category">@lang('frontend.payment.choose.validity')</span>
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
	<div class="section-tlt">@lang('frontend.payment.checkout')</div>
	<div class="row mar-0">
		<div class="col-lg-6 pad-l-0">
			<div class="order">
				<div class="order-tlt">@lang('frontend.payment.your.order')</div>
				<div class="order-list-all">
					<div class="order-list">
						<span class="order-name">@lang('frontend.payment.package')</span>
						<span class="order-price">&#128; <span class="cr-price pack_price">{{$packages[1]->amount}}</span></span>
						<input type="hidden" value="{{$packages[1]->amount}}" class="package_price mark-price" name="package_price">
						<input type="hidden" value="{{$packages[1]->_id}}" class="package_id form-control" name="package_id">
					</div>
					<div class="order-list">
						<span class="order-name">@lang('frontend.payment.list.top')</span>
						<span class="order-price">&#128; <span class="cr-price prom_pr_f">0.0</span></span>
						<input type="hidden" value="0" class="promot_price mark-price" name="promot_price">
						<input type="hidden" value="" class="promot_id form-control" name="promot_id">
						<input type="hidden" value="" class="promot_days form-control" name="promot_days">
					</div>
					<div class="order-list">
						<span class="order-name">@lang('frontend.payment.vip.member')</span>
						<span class="order-price">&#128; <span class="cr-price ad_pr_f">0.0</span></span>
						<input type="hidden" value="0" class="advert_price mark-price" name="advert_price">
						<input type="hidden" value="" class="advert_id form-control" name="advert_id">
						<input type="hidden" value="" class="advert_days form-control" name="advert_days">
					</div>

				</div>
				<div class="total-price">
					@lang('frontend.payment.total.amount'): &#128; <span class="cr-price ttl_price">{{$packages[1]->amount}}</span>
					<input type="hidden" id="totalPriceForPay" value="{{$packages[1]->amount}}" class="ttl_price" name="ttl_price">
				</div>
			</div>
		</div>
		<div class="col-lg-6 pad-l-0">
			<div class="payment">
				<?php @$balance = App\UserBalance::where('user_id', Auth::user()->_id)->first()->balance; ?>
				<div class="payment-tlt text-center">
					<input type="hidden" id="AcBal" value="{{$balance? $balance:0}}">
					@lang('frontend.payment.select.payment') ( @lang('frontend.payment.balance'):${{$balance? $balance:0}} )
				</div>
				<div class="payment-option">
					<div class="row mar-0">
						<div class="col-sm-12 d-none" id="accBalance">
							<div class="pay-acc" style="height: auto;margin-bottom: 10px;">
								<input type="radio" class="radiob" style="visibility: hidden;" name="pay_method" id="payMethod" value="balance"><i class="fa fa-money"></i>@lang('frontend.payment.use.my.balance')
								<span class="pay-slct"><img src="{{ asset('assets/img/check.png') }}" alt="lt flag"></span>
							</div>
						</div>
						<div class="col-sm-6 pad-l-0">
							<div class="pay-acc">
								<input type="radio" class="radiob" style="visibility: hidden;" name="pay_method" id="payMethod" value="stripe">
								<span class="pay-slct"><img src="{{ asset('assets/img/check.png') }}" alt="lt flag"></span>
								<div class="pay-img non-pay-img "><img src="{{ asset('assets/img/Stripe.png') }}" alt="lt flag"></div>
								<div class="pay-img slct-pay-img"><img src="{{ asset('assets/img/Stripe.png') }}" alt="lt flag"></div>
							</div>
						</div>
						<div class="col-sm-6 pad-0">
							<div class="pay-acc pay-selected">
								<input type="radio" class="radiob" style="visibility: hidden;" checked="" name="pay_method" value="paypal">
								<span class="pay-slct"><img src="{{ asset('assets/img/check.png') }}" alt="lt flag"></span>
								<div class="pay-img non-pay-img "><img src="{{ asset('assets/img/paypal.png') }}" alt="lt flag"></div>
								<div class="pay-img slct-pay-img"><img src="{{ asset('assets/img/paypal.png') }}" alt="lt flag"></div>
							</div>
						</div>
					</div>
				</div>
				<!--  {{url('user-profile?',['method'=>'submit'])}} -->
				<div class="next-step">

					<a onclick="submitWithPayment()" href="{{url('user-profile?',['method'=>'submit'])}}" class=" btn next-btn">@lang('frontend.button.next')</a>
				</div>
			</div>
		</div>
	</div>
</div>
</section>  
</div>

<script type="text/javascript">
	window.insert_payment_information = '<?= url('insert-payment-information')?>';
</script>