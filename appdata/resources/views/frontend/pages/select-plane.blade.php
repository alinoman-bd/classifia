@extends('frontend.app')
@section('style')
<style>
.header-section {
	border-bottom: 1px solid #ddd;
}
</style>
@endsection
@section('content')
<section class="select-panel-section">
	<div class="section-tlt">Select service</div>
	<div class="plane-all">
		<div class="row mar-0">
			<div class="col-md-4 pad-0">
				<div class="plane basic-plane text-center">
					<div class="plane-itm">
						<div class="plane-tlt">{{$packages[0]->package_title}}</div>
					</div>
					<div class="plane-txt">Boost position</div>
					<div class="plane-price-save"><del>&#128;12</del><span class="save-txt">save 35%</span> </div>
					<div class="plane-cr-price"><del>&#128;</del><span class="cr-price">5.99</span> <span>/mo</span> </div>
					<div class="select-txt">
						<div class="">Lorem ipsum feature one</div>
						<div class="">Lorem ipsum feature one</div>
						<div class="">Lorem ipsum feature one</div> 
					</div>
					<div class="selected-b"><button class="btn slct-btn" data-toggle="modal" data-target="#plane_modal">
						<span class="non-slct">select</span>
						<span class="slct">
							<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 22.416 22.027">
								<g id="check-circle_1_" data-name="check-circle (1)" transform="translate(-0.998 -0.982)">
									<path id="Path_115" data-name="Path 115" d="M22,11.08V12a10,10,0,1,1-5.93-9.14" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
									<path id="Path_116" data-name="Path 116" d="M22,4,12,14.01l-3-3" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
								</g>
							</svg>
						selected</span> 
					</button></div>
				</div>
			</div>
			<div class="col-md-4 pad-0">
				<div class="plane populer-plane text-center selected">
					<div class="plane-itm">
						<div class="plane-tlt">{{$packages[1]->package_title}}</div>
					</div>
					<div class="plane-txt">Mark listing</div>
					<div class="plane-price-save"><del>&#128;12</del><span class="save-txt">save 35%</span> </div>
					<div class="plane-cr-price"><del>&#128;</del><span class="cr-price">8.99</span> <span>/mo</span> </div>
					<div class="select-txt">
						<div class="">Lorem ipsum feature one</div>
						<div class="">Lorem ipsum feature one</div>
						<div class="">Lorem ipsum feature one</div> 
					</div>
					<div class="selected-b">
						<button class="btn slct-btn" data-toggle="modal" data-target="#plane_modal">
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
					<div class="plane-price-save"><del>&#128;12</del><span class="save-txt">save 35%</span> </div>
					<div class="plane-cr-price"><del>&#128;</del><span class="cr-price">13.99</span> <span>/mo</span> </div>
					<div class="select-txt">
						<div class="">Lorem ipsum feature one</div>
						<div class="">Lorem ipsum feature one</div>
						<div class="">Lorem ipsum feature one</div> 
					</div>
					<div class="selected-b"><button class="btn slct-btn"  data-toggle="modal" data-target="#plane_modal">
						<span class="non-slct">select</span>
						<span class="slct">
							<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 22.416 22.027">
								<g id="check-circle_1_" data-name="check-circle (1)" transform="translate(-0.998 -0.982)">
									<path id="Path_115" data-name="Path 115" d="M22,11.08V12a10,10,0,1,1-5.93-9.14" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
									<path id="Path_116" data-name="Path 116" d="M22,4,12,14.01l-3-3" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
								</g>
							</svg>
						selected</span> 
					</button></div>
				</div>
			</div>
		</div>
	</div>
	<div class="adition-service">
		<div class="section-tlt">adition services</div>
		<div class="service-list">
			@for($i=1;$i<=3;$i++)
			<div class="s-list">
				<div class="row mar-0">
					<div class="col-12 col-lg-3 pad-l-0 text-center">
						<div class="add-ser-txt">Skelbimo iškėlimas<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 22 22">
							<g id="info_1_" data-name="info (1)" transform="translate(-1 -1)">
								<circle id="Ellipse_31" data-name="Ellipse 31" cx="10" cy="10" r="10" transform="translate(2 2)" stroke-width="2" stroke="#757575" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
								<line id="Line_63" data-name="Line 63" y1="4" transform="translate(12 12)" fill="none" stroke="#757575" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
								<line id="Line_64" data-name="Line 64" x2="0.01" transform="translate(12 8)" fill="none" stroke="#757575" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
							</g>
						</svg>
					</div>
				</div>
				<div class="col-12 col-sm-6  col-lg-2  pad-l-0">
					<div class="ctm-select">
						<span class="select-icon"><img src="{{ asset('assets/img/star.png') }}" alt="lt flag"></span> 
						<div class="ctm-select-txt">
							<span class="select-txt" id="category">Žvaigždutės</span>
						</div>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
						<div class="ctm-option-box">
							<div class="ctm-option" value="1" >cars</div>
							<div class="ctm-option">Truck</div>
							<div class="ctm-option">cars</div>
							<div class="ctm-option">cars</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-6  col-lg-2  pad-l-0">
					<div class="ctm-select">
						<div class="ctm-select-txt">
							<span class="select-icon"><img src="{{ asset('assets/img/calendar.png') }}" alt="lt flag"></span> 
							<span class="select-txt" id="category">Dienos</span>
							<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
						</div>
						<div class="ctm-option-box">
							<div class="ctm-option" value="1" >cars</div>
							<div class="ctm-option">Truck</div>
							<div class="ctm-option">cars</div>
							<div class="ctm-option">cars</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-6  col-lg-2 pad-l-0 text-center">
					<button class="btn ser-btn">Pozicija 60</button>
				</div>
				<div class="col-12 col-sm-6  col-lg-2  pad-0 text-center">
					<div class="adition-price">
						&#128;<span class="cr-price">13.99</span>
					</div>
				</div>
			</div>
		</div>
		@endfor
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
						<span class="order-name">Skelbimo iškėlimas</span>
						<span class="order-price">&#128; <span class="cr-price">13.99</span></span>
					</div>
					<div class="order-list">
						<span class="order-name">Skelbimo iškėlimas</span>
						<span class="order-price">&#128; <span class="cr-price">13.99</span></span>
					</div>
					<div class="order-list">
						<span class="order-name">Skelbimo iškėlimas</span>
						<span class="order-price">&#128; <span class="cr-price">13.99</span></span>
					</div>

				</div>
				<div class="total-price">
					Total: &#128;<span class="cr-price">43.99</span>
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
								<span class="pay-slct"><img src="{{ asset('assets/img/check.png') }}" alt="lt flag"></span>
								<div class="pay-img non-pay-img "><img src="{{ asset('assets/img/Stripe.png') }}" alt="lt flag"></div>
								<div class="pay-img slct-pay-img"><img src="{{ asset('assets/img/Stripe.png') }}" alt="lt flag"></div>
							</div>
						</div>
						<div class="col-sm-6 pad-0">
							<div class="pay-acc pay-selected">
								<span class="pay-slct"><img src="{{ asset('assets/img/check.png') }}" alt="lt flag"></span>
								<div class="pay-img non-pay-img "><img src="{{ asset('assets/img/paypal.png') }}" alt="lt flag"></div>
								<div class="pay-img slct-pay-img"><img src="{{ asset('assets/img/paypal.png') }}" alt="lt flag"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="next-step"><button class="btn view-btn">Next</button></div>
			</div>
		</div>
	</div>
</div>
</section>
@endsection
@section('script')

@endsection