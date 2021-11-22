<style>
	.search input{
		outline: none !important;
		box-shadow: none !important;;
		margin-top: 25px;
		border-bottom: 2px solid #ce7852;
		height: 46px;
		overflow: hidden;
	}
	.is-sticky .menu-devider {
		display: none;
	}
	.main-nav > ul {
		position: relative;
	}
	.srch-btn{
		margin-top: -45px;
		border-radius: 0;
		background-color: #ce7852;
		color: #fff;
		font-size: 20px;
		cursor: pointer !important;
		z-index: 11;
		overflow: hidden;
		position: relative;
		right: -46px;
		padding: 9px 13px;
	}
	.nav-tabs{
		border-bottom: 1px solid #ce7852;
		position: relative;
		margin-top: -20px;
	}
	.nav-tabs::before{
		content: "";
		position: absolute;
		height: 1px;
		width: 382px;
		background: #ce7852;
		bottom: -1px;
		left: -381px;
	}
	.nav-tabs::after{
		content: "";
		position: absolute;
		height: 1px;
		width: 382px;
		background: #ce7852;
		bottom: -1px;
		right: -381px;
	}
	.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
		color: #495057;
		background-color: #fff;
		border-color: #ce7852 #ce7852 #fff;
	}
	.nav-tabs .nav-link{
		color: #333;
		text-transform: uppercase;
		font-weight: 600;
	}
	.main-nav{
		/*background: #ddd;*/
	}
	.main-nav > ul > li {
		margin: 0 !important;
	}
	.main-nav > ul > li > a{
		color: #090808;
		display: block;
		padding: 12px;
		font-size: 14px;
		text-transform: uppercase;
		position: relative;
		font-weight: 600;
		margin: -3px;
	}
	.main-nav > ul > li > a:hover{
		color: #e59285;
		transition: .2s;
	}
	.sub-nav{
		background: #fff;
		position: absolute;
		width: 100%;
		left: 0;
		padding: 10px 0 10px 15px;
		transition: 1s;

		box-shadow: 0 6px 12px 0 rgba(0,0,0,.1);
		display: none;
	}
	.main-nav > ul > li:hover .sub-nav{
		display: block;
	}
	.sub-nav  li a{
		color: #625b5b;
		display: block;
		padding: 5px;
		text-transform: capitalize;
		font-size: 13px;
	}
	.sub-nav  li a:hover{
		color: #e59285;
		padding-left: 10px !important;
		display: inline-block;
	}
	.sub-nav  li {
		width: 24%;
		margin: 0 !important;
	}
