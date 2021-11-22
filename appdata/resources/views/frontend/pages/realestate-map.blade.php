@extends('frontend.app')
@section('style')
<style>
 .header-section {
    border-bottom: 1px solid #ddd;
 }
</style>
@endsection
@section('content')
<section class="realestate-map">
	<div class="back-list"><span><a href="#"><i class="fas fa-chevron-left"></i> Back to list</a></span></div>
	<div class="row mar-0">
		<div class="col-12 col-sm-5 col-md-4 pad-0">
			<div class="search mar-b-15">
				<div class="row mar-0">
					<div class="col-12 pad-0">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1"><img src="{{ asset('assets/img/search.png') }}" alt="lt flag"></span>
							</div>
							<input type="text" class="form-control search-i" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
						</div>
					</div>
					<div class="col-12 search-btn pad-0">
						<button class="btn">search</button>
					</div>
				</div>
			</div>
			<div class="map-sidebar">
				@for($i=1;$i<=5;$i++)
				<div class="m-side-list mar-b-15">
					<div class="m-side-img"><img class="cover" src="{{ asset('assets/img/home.jpg') }}" alt="product"></div>
					<div class="m-side-cnt">
						<div class="loc-name"><i class="fas fa-map-marker-alt"></i> balscao st-45</div>
						<div class="house-name">Cozy house</div>
						<div class="house-price-len"><span class="h-price">6794&#128;</span><span class="h-len">26 m<sup>2</sup></span></div>
					</div>
				</div>
				@endfor
			</div>
		</div>
		<div class="col-12 col-sm-7 col-md-8 pad-0">
			<div class="realestate-map-cnt hw-100">
				<div class="mapouter h-100">
					<div class="gmap_canvas h-100">
						<iframe class="cover" src="https://maps.google.com/maps?q=university%20of%20san%20francisco&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.bitgeeks.net"></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@section('script')

@endsection