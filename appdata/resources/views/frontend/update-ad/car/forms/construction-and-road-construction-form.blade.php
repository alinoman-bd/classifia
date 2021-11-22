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
				<label for="inputAddress">Type</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category"><?= $post->road_const_type? $post->road_const_type : '-'?></span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<label for="road_const_type"><span class="asterisk text-danger">This field is required</span></label>
					<input type="hidden" id="road_const_type" value="{{$post->road_const_type}}" name="road_const_type" class="required" />
					<div class="ctm-option-box">
						@foreach(App\ConstrctonNRoadconstrtonType::all() as $type)
						<div class="ctm-option" onclick="setThis('road_const_type','<?= $type->type_name?>')">{{$type->type_name}}</div>
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
				<label for="inputAddress">  Work hours </label>
				<input type="number" name="work_hour" id="work_hour" value="{{$post->work_hour}}" class="form-control" min="1">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">  Volume, m³ </label>
				<input type="number" name="volume" id="volume" value="{{$post->volume}}" class="form-control" min="1">
			</div>
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
						@foreach(App\ConstrctonNRoadconstrtonMake::all() as $make)
						<div class="ctm-option" onclick="setThis('make','<?= $make->make_name ?>')">{{$make->make_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">  Model </label>
				<label for="model"><span class="asterisk text-danger reqired-wth-custom-css">This field is required</span></label>
				<input type="text" name="model" id="model" value="{{$post->model}}" class="form-control required" min="1">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3 pad-0">
			<div class="row mar-0">
				<div class="col-12">
					<label for="inputAddress"> Power </label>
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
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Transmission type</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category"><?= $post->trans_type? $post->trans_type : '-'?></span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="trans_type" name="trans_type" value="{{$post->trans_type}}" class="" />
					<div class="ctm-option-box">
						@foreach(App\ConstrctonNRoadconstrtonTransmisionType::all() as $type)
						<div class="ctm-option" onclick="setThis('trans_type','<?= $type->type_name ?>')">{{$type->type_name}}</div>
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
				<label for="inputAddress"> Vat</label>
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
			<div class="form-group">
				<label for="inputAddress">  Kerb weight, kg </label>
				<input type="number" id="kerb_weight" value="{{$post->kerb_weight}}" name="kerb_weight" class="form-control">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">  Gross weight, kg </label>
				<input type="number" id="gross_weight" value="{{$post->gross_weight}}" name="gross_weight" class="form-control">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Export price </label>
				<input type="number" class="form-control" value="{{$post->export_price}}" name="export_price" id="export_price">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Lifting height, mm </label>
				<input type="number" name="lifting_height" value="{{$post->lifting_height}}" id="lifting_height" class="form-control">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">  Boom length, mm</label>
				<input type="number" name="boom_length" value="{{$post->boom_length}}" id="boom_length" class="form-control">
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
				<label for="inputAddress">Damage</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category"><?= $post->manufature_month? $post->manufature_month : '-'?></span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<label for="damage"><span class="asterisk text-danger">This field is required</span></label>
					<input type="hidden" id="damage" name="damage" value="{{$post->manufature_month}}" class="required" />
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
				<label for="inputAddress">   Lifting capacity, kg</label>
				<input type="number" name="lifting_capacity" value="{{$post->lifting_capacity}}" id="lifting_capacity" class="form-control">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">    Digging depth, mm</label>
				<input type="number" name="digging_depth" value="{{$post->digging_depth}}" id="digging_depth" class="form-control">
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
					<input type="hidden" id="layout" name="layout" value="{{$post->layout}}" class="" />
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
				<label for="inputAddress">Euro standard</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category"><?= $post->euro_std? $post->euro_std : '-'?></span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="euro_std" name="euro_std" value="{{$post->euro_std}}" class="" />
					<div class="ctm-option-box">
						@foreach(App\UsedCarEuroStandard::all() as $euro_st)
						<div class="ctm-option" onclick="setThis('euro_std','<?= $euro_st->euro_stnd_name?>')">{{ucfirst($euro_st->euro_stnd_name)}}</div>
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
					<label for="str_wheel"><span class="asterisk text-danger">This field is required</span></label>
					<input type="hidden" id="strWheel" name="str_wheel" value="{{$post->str_wheel}}" class="required" />
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
				<label for="inputAddress"> VIN number</label>
				<input type="number" id="vin_num" name="vin_num" value="{{$post->vin_num}}"  class="form-control">
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
			@foreach(App\ConstrctonNRoadconstrtonFeatureEqpmentTitle::all() as $title)
			<div class="row mar-0">
				<div class="col-12">
					<div class="section-tlt">{{$title->title}}</div>
				</div>
				<?php $n++; ?>
				@foreach(App\ConstrctonNRoadconstrtonFeatureEqpmentValue::all() as $value)
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
			if (filed == 'make') {
				$("#make").val(item);
			}else if(filed == 'road_const_type'){
				$("#road_const_type").val(item);
			}else if(filed == 'str_wheel'){
				$("#strWheel").val(item);
			}else if(filed == 'trans_type'){
				$("#trans_type").val(item);
			}else if(filed == 'new_used'){
				$("#new_used").val(item);
			}else if(filed == 'manufactureYear'){
				$("#manufature_year").val(item);
			}else if(filed == 'manufactureMonth'){
				$("#manufature_month").val(item);
			}else if(filed == 'power_unit'){
				$("#power_unit").val(item);
			}else if(filed == 'layout'){
				$("#layout").val(item);
			}else if(filed == 'damage'){
				$("#damage").val(item);
			}else if(filed == 'euro_std'){
				$("#euro_std").val(item);
			}else if(filed == 'vat'){
				$("#vat").val(item);
			}else if(filed == 'color'){
				$("#color").val(item);
			}else if (field == 'job_city') {
				$("#jobCity").val(value);
			}
		}
	</script>