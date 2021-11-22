<header id="wn__header" class="oth-page header__area header__absolute sticky__header">
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-6 col-lg-2">
					<div class="logo">
						<a href="{{url('/')}}">
							<img src="{{asset('public/front-assets/images/logo/logo.png')}}" alt="logo images">
						</a>
					</div>
				</div>
				<?php
				if(Auth::check()) {
					$cartsitems = App\Cart::select('products.id', 'products.pro_name', 'products.pro_price','products.pro_discount','pro_images.pro_img','carts.quantity')
					->join('products', 'products.id', '=', 'carts.pro_id')
					->join('pro_images', 'pro_images.pro_id', '=', 'carts.pro_id')
					->orderBy('carts.cart_id', 'DESC')
					->where('carts.user_id', Auth::user()->id)
					->get();    
				}else{
					$pr_id =  (array)json_decode(Cookie::get('book_cart_item'));
					if($pr_id == null) {
						$ad_cart_id = [];
					}else {
						$ad_cart_id = array_keys($pr_id);
					}
					$cartsitems = App\Product::select('products.id', 'products.pro_name', 'products.pro_price','products.pro_discount', 'pro_images.pro_img')
					->join('pro_images', 'pro_images.pro_id', '=', 'products.id')
					->WhereIn('products.id', $ad_cart_id)
					->orderBy('products.id', 'DESC')
					->get();
				}
				?>
				<div class="col-md-1 offset-md-6  col-6 col-lg-2">
					<ul class="header__sidebar__right d-flex justify-content-end align-items-center">
						<li class="shop_search"><a class="search__active" href="#"></a></li>
						<li class="wishlist"><a href="#"></a></li>
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
													<a href="{{route('singleProduct',['id'=>$caritem->id,'title'=>$caritem->pro_name])}}" ><img src="{{asset('public/assets/products/'.$caritem->pro_img)}}" alt="product images"></a>
												</div>
												<div class="content">
													<h6><a href="{{route('singleProduct',['id'=>$caritem->id,'title'=>$caritem->pro_name])}}"><?= substr($caritem->pro_name,0,25) ?></a></h6>
													<?php 
													$price = $caritem->pro_price;
													$percentage = $caritem->pro_discount;

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
															<li><a href="javascript:void(0)" onclick="deleteFromCart(<?= $caritem->id; ?>)"><i class="zmdi zmdi-delete"></i></a></li>
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
											<span>Authentication</span>
										</strong>
										<div class="switcher-options">
											<div class="switcher-currency-trigger">
												<span class="currency-trigger">USD - US Dollar</span>
												<ul class="switcher-dropdown">
													<li>GBP - British Pound Sterling</li>
													<li>EUR - Euro</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="switcher-currency">
										<strong class="label switcher-label">
											<span>Language</span>
										</strong>
										<div class="switcher-options">
											<div class="switcher-currency-trigger">
												<span class="currency-trigger">English01</span>
												<ul class="switcher-dropdown">
													<li>English02</li>
													<li>English03</li>
													<li>English04</li>
													<li>English05</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="switcher-currency">
										<strong class="label switcher-label">
											<span>Select Store</span>
										</strong>
										<div class="switcher-options">
											<div class="switcher-currency-trigger">
												<span class="currency-trigger">Fashion Store</span>
												<ul class="switcher-dropdown">
													<li>Furniture</li>
													<li>Shoes</li>
													<li>Speaker Store</li>
													<li>Furniture</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="switcher-currency">
										<strong class="label switcher-label">
											<span>My Account</span>
										</strong>
										<div class="switcher-options">
											<div class="switcher-currency-trigger">
												<div class="setting__menu">
													<?php if (Auth::check()) { ?>
														<span><a href="#">My Account</a></span>
														<span><a href="#">My Wishlist</a></span>
														<span><a href="{{route('myRecentPosts')}}">My Blogs</a></span>
														<span><a href="" href="{{ route('logout') }}" onclick="event.preventDefault();
														document.getElementById('logout-form').submit();">Log out</a>
														<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
															@csrf
														</form></span>
													<?php }else{ ?>
														<span><a href="{{route('userLogin')}}">Log in</a></span>
														<span><a href="{{route('createAccount')}}">Create An Account</a></span>
													<?php } ?>
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
		
		<!-- Start Mobile Menu -->
		<div class="row d-none">
			<div class="col-lg-12 d-none">
				<nav class="mobilemenu__nav">
					<ul class="meninmenu">
						<li><a href="index.html">Home</a>
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
	<div class="mn-mnu">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 d-none d-lg-block">
					<ul class="position-absolute main-nav-ul">
						<li class="list-inline-item"><a class=" active-parent-menu" href="{{url('/')}}">Books</a></li>
						<li class="list-inline-item"><a class="" href="{{url('/electronics')}}">Electronics</a></li>
						<li class="list-inline-item"><a class="" href="">Gifts</a></li>
					</ul>
					<nav class="mainmenu__nav">
						<ul class="meninmenu d-flex justify-content-start">
							<li><a href="{{url('/')}}">home</a></li>
							<li class="drop with--one--item"><a href="index.html">best seller</a>
								<div class="megamenu dropdown">
									<ul class="item item01">
										<li><a href="index.html">Home Style Default</a></li>
										<li><a href="index-2.html">Home Style Two</a></li>
										<li><a href="index-box.html">Home Box Style</a></li>
									</ul>
								</div>
							</li>
							<li class="drop"><a href="#">Author</a>
								<div class="megamenu mega03">
									<ul class="item item03">
										<!-- <li class="title">Shop Layout</li> -->
										<li><a href="authors">Authors Name</a></li>
										<li><a href="shop-list.html">Shop List</a></li>
										<li><a href="shop-left-sidebar.html">Shop Left Sidebar</a></li>
										<li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
										<li><a href="shop-no-sidebar.html">Shop No sidebar</a></li>
										<li><a href="single-product.html">Single Product</a></li>
									</ul>
									<ul class="item item03">
										<!-- <li class="title">Shop Page</li> -->
										<li><a href="my-account.html">My Account</a></li>
										<li><a href="cart.html">Cart Page</a></li>
										<li><a href="checkout.html">Checkout Page</a></li>
										<li><a href="wishlist.html">Wishlist Page</a></li>
										<li><a href="error404.html">404 Page</a></li>
										<li><a href="faq.html">Faq Page</a></li>
									</ul>
									<ul class="item item03">
										<!-- <li class="title">Bargain Books</li> -->
										<li><a href="shop-grid.html">Bargain Bestsellers</a></li>
										<li><a href="shop-grid.html">Activity Kits</a></li>
										<li><a href="shop-grid.html">B&N Classics</a></li>
										<li><a href="shop-grid.html">Books Under $5</a></li>
										<li><a href="shop-grid.html">Bargain Books</a></li>
									</ul>
								</div>
							</li>
							<li class="drop"><a href="#">Subjects</a>
								<div class="megamenu dropdown">
									<ul class="item item01">
										<!-- <li class="title">Shop Layout</li> -->
										<li><a href="">Anatomy</a></li>
										<li><a href="">Biochemistry</a></li>
										<li><a href="">Cardiology</a></li>
									</ul>
								</div>
							</li>
							<li class="drop"><a href="#">Publications</a>
								<div class="megamenu mega03">
									<ul class="item item03">
										<!-- <li class="title">Shop Layout</li> -->
										<li><a href="shop-grid.html">Shop Grid</a></li>
										<li><a href="shop-list.html">Shop List</a></li>
										<li><a href="shop-left-sidebar.html">Shop Left Sidebar</a></li>
										<li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
										<li><a href="shop-no-sidebar.html">Shop No sidebar</a></li>
										<li><a href="single-product.html">Single Product</a></li>
									</ul>
									<ul class="item item03">
										<!-- <li class="title">Shop Page</li> -->
										<li><a href="my-account.html">My Account</a></li>
										<li><a href="cart.html">Cart Page</a></li>
										<li><a href="checkout.html">Checkout Page</a></li>
										<li><a href="wishlist.html">Wishlist Page</a></li>
										<li><a href="error404.html">404 Page</a></li>
										<li><a href="faq.html">Faq Page</a></li>
									</ul>
									<ul class="item item03">
										<!-- <li class="title">Bargain Books</li> -->
										<li><a href="shop-grid.html">Bargain Bestsellers</a></li>
										<li><a href="shop-grid.html">Activity Kits</a></li>
										<li><a href="shop-grid.html">B&N Classics</a></li>
										<li><a href="shop-grid.html">Books Under $5</a></li>
										<li><a href="shop-grid.html">Bargain Books</a></li>
									</ul>
								</div>
							</li>
							<li class="drop"><a href="shop-grid.html">Books</a>
								<div class="megamenu mega03">
									<ul class="item item03">
										<!-- <li class="title">Categories</li> -->
										<li><a href="shop-grid.html">Biography </a></li>
										<li><a href="shop-grid.html">Business </a></li>
										<li><a href="shop-grid.html">Cookbooks </a></li>
										<li><a href="shop-grid.html">Health & Fitness </a></li>
										<li><a href="shop-grid.html">History </a></li>
									</ul>
									<ul class="item item03">
										<!-- <li class="title">Customer Favourite</li> -->
										<li><a href="shop-grid.html">Mystery</a></li>
										<li><a href="shop-grid.html">Religion & Inspiration</a></li>
										<li><a href="shop-grid.html">Romance</a></li>
										<li><a href="shop-grid.html">Fiction/Fantasy</a></li>
										<li><a href="shop-grid.html">Sleeveless</a></li>
									</ul>
									<ul class="item item03">
										<!-- <li class="title">Collections</li> -->
										<li><a href="shop-grid.html">Science </a></li>
										<li><a href="shop-grid.html">Fiction/Fantasy</a></li>
										<li><a href="shop-grid.html">Self-Improvemen</a></li>
										<li><a href="shop-grid.html">Home & Garden</a></li>
										<li><a href="shop-grid.html">Humor Books</a></li>
									</ul>
								</div>
							</li>
							<li class="drop"><a href="shop-grid.html">Book Fair 2019</a>
								<div class="megamenu mega02">
									<ul class="item item02">
										<!-- <li class="title">Top Collections</li> -->
										<li><a href="shop-grid.html">American Girl</a></li>
										<li><a href="shop-grid.html">Diary Wimpy Kid</a></li>
										<li><a href="shop-grid.html">Finding Dory</a></li>
										<li><a href="shop-grid.html">Harry Potter</a></li>
										<li><a href="shop-grid.html">Land of Stories</a></li>
									</ul>
									<ul class="item item02">
										<!-- <li class="title">More For Kids</li> -->
										<li><a href="shop-grid.html">B&N Educators</a></li>
										<li><a href="shop-grid.html">B&N Kids' Club</a></li>
										<li><a href="shop-grid.html">Kids' Music</a></li>
										<li><a href="shop-grid.html">Toys & Games</a></li>
										<li><a href="shop-grid.html">Hoodies</a></li>
									</ul>
								</div>
							</li>
							<li class="drop"><a href="{{route('blogs')}}">Blog</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</header>