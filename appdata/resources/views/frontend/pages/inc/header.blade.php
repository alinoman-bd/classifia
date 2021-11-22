<style>
	.ctm-li {
		position: relative;
	}
	.st-menu {
		position: absolute;
		display: none;
		right: -38px;
		background: #fff;
		border: 1px solid #ddd;
		z-index: 9;
		border-radius: 5px;
	}
	.noti-menu-show {
		right: 0;
		min-width: 200px;
		text-align: center;
	}
	.st-li:not(:last-child) {
		border-bottom: 1px solid #ddd;

	}

	#addToFvrtSuccess  {
		visibility: hidden;
		min-width: 250px;
		margin-left: -125px;
		background-color: green;
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
	#addToFvrtSuccess.show
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
	.pop-up {
		background: #fff;
		-webkit-box-shadow: 5px 7px 9px -4px #9e9e9e;
		-moz-box-shadow: 5px 7px 9px -4px #9e9e9e;
		box-shadow: 0px 4px 10px -6px #9e9e9e;
		border: 1px solid #80bdff;
		margin-top: 3px;
		border-radius: 3px;
		position: absolute;
		width: 100%;
		z-index: 1;
		max-height: 270px;
		overflow-y: auto;
		display: none;
	}
	.pop-up ul li {
		cursor: pointer;
		list-style: none;
		text-align: left;
		border-bottom: 1px solid #ddd;

	}
	.pop-up ul li:last-child {
		border-bottom: none;
	}
	.pop-up ul li span {
		color: #888;
		display: block;
		font-size: 16px;
		padding: 8px 15px;
		position: relative;
		text-transform: capitalize;
	}
	.pop-up ul li span:before {
		display: none;
		content: "\2192";
		position: absolute;
		top: 0;
		font-size: 23px;
		left: 10px;
	}
	.pop-up ul li span:hover {
		color: #fff;
		background: #DA233C;
	}
	.pop-up ul li span i {
		position: relative;
		top: 3px;
		margin-right: 8px;
		color: red;
	}

	.loading{
		height: 35px;
		margin-left: 45%;
		display: none; 
	}

