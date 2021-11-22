<style>

</style>
<div class="search main-info">
	@include('frontend.category.house.house-form-common-field')
	<!-- <div class="row mar-0">
		<div class="col-12">
			<div class="section-tlt"></div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">Type</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">----</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="text" id="leisure_hotel_type" name="leisure_hotel_type" class="" />	
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('leisure_hotel_type','Flats')">Flats</div>
						<div class="ctm-option" onclick="setThis('leisure_hotel_type','Rooms')">Rooms</div>
						<div class="ctm-option" onclick="setThis('leisure_hotel_type','Farmsteads')">Farmsteads</div>
						<div class="ctm-option" onclick="setThis('leisure_hotel_type','Banquet halls')">Banquet halls</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
</div>
<!-- <div class="additional-info extra-info1">
	<div class="row mar-0">
		<div class="col-12">
			<div class="section-tlt">
				<span class="extra">Show More informations <i class="fas fa-chevron-down"></i></span>
				<span class="hide">Less informations <i class="fas fa-chevron-up"></i></span>
			</div>
		</div>
		<div class="col-12 pad-0 extra-box">
			<?php $n=0; ?>
			<span class="check-req text-danger">This field is required</span>
			@foreach(App\House\OtherInfoTitle::where('category', $cat)->get() as $title)
			<div class="row mar-0">
				<div class="col-12">
					<div class="section-tlt">{{$title->title}}</div>
				</div>
				<?php $n++; ?>
				@foreach(App\House\OtherInfoValue::where('title_id',$title->_id)->get() as $value)
				<div class="col-sm-6 col-md-4 col-lg-3">
					<div class="checkbox-ctm">
						<div class="checkbox-ctm-s">
							<label class="ctm-con">{{$value->value}}
								<input type="checkbox" name="features_eq{{$n}}[]" class="checkbox-required" value="{{$value->value}}">
								<span class="checkmark"></span>
							</label>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			@endforeach
		</div>
	</div>
</div> -->
@include('frontend.category.house.house-form-des-photo-area')
<div class="extra-info2">
	<div class="row mar-0"> 
		<div class="col-12">
			<div class="section-tlt">Youtube.com video link</div>
		</div>
		<div class="col-12">
			<div class="row mar-0"> 
				<div class="col-md-4 pad-0">
					<input type="text" placeholder="Youtube.com video link" name="youtube" class="form-control">
				</div>
			</div>
		</div>
	</div>
	<div class="row mar-0"> 
		<div class="col-12">
			<div class="section-tlt">3D tour</div>
		</div>
		<div class="col-12">
			<div class="row mar-0"> 
				<div class="col-md-4 pad-0">
					<input type="text" placeholder="3D tour" name="thDTour" class="form-control">
				</div>
			</div>
		</div>
		
	</div>
</div>