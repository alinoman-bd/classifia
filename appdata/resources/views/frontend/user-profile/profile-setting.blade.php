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
 			<li class="breadcrumb-item active" aria-current="page">user profile setting</li>
 		</ol>
 	</nav>
	<div class="row mar-0">
		@include('frontend.user-profile.user-sidebar')
		<div class=" col-lg-9 pad-0">
			<div class="user-cnt">
				<div class="user-tab">
					<div class="map-sidebar">
						<div class="row">
							<div class="col-md-6">
								<h5>@lang('frontend.user.profile.pass.title')</h5><hr>
								<form action="{{url('update-password')}}" method="post" enctype="multipart/form-data">
									@csrf
									<div class="form-group">
										<label class="text-capitalize">@lang('frontend.user.profile.pass.label.c.pass')</label>
										<input type="password" value="" class="form-control" name="old_password" placeholder="@lang('frontend.user.profile.pass.label.c.pass')">
									</div>
									<div class="form-group">
										<label class="text-capitalize">@lang('frontend.user.profile.pass.label.n.pass')</label>
										<input type="password" class="form-control" name="new_password" placeholder="@lang('frontend.user.profile.pass.label.n.pass')" >
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-success"> @lang('frontend.button.update')</button>
									</div>
								</form>
								@if(Session::has('success'))
								<div class="alert alert-success">{{Session::get('success')}}</div>
								@endif
								@if(Session::has('error'))
								<div class="alert alert-danger">{{Session::get('error')}}</div>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@section('script')
<script>
	
</script>
@endsection