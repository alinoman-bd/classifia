<style>
	.imageThumb {
		max-height: 75px;
		border: 2px solid;
		padding: 1px;
		cursor: pointer;
	}
	.pip {
		display: inline-block;
		margin: 10px 10px 0 0;
	}
	.remove {
		display: block;
		background: #444;
		border: 1px solid black;
		color: white;
		text-align: center;
		cursor: pointer;
	}
	.remove:hover {
		background: white;
		color: black;
	}
</style>
<div class="search main-info">
	<div class="row mar-0">
		<div class="col-12">
			<div class="section-tlt">main information</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Trailer / semi-trailer</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">----</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="trailer" name="trailer" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('trailer','Trailer')">Trailer</div>
						<div class="ctm-option" onclick="setThis('trailer','Semi-trailer')">Semi-trailer</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Type</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">----</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<label for="trailer_type"><span class="asterisk text-danger">This field is required</span></label>
					<input type="hidden" id="trailer_type" name="trailer_type" class="required" />
					<div class="ctm-option-box">
						@foreach(App\TrailerSemitrailersType::all() as $type)
						<div class="ctm-option" onclick="setThis('trailer_type','<?= $type->type_name?>')">{{$type->type_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">   Gross weight, kg  </label>
				<input type="number" id="gross_weight" name="gross_weight" class="form-control">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">   Curb weight, kg </label>
				<input type="number" id="curb_weight" name="curb_weight" class="form-control">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3 pad-0">
			<div class="row mar-0">
				<div class="col-12">
					<label for="inputAddress"> Date of manufacture </label>
				</div>
				<div class="col-md-8">
					<div class="form-group">
						<div class="ctm-select">
							<div class="ctm-select-txt pad-l-10">
								<span class="select-txt" id="category">--</span>
								<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
							</div>
							<label for="manufature_year"><span class="asterisk text-danger">This field is required</span></label>
							<input type="hidden" id="manufature_year" name="manufature_year" class="required w-75 float-left" />
							<input type="hidden" id="manufature_month" name="manufature_month" class="w-25 float-left" />
							<div class="ctm-option-box">
								<?php 
								$startyear = 1901;
								$now = Carbon\Carbon::now();
								$endyear = $now->year;
								for($endyear; $endyear >= $startyear; $endyear--) {
									echo '<div class="ctm-option" onclick="setThis('.'\'manufactureYear\''. ',' .'\''.$endyear. '\')" >'.$endyear.'</div>';
								}
								?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<div class="ctm-select">
							<div class="ctm-select-txt pad-l-10 pad-r-10">
								<span class="select-txt" id="category">-</span>
								<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
							</div>
							<div class="ctm-option-box">
								<div class="ctm-option"onclick="setThis('manufactureMonth','01')" > 01 </div>
								<div class="ctm-option"onclick="setThis('manufactureMonth','02')" > 02 </div>
								<div class="ctm-option"onclick="setThis('manufactureMonth','03')" > 03 </div>
								<div class="ctm-option"onclick="setThis('manufactureMonth','04')" > 04 </div>
								<div class="ctm-option"onclick="setThis('manufactureMonth','05')" > 05 </div>
								<div class="ctm-option"onclick="setThis('manufactureMonth','06')" > 06 </div>
								<div class="ctm-option"onclick="setThis('manufactureMonth','07')" > 07 </div>
								<div class="ctm-option"onclick="setThis('manufactureMonth','08')" > 08 </div>
								<div class="ctm-option"onclick="setThis('manufactureMonth','09')" > 09 </div>
								<div class="ctm-option"onclick="setThis('manufactureMonth','10')" > 10 </div>
								<div class="ctm-option"onclick="setThis('manufactureMonth','11')" > 11 </div>
								<div class="ctm-option"onclick="setThis('manufactureMonth','12')" > 12 </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Make</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">----</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<label for="make"><span class="asterisk text-danger">This field is required</span></label>
					<input type="hidden" id="make" name="make" class="required" />
					<div class="ctm-option-box">
						@foreach(App\TrailerSemitrailersMake::all() as $make)
						<div class="ctm-option" onclick="setThis('make','<?= $make->make_name ?>')">{{$make->make_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">Model</label>
				<input type="text" name="model" id="model" class="form-control" min="1">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Suspension</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">----</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="suspension" name="suspension" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('suspension','Leaf springs (mechanical)')">Leaf springs (mechanical)</div>
						<div class="ctm-option" onclick="setThis('suspension','Leaf springs (pneumatic)')">Leaf springs (pneumatic)</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">Price in Lithuania, € </label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1" style="color:#DA233C;">$</span>
					</div>
					<label for="price"><span class="asterisk text-danger reqired-wth-custom-css">This field is required</span></label>
					<input type="text" class="form-control search-i required" placeholder="5000" id="price" name="price">
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">Vat</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">----</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="vat" name="vat" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('vat','with vat')">with vat</div>
						<div class="ctm-option" onclick="setThis('vat','without vat')">without vat</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Length, mm</label>
				<input type="number" id="length" name="length"  class="form-control" min="1">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Width, mm</label>
				<input type="number" id="width" name="width" class="form-control" min="1">
			</div>
		</div>

		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Axles make</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">----</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<label for="alx_make"><span class="asterisk text-danger">This field is required</span></label>
					<input type="hidden" id="alx_make" name="alx_make" class="required" />
					<div class="ctm-option-box">
						@foreach(App\TrailerSemitrailersAxlesMake::all() as $make)
						<div class="ctm-option" onclick="setThis('alx_make','<?= $make->alx_make_name ?>')">{{$make->alx_make_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">  Number of axles</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">-</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<label for="semi_axl_num"><span class="asterisk text-danger">This field is required</span></label>
					<input type="hidden" id="semi_axl_num" name="semi_axl_num" class="required" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('semi_axl_num','1')" >1</div>
						<div class="ctm-option" onclick="setThis('semi_axl_num','2')" >2</div>
						<div class="ctm-option" onclick="setThis('semi_axl_num','3')" >3</div>
						<div class="ctm-option" onclick="setThis('semi_axl_num','>3')" >>3</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Height, mm</label>
				<input type="number" id="height" name="height"  class="form-control">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Volume, m³</label>
				<input type="number" id="volume" name="volume"  class="form-control">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">Damage</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">----</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<label for="damage"><span class="asterisk text-danger">This field is required</span></label>
					<input type="hidden" id="damage" name="damage" class="required" />
					<div class="ctm-option-box">
						@foreach(App\UsedCarDamage::all() as $damage)
						<div class="ctm-option" onclick="setThis('damage','<?= $damage->damage_name?>')">{{$damage->damage_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">New / used</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">----</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<label for="new_used"><span class="asterisk text-danger">This field is required</span></label>
					<input type="hidden" id="new_used" name="new_used" class="required" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('new_used','new')">new</div>
						<div class="ctm-option" onclick="setThis('new_used','used')">used</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">color</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">----</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="color" name="color" class="" />
					<div class="ctm-option-box">
						@foreach(App\UsedCarColor::all() as $color)
						<div class="ctm-option" onclick="setThis('color','<?= $color->color_name?>')">{{$color->color_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3 pad-0">
			<div class="row mar-0">
				<div class="col-12">
					<label for="inputAddress">MOT test expiry date </label>
				</div>
				<div class="col-md-8">
					<div class="form-group">
						<div class="ctm-select">
							<div class="ctm-select-txt pad-l-10">
								<span class="select-txt" id="category">--</span>
								<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
							</div>
							<input type="hidden" id="mot_exp_date" name="mot_exp_date" class="float-left w-50"/>
							<div class="ctm-option-box">
								<div class="ctm-option"onclick="setThis('mot_exp_date',2022)">2022</div>
								<div class="ctm-option"onclick="setThis('mot_exp_date',2021)">2021</div>
								<div class="ctm-option"onclick="setThis('mot_exp_date',2020)">2020</div>
								<div class="ctm-option"onclick="setThis('mot_exp_date',2019)">2019</div>
								<div class="ctm-option"onclick="setThis('mot_exp_date',2018)">2018</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<div class="ctm-select">
							<div class="ctm-select-txt pad-l-10 pad-r-10">
								<span class="select-txt" id="category">-</span>
								<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
							</div>
							<input type="hidden" id="mot_exp_mnth" name="mot_exp_mnth" class="float-left w-25"/>
							<div class="ctm-option-box">
								<div class="ctm-option" onclick="setThis('mot_exp_mnth','01')"> 01</div>
								<div class="ctm-option" onclick="setThis('mot_exp_mnth','02')"> 02</div>
								<div class="ctm-option" onclick="setThis('mot_exp_mnth','03')"> 03</div>
								<div class="ctm-option" onclick="setThis('mot_exp_mnth','04')"> 04</div>
								<div class="ctm-option" onclick="setThis('mot_exp_mnth','05')"> 05</div>
								<div class="ctm-option" onclick="setThis('mot_exp_mnth','06')"> 06</div>
								<div class="ctm-option" onclick="setThis('mot_exp_mnth','07')"> 07</div>
								<div class="ctm-option" onclick="setThis('mot_exp_mnth','08')"> 08</div>
								<div class="ctm-option" onclick="setThis('mot_exp_mnth','09')"> 09</div>
								<div class="ctm-option" onclick="setThis('mot_exp_mnth','10')"> 10</div>
								<div class="ctm-option" onclick="setThis('mot_exp_mnth','11')"> 11</div>
								<div class="ctm-option" onclick="setThis('mot_exp_mnth','12')"> 12</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">VIN Number</label>
				<input type="text" class="form-control" placeholder="00" id="vin_num" name="vin_num">
			</div>
		</div>
	</div>
</div>
<div class="additional-info extra-info1">
	<div class="row mar-0">
		<div class="col-12">
			<div class="section-tlt">Features / equipment 
				<span class="extra">Expand <i class="fas fa-chevron-down"></i></span>
				<span class="hide">Hide <i class="fas fa-chevron-up"></i></span>
			</div>
		</div>
		<?php $n=0; ?>
		<div class="col-12 pad-0 extra-box">
			@foreach(App\TrailerSemitrailersFeatureEqTitle::all() as $title)
			<div class="row mar-0">
				<div class="col-12">
					<div class="section-tlt">{{$title->title}}</div>
				</div>
				<?php $n++; ?>
				@foreach(App\TrailerSemitrailersFeatureEqValue::all() as $value)
				@if($value->title_id == $title->_Id)
				<div class="col-sm-6 col-md-4 col-lg-3">
					<div class="checkbox-ctm">
						<div class="checkbox-ctm-s">
							<label class="ctm-con">{{$value->value}}
								<input type="checkbox" name="features_eq{{$n}}[]" value="{{$value->value}}">
								<span class="checkmark"></span>
							</label>
						</div>
					</div>
				</div>
				@endif
				@endforeach
			</div>
			@endforeach
		</div>
	</div>
</div>

@include('frontend.category.car.add-photos-desc-form')

<script>

	function setThis(filed,item){
			// alert(filed);
			if (filed == 'make') {
				$("#make").val(item);
			}else if(filed == 'trailer_type'){
				$("#trailer_type").val(item);
			}else if(filed == 'manufactureYear'){
				$("#manufature_year").val(item);
			}else if(filed == 'manufactureMonth'){
				$("#manufature_month").val(item);
			}else if(filed == 'trailer'){
				$("#trailer").val(item);
			}else if(filed == 'damage'){
				$("#damage").val(item);
			}else if(filed == 'color'){
				$("#color").val(item);
			}else if(filed == 'mot_exp_date'){
				$("#mot_exp_date").val(item);
			}else if(filed == 'mot_exp_mnth'){
				$("#mot_exp_mnth").val(item);
			}else if(filed == 'vat'){
				$("#vat").val(item);
			}else if(filed == 'new_used'){
				$("#new_used").val(item);
			}else if(filed == 'suspension'){
				$("#suspension").val(item);
			}else if(filed == 'alx_make'){
				$("#alx_make").val(item);
			}else if(filed == 'semi_axl_num'){
				$("#semi_axl_num").val(item);
			}else if(filed == 'job_city'){
				$("#jobCity").val(item);
			}
		}
</script>
