@php
$total_car_ad  = App\Advertisement::where('user_id', Auth::user()->_id)->where('cat','cars')->get();
$total_house_ad  = App\Advertisement::where('user_id', Auth::user()->_id)->where('cat','house')->get();
$total_job_ad  = App\Advertisement::where('user_id', Auth::user()->_id)->where('cat','job')->get();
$total_services_ad  = App\Advertisement::where('user_id', Auth::user()->_id)->where('cat','services')->get();
$total_buysale_ad  = App\Advertisement::where('user_id', Auth::user()->_id)->where('cat','buy-sale')->get();
$user_name = App\UserInformation::where('user_id', Auth::user()->id)->first();
@endphp
<div class="col-lg-3 pad-0" >
    <div class="user-info" id="userSidebar">

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
				@if($user_name->name)
				{{$user_name->name}}
				@else
				User Name
				@endif
				@else
				@if(@$user_name->company_name)
				{{@$user_name->company_name}}
				@else
				company name
				@endif
				@endif
			</span>
		</div>
		<div class="user-ul" >
			<div class="user-li my-post-li <?= $menu ==  1? 'active': ''?>"><a href="{{url('user-profile?')}}">@lang('frontend.user.profile.menu.mypost')<i class="fas fa-chevron-down"></i></a></div>
			<div class="user-s-ul <?= $menu ==  1? 'd-block': ''?>">
				<div class="user-s-li"><a href="{{url('my-all-post','cars')}}">Cars<span>({{$total_car_ad->count()}})</span></a></div>
				<div class="user-s-li"><a href="{{url('my-all-post','house')}}">Realesate <span>({{$total_house_ad->count()}})</span></a></div>
				<div class="user-s-li"><a href="{{url('my-all-post','job')}}">Job <span>({{$total_job_ad->count()}})</span></a></div>
				<div class="user-s-li"><a href="{{url('my-all-post','services')}}">Services <span>({{$total_services_ad->count()}})</span></a></div>
				<div class="user-s-li"><a href="{{url('my-all-post','buy-sale')}}">Buy/Sale <span>({{$total_buysale_ad->count()}})</span></a></div>
			</div>
			<div class="user-li <?= $menu ==  3? 'active': ''?> "><a href="{{url('my-balance')}}">@lang('frontend.user.profile.menu.mybalance') 
				<span>
					<?php $balance = App\UserBalance::where('user_id', Auth::user()->_id)->first(); ?>
					({{@$balance->balance? @$balance->balance : 0}})
				</span>
			</a></div>
			<div class="user-li <?= $menu ==  2? 'active': ''?> "><a href="{{url('user-information')}}">@lang('frontend.user.profile.menu.myinfo')</a></div>
			<div class="user-li <?= $menu ==  4? 'active': ''?>"><a href="{{url('user-profile-seeting')}}">@lang('frontend.user.profile.menu.setting')</a></div>
			<div class="user-li <?= $menu ==  5? 'active': ''?>"><a href="{{url('our-pricing')}}">@lang('frontend.user.profile.menu.pricing')</a></div>
		</div>
	</div>
</div>