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
				<label for="inputAddress"> Kayaks / canoes</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category"><?= $post->kay_can? $post->kay_can : '-'?></span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<label for="kay_can"><span class="asterisk text-danger">This field is required</span></label>
					<input type="hidden" id="kay_can" name="kay_can" value="{{$post->kay_can}}" class="required" />
					<div class="ctm-option-box">
						<div class="ctm-option"onclick="setThis('kay_can', 'Kayaks')" >Kayaks</div>
						<div class="ctm-option"onclick="setThis('kay_can', 'Canoes')" >Canoes</div>
					</div>
				</div>
			</div>
		</div>	
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">Type</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category"><?= $post->kay_can_type? $post->kay_can_type : '-'?></span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<label for="kay_can_type"><span class="asterisk text-danger">This field is required</span></label>
					<input type="hidden" id="kay_can_type" value="{{$post->kay_can_type}}" name="kay_can_type" class="required" />
					<div class="ctm-option-box">
						@foreach(App\KayaksCanoesType::all() as $type)
						<div class="ctm-option" onclick="setThis('kay_can_type','<?= $type->type_name?>')">{{$type->type_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">Manufacturer</label>
				<label for="manufacturer"><span class="asterisk text-danger reqired-wth-custom-css">This field is required</span></label>
				<input type="text" id="manufacturer" value="{{$post->manufacturer}}" name="manufacturer" class="form-control required">
			</div>
		</div>		
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">Model</label>
				<input type="text" id="model" value="{{$post->model}}" name="model" class="form-control">
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
					<input type="text" class="form-control search-i required" placeholder="5000" id="price" value="{{$post->price}}" name="price">
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Export price </label>
				<input type="number" class="form-control" value="{{$post->export_price}}" name="export_price" id="export_price" min="1">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">Number of seats</label>
				<label for="seat_num"><span class="asterisk text-danger reqired-wth-custom-css">This field is required</span></label>
				<input type="number" id="seat_num" name="seat_num" value="{{$post->seat_num}}" class="form-control required" min="1">
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
				<label for="inputAddress">Hull material</label>
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category"><?= $post->hull_mat? $post->hull_mat : '-'?></span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="hull_mat" name="hull_mat" value="{{$post->hull_mat}}" class="" />
					<div class="ctm-option-box">
						@foreach(App\JetSkisHullMaterial::all() as $material)	
						<div class="ctm-option" onclick="setThis('hull_mat', '<?= $material->materials_name?>')" >{{$material->materials_name}}</div>
						@endforeach
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
							<input type="hidden" id="manufature_year" value="{{$post->manufature_year}}" name="manufature_year" class="w-75 float-left" />
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
				<label for="inputAddress"> Length overall, m </label>
				<input type="number" id="overall_length" value="{{$post->overall_length}}" name="overall_length" class="form-control" min="1">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">  Width overall, m </label>
				<input type="number" id="overall_width" value="{{$post->overall_width}}" name="overall_width" class="form-control" min="1">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Inner length, m</label>
				<input type="number" id="inner_length" value="{{$post->inner_length}}" name="inner_length" class="form-control" min="1">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">  Inner width, m</label>
				<input type="number" id="inner_width" value="{{$post->inner_width}}" name="inner_width" class="form-control" min="1">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">  Height, m</label>
				<input type="number" id="height" name="height" value="{{$post->height}}" class="form-control" min="1">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Weight, kg</label>
				<input type="number" id="weight" value="{{$post->weight}}" name="weight" class="form-control" min="1">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress"> Weight capacity, kg</label>
				<input type="number" id="weight_capacity" value="{{$post->weight_capacity}}" name="weight_capacity" class="form-control" min="1">
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
			
			<div class="row mar-0">
				<div class="col-12">
					<div class="section-tlt">Features</div>
				</div>
				@foreach(App\KayaksCanoesFeatureEqValue::all() as $value)
				<div class="col-sm-6 col-md-4 col-lg-3">
					<div class="checkbox-ctm">
						<div class="checkbox-ctm-s">
							<label class="ctm-con">{{$value->value}}
								<input type="checkbox" name="features_eq[]"  value="{{$value->value}}">
								<span class="checkmark"></span>
							</label>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@include('frontend.update-ad.car.add-photos-desc-form')

<script>

	function setThis(filed,item){
			// alert(filed);
			if(filed == 'kay_can'){
				$("#kay_can").val(item);
			}else if(filed == 'kay_can_type'){
				$("#kay_can_type").val(item);
			}else if(filed == 'manufactureYear'){
				$("#manufature_year").val(item);
			}else if(filed == 'manufactureMonth'){
				$("#manufature_month").val(item);
			}else if(filed == 'damage'){
				$("#damage").val(item);
			}else if(filed == 'color'){
				$("#color").val(item);
			}else if(filed == 'new_used'){
				$("#new_used").val(item);
			}else if(filed == 'hull_mat'){
				$("#hull_mat").val(item);
			}else if (field == 'job_city') {
				$("#jobCity").val(value);
			}
		}
	</script>