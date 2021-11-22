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
				<label for="inputAddress">Manufacturer</label>
				<label for="manufacturer"><span class="asterisk text-danger reqired-wth-custom-css">This field is required</span></label>
				<input type="text" name="manufacturer" id="manufacturer" value="{{$post->manufacturer}}" class="form-control required">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Model</label>
				<label for="model"><span class="asterisk text-danger reqired-wth-custom-css">This field is required</span></label>
				<input type="text" name="model" id="model" value="{{$post->model}}" class="form-control required">
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
				<label for="inputAddress"> Sailboat type</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category"><?= $post->sailboat_type? $post->sailboat_type : '-'?></span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<label for="sailboat_type"><span class="asterisk text-danger">This field is required</span></label>
					<input type="hidden" id="sailboat_type" name="sailboat_type" value="{{$post->sailboat_type}}" class="required" />
					<div class="ctm-option-box">
						@foreach(App\SailboatsType::all() as $type)
						<div class="ctm-option" onclick="setThis('sailboat_type','<?= $type->type_name?>')">{{$type->type_name}}</div>
						@endforeach
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
				<label for="inputAddress"> Export price </label>
				<input type="number" class="form-control" name="export_price" value="{{$post->export_price}}" id="export_price" min="1">
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
					<label for="sailboat_type"><span class="asterisk text-danger">This field is required</span></label>
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
					<label for="sailboat_type"><span class="asterisk text-danger">This field is required</span></label>
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
					<label for="inputAddress">Length overall</label>
				</div>
				<div class="col-md-8">
					<div class="form-group">
						<label for="length_overall" class="reqired-wth-custom-css"><span class="asterisk text-danger">This field is required</span></label>
						<input type="number" id="overall_length" name="length_overall" value="{{$post->overall_length}}" min="1" class="form-control required">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<div class="ctm-select">
							<div class="ctm-select-txt pad-l-10 pad-r-10">
								<span class="select-txt" id="category"><?= $post->length_unit? $post->length_unit : '-'?></span>
								<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
							</div>
							<input type="hidden" id="length_unit" name="length_unit" value="{{$post->length_unit}}" class="" />
							<div class="ctm-option-box">
								<div class="ctm-option" onclick="setThis('length_unit','m')">m</div>
								<div class="ctm-option" onclick="setThis('length_unit','ft')">ft</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">  Draft, m </label>
				<label for="length_overall" class=""><span class="asterisk text-danger reqired-wth-custom-css">This field is required</span></label>
				<input type="number" id="draft" name="draft" value="{{$post->draft}}" class="form-control required" min="1">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="row mar-0">
				<div class="col-12">
					<label for="inputAddress">Beam</label>
				</div>
				<div class="col-md-8">
					<div class="form-group">
						<input type="number" id="beam" name="beam" value="{{$post->beam}}" min="1" class="form-control">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<div class="ctm-select">
							<div class="ctm-select-txt pad-l-10 pad-r-10">
								<span class="select-txt" id="category"><?= $post->beam_unit? $post->beam_unit : '-'?></span>
								<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
							</div>
							<input type="hidden" id="beam_unit" name="beam_unit" value="{{$post->beam_unit}}" class="" />
							<div class="ctm-option-box">
								<div class="ctm-option" onclick="setThis('beam_unit','m')">m</div>
								<div class="ctm-option" onclick="setThis('beam_unit','ft')">ft</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">Hull material</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category"><?= $post->hull_mat? $post->hull_mat : '-'?></span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="hull_mat" name="hull_mat" value="{{$post->hull_mat}}" class="" />
					<div class="ctm-option-box">
						@foreach(App\MotorboatsHullMaterial::all() as $material)	
						<div class="ctm-option" onclick="setThis('hull_mat', '<?= $material->materials_name?>')" >{{$material->materials_name}}</div>
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
				<label for="inputAddress">Rig Type</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category"><?= $post->rig_type? $post->rig_type : '-'?></span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="rig_type" name="rig_type" value="{{$post->rig_type}}" class="" />
					<div class="ctm-option-box">
						@foreach(App\SailboatRigType::all() as $type)
						<div class="ctm-option" onclick="setThis('rig_type','<?= $type->type_name?>')">{{$type->type_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Sail area, m²</label>
				<input type="number" id="sail_area" name="sail_area" value="{{$post->sail_area}}" class="form-control" min="1">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Number of cabins</label>
				<input type="number" id="cabin_num" name="cabin_num" value="{{$post->cabin_num}}" class="form-control" min="1">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Number of berths</label>
				<input type="number" id="berth_num" name="berth_num" value="{{$post->berth_num}}" class="form-control" min="1">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Steering wheel Type</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category"><?= $post->str_wheel? $post->str_wheel : '-'?></span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="str_wheel" name="str_wheel" value="{{$post->str_wheel}}" class="" />
					<div class="ctm-option-box">
						@foreach(App\SailboatStrWheelType::all() as $type)
						<div class="ctm-option" onclick="setThis('str_wheel','<?= $type->type_name?>')">{{$type->type_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Fresh water capacity, l</label>
				<input type="number" id="fresh_water_capacity" name="fresh_water_capacity" value="{{$post->fresh_water_capacity}}" class="form-control" min="1">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">  Holding tank capacity, l</label>
				<input type="number" id="hold_tank_capacity" name="hold_tank_capacity" value="{{$post->hold_tank_capacity}}" class="form-control" min="1">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Fuel tank capacity, l</label>
				<input type="number" id="fuel_tank_capacity" name="fuel_tank_capacity" value="{{$post->fuel_tank_capacity}}" class="form-control" min="1">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">Fuel Type</label>
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
				<label for="inputAddress"> Engine(s) type</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category"><?= $post->eng_type? $post->eng_type : '-'?></span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="eng_type" name="eng_type" value="{{$post->eng_type}}" class="" />
					<div class="ctm-option-box">
						@foreach(App\MotorboatsEngineType::all() as $type)
						<div class="ctm-option" onclick="setThis('eng_type','<?= $type->type_name?>')">{{$type->type_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Number of engines	</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category"><?= $post->eng_num? $post->eng_num : '-'?></span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="eng_num" name="eng_num" value="{{$post->eng_num}}" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('eng_num','1')">1</div>
						<div class="ctm-option" onclick="setThis('eng_num','2')">2</div>
						<div class="ctm-option" onclick="setThis('eng_num','3')">3</div>
						<div class="ctm-option" onclick="setThis('eng_num','4')">4</div>
						<div class="ctm-option" onclick="setThis('eng_num','5')">5</div>
						<div class="ctm-option" onclick="setThis('eng_num','6')">6</div>
						<div class="ctm-option" onclick="setThis('eng_num','none')">none</div>
						<div class="ctm-option" onclick="setThis('eng_num','other')">other</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">  Engine capacity, cc</label>
				<input type="number" id="eng_capacity" name="eng_capacity" value="{{$post->eng_capacity}}" class="form-control" min="1">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="row mar-0">
				<div class="col-12">
					<label for="inputAddress">Power</label>
				</div>
				<div class="col-md-8">
					<div class="form-group">
						<input type="number" name="power" id="power" value="{{$post->power}}" class="form-control required" min="1">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<div class="ctm-select">
							<div class="ctm-select-txt pad-l-10 pad-r-10">
								<span class="select-txt" id="category"><?= $post->power_unit? $post->power_unit : '-'?></span>
								<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
							</div>
							<input type="hidden" id="power_unit" name="power_unit" value="{{$post->power_unit}}"  class="" />
							<div class="ctm-option-box">
								<div class="ctm-option" onclick="setThis('power_unit','KW')">KW</div>
								<div class="ctm-option" onclick="setThis('power_unit','HP')">HP</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Engine make</label>
				<input type="text" id="eng_make" name="eng_make" value="{{$post->eng_make}}" class="form-control" min="1">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Engine model</label>
				<input type="text" id="eng_model" name="eng_model" value="{{$post->eng_model}}" class="form-control" min="1">
			</div>
		</div>	
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Light displacement, t</label>
				<input type="number" id="light_displacement" value="{{$post->light_displacement}}" name="light_displacement" class="form-control" min="1">
			</div>
		</div>	
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Weight, kg</label>
				<input type="number" id="weight" name="weight" value="{{$post->weight}}" class="form-control" min="1">
			</div>
		</div>	
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">  Number of showers</label>
				<input type="number" id="shower_num" name="shower_num" value="{{$post->shower_num}}" class="form-control" min="1">
			</div>
		</div>		
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Number of toilets</label>
				<input type="number" id="toilet_num" name="toilet_num" value="{{$post->toilet_num}}" class="form-control" min="1">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">  Type of batteries</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10 pad-r-10">
						<span class="select-txt" id="category"><?= $post->batterie_type? $post->batterie_type : '-'?></span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="batterie_type" name="batterie_type" value="{{$post->batterie_type}}" />
					<div class="ctm-option-box">
						@foreach(App\MotorboatsTypeofBattery::all() as $type)
						<div class="ctm-option" onclick="setThis('batterie_type','<?= $type->type_name?>')">{{$type->type_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>		
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">  Batteries capacity, Ah</label>
				<input type="number" id="batterie_capacity" name="batterie_capacity" value="{{$post->batterie_capacity}}" class="form-control" min="1">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Registration country</label>
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
			@foreach(App\SailboatsFeatureEqTitle::all() as $title)
			<div class="row mar-0">
				<div class="col-12">
					<div class="section-tlt">{{$title->title}}</div>
				</div>
				<?php $n++; ?>
				@foreach(App\SailboatsFeatureEqValue::all() as $value)
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
			if(filed == 'sailboat_type'){
				$("#sailboat_type").val(item);
			}else if(filed == 'length_unit'){
				$("#length_unit").val(item);
			}else if(filed == 'manufactureYear'){
				$("#manufature_year").val(item);
			}else if(filed == 'manufactureMonth'){
				$("#manufature_month").val(item);
			}else if(filed == 'fuel_type'){
				$("#fuel_type").val(item);
			}else if(filed == 'damage'){
				$("#damage").val(item);
			}else if(filed == 'color'){
				$("#color").val(item);
			}else if(filed == 'power_unit'){
				$("#power_unit").val(item);
			}else if(filed == 'new_used'){
				$("#new_used").val(item);
			}else if(filed == 'country'){
				$("#country").val(item);
			}else if(filed == 'eng_num'){
				$("#eng_num").val(item);
			}else if(filed == 'hull_mat'){
				$("#hull_mat").val(item);
			}else if(filed == 'batterie_type'){
				$("#batterie_type").val(item);
			}else if(filed == 'eng_type'){
				$("#eng_type").val(item);
			}else if(filed == 'beam_unit'){
				$("#beam_unit").val(item);
			}else if(filed == 'rig_type'){
				$("#rig_type").val(item);
			}else if(filed == 'str_wheel'){
				$("#str_wheel").val(item);
			}else if (field == 'job_city') {
				$("#jobCity").val(value);
			}
		}
</script>