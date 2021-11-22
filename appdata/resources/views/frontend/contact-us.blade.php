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
			<li class="breadcrumb-item active" aria-current="page">Contact Us</li>
		</ol>
	</nav>
	<div class="row mar-0">
		<div class=" col-lg-12 pad-0">
			@if(Session::has('success'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Success!</strong> {{Session::get('success')}}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			@endif
			<div class="user-cnt">
				<div class="user-tab">
					<div class="map-sidebar">
						<div class="row">
							<div class="col-md-6">
								<div class="footer-menu">
									<h2>Get In Touch</h2>
									<form method="post" action="{{route('storeUserQuery')}}">
										@csrf
										<div class="row mr-0">
											<div class="col-md-6 pr-0">
												<div class="form-group">
													<input type="text" name="name" class="form-control" placeholder="Name *" value="" />
													@error('name')
													<span class="text-danger">{{ $message }}</span>
													@enderror
												</div>
											</div>
											<div class="col-md-6 pr-0">
												<div class="form-group">
													<input type="email" name="email" class="form-control" placeholder="Email *" value="" />
													@error('email')
													<span class="text-danger">{{ $message }}</span>
													@enderror
												</div>
											</div>
											<div class="col-md-12 pr-0">
												<div class="form-group">
													<input type="number" name="phone" class="form-control" placeholder="phone *" value="" />
													@error('phone')
													<span class="text-danger">{{ $message }}</span>
													@enderror
												</div>
											</div>
											<div class="col-md-12 pr-0">
												<div class="form-group">
													<textarea name="message" class="form-control" placeholder="Message *" style="width: 100%; height: 80px;"></textarea>
													@error('message')
													<span class="text-danger">{{ $message }}</span>
													@enderror
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<button type="submit" name="btnSubmit" class="btnContact btn">Send Message</button>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="col-md-6">
								<h3>ODIN24</h3>
								<p>
									It is a long established fact that a reader will be distracted by the readable content of a page. <br>It is a long established fact that a reader will be distracted by the readable content of a page. <br>It is a long established fact that a reader will be distracted by the readable content of a page. <br>It is a long established fact that a reader will be distracted by the readable content of a page. <br>It is a long established fact that a reader will be distracted by the readable content of a page. <br>
								</p>
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