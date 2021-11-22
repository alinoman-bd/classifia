 @extends('frontend.app')
 @section('style')
 @endsection
 @section('content')

 <section class="ss-section rea-ss-section">
 	<div class="search">
 		<div class="row mar-0">
 			<div class="col-md-6">
 				<div class="rea-ss-nav">
 					<ul class="nav nav-tabs" id="myTab" role="tablist">
 						<li class="nav-item">
 							<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Buy</a>
 						</li>
 						<li class="nav-item">
 							<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Rent</a>
 						</li>
 					</ul>
 					<div class="tab-content" id="myTabContent">
 						<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
 							<div class="row mar-0">
 								<div class="col-12">
 									<div class="input-group mb-3">
 										<div class="input-group-prepend">
 											<span class="input-group-text" id="basic-addon1"><img src="{{ asset('assets/img/search.png') }}" alt="lt flag"></span>
 										</div>
 										<input type="text" class="form-control search-i" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
 									</div>
 								</div>
 								<div class="col-sm-6">
 									<div class="form-group">
 										<div class="ctm-select">
 											<span class="select-icon"><img src="{{ asset('assets/img/category.png') }}" alt="lt flag"></span>
 											<div class="ctm-select-txt"> 
 												<span class="select-txt" id="category">Category</span>
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
 								</div>
 								<div class="col-sm-6">
 									<div class="form-group">
 										<div class="ctm-select">
 											<span class="select-icon"><img src="{{ asset('assets/img/map-pin.png') }}" alt="lt flag"></span> 
 											<div class="ctm-select-txt">
 												<span class="select-txt" id="city">City</span>
 											</div>
 											<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
 											<div class="ctm-option-box">
 												<div class="ctm-option">Dhaka</div>
 												<div class="ctm-option">London</div>
 												<div class="ctm-option">Dhaka</div>
 												<div class="ctm-option">Dhaka</div>
 											</div>
 										</div>
 									</div>
 								</div>
 								<div class="col-12 pad-r-0">
 									<div class="search-service">
 										<div class="row mar-0">
 											@for($i=1;$i<=5;$i++)
 											<div class="col-4 col-sm-3 col-md-4 col-lg-3 pad-l-0">
 												<div class="item-list-p">
 													<div class="item-list">
 														<div class="item-icon">
 															<span class="item-img"><img src="{{ asset('assets/img/home-h.png')}}" alt="lt flag"></span>	
 															<span class="item-h-img"><img src="{{ asset('assets/img/home-hr.png')}}" alt="lt flag"></span>	
 														</div>
 													</div>
 													<div class="item-txt">Category</div>
 												</div>
 											</div>
 											@endfor
 										</div>
 									</div>
 								</div>
 								<div class="col-12">
 									<div class="sh-extra">
 										<span class="extra">Expand <i class="fas fa-chevron-down"></i></span>
 										<span class="hide">Hide <i class="fas fa-chevron-up"></i></span>
 									</div>
 									<div class="extra-box">
 										<div class="row mar-0">
 											<div class="col-12 col-sm-6 pad-l-0">
 												<div class="form-group">
 													<label for="inputState">Savivaldybė</label>
 													<div class="ctm-select">
 														<div class="ctm-select-txt pad-l-10 pad-l-10"> 
 															<span class="select-txt" id="city">Volkswagen</span>
 														</div>
 														<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
 														<div class="ctm-option-box">
 															<div class="ctm-option">Volkswagen</div>
 															<div class="ctm-option">Volksagen</div>
 															<div class="ctm-option">Volswagen</div>
 															<div class="ctm-option">Vlkswagen</div>
 														</div>
 													</div>
 												</div>
 											</div>
 											<div class="col-12 col-sm-6 pad-l-0">
 												<div class="form-group">
 													<label for="inputState">Savivaldybė</label>
 													<div class="ctm-select">
 														<div class="ctm-select-txt pad-l-10"> 
 															<span class="select-txt" id="city">Volkswagen</span>
 														</div>
 														<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
 														<div class="ctm-option-box">
 															<div class="ctm-option">Volkswagen</div>
 															<div class="ctm-option">Volksagen</div>
 															<div class="ctm-option">Volswagen</div>
 															<div class="ctm-option">Vlkswagen</div>
 														</div>
 													</div>
 												</div>
 											</div>
 											<div class="col-12 col-sm-6  col-lg-4 pad-l-0">
 												<div class="form-group">
 													<label for="inputState">Savivaldybė</label>
 													<div class="ctm-select">
 														<div class="ctm-select-txt pad-l-10"> 
 															<span class="select-txt" id="city">Volkswagen</span>
 														</div>
 														<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
 														<div class="ctm-option-box">
 															<div class="ctm-option">Volkswagen</div>
 															<div class="ctm-option">Volksagen</div>
 															<div class="ctm-option">Volswagen</div>
 															<div class="ctm-option">Vlkswagen</div>
 														</div>
 													</div>
 												</div>
 											</div>
 											<div class="col-12 col-sm-6  col-lg-4 pad-l-0">
 												<div class="form-group">
 													<label for="inputState">Savivaldybė</label>
 													<div class="ctm-select">
 														<div class="ctm-select-txt pad-l-10"> 
 															<span class="select-txt" id="city">Volkswagen</span>
 														</div>
 														<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
 														<div class="ctm-option-box">
 															<div class="ctm-option">Volkswagen</div>
 															<div class="ctm-option">Volksagen</div>
 															<div class="ctm-option">Volswagen</div>
 															<div class="ctm-option">Vlkswagen</div>
 														</div>
 													</div>
 												</div>
 											</div>
 											<div class="col-12 col-sm-6  col-lg-4 pad-l-0">
 												<div class="form-group">
 													<label for="inputState">Savivaldybė</label>
 													<div class="ctm-select">
 														<div class="ctm-select-txt pad-l-10"> 
 															<span class="select-txt" id="city">Volkswagen</span>
 														</div>
 														<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
 														<div class="ctm-option-box">
 															<div class="ctm-option">Volkswagen</div>
 															<div class="ctm-option">Volksagen</div>
 															<div class="ctm-option">Volswagen</div>
 															<div class="ctm-option">Vlkswagen</div>
 														</div>
 													</div>
 												</div>
 											</div>
 										</div>
 									</div>
 								</div>
 								<div class="col-12 search-btn">
 									<button class="btn">search</button>
 								</div>
 							</div>
 						</div>
 						<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
 					</div>
 				</div>
 			</div>
 			<div class="col-md-6">
 				<div class="realestate-search-sidebar">
 					<div class="realestate-search-tlt">Quick links</div>
 					<div class="quick-links">
 						<div class="row mar-0">
 							<div class="col-12 col-md-6 col-lg-4 pad-l-0">
 								<div class="link"><a href="#">Links one <span>(01)</span></a></div>
 							</div>
 							<div class="col-12 col-md-6 col-lg-4 pad-l-0">
 								<div class="link"><a href="#">Links one <span>(01)</span></a></div>
 							</div>
 							<div class="col-12 col-md-6 col-lg-4 pad-l-0">
 								<div class="link"><a href="#">Links one <span>(01)</span></a></div>
 							</div>
 							<div class="col-12 col-md-6 col-lg-4 pad-l-0">
 								<div class="link"><a href="#">Links one <span>(01)</span></a></div>
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 </section>
 <section class="slider-section">
 	<div class="row mar-0">
 		<div class="col-12 pad-0">
 			<div class="section-tlt"><svg xmlns="http://www.w3.org/2000/svg" width="22.416" height="22.027" viewBox="0 0 22.416 22.027">
 				<g id="check-circle" transform="translate(-0.998 -0.982)">
 					<path id="Path_93" data-name="Path 93" d="M22,11.08V12a10,10,0,1,1-5.93-9.14" fill="none" stroke="#6200ee" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
 					<path id="Path_94" data-name="Path 94" d="M22,4,12,14.01l-3-3" fill="none" stroke="#6200ee" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
 				</g>
 			</svg>
 		Feature Products</div>
 	</div>
 </div>
 <div class="row mar-0">
 	<div class="col-12 pad-0">
 		<div class="swiper-container ctm-container">
 			<div class="swiper-wrapper">
 				<div class="swiper-slide">
 					<div class="product-list">
 						<div class="product">
 							<div class="product-img-p">
 								<div class="product-img">
 									<img class="cover" src="{{ asset('assets/img/car.jpg') }}" alt="product">
 								</div>
 								<span class="img-txt">@ Rigs</span>
 							</div>
 							<div class="product-txt">
 								<div class="product-price">$657585</div>
 								<div class="product-tlt">Feature Products</div>
 								<div class="product-time">2 hrs ago</div>
 								<div class="view-btn">view <i class="fas fa-arrow-right"></i></div>
 							</div>
 						</div>
 					</div>
 				</div>
 				<div class="swiper-slide">
 					<div class="product-list">
 						<div class="product">
 							<div class="product-img-p">
 								<div class="product-img">
 									<img class="cover" src="{{ asset('assets/img/car.jpg') }}" alt="product">
 								</div>
 								<span class="img-txt">@ Rigs</span>
 							</div>
 							<div class="product-txt">
 								<div class="product-price">$657585</div>
 								<div class="product-tlt">Feature Products</div>
 								<div class="product-time">2 hrs ago</div>
 								<div class="view-btn">view <i class="fas fa-arrow-right"></i></div>
 							</div>
 						</div>
 					</div>
 				</div>
 				<div class="swiper-slide">
 					<div class="product-list">
 						<div class="product">
 							<div class="product-img-p">
 								<div class="product-img">
 									<img class="cover" src="{{ asset('assets/img/car.jpg') }}" alt="product">
 								</div>
 								<span class="img-txt">@ Rigs</span>
 							</div>
 							<div class="product-txt">
 								<div class="product-price">$657585</div>
 								<div class="product-tlt">Feature Products</div>
 								<div class="product-time">2 hrs ago</div>
 								<div class="view-btn">view <i class="fas fa-arrow-right"></i></div>
 							</div>
 						</div>
 					</div>
 				</div>
 				<div class="swiper-slide">
 					<div class="product-list">
 						<div class="product">
 							<div class="product-img-p">
 								<div class="product-img">
 									<img class="cover" src="{{ asset('assets/img/car.jpg') }}" alt="product">
 								</div>
 								<span class="img-txt">@ Rigs</span>
 							</div>
 							<div class="product-txt">
 								<div class="product-price">$657585</div>
 								<div class="product-tlt">Feature Products</div>
 								<div class="product-time">2 hrs ago</div>
 								<div class="view-btn">view <i class="fas fa-arrow-right"></i></div>
 							</div>
 						</div>
 					</div>
 				</div>
 				<div class="swiper-slide">
 					<div class="product-list">
 						<div class="product">
 							<div class="product-img-p">
 								<div class="product-img">
 									<img class="cover" src="{{ asset('assets/img/car.jpg') }}" alt="product">
 								</div>
 								<span class="img-txt">@ Rigs</span>
 							</div>
 							<div class="product-txt">
 								<div class="product-price">$657585</div>
 								<div class="product-tlt">Feature Products</div>
 								<div class="product-time">2 hrs ago</div>
 								<div class="view-btn">view <i class="fas fa-arrow-right"></i></div>
 							</div>
 						</div>
 					</div>
 				</div>
 				<div class="swiper-slide">
 					<div class="product-list">
 						<div class="product">
 							<div class="product-img-p">
 								<div class="product-img">
 									<img class="cover" src="{{ asset('assets/img/car.jpg') }}" alt="product">
 								</div>
 								<span class="img-txt">@ Rigs</span>
 							</div>
 							<div class="product-txt">
 								<div class="product-price">$657585</div>
 								<div class="product-tlt">Feature Products</div>
 								<div class="product-time">2 hrs ago</div>
 								<div class="view-btn">view <i class="fas fa-arrow-right"></i></div>
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 			<!-- Add Arrows -->
 		</div>

 		<div class="swiper-button-next">
 			<svg xmlns="http://www.w3.org/2000/svg" width="35px" height="35px" viewBox="0 0 53.499 53.499">
 				<g id="Group_139" data-name="Group 139" transform="translate(54.499 54.499) rotate(180)">
 					<path id="Path_97" data-name="Path 97" d="M27.75,1A26.75,26.75,0,1,0,54.5,27.75,26.781,26.781,0,0,0,27.75,1Zm0,48.636A21.886,21.886,0,1,1,49.636,27.75,21.911,21.911,0,0,1,27.75,49.636Z" fill="#cacaca"/>
 					<path id="Path_98" data-name="Path 98" d="M28.884,16.727H15.3l5.576-5.576a2.431,2.431,0,1,0-3.439-3.439L7.711,17.44a2.439,2.439,0,0,0,0,3.441l9.725,9.725a2.431,2.431,0,1,0,3.439-3.439L15.3,21.591H28.884a2.432,2.432,0,1,0,0-4.864Z" transform="translate(8.592 8.59)" fill="#cacaca"/>
 				</g>
 			</svg>
 		</div>
 		<div class="swiper-button-prev">
 			<svg xmlns="http://www.w3.org/2000/svg" width="35px" height="35px" viewBox="0 0 53.499 53.499">
 				<g id="Group_138" data-name="Group 138" transform="translate(-1 -1)">
 					<path id="Path_97" data-name="Path 97" d="M27.75,1A26.75,26.75,0,1,0,54.5,27.75,26.781,26.781,0,0,0,27.75,1Zm0,48.636A21.886,21.886,0,1,1,49.636,27.75,21.911,21.911,0,0,1,27.75,49.636Z" fill="#cacaca"/>
 					<path id="Path_98" data-name="Path 98" d="M28.884,16.727H15.3l5.576-5.576a2.431,2.431,0,1,0-3.439-3.439L7.711,17.44a2.439,2.439,0,0,0,0,3.441l9.725,9.725a2.431,2.431,0,1,0,3.439-3.439L15.3,21.591H28.884a2.432,2.432,0,1,0,0-4.864Z" transform="translate(8.592 8.59)" fill="#cacaca"/>
 				</g>
 			</svg>
 		</div>
 	</div>
 </div>
</section>
<section class="product-wrapper">
	<div class="row mar-0">
		<div class="col-12 pad-0">
			<div class="section-tlt"> just Posted</div>
		</div>
		<div class="col-10 pad-0">
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
				<div class="row mar-0">
					<div class="col-12 pad-l-0">
						<div class="all-view">
							<div class="view-btn"><i class="fa fa-bars"></i> view all new posts</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-2 pad-0">
			<div class="ad">
				ad
			</div>
			<div class="ad">
				ad
			</div>
			<div class="ad">
				ad
			</div>
			<div class="ad">
				ad
			</div>
		</div>
	</div>
</section>
@endsection
@section('script')
<script>
	$(document).ready(function(){
	});
	var swiper = new Swiper('.ctm-container', {
		slidesPerView: 5,
		spaceBetween: 15,
		loop: false,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},

		breakpoints: {
			1400: {
				slidesPerView: 4,
			},
			1000: {
				slidesPerView: 3,
			},
			700: {
				slidesPerView: 2,
			},
			450: {
				slidesPerView: 1,
			}
		}
	});
</script>
@endsection