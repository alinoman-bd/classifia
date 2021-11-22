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
				<label for="inputAddress">House No.</label>
				<input type="text" name="house_no" id="house_no" class="form-control">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">floor</label>
				<input type="number" class="form-control" name="floor">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">No. of floors</label>
				<input type="number" class="form-control" name="no_of_floor">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">Plot area (a)</label>
				<div class="input-group">
					<input style="    border-left: 1px solid #ced4da;border-right: none;" type="text" class="form-control search-i" placeholder="5000" name="plot_area" id="plot_area">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1" style="border-right: 1px solid #ced4da;border-left: none;padding-left: 0;padding-right: 15px;">a</span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">Premises Nr.</label>
				<input type="number" class="form-control" name="premises_nr">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">Premises sum</label>
				<input type="number" class="form-control" name="premises_sum">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">Year built</label>
				<input type="text" name="built_year" id="built_year" class="form-control">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">Year</label>
				<input type="text" name="year" id="year" class="form-control">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">Equipment</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">----</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="equipment" name="equipment" class="" />	
					<div class="ctm-option-box">
						@foreach(App\House\Equipment::all() as $eqiupment)
						<div class="ctm-option" onclick="setThis('equipment','<?= $eqiupment->eq_name?>')">{{$eqiupment->eq_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">Building Energy Efficiency Class</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">----</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="BuildingEnergyClass" name="BuildingEnergyClass" class="" />	
					<div class="ctm-option-box">						
						<div class="ctm-option" onclick="setThis('BuildingEnergyClass','A++')">A++</div>
						<div class="ctm-option" onclick="setThis('BuildingEnergyClass','A+')">A+</div>
						<div class="ctm-option" onclick="setThis('BuildingEnergyClass','A')">A</div>
						<div class="ctm-option" onclick="setThis('BuildingEnergyClass','B')">B</div>
						<div class="ctm-option" onclick="setThis('BuildingEnergyClass','C')">C</div>
						<div class="ctm-option" onclick="setThis('BuildingEnergyClass','D')">D</div>
						<div class="ctm-option" onclick="setThis('BuildingEnergyClass','E')">E</div>
						<div class="ctm-option" onclick="setThis('BuildingEnergyClass','F')">F</div>
						<div class="ctm-option" onclick="setThis('BuildingEnergyClass','G')">G</div>
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
			@foreach(App\House\OtherInfoTitle::where('category',"other")->get() as $title)
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

<script>
	function setThis(filed,item){
			// alert(filed);
			if(filed == 'region'){
				$("#region").val(item);
			}else if(filed == 'municipalities'){
				$("#municipalitie").val(item);
			}else if(filed == 'closest_body'){
				$("#closest_body").val(item);
			}else if(filed == 'building_type'){
				$("#building_type").val(item);
			}else if(filed == 'house_type'){
				$("#house_type").val(item);
			}else if(filed == 'equipment'){
				$("#equipment").val(item);
			}else if(filed == 'BuildingEnergyClass'){
				$("#BuildingEnergyClass").val(item);
			}
		}
	</script>