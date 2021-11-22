@extends('frontend.app')
@section('style')
<style>
	.header-section {
		border-bottom: 1px solid #ddd;
	}
</style>
@endsection
@section('content')
<section class="user-profile-section">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">User Information</li>
		</ol>
	</nav>
	<div class="row mar-0">
		@include('frontend.user-profile.user-sidebar')
		<div class=" col-lg-9 pad-0">
			<div class="user-cnt">
				

				<div class="user-tab">
					<div class="map-sidebar">
						<form action="{{url('update-user-info')}}" method="post" enctype="multipart/form-data">
							@csrf
							@if(Auth::user()->acount_type == 2)
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>@lang('frontend.sign.up.user.name')</label>
										<input type="text" value="{{$user_info->name}}" class="form-control" name="name" placeholder="@lang('frontend.sign.up.user.name')">
									</div>
									<div class="form-group">
										<label>@lang('frontend.sign.up.user.surname')</label>
										<input type="text" value="{{$user_info->surname}}" class="form-control" name="surname" placeholder="@lang('frontend.sign.up.user.surname')">
									</div>
									<div class="form-group">
										<label>@lang('frontend.sign.up.user.address')</label>
										<input id="pac-input" name="address" class="controls form-control required" type="text" value="{{$user_info->address}}" placeholder="@lang('frontend.sign.up.user.address')">
										<div id="map"></div>
									</div>
									<div class="form-group">
										<label>@lang('frontend.sign.up.user.dob')</label>
										<input type="date" value="{{$user_info->dob}}" class="form-control" name="dob">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>@lang('frontend.user.profile.nicname')</label>
										<input type="text" value="{{$user_info->nickname}}" class="form-control" name="nickname" placeholder="@lang('frontend.user.profile.nicname')">
									</div>
									<div class="form-group">
										<label>@lang('frontend.sign.up.phone')</label>
										<input type="number" value="{{$user_info->phone}}" class="form-control" name="phone" placeholder="@lang('frontend.sign.up.phone')">
									</div>
									<!-- <div class="form-group">
										<label>User Photo</label>
										<input type="file" class="form-control" name="file">
									</div> -->
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-success">@lang('frontend.button.update')</button>
								</div>
							</div>
							@else
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>@lang('frontend.sign.up.company.name')</label>
										<input type="text" value="{{$user_info->company_name}}" class="form-control" name="company_name" placeholder="@lang('frontend.sign.up.company.name')">
									</div>
									<div class="form-group">
										<label>@lang('frontend.sign.up.company.code')</label>
										<input type="text" value="{{$user_info->company_code}}" class="form-control" name="company_code" placeholder="@lang('frontend.sign.up.company.code')">
									</div>
									<div class="form-group">
										<label>@lang('frontend.sign.up.phone')</label>
										<input type="number" value="{{$user_info->phone}}" class="form-control" name="phone" placeholder="@lang('frontend.sign.up.phone')">
									</div>
									<div class="form-group">
										<label>@lang('frontend.sign.up.user.address')</label>
										<input id="pac-input" name="address" class="controls form-control required" type="text" value="{{$user_info->address}}" placeholder="@lang('frontend.sign.up.user.address')">
										<div id="map"></div>
									</div>
									<!-- <div class="form-group">
										<label>User Photo</label>
										<input type="file" class="form-control" name="file">
									</div> -->
									<div class="form-group">
										<button type="submit" class="btn btn-success"> @lang('frontend.button.update')</button>
									</div>
								</div>
							</div>
							@endif
							
						</form>
						@if(Session::has('success'))
						<div class="alert alert-success">{{Session::get('success')}}</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
