	<style>
		.warning{
			/*background: red !important;*/
			border-color: red !important;

		}
		#model,#make{
			/*display: none;*/
		}
		.ctm-select label.error{
			display: block !important;
		}

		
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
						<div class="ctm-select-txt pad-l-10 lol">
							<span class="select-txt" id="category"><?= $post->make? $post->make : '-'?></span>
							<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
						</div>
						<label for="make"><span class="asterisk text-danger">This field is required</span></label>
						<input type="hidden" id="make" name="make" value="{{$post->make}}" class="required" />	
						<div class="ctm-option-box">
							@foreach(App\UsedCarMake::orderBy('make_name')->get()->sortBy('make_name', SORT_NATURAL|SORT_FLAG_CASE) as $make)
							<div class="ctm-option" onclick="getThisMrkModels('<?= $make->_id?>','used-car','<?= $make->make_name?>')">{{ucfirst($make->make_name)}}</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-3">
				<div class="form-group">
					<label for="inputAddress">Model</label>
					<div class="ctm-select">
						<div class="ctm-select-txt pad-l-10 lol">
							<span class="select-txt" id="mdl-parnt"><?= $post->model? $post->model : '-'?></span>	
							<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
						</div>
						<label for="model"><span class="asterisk text-danger">This field is required</span></label>
						<input type="hidden" id="model" value="{{$post->model}}" name="model" class="required"/>
						<div class="ctm-option-box" id="mdls">

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
									<span class="select-txt" id="category"><?= $post->manufature_year? $post->manufature_year : '-' ?></span>
								</div>
								<label for="manufature_year"><span class="asterisk text-danger">This field is required</span></label>
								<input type="hidden" id="manufature_year" value="{{$post->manufature_year}}" name="manufature_year" class="required w-75 float-left" />
								<input type="hidden" id="manufature_month" name="manufature_month" value="{{$post->manufature_month}}" class="w-25 float-left" />
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
									<span class="select-txt" id="category"><?= $post->manufature_month? $post->manufature_month : '-' ?></span>
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
					<label for="inputAddress">Body Type</label>
					<div class="ctm-select">
						<div class="ctm-select-txt pad-l-10">
							<span class="select-txt" id="category"><?= $post->body_type? $post->body_type : '-' ?></span>
						</div>
						<label for="body_type"><span class="asterisk text-danger">This field is required</span></label>
						<input type="hidden" id="body_type" name="body_type" value="{{$post->body_type}}" class="required" />
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
						<div class="ctm-option-box">
							@foreach(App\UsedCarBodyType::all() as $body)
							<div class="ctm-option"  onclick="setThis('body_type','<?= $body->body_tp_name?>')">{{$body->body_tp_name}}</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-3">
				<div class="form-group">
					<label for="inputAddress">Fuel Type</label>
					<div class="ctm-select">
						<div class="ctm-select-txt pad-l-10">
							<span class="select-txt" id="category"><?= $post->fuel_type? $post->fuel_type : '-' ?></span>
							<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
						</div>
						<label for="fuel_type"><span class="asterisk text-danger">This field is required</span></label>
						<input type="hidden" id="fuel_type" name="fuel_type" value="{{$post->fuel_type}}" class="required" />
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
					<label for="inputAddress">Gear Box</label>
					<div class="ctm-select">
						<div class="ctm-select-txt pad-l-10">
							<span class="select-txt" id="category"><?= $post->gear_box? $post->gear_box : '-' ?></span>
						</div>
						<label for="gear_box"><span class="asterisk text-danger">This field is required</span></label>
						<input type="hidden" id="gear_box" value="{{$post->gear_box}}" name="gear_box" class="required" />
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
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
					<label for="inputAddress">Number of doors</label>
					<div class="ctm-select">
						<div class="ctm-select-txt pad-l-10">
							<span class="select-txt" id="category"><?= $post->doors_number? $post->doors_number : '-' ?></span>
							<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
						</div>
						<label for="doors_number"><span class="asterisk text-danger">This field is required</span></label>
						<input type="hidden" id="doors_number" value="{{$post->doors_number}}" name="doors_number" class="required" />
						<div class="ctm-option-box">
							@foreach(App\UsedCarDoor::all() as $doors)
							<div class="ctm-option" onclick="setThis('doors','<?= $doors->doors?>')">{{$doors->doors}}</div>
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
							<span class="select-txt" id="category"><?= $post->damage? $post->damage : '-' ?></span>
							<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
						</div>
						<label for="damage"><span class="asterisk text-danger">This field is required</span></label>
						<input type="hidden" id="damage" name="damage" value="{{$post->damage}}" class="required" />
						<div class="ctm-option-box">
							@foreach(App\UsedCarDamage::all() as $damage)
							<div class="ctm-option"onclick="setThis('damage','<?= $damage->damage_name?>')">{{$damage->damage_name}}</div>
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
							<span class="select-txt" id="category"><?= $post->str_wheel? $post->str_wheel : '-' ?></span>
							<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
						</div>
						<label for="str_wheel"><span class="asterisk text-danger">This field is required</span></label>
						<input type="hidden" id="str_wheel" name="str_wheel" value="{{$post->str_wheel}}" class="required" />
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
					<label for="inputAddress">Color</label>
					<div class="ctm-select">
						<div class="ctm-select-txt pad-l-10">
							<span class="select-txt" id="category"><?= $post->color? $post->color : '-' ?></span>
							<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
						</div>
						<label for="color"><span class="asterisk text-danger">This field is required</span></label>
						<input type="hidden" id="color" name="color" value="{{$post->color}}" class="required" />
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
					<label for="inputAddress"> Price in Lithuania, € </label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1" style="color:#DA233C;">$</span>
						</div>
						<label for="price"><span class="asterisk text-danger reqired-wth-custom-css">This field is required</span></label>
						<input type="number" value="{{$post->price}}" name="price" d="price" min="0" class="required form-control search-i" placeholder="5000" aria-label="Username" aria-describedby="basic-addon1">
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-3">
				<div class="form-group">
					<label for="inputAddress">  Engine capacity, cc</label>
					<div class="input-group mb-3">
						<input placeholder="engine capacity" value="{{$post->engn_capacity}}" name="engn_capacity" type="number" min="0" class="form-control search-i">
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-3 pad-0">
				<div class="row mar-0">
					<div class="col-12">
						<label for="inputAddress"> Power </label>
					</div>
					<div class="col-md-8">
						<div class="form-group">
							<input type="number" value="{{$post->powerNumber}}" name="powerNumber" class="form-control" id="">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<div class="ctm-select">
								<div class="ctm-select-txt pad-l-10 pad-r-10">
									<span class="select-txt" id="category"><?= $post->power_unit? $post->power_unit : '-' ?></span>
								</div>
								<input value="{{$post->power_unit}}" type="hidden" id="power_unit" name="power_unit" class="float-left w-75"/>
								<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
								<div class="ctm-option-box">
									<div class="ctm-option" onclick="setThis('power','kw')">kw</div>
									<div class="ctm-option" onclick="setThis('power','HP')">HP</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-3">
				<div class="form-group">
					<label for="inputAddress">VIN Number</label>
					<div class="input-group mb-3">
						<input type="number" min="0" name="vin_number" value="{{$post->vin_number}}" class="form-control search-i" placeholder="vin number" aria-label="Username" aria-describedby="basic-addon1">
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-3 pad-0">
				<div class="row mar-0">
					<div class="col-12">
						<label for="inputAddress"> Mileage </label>
					</div>
					<div class="col-md-8">
						<div class="form-group">
							<input type="number" name="mileage" value="{{$post->mileage}}" class="form-control" id="">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<div class="ctm-select">
								<div class="ctm-select-txt pad-l-10 pad-r-10">
									<span class="select-txt" id="category"><?= $post->mileage_unit? $post->mileage_unit : '-' ?></span>
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
		</div>
	</div>
	<div class="additional-info extra-info">
		<div class="row mar-0">
			<div class="col-12">
				<div class="section-tlt">Additional information
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
							<label for="inputAddress">Number of seats</label>
							<div class="ctm-select">
								<div class="ctm-select-txt pad-l-10">
									<span class="select-txt" id="category"><?= $post->seat_number? $post->seat_number : '-' ?></span>
								</div>
								<input type="hidden" id="seat_number" value="{{$post->seat_number}}" name="seat_number" class=""/>
								<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
								<div class="ctm-option-box">
									<div class="ctm-option" onclick="setThis('seat_number','2')">2</div>
									<div class="ctm-option" onclick="setThis('seat_number','3')">3</div>
									<div class="ctm-option" onclick="setThis('seat_number','4')">4</div>
									<div class="ctm-option" onclick="setThis('seat_number','5')">5</div>
									<div class="ctm-option" onclick="setThis('seat_number','6')">6</div>
									<div class="ctm-option" onclick="setThis('seat_number','7')">7</div>
									<div class="ctm-option" onclick="setThis('seat_number','8')">8</div>
									<div class="ctm-option" onclick="setThis('seat_number','9')">9</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-3">
						<div class="form-group">
							<label for="inputAddress">Driven wheels</label>
							<div class="ctm-select">
								<div class="ctm-select-txt pad-l-10">
									<span class="select-txt" id="category"><?= $post->drivel_wheel? $post->drivel_wheel : '-' ?></span>
								</div>
								<input type="hidden" id="drivel_wheel" name="drivel_wheel" value="{{$post->drivel_wheel}}" class=""/>
								<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
								<div class="ctm-option-box">
									@foreach(App\UsedCarDrivenWheel::all() as $drwheel)
									<div class="ctm-option" onclick="setThis('drivel_wheel','<?= $drwheel->driven_wheel_name?>')">{{ucfirst($drwheel->driven_wheel_name)}}</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-3">
						<div class="form-group">
							<label for="inputAddress"> Wheel size</label>
							<div class="ctm-select">
								<div class="ctm-select-txt pad-l-10">
									<span class="select-txt" id="category"><?= $post->wheel_size? $post->wheel_size : '-' ?></span>
								</div>
								<input type="hidden" id="wheel_size" value="{{$post->wheel_size}}" name="wheel_size" class=""/>
								<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
								<div class="ctm-option-box">
									@foreach(App\UsedCarWheelSize::all() as $data)
									<div class="ctm-option" onclick="setThis('wheel_size','<?= $data->wheel_size_name?>')">{{ucfirst($data->wheel_size_name)}}</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-3">
						<div class="form-group">
							<label for="inputAddress"> Export price, € </label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1" style="color:#DA233C;">€</span>
								</div>
								<input type="text" name="export_price" value="{{$post->export_price}}" class="form-control search-i" placeholder="5000" aria-label="Username" aria-describedby="basic-addon1">
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-3">
						<div class="form-group">
							<label for="inputAddress">Climate control</label>
							<div class="ctm-select">
								<div class="ctm-select-txt pad-l-10">
									<span class="select-txt" id="category"><?= $post->climate_contrl? $post->climate_contrl : '-' ?></span>
									<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
								</div>
								<input type="hidden" id="climate_contrl" value="{{$post->climate_contrl}}" name="climate_contrl" class=""/>
								<div class="ctm-option-box">
									@foreach(App\UsedCarClimateControl::all() as $climate)
									<div class="ctm-option" onclick="setThis('climate_contrl','<?= $climate->climate_con_name?>')">{{ucfirst($climate->climate_con_name)}}</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-6">
						<label for="inputAddress">Fuel consumption, l/100 km</label>
						<div class="row">
							<div class="col-lg-4">
								<input placeholder="Urban" value="{{$post->fuel_consumption_Urban}}" name="fuel_consumption_Urban" type="number" min="1" class="form-control">
							</div>
							<div class="col-lg-4">
								<input placeholder="Extra-urban" value="{{$post->fuel_consumption_extra_urban}}" name="fuel_consumption_extra_urban" type="number" min="1" class="form-control">
							</div>
							<div class="col-lg-4">
								<input placeholder="Combined" value="{{$post->fuel_consumption_combined}}" name="fuel_consumption_combined" type="number" min="1" class="form-control">
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-3">
						<div class="form-group">
							<label for="inputAddress">Euro standard</label>
							<div class="ctm-select">
								<div class="ctm-select-txt pad-l-10">
									<span class="select-txt" id="category"><?= $post->euro_stndard? $post->euro_stndard : '-' ?></span>
									<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
								</div>
								<input value="{{$post->euro_stndard}}" type="hidden" id="euro_stndard" name="euro_stndard" class=""/>
								<div class="ctm-option-box">
									@foreach(App\UsedCarEuroStandard::whereNotIn('euro_stnd_name', ['none'])->get() as $euro_st)
									<div class="ctm-option" onclick="setThis('euro_stndard','<?= $euro_st->euro_stnd_name?>')">{{ucfirst($euro_st->euro_stnd_name)}}</div>
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
											<span class="select-txt" id="category"><?= $post->mot_exp_date? $post->mot_exp_date : '-' ?></span>
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
											<span class="select-txt" id="category"><?= $post->mot_exp_mnth? $post->mot_exp_mnth : '-' ?></span>
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
							<label for="inputAddress">First registration country</label>
							<div class="ctm-select">
								<div class="ctm-select-txt pad-l-10">
									<span class="select-txt" id="category"><?= $post->country? $post->country : '-'?></span>
									<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
								</div>
								<input type="hidden" id="country" value="{{$post->country}}" name="country" class=""/>
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
			<div class="col-12 pad-0 extra-box">
				<?php $n = 0; ?>
				@foreach(App\UsedCarFeatureEqpmentTitle::all() as $title)
				<div class="row mar-0">
					<div class="col-12">
						<div class="section-tlt">{{$title->title}}</div>
					</div>
					<?php $n++; ?>
					@foreach(App\UsedCarFeatureEqpmentValue::all() as $value)
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
			}else if(filed == 'manufactureYear'){
				$("#manufature_year").val(item);
			}else if(filed == 'manufactureMonth'){
				$("#manufature_month").val(item);
			}else if(filed == 'body_type'){
				$("#body_type").val(item);
			}else if(filed == 'fuel_type'){
				$("#fuel_type").val(item);
			}else if(filed == 'gear_box'){
				$("#gear_box").val(item);
			}else if(filed == 'doors'){
				$("#doors_number").val(item);
			}else if(filed == 'damage'){
				$("#damage").val(item);
			}else if(filed == 'str_wheel'){
				$("#str_wheel").val(item);
			}else if(filed == 'color'){
				$("#color").val(item);
			}else if(filed == 'power'){
				$("#power_unit").val(item);
			}else if(filed == 'mileage'){
				$("#mileage_unit").val(item);
			}else if(filed == 'seat_number'){
				$("#seat_number").val(item);
			}else if(filed == 'drivel_wheel'){
				$("#drivel_wheel").val(item);
			}else if(filed == 'wheel_size'){
				$("#wheel_size").val(item);
			}else if(filed == 'climate_contrl'){
				$("#climate_contrl").val(item);
			}else if(filed == 'euro_stndard'){
				$("#euro_stndard").val(item);
			}else if(filed == 'mot_exp_date'){
				$("#mot_exp_date").val(item);
			}else if(filed == 'mot_exp_mnth'){
				$("#mot_exp_mnth").val(item);
			}else if(filed == 'country'){
				$("#country").val(item);
			}else if (field == 'job_city') {
				$("#jobCity").val(value);
			}
		}
	</script>