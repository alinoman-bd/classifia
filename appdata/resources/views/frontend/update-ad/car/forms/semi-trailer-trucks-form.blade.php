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
				<label for="inputAddress">Make</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category"><?= $post->make? $post->make : '-'?></span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<label for="make"><span class="asterisk text-danger">This field is required</span></label>
					<input type="hidden" id="make" name="make" value="{{$post->make}}" class="required" />
					<div class="ctm-option-box">
						@foreach(App\SemiTrailerTruckMake::all() as $make)
						<div class="ctm-option" onclick="setThis('make','<?= $make->make_name?>')">{{$make->make_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Model</label>
				<label for="model"><span class="asterisk text-danger reqired-wth-custom-css">This field is required</span></label>
				<input type="text" name="model" id="model" value="{{$post->model}}" class="form-control required" min="1">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">  Curb weight, kg  </label>
				<input type="number" id="kerb_weight" name="kerb_weight" value="{{$post->kerb_weight}}" class="form-control">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Gross weight, kg </label>
				<input type="number" id="gross_weight" name="gross_weight" value="{{$post->gross_weight}}" class="form-control">
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
					<input type="text" class="form-control search-i required" value="{{$post->price}}" placeholder="5000" id="price" name="price">
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">Vat</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category"><?= $post->vat? $post->vat : '-'?></span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="vat" name="vat" value="{{$post->vat}}" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('vat','with vat')">with vat</div>
						<div class="ctm-option" onclick="setThis('vat','without vat')">without vat</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="row mar-0">
				<div class="col-12">
					<label for="inputAddress">Power</label>
				</div>
				<div class="col-md-8">
					<div class="form-group">
						<input type="number" name="power" id="power" value="{{$post->power}}" class="form-control" min="1">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<div class="ctm-select">
							<div class="ctm-select-txt pad-l-10 pad-r-10">
								<span class="select-txt" id="category"><?= $post->power_unit? $post->power_unit : '-'?></span>
								<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
							</div>
							<input type="hidden" id="power_unit" name="power_unit" value="{{$post->power_unit}}" />
							<div class="ctm-option-box">
								<div class="ctm-option" onclick="setThis('power_unit','KW')">KW</div>
								<div class="ctm-option" onclick="setThis('power_unit','HP')">HP</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3 pad-0">
			<div class="row mar-0">
				<div class="col-12">
					<label for="inputAddress">Mileage</label>
				</div>
				<div class="col-md-8">
					<div class="form-group">
						<input type="number" id="mileage" name="mileage" value="{{$post->mileage}}" class="form-control" min="1">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<div class="ctm-select">
							<div class="ctm-select-txt pad-l-10 pad-r-10">
								<span class="select-txt" id="category"><?= $post->mileage_unit? $post->mileage_unit : '-'?></span>
								<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
							</div>
							<input type="hidden" id="mileage_unit" name="mileage_unit" value="{{$post->mileage_unit}}" class="float-left w-75"/>
							<div class="ctm-option-box">
								<div class="ctm-option"onclick="setThis('mileage','KM')">KM</div>
								<div class="ctm-option"onclick="setThis('mileage','Mi')">Mi</div>
							</div>
						</div>
					</div>
				</div>
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
								<span class="select-txt" id="category"><?= $post->manufature_year? $post->manufature_year : '-'?></span>
								<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
							</div>
							<label for="manufature_year"><span class="asterisk text-danger">This field is required</span></label>
							<input type="hidden" id="manufature_year" value="{{$post->manufature_year}}" name="manufature_year" class="required w-75 float-left" />
							<input type="hidden" id="manufature_month" value="{{$post->manufature_month}}" name="manufature_month" class="w-25 float-left" />
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
								<span class="select-txt" id="category"><?= $post->manufature_month? $post->manufature_month : '-'?></span>
							</div>
							<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
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
				<label for="inputAddress">Sleeping beds</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category"><?= $post->sleep_bed? $post->sleep_bed : '-'?></span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<label for="sleep_bed"><span class="asterisk text-danger">This field is required</span></label>
					<input type="hidden" id="sleep_bed" name="sleep_bed" value="{{$post->sleep_bed}}" class="required" />
					<div class="ctm-option-box">
						@foreach(App\TruckSleepingBed::all() as $bed)
						<div class="ctm-option" onclick="setThis('sleep_bed','<?= $bed->bed_name?>')">{{$bed->bed_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Front suspension</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category"><?= $post->front_suspension? $post->front_suspension : '-'?></span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="front_suspension" name="front_suspension" value="{{$post->front_suspension}}" class="required" />
					<div class="ctm-option-box">
						@foreach(App\TruckFrontSuspension::all() as $suspension)
						<div class="ctm-option" onclick="setThis('front_suspension','<?= $suspension->suspension_name?>')">{{$suspension->suspension_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Rear suspension</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category"><?= $post->rear_suspension? $post->rear_suspension : '-'?></span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="rear_suspension" name="rear_suspension" value="{{$post->rear_suspension}}" class="required" />
					<div class="ctm-option-box">
						@foreach(App\TruckRearSuspension::all() as $suspension)
						<div class="ctm-option" onclick="setThis('rear_suspension','<?= $suspension->suspension_name?>')">{{$suspension->suspension_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> New / used</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category"><?= $post->new_used? $post->new_used : '-'?></span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<label for="new_used"><span class="asterisk text-danger">This field is required</span></label>
					<input type="hidden" id="new_used" name="new_used" value="{{$post->new_used}}" class="required" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('new_used','new')">new</div>
						<div class="ctm-option" onclick="setThis('new_used','used')">used</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">Damage</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category"><?= $post->damage? $post->damage : '-'?></span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<label for="damage"><span class="asterisk text-danger">This field is required</span></label>
					<input type="hidden" id="damage" name="damage" value="{{$post->damage}}" class="required" />
					<div class="ctm-option-box">
						@foreach(App\UsedCarDamage::all() as $damage)
						<div class="ctm-option" onclick="setThis('damage','<?= $damage->damage_name?>')">{{$damage->damage_name}}</div>
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
								<span class="select-txt" id="category"><?= $post->mot_exp_date? $post->mot_exp_date : '-'?></span>
								<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
							</div>
							<input type="hidden" id="mot_exp_date" name="mot_exp_date" value="{{$post->mot_exp_date}}" class="float-left w-50"/>
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
								<span class="select-txt" id="category"><?= $post->mot_exp_mnth? $post->mot_exp_mnth : '-'?></span>
								<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
							</div>
							<input type="hidden" id="mot_exp_mnth" name="mot_exp_mnth" value="{{$post->mot_exp_mnth}}" class="float-left w-25"/>
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
				<label for="inputAddress">  Fuel tank capacity, l</label>
				<input type="number" id="fuel_tank_capacity" name="fuel_tank_capacity" value="{{$post->fuel_tank_capacity}}" class="form-control" min="1">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">Euro standard</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category"><?= $post->euro_stndard? $post->euro_stndard : '-'?></span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<label for="euro_stndard"><span class="asterisk text-danger">This field is required</span></label>
					<input type="hidden" id="euro_stndard" name="euro_stndard" value="{{$post->euro_stndard}}" class="required"/>
					<div class="ctm-option-box">
						@foreach(App\UsedCarEuroStandard::whereNotIn('euro_stnd_name', ['none'])->get() as $euro_st)
						<div class="ctm-option" onclick="setThis('euro_stndard','<?= $euro_st->euro_stnd_name?>')">{{ucfirst($euro_st->euro_stnd_name)}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">Layout</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category"><?= $post->layout? $post->layout : '-'?></span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<label for="layout"><span class="asterisk text-danger">This field is required</span></label>
					<input type="hidden" id="layout" name="layout" value="{{$post->layout}}" class="required" />
					<div class="ctm-option-box">
						@foreach(App\TruckLayout::all() as $layout)
						<div class="ctm-option"onclick="setThis('layout','<?= $layout->layout_name?>')">{{$layout->layout_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">Gearbox</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category"><?= $post->gear_box? $post->gear_box : '-'?></span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="gear_box" name="gear_box" value="{{$post->gear_box}}" class="" />
					<div class="ctm-option-box">
						@foreach(App\UsedCarGearBox::all() as $gbox)
						@if($gbox->gear_box_name !== 'Semi automatic')
						<div class="ctm-option" onclick="setThis('gear_box','<?= $gbox->gear_box_name?>')">{{$gbox->gear_box_name}}</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">color</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category"><?= $post->color? $post->color : '-'?></span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="color" name="color" value="{{$post->color}}" class="" />
					<div class="ctm-option-box">
						@foreach(App\UsedCarColor::all() as $color)
						<div class="ctm-option" onclick="setThis('color','<?= $color->color_name?>')">{{$color->color_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Steering wheel</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category"><?= $post->str_wheel? $post->str_wheel : '-'?></span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="str_wheel" name="str_wheel" value="{{$post->str_wheel}}" class="" />
					<div class="ctm-option-box">
						@foreach(App\UsedStrWheel::all() as $wheel)
						<div class="ctm-option" onclick="setThis('str_wheel','<?= $wheel->wheel_name?>')">{{$wheel->wheel_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">VIN number</label>
				<div class="input-group">
					<input type="text" class="form-control" placeholder="00" value="{{$post->vin_num}}" id="vin_num" name="vin_num">
				</div>
			</div>
		</div>	
	</div>
</div>

<div class="additional-info extra-info">
	<div class="row mar-0">
		<div class="col-12">
			<div class="section-tlt">Semi-trailer information 
				<span class="extra">Expand <i class="fas fa-chevron-down"></i></span>
				<span class="hide">Hide <i class="fas fa-chevron-up"></i></span>
			</div>
		</div>
		<div class="col-12 pad-0 extra-box">
			<div class="row mar-0">
				<div class="col-12">
					<!-- <div class="section-tlt">Extras</div> -->
				</div>
				<div class="col-sm-6 col-md-4 col-lg-3">
					<div class="form-group">
						<label for="inputAddress">Semi-trailer type</label>
						<div class="ctm-select">
							<div class="ctm-select-txt pad-l-10">
								<span class="select-txt" id="category"><?= $post->semi_trailer_type? $post->semi_trailer_type : '-'?></span>
								<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
							</div>
							<input type="hidden" id="semi_trailer_type" name="semi_trailer_type" value="{{$post->semi_trailer_type}}" class="" />
							<div class="ctm-option-box">
								@foreach(App\SemiTrailerTruckSemiTrType::all() as $type)
								<div class="ctm-option" onclick="setThis('semi_trailer_type','<?= $type->type_name?>')">{{$type->type_name}}</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-lg-3">
					<div class="form-group">
						<label for="inputAddress"> Semi-trailer manufacturer</label>
						<div class="ctm-select">
							<div class="ctm-select-txt pad-l-10">
								<span class="select-txt" id="category"><?= $post->semi_trailer_manufacturer? $post->semi_trailer_manufacturer : '-'?></span>
								<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
							</div>
							<input type="hidden" id="semi_trailer_manufacturer" name="semi_trailer_manufacturer" value="{{$post->semi_trailer_manufacturer}}" class="" />
							<div class="ctm-option-box">
								@foreach(App\SemiTrailerTruckSemiTrManufacturer::all() as $manufacturer)
								<div class="ctm-option" onclick="setThis('semi_trailer_manufacturer','<?= $manufacturer->manufacturer_name?>')">{{$manufacturer->manufacturer_name}}</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-lg-3">
					<div class="form-group">
						<label for="inputAddress"> Semi-trailer model</label>
						<input type="number" id="semi_trailer_model" name="semi_trailer_model" value="{{$post->semi_trailer_model}}" class="form-control">
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-lg-3">
					<div class="form-group">
						<label for="inputAddress">Semi-trailer suspension</label>
						<div class="ctm-select">
							<div class="ctm-select-txt pad-l-10">
								<span class="select-txt" id="category"><?= $post->semi_trailer_suspension? $post->semi_trailer_suspension : '-'?></span>
								<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
							</div>
							<input type="hidden" id="semi_trailer_suspension" value="{{$post->semi_trailer_suspension}}" name="semi_trailer_suspension" class="" />
							<div class="ctm-option-box">
								<div class="ctm-option" onclick="setThis('semi_trailer_suspension','Leaf springs (mechanical)')">Leaf springs (mechanical)</div>
								<div class="ctm-option" onclick="setThis('semi_trailer_suspension','Leaf springs (pneumatic)')">Leaf springs (pneumatic)</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-lg-3 pad-0">
					<div class="row mar-0">
						<div class="col-12">
							<label for="inputAddress">Semi-trailer Date of manufacture </label>
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<div class="ctm-select">
									<div class="ctm-select-txt pad-l-10">
										<span class="select-txt" id="category"><?= $post->semi_manufature_year? $post->semi_manufature_year : '-'?></span>
										<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
									</div>
									<input type="hidden" id="semi_manufature_year" name="manufature_year" value="{{$post->semi_manufature_year}}" class="w-75 float-left" />
									<input type="hidden" id="semi_manufature_month" name="semi_manufature_month" value="{{$post->semi_manufature_month}}" class="w-25 float-left" />
									<div class="ctm-option-box">
										<?php 
										$startyear = 1901;
										$now = Carbon\Carbon::now();
										$endyear = $now->year;
										for($endyear; $endyear >= $startyear; $endyear--) {
											echo '<div class="ctm-option" onclick="setThis('.'\'semi_manufactureYear\''. ',' .'\''.$endyear. '\')" >'.$endyear.'</div>';
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
										<span class="select-txt" id="category"><?= $post->semi_manufature_month? $post->semi_manufature_month : '-'?></span>
									</div>
									<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
									<div class="ctm-option-box">
										<div class="ctm-option"onclick="setThis('semi_manufactureMonth','01')" > 01 </div>
										<div class="ctm-option"onclick="setThis('semi_manufactureMonth','02')" > 02 </div>
										<div class="ctm-option"onclick="setThis('semi_manufactureMonth','03')" > 03 </div>
										<div class="ctm-option"onclick="setThis('semi_manufactureMonth','04')" > 04 </div>
										<div class="ctm-option"onclick="setThis('semi_manufactureMonth','05')" > 05 </div>
										<div class="ctm-option"onclick="setThis('semi_manufactureMonth','06')" > 06 </div>
										<div class="ctm-option"onclick="setThis('semi_manufactureMonth','07')" > 07 </div>
										<div class="ctm-option"onclick="setThis('semi_manufactureMonth','08')" > 08 </div>
										<div class="ctm-option"onclick="setThis('semi_manufactureMonth','09')" > 09 </div>
										<div class="ctm-option"onclick="setThis('semi_manufactureMonth','10')" > 10 </div>
										<div class="ctm-option"onclick="setThis('semi_manufactureMonth','11')" > 11 </div>
										<div class="ctm-option"onclick="setThis('semi_manufactureMonth','12')" > 12 </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-lg-3 pad-0">
					<div class="row mar-0">
						<div class="col-12">
							<label for="inputAddress"> Semi-trailer MOT</label>
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<div class="ctm-select">
									<div class="ctm-select-txt pad-l-10">
										<span class="select-txt" id="category"><?= $post->semi_mot_exp_date? $post->semi_mot_exp_date : '-'?></span>
										<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
									</div>
									<input type="hidden" id="semi_mot_exp_date" name="semi_mot_exp_date" value="{{$post->semi_mot_exp_date}}" class="float-left w-50"/>
									<div class="ctm-option-box">
										<div class="ctm-option"onclick="setThis('semi_mot_exp_date',2022)">2022</div>
										<div class="ctm-option"onclick="setThis('semi_mot_exp_date',2021)">2021</div>
										<div class="ctm-option"onclick="setThis('semi_mot_exp_date',2020)">2020</div>
										<div class="ctm-option"onclick="setThis('semi_mot_exp_date',2019)">2019</div>
										<div class="ctm-option"onclick="setThis('semi_mot_exp_date',2018)">2018</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<div class="ctm-select">
									<div class="ctm-select-txt pad-l-10 pad-r-10">
										<span class="select-txt" id="category"><?= $post->mot_exp_mnth? $post->mot_exp_mnth : '-'?></span>
										<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
									</div>
									<input type="hidden" id="semi_mot_exp_mnth" value="{{$post->semi_mot_exp_mnth}}" name="semi_mot_exp_mnth" class="float-left w-25"/>
									<div class="ctm-option-box">
										<div class="ctm-option" onclick="setThis('semi_mot_exp_mnth','01')"> 01</div>
										<div class="ctm-option" onclick="setThis('semi_mot_exp_mnth','02')"> 02</div>
										<div class="ctm-option" onclick="setThis('semi_mot_exp_mnth','03')"> 03</div>
										<div class="ctm-option" onclick="setThis('semi_mot_exp_mnth','04')"> 04</div>
										<div class="ctm-option" onclick="setThis('semi_mot_exp_mnth','05')"> 05</div>
										<div class="ctm-option" onclick="setThis('semi_mot_exp_mnth','06')"> 06</div>
										<div class="ctm-option" onclick="setThis('semi_mot_exp_mnth','07')"> 07</div>
										<div class="ctm-option" onclick="setThis('semi_mot_exp_mnth','08')"> 08</div>
										<div class="ctm-option" onclick="setThis('semi_mot_exp_mnth','09')"> 09</div>
										<div class="ctm-option" onclick="setThis('semi_mot_exp_mnth','10')"> 10</div>
										<div class="ctm-option" onclick="setThis('semi_mot_exp_mnth','11')"> 11</div>
										<div class="ctm-option" onclick="setThis('semi_mot_exp_mnth','12')"> 12</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-lg-3">
					<div class="form-group">
						<label for="inputAddress"> Semi-tr. gross weight, kg </label>
						<input type="number" id="semi_gross_weight" value="{{$post->semi_gross_weight}}" name="semi_gross_weight" class="form-control" min="1">
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-lg-3">
					<div class="form-group">
						<label for="inputAddress"> Semi-tr. kerb weight, kg  </label>
						<input type="number" id="semi_kerb_weight" value="{{$post->semi_kerb_weight}}" name="semi_kerb_weight" class="form-control" min="1">
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-lg-3">
					<div class="form-group">
						<label for="inputAddress"> Semi-trailer length, mm</label>
						<input type="number" id="semi_length" name="semi_length" value="{{$post->semi_length}}" class="form-control" min="1">
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-lg-3">
					<div class="form-group">
						<label for="inputAddress"> Semi-trailer width, mm</label>
						<input type="number" id="semi_width" value="{{$post->semi_width}}" name="semi_width" class="form-control" min="1">
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-lg-3">
					<div class="form-group">
						<label for="inputAddress"> Semi-trailer height, mm</label>
						<input type="number" id="semi_height" value="{{$post->semi_height}}" name="semi_height" class="form-control" min="1">
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-lg-3">
					<div class="form-group">
						<label for="inputAddress"> Semi-trailer capacity, m³</label>
						<input type="number" id="semi_capacity" value="{{$post->semi_capacity}}" name="semi_capacity" class="form-control" min="1">
					</div>
				</div>	
				<div class="col-sm-6 col-md-4 col-lg-3">
					<div class="form-group">
						<label for="inputAddress"> Make of semi-trailer axles</label>
						<div class="ctm-select">
							<div class="ctm-select-txt pad-l-10">
								<span class="select-txt" id="category"><?= $post->alx_make? $post->alx_make : '-'?></span>
								<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
							</div>
							<input type="hidden" id="alx_make" value="{{$post->alx_make}}" name="alx_make" class="" />
							<div class="ctm-option-box">
								@foreach(App\SemiTrailerTruckSemiTrAxlesMake::all() as $alx_make)
								<div class="ctm-option" onclick="setThis('alx_make','<?= $alx_make->make_name ?>')">{{$alx_make->make_name}}</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>	
				<div class="col-sm-6 col-md-4 col-lg-3">
					<div class="form-group">
						<label for="inputAddress"> No. of semi-trailes axles</label>
						<div class="ctm-select">
							<div class="ctm-select-txt pad-l-10">
								<span class="select-txt" id="category"><?= $post->semi_axl_num? $post->semi_axl_num : '-'?></span>
								<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
							</div>
							<input type="hidden" id="semi_axl_num" value="{{$post->semi_axl_num}}" name="semi_axl_num" class="" />
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
						<label for="inputAddress"> Semi-trailer primary damage</label>
						<div class="ctm-select">
							<div class="ctm-select-txt pad-l-10">
								<span class="select-txt" id="category"><?= $post->semi_damage? $post->semi_damage : '-'?></span>
								<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
							</div>
							<input type="hidden" id="semi_damage" name="semi_damage" value="{{$post->semi_damage}}" class="" />
							<div class="ctm-option-box">
								@foreach(App\UsedCarDamage::all() as $damage)
								<div class="ctm-option" onclick="setThis('semi_damage','<?= $damage->damage_name?>')">{{$damage->damage_name}}</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-lg-3">
					<div class="form-group">
						<label for="inputAddress">Semi-trailer color</label>
						<div class="ctm-select">
							<div class="ctm-select-txt pad-l-10">
								<span class="select-txt" id="category"><?= $post->semi_color? $post->semi_color : '-'?></span>
								<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
							</div>
							<input type="hidden" id="semi_color" name="semi_color" value="{{$post->semi_color}}" class="" />
							<div class="ctm-option-box">
								@foreach(App\UsedCarColor::all() as $color)
								<div class="ctm-option" onclick="setThis('semi_color','<?= $color->color_name?>')">{{$color->color_name}}</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-lg-3">
					<div class="form-group">
						<label for="inputAddress"> Semi-trailer condition</label>
						<div class="ctm-select">
							<div class="ctm-select-txt pad-l-10">
								<span class="select-txt" id="category"><?= $post->semi_new_used? $post->semi_new_used : '-'?></span>
								<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
							</div>
							<input type="hidden" id="semi_new_used" name="semi_new_used" value="{{$post->semi_new_used}}" class="" />
							<div class="ctm-option-box">
								<div class="ctm-option" onclick="setThis('semi_new_used','new')">new</div>
								<div class="ctm-option" onclick="setThis('semi_new_used','used')">used</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-lg-3">
					<div class="form-group">
						<label for="inputAddress">Semi-trailer VIN Number</label>
						<input type="number" id="semi_vin_num" name="semi_vin_num" value="{{$post->semi_vin_num}}" class="form-control">
					</div>
				</div>
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
			@foreach(App\UsedCarFeatureEqpmentTitle::whereNotIn('title', 
			['Tuning (improvements)','Minivan features'])->get() as $title)
			<div class="row mar-0">
				<div class="col-12">
					<div class="section-tlt">{{$title->title}}</div>
				</div>
				<?php $n++; ?>
				@foreach(App\MinibusFeatureEqpmentValue::all() as $value)
				@if($value->title_id == $title->_Id)
				<div class="col-sm-6 col-md-4 col-lg-3">
					<div class="checkbox-ctm">
						<div class="checkbox-ctm-s">
							<label  class="ctm-con">{{$value->value}}
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

@include('frontend.update-ad.car.add-photos-desc-form')

<script>

	function setThis(filed,item){
			// alert(filed);
			if (filed == 'make') {
				$("#make").val(item);
			}else if(filed == 'manufactureYear'){
				$("#manufature_year").val(item);
			}else if(filed == 'manufactureMonth'){
				$("#manufature_month").val(item);
			}else if(filed == 'gear_box'){
				$("#gear_box").val(item);
			}else if(filed == 'damage'){
				$("#damage").val(item);
			}else if(filed == 'str_wheel'){
				$("#str_wheel").val(item);
			}else if(filed == 'color'){
				$("#color").val(item);
			}else if(filed == 'power_unit'){
				$("#power_unit").val(item);
			}else if(filed == 'mileage'){
				$("#mileage_unit").val(item);
			}else if(filed == 'euro_stndard'){
				$("#euro_stndard").val(item);
			}else if(filed == 'mot_exp_date'){
				$("#mot_exp_date").val(item);
			}else if(filed == 'mot_exp_mnth'){
				$("#mot_exp_mnth").val(item);
			}else if(filed == 'layout'){
				$("#layout").val(item);
			}else if(filed == 'vat'){
				$("#vat").val(item);
			}else if(filed == 'sleep_bed'){
				$("#sleep_bed").val(item);
			}else if(filed == 'new_used'){
				$("#new_used").val(item);
			}else if(filed == 'front_suspension'){
				$("#front_suspension").val(item);
			}else if(filed == 'rear_suspension'){
				$("#rear_suspension").val(item);
			}else if(filed == 'semi_trailer_type'){
				$("#semi_trailer_type").val(item);
			}else if(filed == 'semi_trailer_manufacturer'){
				$("#semi_trailer_manufacturer").val(item);
			}else if(filed == 'semi_trailer_suspension'){
				$("#semi_trailer_suspension").val(item);
			}else if(filed == 'semi_manufactureYear'){
				$("#semi_manufature_year").val(item);
			}else if(filed == 'semi_manufactureMonth'){
				$("#semi_manufature_month").val(item);
			}else if(filed == 'semi_mot_exp_date'){
				$("#semi_mot_exp_date").val(item);
			}else if(filed == 'semi_mot_exp_mnth'){
				$("#semi_mot_exp_mnth").val(item);
			}else if(filed == 'alx_make'){
				$("#alx_make").val(item);
			}else if(filed == 'semi_axl_num'){
				$("#semi_axl_num").val(item);
			}else if(filed == 'semi_damage'){
				$("#semi_damage").val(item);
			}else if(filed == 'semi_color'){
				$("#semi_color").val(item);
			}else if(filed == 'semi_new_used'){
				$("#semi_new_used").val(item);
			}else if (field == 'job_city') {
				$("#jobCity").val(value);
			}
		}
</script>