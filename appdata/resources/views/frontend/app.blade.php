<!DOCTYPE html>
<html lang="en">
<head>
	<title>Classifia</title>
	<link rel="icon" href="{{ asset('assets/img/icon.ico') }}" type="Icon" >
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/fontawesome/css/fontawesome-all.min.css') }}">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{ asset('assets/swiper/css/swiper.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/ionicons/css/ionicons.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
	<style>
		.ctm-option-box{
			overflow: auto;
			max-height: 250px;
		}

		#popupAlertSuccess,
		#popupAlert  {
			visibility: hidden;
			min-width: 250px;
			margin-left: -125px;
			background-color: #f91039;
			color: #fff;
			text-align: center;
			border-radius: 2px;
			padding: 16px;
			position: fixed;
			z-index: 1111;
			left: 50%;
			bottom: 30px;
			font-size: 17px;
		}
		#popupAlertSuccess
		{
			background: green;
		}
		#popupAlertSuccess.show,
		#popupAlert.show
		{
			visibility: visible;
			-webkit-animation: fadein 0.5s, fadeout 0.5s 5s;
			animation: fadein 0.5s, fadeout 0.5s 5s;
		}
		@-webkit-keyframes fadein {
			from {bottom: 0; opacity: 0;}
			to {bottom: 30px; opacity: 1;}
		}

		@keyframes fadein {
			from {bottom: 0; opacity: 0;}
			to {bottom: 30px; opacity: 1;}
		}

		@-webkit-keyframes fadeout {
			from {bottom: 30px; opacity: 1;}
			to {bottom: 0; opacity: 0;}
		}

		@keyframes fadeout {
			from {bottom: 30px; opacity: 1;}
			to {bottom: 0; opacity: 0;}
		}
		#files{
			/*display: block;*/
		}
		.imageThumb {
			max-height: 75px;
			border: 2px solid;
			padding: 1px;
			cursor: pointer;
		}
		.pip {
			display: inline-block;
			margin: 10px 10px 0 0;
		}
		.remove {
			display: block;
			background: #444;
			border: 1px solid black;
			color: white;
			text-align: center;
			cursor: pointer;
		}
		.remove:hover {
			background: white;
			color: black;
		}

		.item-list-p {
			position: relative;
		}

		.inner-cat-car {
			position: relative;
		}

		.inner-cat {
			position: absolute;
			z-index: 9;
			width: max-content;
			top: 15px;
			left: 0;
			border-top: 4px solid #DA233C;
			background: #fff;
			color: #000;
			box-shadow: 0 6px 14px 5px #ddd;
		}
		.arrow-up {
			position: absolute;
			width: 0;
			height: 0;
			border-left: 10px solid transparent;
			border-right: 10px solid transparent;
			top: -13px;
			left: 37px;
			border-bottom: 10px solid #DA233C;
		}
		.inner-cat .inner-c-l {
			display: flex;
			align-items: center;
			cursor: pointer;
			font-size: 14px;
			padding: 5px;
		}
		.inner-cat .inner-c-l:hover,  .inner-cat .inner-c-l.active {
			background: #DA233C;
			color: #fff;
		}
		.inner-cat .inner-c-l img {
			width: 15px;
			margin-right: 5px;
		}

		.item-list-p .inner-cat {
			display: none;
			top: 180px;
		}
		.item-list-p.active .inner-cat {
			display: block;
		}


		.select-cat-list {
			margin-top: 10px;
		}
		.select-cat {
			color: #276eac;
			border: 1px solid #276eac;
			padding: 2px 8px;
			font-size: 12px;
			border-radius: 3px;
			margin-bottom: 7px;
			margin-right: 5px;
			display: inline-flex;
			align-items: center;
			text-transform: capitalize;
		}
		.cat-remove {
			display: inline-block;
			font-size: 10px;
			height: 14px;
			width: 14px;
			border-radius: 50%;
			border: 1px solid #276eac;
			text-align: center;
			cursor: pointer;
			margin-left: 5px;
		}

		/*22-10-20*/
		.search-img {
			width: 25px;
		}
		.search-item i {
			color: #276eac;
			position: relative;
			left: -3px;
		}
		.search-cnt-show {
			display: none;
			position: absolute;
			max-width: 100%;
			top: 5px;
			left: 0;
			min-width: 100%;
			padding: 15px 8% 0;
			z-index: 9;
			background: #fafafa;
			border-bottom: 1px solid #ddd;
			box-shadow: 0 6px 6px #ddd;
		}
		.rea-ss-nav .item-list-p.active .item-list {
			background: rgba(39,110,172,.8);
		}
		.search-service .item-list.active {
			background: rgba(39,110,172,.8) !important;
		}
		.search-service .item-list:hover {
			background: #276eac !important;
		}
		.cat-name {
			display: none;
		}
		.search-div-all {
			position: relative;
			/* padding: 0 8%; */
		}

		/*25-10-20*/

		.search-service .item-list {
			padding: 12px 0;
			width: 100%;
			margin: 0;
		}
		/*.ctm-form-group {
			display: flex;
			align-items: center;
		}
		.ctm-form-group .ctm-form-label {
			padding-right: 10px;
			margin-bottom: 0;
			width: 70px;
		}
		.ctm-form-group .form-cnt {
			display: block;
			width: calc(100% - 70px);
			}*/
			.ctm-form-group .ctm-select .ctm-select-txt {
				padding: 13px 25px 13px 5px;
			}
			.realestate-search-sidebar .price-box {
				padding-bottom: 0;
			}
			.tab-w-name .item-list {
				padding: 0;
				text-align: left;
			}
			.tab-w-name .item-list:first-child {
				margin-left: 0;
			}
			.tab-w-name .item-list .item-txt {
				text-transform: capitalize;
				padding-left: 5px;
			}
			.tab-w-name .item-list.active {
				color: #fff;
			}
			.tab-w-name .item-list .item-icon {
				display: flex;
				white-space: nowrap;
				overflow: hidden;
				align-items: center;
				font-size: 13px;
				padding: 6px 10px;
			}
			.tab-w-name .item-list .item-icon img {
				width: 20px;
				height: 20px;
			}
			.item-list-p.active .inner-cat {
				display: block;
			}


			.inner-cat {
				width: 420px;
				border: 2px solid #276eac;
				border-top: 4px solid #276eac;
			}
			.inner-cat .inner-c-l {
				width: 50%;
				float: left;
			}

			.arrow-up {
				border-bottom: 10px solid #276eac;
			}
			.inner-cat .inner-c-l.active {
				background: rgba(39,110,172,.8);
			}
			.inner-cat .inner-c-l:hover {
				background: #276eac;
			}
			/*28-10-20*/

			.ctm-select .ctm-select-txt {
				text-transform: capitalize;
			}
			.form-control::placeholder {
				text-transform: capitalize;
			}
			input[type=number]::-webkit-inner-spin-button,
			input[type=number]::-webkit-outer-spin-button {
				-webkit-appearance: none;
				margin: 0;
			}

			/* Firefox */
			input[type=number] {
				-moz-appearance: textfield;
			}
			.tab-w-name .nav-fill .nav-item {
				position: relative;
				flex: 0 0 auto;
				margin-right: 10px;
				margin-bottom: 10px;
			}
			.tab-w-name .inner-cat {
				display: none;
				top: 43px;
				left: 0;
			}
			.tab-w-name .item-list.active .inner-cat {
				display: block;
			}
			.ss-section {
				border-bottom-right-radius: 0;
			}
			.breadcrumb {
				padding: 0;
				margin-bottom: 20px;
				background-color: transparent;
			}
			.breadcrumb .breadcrumb-item {
				font-size: 16px;
				text-transform: capitalize;
			}
			.breadcrumb .breadcrumb-item a {
				color: #276eac;
			}
			.breadcrumb .breadcrumb-item a:hover {
				text-decoration: underline;
			}
			.realestate-details {
				padding-top: 30px;
			}
			.footer-menu .form-control {
				height: 45px;
				background: #11161b;
				border: none;
				color: #fff;
				resize: none;
			}
			.footer-menu .form-control::placeholder {
				height: 45px;
				background: #11161b;
				border: none;
				color: #fff;
				resize: none;
			}
			.btnContact {
				background: #276eac;
				border: 1px solid #276eac;
				color: #fff;
			}
			.product-list .fav {
				transform: scale(1);
				transition: .4s ease all;
				cursor: pointer;
			}
			.product-list .fav:hover {
				transform: scale(1.5);
				color: #DA233C;
			}
			::-webkit-scrollbar {
				width: 5px;
			}
			::-webkit-scrollbar-track-piece {
				background: #fff;
			}
			::-webkit-scrollbar-thumb {
				background: #ddd;
				}​
				@media screen and (max-width: 991px) {
					.ss-section {
						padding: 0px 15px 45px 15px;
					}
				}
				@media screen and (max-width: 500px) {
					.inner-cat {
						width: 280px;
					}
					.inner-cat .inner-c-l {
						width: 100%;
						float: none;
					}
				}
			</style>

			@yield('style')
		</head>
		<body>
			@include('frontend.pages.inc.header')
			@yield('content')
			@include('frontend.pages.inc.footer')
			<div class="modal fade lg-modal" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog  modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							@lang('frontend.button.signup')
						</div>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<div class="modal-body search">
							<form method="POST" action="{{ route('register') }}">
								@csrf
								<div class="form-group">
									<label for="recipient-name" class="col-form-label">@lang('frontend.sign.up.account.type')</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-check"></i></span>
										</div>
										<select id="AccType" onchange="loadInfoPanel(this.value)" class="form-control" name="acount_type" required >
											<option value="">@lang('frontend.label.choose')</option>
											<option value="2">General</option>
											<option value="1">Company</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="recipient-name" class="col-form-label">@lang('frontend.email')</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-envelope"></i></span>
										</div>
										<input required="" name="email" id="email" type="email" class="form-control search-i @error('email') is-invalid @enderror" autocomplete="email" autofocus placeholder="@lang('frontend.email')" aria-label="email"  value="{{ old('email') }}" aria-describedby="basic-addon1">
										@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								<div class="more-info-panel d-none" id="companyInfo">
									<div class="form-group">
										<label>@lang('frontend.sign.up.company.name')</label>
										<input type="text" value="" class="form-control" name="company_name" placeholder="@lang('frontend.sign.up.company.name')">
									</div>
									<div class="form-group">
										<label>@lang('frontend.sign.up.company.code')</label>
										<input type="text" value="" class="form-control" name="company_code" placeholder="@lang('frontend.sign.up.company.code')">
									</div>
									<div class="form-group"style="z-index: 9999;">
										<label>@lang('frontend.sign.up.user.address')</label>
										<input id="pac-input" name="address" class="controls form-control required" type="text" value="" placeholder="@lang('frontend.sign.up.user.address')">
										<div id="map"></div>
									</div>
									<div class="form-group">
										<label>@lang('frontend.sign.up.phone')</label>
										<input type="number" value="" class="form-control" name="phone" placeholder="@lang('frontend.sign.up.phone')">
									</div>

								</div>
								<div class="more-info-panel d-none" id="gUserInfo">
									<div class="form-group">
										<label>@lang('frontend.sign.up.user.name')</label>
										<input type="text" value="" class="form-control" name="name" placeholder="@lang('frontend.sign.up.user.name')">
									</div>
									<div class="form-group">
										<label>@lang('frontend.sign.up.user.dob')</label>
										<input type="date" class="form-control" id="dob" name="dob" placeholder="dob">
									</div>
									<div class="form-group">
										<label>@lang('frontend.sign.up.user.surname')</label>
										<input type="text" value="" class="form-control" name="surname" placeholder="@lang('frontend.sign.up.user.surname')">
									</div>
									<div class="form-group"style="z-index: 9999;">
										<label>@lang('frontend.sign.up.user.address')</label>
										<input id="pac-input" name="address" class="controls form-control required" type="text" value="" placeholder="@lang('frontend.sign.up.user.address')">
										<div id="map"></div>
									</div>
								</div>
								<div class="form-group">
									<label for="recipient-name" class="col-form-label">@lang('frontend.password')</label>
									<div class="input-group pr">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-lock"></i></span>
										</div>
										<input required=""  name="password" id="password" type="password" class="form-control br-r-none search-i @error('password') is-invalid @enderror pass" placeholder="@lang('frontend.password')" aria-label="Username"  name="password" aria-describedby="basic-addon1" autocomplete="new-password">
										<div class="input-group-append">
											<span onclick="changeTypeTotext('pass')" class="input-group-text"><i class="fas fa-eye"></i></span>
										</div>
										@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								<div class="form-group">
									<label for="recipient-name" class="col-form-label">@lang('frontend.sign.up.re.password')</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-lock"></i></span>
										</div>
										<input required="" id="password-confirm" type="password" class="form-control search-i br-r-none repass" placeholder="@lang('frontend.sign.up.re.password')" autocomplete="new-password" aria-label="Username" name="password_confirmation" aria-describedby="basic-addon1">
										<div class="input-group-append">
											<span onclick="changeTypeTotext('repass')" class="input-group-text"><i class="fas fa-eye"></i></span>
										</div>
									</div>
								</div>
								<div class="form-group mar-0">
									<label class="col-form-label label-txt">@lang('frontend.login.alreadyhaveaccount')
										<span data-toggle="modal" onclick="hidePanel('registerModal')" data-target="#loginModal" >@lang('frontend.button.login')</span></label>
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn ctm-btn w-100 next-btn">@lang('frontend.button.signup')</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="modal fade lg-modal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								@lang('frontend.button.login')
							</div>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<div class="modal-body search">
								<form method="POST" action="{{ route('login') }}">
									@csrf
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">@lang('frontend.email')</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-envelope"></i></span>
											</div>
											<input  type="email" name="email" class="form-control search-i @error('email') is-invalid @enderror" placeholder="@lang('frontend.email')"  value="{{ old('email') }}" aria-label="email" required autocomplete="email" autofocus aria-describedby="basic-addon1">
											@error('email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div>
									</div>
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">@lang('frontend.password')</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-lock"></i></span>
											</div>
											<input type="password" id="lpass" name="password" class="form-control br-r-none search-i @error('password') is-invalid @enderror lpass"  required autocomplete="current-password" placeholder="@lang('frontend.password')" aria-label="Username" aria-describedby="basic-addon1">
											<div class="input-group-append">
												<span onclick="changeTypeTotext('lpass')" class="input-group-text"><i class="fas fa-eye"></i></span>
											</div>
											@error('password')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div>
									</div>
									<div class="form-group mar-0">
										<label class="col-form-label label-txt">@lang('frontend.login.forgot')<span>@lang('frontend.login.reset.pass')</span></label>
									</div>
									<div class="form-group mar-0">
										<label class="col-form-label label-txt">@lang('frontend.login.donthaveaccount')
											<span data-toggle="modal" onclick="hidePanel('loginModal')" data-target="#registerModal">@lang('frontend.button.signup')</span></label>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn ctm-btn w-100 next-btn">@lang('frontend.button.login')</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>

					<div class="modal fade plane-modal" id="plane_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
							<div class="modal-content">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">
										<svg class="d-block d-sm-none" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 16.188 16.189">
											<g id="x" transform="translate(1.414 1.414)">
												<line id="Line_48" data-name="Line 48" x1="13.36" y2="13.36" stroke-width="2" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
												<line id="Line_49" data-name="Line 49" x2="13.36" y2="13.36" stroke-width="2" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
											</g>
										</svg>
										<svg class="d-none d-sm-block" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 16.188 16.189">
											<g id="x" transform="translate(1.414 1.414)">
												<line id="Line_48" data-name="Line 48" x1="13.36" y2="13.36" stroke-width="2" stroke="#000" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
												<line id="Line_49" data-name="Line 49" x2="13.36" y2="13.36" stroke-width="2" stroke="#000" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
											</g>
										</svg>
									</span>
								</button>
								<div class="modal-body">
									<div class="row mar-0">
										<div class="col-sm-5 pad-0">
											<div class="suc-div">
												<div class="p-m-div1">
													<div class="suc-img">
														<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 101 100.999">
															<g id="Group_277" data-name="Group 277" transform="translate(-1 -0.994)">
																<g id="Group_275" data-name="Group 275" transform="translate(1 0.994)">
																	<path id="Path_117" data-name="Path 117" d="M51.5,101.993h-.028A50.5,50.5,0,0,1,51.5.994h.028a50.207,50.207,0,0,1,20.53,4.37,4.592,4.592,0,0,1-3.742,8.387,41.1,41.1,0,0,0-16.793-3.576H51.5a41.318,41.318,0,0,0-.023,82.635H51.5a41.365,41.365,0,0,0,41.318-41.29V47.3a4.591,4.591,0,1,1,9.182,0v4.224A50.559,50.559,0,0,1,51.5,101.993Z" transform="translate(-1 -0.994)" fill="#fff"/>
																</g>
																<g id="Group_276" data-name="Group 276" transform="translate(33.135 10.203)">
																	<path id="Path_118" data-name="Path 118" d="M26.364,58.136a4.6,4.6,0,0,1-3.246-1.345L9.346,43.018a4.59,4.59,0,0,1,6.491-6.491L26.364,47.049l42.663-42.7a4.59,4.59,0,1,1,6.491,6.491L29.61,56.791A4.59,4.59,0,0,1,26.364,58.136Z" transform="translate(-8 -3)" fill="#fff"/>
																</g>
															</g>
														</svg>
													</div>
													<div class="suc-txt">Success</div>
												</div>
											</div>
										</div>
										<div class="col-sm-7 pad-0">
											<div class="modal-cnt">
												<div class="modal-tlt">Aprašymas</div>
												<div class="modal-txt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec bibendum vitae mauris et lobortis. Phasellus pretium viverra nulla eu commodo. In interdum, nisl vel euismod tincidunt.</div>
												<div class="next-step"><a href="{{url('/')}}"><button class="btn view-btn">Back to home</button></a></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<script src="{{ asset('assets/js/map.js') }}"></script>
					<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgS793eWlCwsEaxw4bUz5xKYnxhvUMpnA&libraries=places&callback=initAutocomplete&map_ids=b594e41720ee93b6"
					async
					defer
					></script>
					<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
					<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
					<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
					<script src="{{ asset('assets/swiper/js/swiper.js') }}"></script>
					<script src="{{ asset('assets/js/year-selector.js') }}"></script>

					<script src="{{ asset('assets/js/custom.js') }}"></script>

					<script>
						window.search_title = '<?= url('search-matchable-title')?>';
						window.add_to_favourite = '<?= url('add-to-favourite')?>'
						window.add_to_last_visit = '<?= url('add-to-last-visit')?>'
						window.goto_profile = '<?= url('user-profile?',['method'=>'update'])?>'


						function hidePanel(mdl) {
							$("#"+mdl).modal('hide');

						}

						function setCategory(value){
							$(".catBox").val(value.replace(" / ", "-"));
						}
						function srchCity(filed,value){
							if (filed == 'city') {
								$(".cityBox").val(value);
							}
						}
					</script>



					@yield('script')
				</body>
				</html>