</style>
<a id="addToFvrtSuccess">@lang('frontend.label.added.successed')</a>
<section class="header-section">
	<div class="main-menu">

		<nav class="navbar navbar-expand-lg navbar-light">
			<a class="navbar-brand" href="{{url('/')}}"><img src="{{ asset('assets/img/odin.png') }}" alt="lt flag"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav">
					<li class="nav-item search-item">
						<a class="nav-link ctm-li search-item-a" href="javascript:void(0)"><img src="{{ asset('assets/img/search1.svg') }}" class="search-img" alt="lt flag"> <i class="fas fa-chevron-down"></i> Search</a>
					</li>
					<li class="nav-item">

						<a class="nav-link ctm-li 
						@if(Request::segment(1) == 'home' || Request::segment(1) == '')
						active @endif)>" href="{{url('/')}}">@lang('frontend.menu.home')</a>
					</li>
					<!-- <li class="nav-item">
						<a class="nav-link ctm-li" href="{{url('/category')}}">Categories</a>
					</li> -->
					<li class="nav-item">
						<a class="nav-link ctm-li <?= Request::segment(1) == 'my-history'? 'active': '' ?> " href="{{url('my-history')}}">@lang('frontend.menu.last.visit')</a>
					</li>
					<li class="nav-item"><!-- {{url('favourites')}} -->
						<a class="nav-link ctm-li <?= Request::segment(1) == 'favourites'? 'active': '' ?> " href="{{url('favourites')}}">@lang('frontend.menu.favourites')</a>
					</li>
				</ul>
				@if(Auth::check())
				@php
				$user_name = App\UserInformation::where('user_id', Auth::user()->id)->first();
				@endphp
				<ul class="lg-ul log-in-usr">
					<li class="ctm-li">
						<a class="ctm-li-a" href="{{url('user-profile?')}}">
							<div class="user-in">
								<span class="user-img">
									@if(@$user_name->image)
									<img class="cover" src="{{asset('userImage/'.@$user_name->image) }}" alt="product">
									@else
									<img class="cover" src="{{asset('userImage/demo-user.png') }}" alt="product">
									@endif
								</span>
								<span class="user-name">
									@if(Auth::user()->acount_type == 2)
									@if(@$user_name->name)
									{{@$user_name->name}}
									@else
									User
									@endif
									@else
									@if(@$user_name->company_name)
									{{@$user_name->company_name}}
									@else
									company
									@endif
									@endif
								</span>
							</div>
						</a>
					</li>
					<li class="ctm-li">
						<a class="ctm-li-a st-m-s" href="javascript:void(0)""><i class="far fa-bell"></i> <span class="noti-n"></span></a>
						<div class="st-menu noti-menu-show">
							<?php
							$data = (array) json_decode(Cookie::get('notification_ad'));
							$notifications  = App\Advertisement::whereIn('_id',array_keys($data))
							->orderBy('created_at', 'desc')
							->where('user_id', Auth::user()->_id)
							->get();
							$payments = App\PaymentInfo::where('user_id', Auth()->user()->_id)
							->get();
							?>
							@if($notifications->count() || $payments->count())
							@foreach($notifications as $notification)
							@if($notification->cat == 'house')
							@php $category = 'realestate'  @endphp
							@elseif($notification->cat == 'cars')
							@php $category = 'transport'  @endphp
							@elseif($notification->cat == 'services')
							@php $category = 'services'  @endphp
							@elseif($notification->cat == 'job')
							@php $category = 'job'  @endphp
							@elseif($notification->cat == 'buy-sale')
							@php $category = 'buy-sale'  @endphp
							@endif
							<div class="st-li">
								<a class="dropdown-item text-success" onclick="removeThisNotification('<?= $notification->_id?>')" href="{{url('advertisement-details',['cat' => @$category,'form_type' => @$notification->form_type,'post_id' => @$notification->_id])}}">
									Your Advertisement for <b>{{ucfirst($notification->cat == 'buy-sale'? 'Buy / Sale': $notification->cat)}}</b>  Has been Pulished Successfully.
								</a>
							</div>
							@endforeach
							@foreach($payments as $pay_nts)
							<?php
							$promt = $pay_nts->promot_days - $pay_nts->updated_at->diffInDays(now());
							$avdert = $pay_nts->advert_days - $pay_nts->updated_at->diffInDays(now());
							?>
							@if($promt <= 3 || $avdert <= 3)
							@if($promt <= 3 && $promt > 0 )
							<div class="st-li">
								<a class="dropdown-item" class="text-warning" href="{{url('user-profile-seeting')}}">
									One of Your Advertisement's from Category - <b>{{$pay_nts->cat}}</b>
									- Top list Validity left : {{$promt}} days; <br>
								</a>
							</div>
							@elseif($avdert <= 3 && $avdert > 0 )
							<div class="st-li">
								<a class="dropdown-item" class="text-warning" href="{{url('user-profile-seeting')}}">
									One of Your Advertisement's from Category - <b>{{$pay_nts->cat}}</b>
									- With membership Validity left : {{$avdert}} days;
								</a>
							</div>
							@endif
							@endif
							@endforeach
							@else
							<p>@lang('frontend.message.no.notification')</p>
							@endif
						</div>
					</li>
					<li class="ctm-li">
						<a class="ctm-li-a st-m-s" href="javascript:void(0)"><i class="fas fa-cog"></i></a>
						<div class="st-menu st-menu-show">
							<div class="st-li">
								<a class="dropdown-item" href="{{url('user-profile-seeting')}}">
									@lang('frontend.menu.setting')
								</a>
							</div>
							<div class="st-li">
								<a class="dropdown-item" href="{{ route('logout') }}"
								onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">
								@lang('frontend.button.logout')
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</div>
					</div>
				</li>
			</ul>
			@else
			<ul class="lg-ul">
				<li class="ctm-li">
					<a class="ctm-li-a" href="#" data-toggle="modal" data-target="#loginModal">@lang('frontend.button.login')</a>
				</li>
				<li class="ctm-li">
					<a class="ctm-li-a sign-up-a" href="#" data-toggle="modal" data-target="#registerModal">@lang('frontend.button.signup')</a>
				</li>
			</ul>

			@endif
			<ul class="lg-ul pos-ul">
				<li class="ctm-li">
					@if(Auth::check())
					<a class="ctm-li-a post-a" href="{{url('/category?')}}">@lang('frontend.button.post.listing')</a>
					<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
						modal
					</button> -->
					@else
					<a class="ctm-li-a post-a" href="#" data-toggle="modal" data-target="#loginModal">@lang('frontend.button.post.listing')</a>
					@endif
				</li>
				<li class="ctm-li">
					<button  type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#exampleModal">
					</button>
				</li>
				<li class="ctm-li">
					<div class="ctm-select">
						<span class="select-icon">
							@if(request()->session()->get('ln') == 'en')
							<img src="{{ asset('assets/img/en-flag.png') }}" alt="en flag">
							@elseif(request()->session()->get('ln') == 'rus')
							<img src="{{ asset('assets/img/rus-flag.png') }}" alt="Rus flag">
							@elseif(request()->session()->get('ln') == 'swe')
							<img src="{{ asset('assets/img/swe-flag.png') }}" alt="swe flag">
							@endif
						</span>
						<div class="ctm-select-txt">

							<span class="select-txt {{request()->session()->get('ln') == 'en' ? '' : 'd-none'}}" id="category">EN</span>
							<span class="select-txt {{request()->session()->get('ln') == 'rus' ? '' : 'd-none'}}" id="category">RUS</span>
							<span class="select-txt {{request()->session()->get('ln') == 'swe' ? '' : 'd-none'}}" id="category">SWE</span>
						</div>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
						<div class="ctm-option-box">
							<div class="ctm-option"style="padding: 0"><a style="display: block; padding: 5px" href="{{route('language', 'en')}}">EN</a></div>
							<div class="ctm-option"style="padding: 0"><a style="display: block; padding: 5px" href="{{route('language', 'rus')}}">RUS</a></div>
							<div class="ctm-option"style="padding: 0"><a style="display: block; padding: 5px" href="{{route('language', 'swe')}}">SWE</a></div>
						</div>
					</div>
				</li>
			</ul>

		</div>
	</nav>
