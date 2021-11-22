
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
						@foreach(App\MotorcycleMake::orderBy('make_name')->get() as $make)
						<div class="ctm-option" onclick="getThisMrkModels('<?=  $make->_id?>','motorcycle','<?= $make->make_name?>')">{{$make->make_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">Model</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="mdl-parnt"><?= $post->model? $post->model : '-'?></span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<label for="model"><span class="asterisk text-danger">This field is required</span></label>
					<input type="hidden" id="model" name="model" value="{{$post->model}}" class="required" />
					<div class="ctm-option-box" id="mdls">
						
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Engine capacity, cc</label>
				<input type="number" id="eng_capacity" name="eng_capacity" value="{{$post->eng_capacity}}" class="form-control" min="1" >
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
					<label for="inputAddress"> Date of manufacture </label>
				</div>
				<div class="col-md-8">
					<div class="form-group">
						<div class="ctm-select">
							<div class="ctm-select-txt pad-l-10">
								<span class="select-txt" id="category"><?= $post->manufature_year? $post->manufature_year : '-'?></span>
							</div>
							<label for="manufature_year"><span class="asterisk text-danger">This field is required</span></label>
							<input type="hidden" id="manufature_year" value="{{$post->manufature_year}}" name="manufature_year" class="required w-75 float-left" />
							<input type="hidden" id="manufature_month" value="{{$post->manufature_month}}" name="manufature_month" class="w-25 float-left" />
							<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
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
				<label for="inputAddress">  Export price  </label>
				<input type="number" class="form-control" name="export_price" value="{{$post->export_price}}" id="export_price">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Motorcycle type</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category"><?= $post->motorcycle_type? $post->motorcycle_type : '-'?></span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<label for="motorcycle_type"><span class="asterisk text-danger">This field is required</span></label>
					<input type="hidden" id="motorcycle_type" name="motorcycle_type" value="{{$post->motorcycle_type}}" class="required" />
					<div class="ctm-option-box">
						@foreach(App\MotorcycleType:: all() as $motorcycle)
						<div class="ctm-option" onclick="setThis('motorcycle_type','<?= $motorcycle->type_name?>')">{{$motorcycle->type_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">Cooling system type</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category"><?= $post->cooling_type? $post->cooling_type : '-'?></span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<label for="cooling_type"><span class="asterisk text-danger">This field is required</span></label>
					<input type="hidden" id="cooling_type" name="cooling_type" value="{{$post->cooling_type}}" class="required" />
					<div class="ctm-option-box">
						@foreach(App\MotorcycleCoolingSystemType:: all() as $motorcycle)
						<div class="ctm-option" onclick="setThis('cooling_type','<?= $motorcycle->type_name?>')">{{$motorcycle->type_name}}</div>
						@endforeach
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
							<input type="hidden" id="mileage_unit" value="{{$post->mileage_unit}}" name="mileage_unit" class="float-left w-75"/>
							<div class="ctm-option-box">
								<div class="ctm-option"onclick="setThis('mileage','KM')">KM</div>
								<div class="ctm-option"onclick="setThis('mileage','Mi')">Mi</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Fuel type</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category"><?= $post->fuel_type? $post->fuel_type : '-'?></span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="fuel_type" name="fuel_type" value="{{$post->fuel_type}}" class="" />
					<div class="ctm-option-box">
						@foreach(App\UsedCarFuelType::all() as $fuel)
						@if($fuel->fuel_tp_name !== 'lpg')
						<div class="ctm-option" onclick="setThis('fuel_type','<?= $fuel->fuel_tp_name?>')">{{$fuel->fuel_tp_name}}</div>
						@endif
						@endforeach
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
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> New / used</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category"><?= $post->new_used? $post->new_used : '-'?></span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="new_used" name="new_used" value="{{$post->new_used}}" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('new_used','new')">new</div>
						<div class="ctm-option" onclick="setThis('new_used','used')">used</div>
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
				<label for="inputAddress"> Kerb weight, kg </label>
				<input type="number" id="kerb_weight" name="kerb_weight" value="{{$post->kerb_weight}}" class="form-control" min="1">
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
				<label for="inputAddress"> Engine type</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category"><?= $post->engine_type? $post->engine_type : '-'?></span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="engine_type" name="engine_type" value="{{$post->engine_type}}" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('engine_type','two-stroke')">two-stroke</div>
						<div class="ctm-option" onclick="setThis('engine_type','four-stroke')">four-stroke</div>
						<div class="ctm-option" onclick="setThis('engine_type','other')">other</div>
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
				<label for="inputAddress"> Type of registration</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category"><?= $post->reg_type? $post->reg_type : '-'?></span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="reg_type" name="reg_type" value="{{$post->reg_type}}" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('reg_type','Can be Registered')">Can be Registered</div>
						<div class="ctm-option" onclick="setThis('reg_type','Cannot be Registered')">Cannot be Registered</div>
					</div>
				</div>
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
					<input type="hidden" id="euro_stndard" name="euro_stndard" value="{{$post->euro_stndard}}" class=""/>
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
				<label for="inputAddress">First registration country</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category"><?= $post->country? $post->country : '-'?></span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="country" name="country" value="{{$post->country}}" class=""/>
					<div class="ctm-option-box">
						@foreach(App\UsedCarFristRegCountry::all() as $country)
						<div class="ctm-option" onclick="setThis('country','<?= $country->country_name?>')">{{ucfirst($country->country_name)}}</div>
						@endforeach
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
@include('frontend.update-ad.car.add-photos-desc-form')

<script>

	function setThis(filed,item){
			// alert(filed);
			if (filed == 'model') {
				$("#model").val(item);
			}else if(filed == 'motorcycle_type'){
				$("#motorcycle_type").val(item);
			}else if(filed == 'manufactureYear'){
				$("#manufature_year").val(item);
			}else if(filed == 'manufactureMonth'){
				$("#manufature_month").val(item);
			}else if(filed == 'fuel_type'){
				$("#fuel_type").val(item);
			}else if(filed == 'gear_box'){
				$("#gear_box").val(item);
			}else if(filed == 'damage'){
				$("#damage").val(item);
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
			}else if(filed == 'country'){
				$("#country").val(item);
			}else if(filed == 'cooling_type'){
				$("#cooling_type").val(item);
			}else if(filed == 'new_used'){
				$("#new_used").val(item);
			}else if(filed == 'engine_type'){
				$("#engine_type").val(item);
			}else if(filed == 'reg_type'){
				$("#reg_type").val(item);
			}else if (field == 'job_city') {
				$("#jobCity").val(value);
			}
		}
</script>