</style>
<header id="wn__header" class="oth-page header__area header__absolute sticky__header">
	<div class="container-fluid">
		<div class="container-for-header-top">
			<div class="row">
				<div class="col-md-2 col-sm-2 col-2 col-lg-2">
					<div class="logo">
						<a href="{{url('/books')}}">
							<img src="{{asset('public/front-assets/images/logo/logo.png')}}" alt="logo images">
						</a>
					</div>
				</div>
				<div class="col-md-7 col-sm-6 col-6 col-lg-8">
					<div class="search">
						<input type="text" id="search"  class="form-control no-radius">
						<button class="btn srch-btn float-right"><i class="fa fa-search"></i></button>
					</div>
				</div>
				<div class="col-md-2 col-sm-3 col-3 col-lg-2">
					<?php
					if(Request::segment(1) == 'equipments') {
						if(Auth::check()) {
							$cartsitems = App\Cart::with('getEquipment','getEquipment.getProductImage')
							->where('carts.type', 1)
							->where('carts.user_id', Auth::user()->id)
							->get();
						}else{
							$pr_id =  (array)json_decode(Cookie::get('book_cart_item'));
							if($pr_id == null) {
								$ad_cart_id = [];
							}else {
								$ad_cart_id = array_keys($pr_id);
							}
							$cartsitems = App\Equipment::with( 'getProductImage')
							->WhereIn('equipments.id', $ad_cart_id)
							->get();
						}
					}else{
						if(Auth::check()) {
							$cartsitems = App\Cart::with('getProduct','getProduct.getProductImage')
							->where('carts.type', null)
							->where('carts.user_id', Auth::user()->id)
							->get();
						}else{
							$pr_id =  (array)json_decode(Cookie::get('book_cart_item'));
							if($pr_id == null) {
								$ad_cart_id = [];
							}else {
								$ad_cart_id = array_keys($pr_id);
							}
							$cartsitems = App\Product::with('getProductImage')
							->WhereIn('products.id', $ad_cart_id)
							->get();
						}
					}
					?>
					<div class="">
						<ul class="header__sidebar__right d-flex  justify-content-end align-items-center">
							<!-- <li class="shop_search"><a class="search__active" href="#"></a></li> -->
							<!-- <li class="wishlist"><a href="#"></a></li> -->
							<li class="shopcart">
								<a class="cartbox_active" href="#"><span class="product_qun"><?= count($cartsitems) ?></span></a>
								<div class="block-minicart minicart__active">
									<div class="minicart-content-wrapper">
										<div class="micart__close">
											<span>close</span>
										</div>
										<div class="items-total d-flex justify-content-between">
											<span><?= count($cartsitems) ?> items</span>
										</div>
										<div class="total_amount text-right"></div>
										<div class="mini_action checkout"></div>
										<div class="single__items">
											<div class="miniproduct">
												@foreach($cartsitems as $caritem)
												<?php 
												if(Auth::check()) {
													$qnty = $caritem->quantity;
												}else {
													$qnty = $pr_id[$caritem->id]->quan;
												}
												?>
												<div class="item01 d-flex mt--20">
													<div class="thumb">
														@if(Request::segment(1) == 'equipments')
														@if(Auth::check())
														<a href="{{route('singleEquipment',['id'=>$caritem['getEquipment']['id'],'title'=>$caritem['getEquipment']['pro_name']])}}" >
															<img src="{{asset('public/assets/products/'.$caritem['getEquipment']['getProductImage']['pro_img'])}}" alt="product images">
														</a>
														@else
														<a href="{{route('singleEquipment',['id'=>$caritem['id'],'title'=>$caritem['pro_name']])}}" >
															<img src="{{asset('public/assets/products/'.$caritem['getProductImage']['pro_img'])}}" alt="product images">
														</a>
														@endif
														@else
														@if(Auth::check())
														<a href="{{route('singleProductHome',['id'=>$caritem['getProduct']['id'],'title'=>$caritem['getProduct']['pro_name']])}}" >
															<img src="{{asset('public/assets/products/'.$caritem['getProduct']['getProductImage']['pro_img'])}}" alt="product images">
														</a>
														@else
														<a href="{{route('singleProductHome',['id'=>$caritem->id,'title'=>$caritem->pro_name])}}" >
															<img src="{{asset('public/assets/products/'.$caritem['getProductImage']['pro_img'])}}" alt="product images">
														</a>
														@endif
														@endif
													</div>
													<div class="content">
														<h6>
															@if(Request::segment(1) == 'equipments')
															@if(Auth::check())
															<a href="{{route('singleEquipment',['id'=>$caritem['getEquipment']['id'],'title'=>$caritem['getEquipment']['pro_name']])}}">
																<?= substr($caritem['getEquipment']['pro_name'], 0,25) ?>
															</a>
															@else
															<a href="{{route('singleEquipment',['id'=>$caritem['id'],'title'=>$caritem['pro_name']])}}">
																<?= substr($caritem['pro_name'], 0,25) ?>
															</a>
															@endif
															@else
															@if(Auth::check())
															<a href="{{route('singleProductHome',['id'=>$caritem['getProduct']['id'],'title'=>$caritem['getProduct']['pro_name']])}}">
																<?= substr($caritem['getProduct']['pro_name'], 0,25) ?>
															</a>
															@else
															<a href="{{route('singleProductHome',['id'=>$caritem->id,'title'=>$caritem->pro_name])}}">
																<?= substr($caritem['pro_name'], 0,25) ?>
															</a>
															@endif
															@endif
														</h6>
														<?php
														if(Request::segment(1) == 'equipments'){
															if (Auth::check()) {
																$price = $caritem['getEquipment']['pro_price'];
																$percentage = $caritem['getEquipment']['pro_discount'];
															}else{
																$price = $caritem['pro_price'];
																$percentage = $caritem['pro_discount'];
															}
														}else{
															if (Auth::check()) {
																$price = $caritem['getProduct']['pro_price'];
																$percentage = $caritem['getProduct']['pro_discount'];
															}else{
																$price = $caritem['pro_price'];
																$percentage = $caritem['pro_discount'];
															}
														}
														$discount = ($percentage/100)*$price;
														$newPrice = $price-$discount;
														if ($percentage== null){
															echo '<span class="prize">৳'.($price*$qnty).'</span>';
														}else{
															echo '<span class="prize">৳'.round($newPrice)*$qnty.'</span>';
														}
														?>
														<div class="product_prize d-flex justify-content-between">
															<span class="qun">Qty: {{$qnty}}</span>
															<ul class="d-flex justify-content-end">
																<li>
																	<a href="javascript:void(0)" onclick="deleteFromCart(<?= $caritem->cart_id; ?>)"><i class="zmdi zmdi-delete"></i>
																	</a>
																</li>
															</ul>
														</div>
													</div>
												</div>
												@endforeach
											</div>
										</div>
										<div class="mini_action cart">
											<a class="cart__btn" href="{{route('cart')}}">Go to Checkout</a>
										</div>
									</div>
								</div>
							</li>
							<li class="setting__bar__icon"><a class="setting__active" href="#"></a>
								<div class="searchbar__content setting__block">
									<div class="content-inner">
										<div class="switcher-currency">
											<strong class="label switcher-label">
												@if(Auth::check())
												<span><i class="fa fa-user"></i>&nbsp;&nbsp;{{Auth::user()->name}}</span>
												@endif
											</strong>
										</div>
										<div class="switcher-currency">
											@if(Auth::check() && Auth::user()->role == 4)
											<?php 
											$check_application = App\DoctorProfleReq::where('user_id', Auth::user()->id)->first();
											?>
											@if($check_application)
											<a href="javascript:void(0)" onclick="alert('You already requested for doctor account!')" class="">
												<strong class="label switcher-label">
													<span class="text-secondary">Make Doctor Account</span>
												</strong>
											</a>
											@else
											<a href="{{route('reqAsDoctor')}}">
												<strong class="label switcher-label">
													<span>Make Doctor Account</span>
												</strong>
											</a>
											@endif
											@endif
											<div class="switcher-options">
												<div class="switcher-currency-trigger">
													<div class="setting__menu">
														@if (Auth::check()) 
														<span><a href="{{route('myProfile.index',Auth::user()->role)}}">My Profile</a></span>
														<span><a href="#">My Wishlist</a></span>
														<span><a href="{{route('myRecentPosts')}}">My Blogs</a></span>
														<span><a href="" href="{{ route('logout') }}" onclick="event.preventDefault();
														document.getElementById('logout-form').submit();">Log out</a>
														<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
															@csrf
														</form></span>
														@else
														<span><a href="{{route('userLogin')}}">Log in</a></span>
														<span><a href="{{route('createAccount')}}">Create An Account</a></span>
														@endif
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid menu-devider">
		<div class="container-for-menu d-none d-lg-block">
			<?php 
			// Request::segment(1) == '' OR Request::segment(1) == 'books'
			if (Request::segment(1) == 'job') {
				$url = 2;
			}elseif (Request::segment(1) == 'equipments') {
				$url = 3;
			}elseif (Request::segment(1) == 'blog') {
				$url = 4;
			}elseif (Request::segment(1) == 'appointment') {
				$url = 5;
			}else{
				$url = 1;
			}
			?>
			<nav>
				<div class="nav nav-tabs" id="nav-tab" role="tablist">
					<a class="nav-item nav-link <?php echo $url == 1 ? 'active' : ''?>" id="nav-home-tab" href="{{url('/books')}}" role="tab" aria-controls="nav-home" aria-selected="true">Book</a>

					<a class="nav-item nav-link <?php echo $url == 3 ? 'active' : ''?>" id="nav-contact-tab"  href="{{url('equipments')}}" aria-controls="nav-contact" aria-selected="false">
						equipments
					</a>
					<a class="nav-item nav-link <?php echo $url == 5 ? 'active' : ''?>" id="nav-contact-tab"  href="{{url('appointment')}}" aria-controls="nav-contact" aria-selected="false">
						appointment
					</a>
					@if(Auth::check())
					@if (Auth::user()->role == 2 || Auth::user()->role == 3)
					<a class="nav-item nav-link <?php echo $url == 2 ? 'active' : ''?>" id="nav-profile-tab"  href="{{url('job')}}" role="tab" aria-controls="nav-profile" aria-selected="false">job</a>
					@endif
					@endif
					<a class="nav-item nav-link <?php echo $url == 4 ? 'active' : ''?>" id="nav-contact-tab"  href="{{route('blogs')}}" aria-controls="nav-contact" aria-selected="false">Blog</a>
				</div>
			</nav>
			@php 
			$author = App\Writer::orderBy('id','desc')->get()->toArray();
			$subjects = App\Subject::orderBy('id','desc')->get()->toArray();
			$publishers = App\Publisher::orderBy('id','desc')->get()->toArray();
			@endphp
			<div class="tab-content" id="nav-tabContent">
				<div class="tab-pane fade show <?php echo $url == 1 ? 'active' : ''?>" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
					<nav class="main-nav">
						<ul class="">
							<li class="list-inline-item"><a href="javascript:void(0)">writer</a>
								<ul class="sub-nav">
									@foreach($author as $writer)
									<li  class="list-inline-item"><a href="{{url('/books',['writer', $writer['writer_name_en'],$writer['id']])}}">{{$writer['writer_name_en']}}</a></li>
									@endforeach
								</ul>
							</li>
							<li class="list-inline-item"><a href="javascript:void(0)">Subjects</a>
								<ul class="sub-nav">
									@foreach($subjects as $subject)
									<li class="list-inline-item" ><a href="{{route('getInnerSub',['subject',$subject['subject_name_en'],$subject['id']])}}">{{$subject['subject_name_en']}}</a></li>
									@endforeach
								</ul>
							</li>
							<li class="list-inline-item"><a href="javascript:void(0)">publisher</a>
								<ul class="sub-nav">
									@foreach($publishers as $publisher)
									<li class="list-inline-item"><a href="{{url('/books',['publisher', $publisher['publisher_name_en'],$publisher['id']])}}">{{$publisher['publisher_name_en']}}</a></li>
									@endforeach
								</ul>
							</li>
							<li class="list-inline-item"><a href="javascript:void(0)">Ebooks</a>
								<ul class="sub-nav">
									@foreach($subjects as $subject)
									<li class="list-inline-item" ><a href="{{route('getInnerSub',['ebooks',$subject['subject_name_en'],$subject['id']])}}">{{$subject['subject_name_en']}}</a></li>
									@endforeach
								</ul>
							</li>
						</ul>
					</nav>				
				</div>
				<div class="tab-pane fade show <?php echo $url == 2 ? 'active' : ''?>" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
					<!-- <nav class="main-nav">
						<ul class="">
							<li class="list-inline-item">
								<a href="#">mobile
									<ul class="sub-nav">									
										<li  class="list-inline-item"><a href="#">Samsung</a></li>
										<li  class="list-inline-item"><a href="#">Iphone</a></li>
										<li  class="list-inline-item"><a href="#">huwai</a></li>
										<li  class="list-inline-item"><a href="#">oppo</a></li>
										<li  class="list-inline-item"><a href="#">walton</a></li>
										<li  class="list-inline-item"><a href="#">lenovo</a></li>
										<li  class="list-inline-item"><a href="#">asus</a></li>
										<li  class="list-inline-item"><a href="#">xiaomi</a></li>
									</ul>
								</a>
							</li>
						</ul>
					</nav> -->
				</div>
				<div class="tab-pane fade show <?php echo $url == 3 ? 'active' : ''?>" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
					<!-- <nav class="main-nav">
						<ul class="">
							<li class="list-inline-item">
								<a href="#">Birth day
									<ul class="sub-nav">									
										<li  class="list-inline-item"><a href="#">Samsung</a></li>
										<li  class="list-inline-item"><a href="#">Iphone</a></li>
										<li  class="list-inline-item"><a href="#">huwai</a></li>
										<li  class="list-inline-item"><a href="#">oppo</a></li>
										<li  class="list-inline-item"><a href="#">walton</a></li>
										<li  class="list-inline-item"><a href="#">lenovo</a></li>
										<li  class="list-inline-item"><a href="#">asus</a></li>
										<li  class="list-inline-item"><a href="#">xiaomi</a></li>
									</ul>
								</a>
							</li>
						</ul>
					</nav> -->
				</div>
			</div>
		</div>
		<!-- Start Mobile Menu -->
		<div class="row d-none">
			<div class="col-lg-12 d-none">
				<nav class="mobilemenu__nav">
					<ul class="meninmenu">
						<li><a href="index.html">Homesss</a>
							<ul>
								<li><a href="index.html">Home Style Default</a></li>
								<li><a href="index-2.html">Home Style Two</a></li>
								<li><a href="index-box.html">Home Box Style</a></li>
							</ul>
						</li>
						<li><a href="#">Pages</a>
							<ul>
								<li><a href="about.html">About Page</a></li>
								<li><a href="portfolio.html">Portfolio</a>
									<ul>
										<li><a href="portfolio.html">Portfolio</a></li>
										<li><a href="portfolio-three-column.html">Portfolio 3 Column</a></li>
										<li><a href="portfolio-details.html">Portfolio Details</a></li>
									</ul>
								</li>
								<li><a href="my-account.html">My Account</a></li>
								<li><a href="cart.html">Cart Page</a></li>
								<li><a href="checkout.html">Checkout Page</a></li>
								<li><a href="wishlist.html">Wishlist Page</a></li>
								<li><a href="error404.html">404 Page</a></li>
								<li><a href="faq.html">Faq Page</a></li>
								<li><a href="team.html">Team Page</a></li>
							</ul>
						</li>
						<li><a href="shop-grid.html">Shop</a>
							<ul>
								<li><a href="shop-grid.html">Shop Grid</a></li>
								<li><a href="shop-list.html">Shop List</a></li>
								<li><a href="shop-left-sidebar.html">Shop Left Sidebar</a></li>
								<li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
								<li><a href="shop-no-sidebar.html">Shop No sidebar</a></li>
								<li><a href="single-product.html">Single Product</a></li>
							</ul>
						</li>
						<li><a href="blog.html">Blog</a>
							<ul>
								<li><a href="blog.html">Blog Page</a></li>
								<li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
								<li><a href="blog-no-sidebar.html">Blog No Sidebar</a></li>
								<li><a href="blog-details.html">Blog Details</a></li>
							</ul>
						</li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- End Mobile Menu -->
		<div class="mobile-menu d-block d-lg-none"></div>
		<!-- Mobile Menu -->
	</div>
</header>
<script>
	$(document).ready(function(){
		// $('.main-nav > ul > li > a').hover(function(){
		// 	$(this).parent().find('.sub-nav').fadeIn();
		// },function(){
		// 	$(this).parent().find('.sub-nav').fadeOut();
		// });
	})
</script>