</div>

</section>
@php
$cr=url()->current();
$hm=url("/");
@endphp
@if(!($cr == $hm))
<div class="search-div-all">
	<div class="search search-cnt-show">
		<form action="{{url('search-result')}}" method="get">
			<div class="row ml-0">
				<div class="col-sm-6 col-lg-5 pad-l-0 pop-body">
					<div class="form-group position-relative">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1"><img src="{{ asset('assets/img/search1.svg') }}" class="search-img" alt="lt flag"></span>
							</div>
							<input name="title" type="text" class="form-control search-i" placeholder="@lang('frontend.button.search')" aria-label="title" aria-describedby="basic-addon1" onkeyup="serachTitle(event,this.value)" autocomplete="off">
						</div>
						<div class="pop-up pop-dctr">
							<img class="loading" src="{{asset('assets/img/loading.gif')}}" alt="">
							<ul class="pop-rslt pl-0 m-0 doc_show" id="">
								<!-- title suggestion -->
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-2  pad-l-0">
					<div class="form-group">
						<div class="ctm-select">
							<span class="select-icon"><img src="{{ asset('assets/img/category.svg') }}" alt="lt flag"></span>
							<div class="ctm-select-txt">
								<span class="select-txt" id="category">@lang('frontend.label.category')</span>
							</div>
							<span class="select-arr"><img src="{{ asset('assets/img/down-ar.svg') }}" alt="lt flag"></span>
							<input type="hidden" name="category" class="catBox">
							<div class="ctm-option-box">
								<div class="ctm-option" onclick="setCategory(' ')" >Category</div>
								@foreach($s_cats as $m_category)
								<?php
								$str = $m_category->category_name;
								if ($str == 'house') {
									$url = 'realestate-browse';
								}elseif($str == 'cars'){
									$url = 'car-browse';
								}elseif($str == 'job'){
									$url = 'job-browse';
								}elseif($str == 'buy / sale'){
									$url = 'buy-sale-browse';
								}elseif($str == 'services'){
									$url = 'services-browse';
								}else{
									$url = $str;
								}
								?>
								<div class="ctm-option" onclick="setCategory('<?= $m_category->cat_key ?>')" >{{$m_category->category_name}}</div>
								@endforeach

							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-2 pad-l-0">
					<div class="form-group">
						<div class="ctm-select">
							<span class="select-icon"><img src="{{ asset('assets/img/map-pin.svg') }}" alt="lt flag"></span>
							<div class="ctm-select-txt">
								<span class="select-txt" id="category">@lang('frontend.label.city')</span>
							</div>
							<span class="select-arr"><img src="{{ asset('assets/img/down-ar.svg') }}" alt="lt flag"></span>
							<input type="hidden" name="city" class="cityBox">
							<div class="ctm-option-box">
								<div class="ctm-option" onclick="srchCity('city',' ')"  >City</div>
								<div class="ctm-option" onclick="srchCity('city','Plats')"  >Plats</div>
								<div class="ctm-option" onclick="srchCity('city','Stockholm')"  >Stockholm</div>
								<div class="ctm-option" onclick="srchCity('city','Skåne')"  >Skåne</div>
								<div class="ctm-option" onclick="srchCity('city','Göteborg')" >Göteborg</div>
								<div class="ctm-option" onclick="srchCity('city','Östergötland')" >Östergötland</div>
								<div class="ctm-option" onclick="srchCity('city','Norrbotten')" >Norrbotten</div>
								<div class="ctm-option" onclick="srchCity('city','Uppsala')" >Uppsala</div>
								<div class="ctm-option" onclick="srchCity('city','Jönköping')" >Jönköping</div>
								<div class="ctm-option" onclick="srchCity('city','Älvsborg')" >Älvsborg</div>
								<div class="ctm-option" onclick="srchCity('city','Västerbotten')" >Västerbotten</div>
								<div class="ctm-option" onclick="srchCity('city','Västmanland')" >Västmanland</div>
								<div class="ctm-option" onclick="srchCity('city','Dalarna')" >Dalarna</div>
								<div class="ctm-option" onclick="srchCity('city','Örebro')" >Örebro</div>
								<div class="ctm-option" onclick="srchCity('city','Södermanland')" >Södermanland</div>
								<div class="ctm-option" onclick="srchCity('city','Västernorrland')" >Västernorrland</div>
								<div class="ctm-option" onclick="srchCity('city','Gävleborg')" >Gävleborg</div>
								<div class="ctm-option" onclick="srchCity('city','Skaraborg')" >Skaraborg</div>
								<div class="ctm-option" onclick="srchCity('city','Halland')" >Halland</div>
								<div class="ctm-option" onclick="srchCity('city','Utomlands')" >Utomlands</div>
								<div class="ctm-option" onclick="srchCity('city','Blekinge')" >Blekinge</div>
								<div class="ctm-option" onclick="srchCity('city','Kronoberg')" >Kronoberg</div>
								<div class="ctm-option" onclick="srchCity('city','Kalmar')" >Kalmar</div>
								<div class="ctm-option" onclick="srchCity('city','Norge')" >Norge</div>
								<div class="ctm-option" onclick="srchCity('city','Jämtland')" >Jämtland</div>
								<div class="ctm-option" onclick="srchCity('city','Gotland')" >Gotland</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-3 pad-l-0 search-btn">
					<button type="submit" class="btn">@lang('frontend.button.search')</button>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Insert Values</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="inserVal" action="{{route('insertIntem')}}" method="post" >
					@csrf
					<div class="form-group">
						<label for="">title</label>
						<input type="text" name="title" class="form-control">
					</div>
					<!-- <div class="form-group">
						<label>title</label>
						<input type="text" name="ex_validity" class="form-control">
					</div>
					<div class="form-group">
						<label>key</label>
						<input type="text" name="amount" class="form-control">
					</div> -->
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit"  form="inserVal" class="btn btn-primary">post</button>
			</div>
		</div>
	</div>
</div>
@endif
