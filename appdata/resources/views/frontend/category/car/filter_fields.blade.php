
<div class="row mar-0 car-hide-nav">
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<div class="col-12 p-0">
				<label for="inputAddress">Price <span style="color:#DA233C; padding-left: 5px; ">$</span></label>
			</div>
			<div class="col-md-12 p-0">
				<div class="form-group mb-3"> 
					<input type="text" name="price_all" class="form-control" value="" placeholder="price">
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mar-0 car-hide-nav d-none">
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<div class="col-12 p-0">
				<label for="inputAddress">Price <span style="color:#DA233C; padding-left: 5px; ">$</span></label>
			</div>
			<div class="col-md-12 p-0">
				<div class="form-group mb-3"> 
					<input type="text" name="price_ag_eq" class="form-control" placeholder="price">
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="type_ag_eq" name="type_ag_eq" class="required" />	
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('type_ag_eq',' ')">--</div>
					@foreach(App\AgriculturalImplementType::all() as $type)
					<div class="ctm-option" onclick="setThis('type_ag_eq','<?= $type->type_name?>')">{{$type->type_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">New / used</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="" name="new_used_ag_eq" class="new_used_ag_eq" />	
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('new_used_ag_eq',' ')">--</div>
					<div class="ctm-option" onclick="setThis('new_used_ag_eq','new')">new</div>
					<div class="ctm-option" onclick="setThis('new_used_ag_eq','used')">used</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Make</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="" name="make_ag_eq" class="make" />	
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('make_ag_eq',' ')">-</div>
					@foreach(App\AgriculturalImplementMake::all() as $make)
					<div class="ctm-option" onclick="setThis('make_ag_eq','<?= $make->make_name ?>')">{{$make->make_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">  Model </label>
			<input type="text" name="model_ag_eq" class="form-control" >
		</div>
	</div>
</div>

<div class="row mar-0 car-hide-nav d-none">
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<div class="col-12 p-0">
				<label for="inputAddress">Price <span style="color:#DA233C; padding-left: 5px; ">$</span></label>
			</div>
			<div class="col-md-12 p-0">
				<div class="form-group mb-3"> 
					<input type="number" name="price_ag_mac" class="form-control" placeholder="price">
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="type_ag_mac" name="type_ag_mac" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('type_ag_mac',' ')">-</div>
					@foreach(App\AgriculturalMachineryType::all() as $type)
					<div class="ctm-option" onclick="setThis('type_ag_mac','<?= $type->type_name?>')">{{$type->type_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">New / used</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="" name="new_used_ag_mac" class="new_used_ag_mac" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('new_used_ag_mac',' ')">-</div>
					<div class="ctm-option" onclick="setThis('new_used_ag_mac','new')">new</div>
					<div class="ctm-option" onclick="setThis('new_used_ag_mac','used')">used</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Make</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="" name="make_ag_mac" class="make" />	
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('make_ag_mac',' ')">-</div>
					@foreach(App\AgriculturalMachineryMake::all() as $make)
					<div class="ctm-option" onclick="setThis('make_ag_mac','<?= $make->make_name ?>')">{{$make->make_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">  Model </label>
			<input type="text" name="model_ag_mac" class="form-control" >
		</div>
	</div>
</div>


<div class="row mar-0 car-hide-nav d-none">
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<div class="col-12 p-0">
				<label for="inputAddress">Price <span style="color:#DA233C; padding-left: 5px; ">$</span></label>
			</div>
			<div class="col-md-12 p-0">
				<div class="form-group mb-3"> 
					<input type="number" name="price_frs_mac" class="form-control" placeholder="price">
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="type_frs_mac" name="type_frs_mac" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('type_frs_mac',' ')">-</div>
					@foreach(App\ForestMachinaryType::all() as $type)
					<div class="ctm-option" onclick="setThis('type_frs_mac','<?= $type->type_name?>')">{{$type->type_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">New / used</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="" name="new_used_frs_mac" class="new_used_frs_mac" />	
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('new_used_frs_mac',' ')">-</div>
					<div class="ctm-option" onclick="setThis('new_used_frs_mac','new')">new</div>
					<div class="ctm-option" onclick="setThis('new_used_frs_mac','used')">used</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Make</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="" name="make_frs_mac" class="make" />	
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('make_frs_mac',' ')">-</div>
					@foreach(App\ForestMachinaryMake::all() as $make)
					<div class="ctm-option" onclick="setThis('make_frs_mac','<?= $make->make_name ?>')">{{$make->make_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">  Model </label>
			<input type="text" name="model_frs_mac" class="form-control" >
		</div>
	</div>
</div>

<div class="row mar-0 car-hide-nav d-none">
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<div class="col-12 p-0">
				<label for="inputAddress">Price <span style="color:#DA233C; padding-left: 5px; ">$</span></label>
			</div>
			<div class="col-md-12 p-0">
				<div class="form-group mb-3"> 
					<input type="number" name="price_cars" class="form-control" placeholder="price">
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Make</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="make_cars" name="make_cars" class="make" />	
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('make_cars',' ')">-</div>
					@foreach(App\UsedCarMake::orderBy('make_name')->get()->sortBy('make_name', SORT_NATURAL|SORT_FLAG_CASE) as $make)
					<div class="ctm-option" onclick="setThis('make_cars','<?= $make->make_name?>')">{{ucfirst($make->make_name)}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">New / used</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="" name="new_used_cars" class="new_used" />	
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('new_used_cars',' ')">-</div>
					<div class="ctm-option" onclick="setThis('new_used_cars','new')">new</div>
					<div class="ctm-option" onclick="setThis('new_used_cars','used')">used</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Body Type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="body_type" name="body_type_cars" class="body_type" />
				<div class="ctm-option-box">
					<div class="ctm-option"  onclick="setThis('body_type_cars',' ')">-</div>
					@foreach(App\UsedCarBodyType::all() as $body)
					<div class="ctm-option"  onclick="setThis('body_type_cars','<?= $body->body_tp_name?>')">{{$body->body_tp_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Fuel Type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="fuel_type" name="fuel_type_cars" class="fuel_type" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('fuel_type_cars',' ')">-</div>
					@foreach(App\UsedCarFuelType::all() as $fuel)
					@if($fuel->fuel_tp_name !== 'lpg')
					<div class="ctm-option" onclick="setThis('fuel_type_cars','<?= $fuel->fuel_tp_name?>')">{{$fuel->fuel_tp_name}}</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Gear Box</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="gear_box_cars" name="gear_box_cars" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('gear_box_cars',' ')">-</div>
					@foreach(App\UsedCarGearBox::all() as $gbox)
					@if($gbox->gear_box_name !== 'Semi automatic')
					<div class="ctm-option" onclick="setThis('gear_box_cars','<?= $gbox->gear_box_name?>')">{{$gbox->gear_box_name}}</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Number of doors</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">--</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="doors_number_cars" name="doors_number_cars" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('doors_number_cars',' ')">-</div>
					@foreach(App\UsedCarDoor::all() as $doors)
					<div class="ctm-option" onclick="setThis('doors_number_cars','<?= $doors->doors?>')">{{$doors->doors}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">color</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="color_cars" name="color_cars" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('color_cars',' ')">-</div>
					@foreach(App\UsedCarColor::all() as $color)
					<div class="ctm-option" onclick="setThis('color_cars','<?= $color->color_name?>')">{{$color->color_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mar-0 car-hide-nav d-none">
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<div class="col-12 p-0">
				<label for="inputAddress">Price <span style="color:#DA233C; padding-left: 5px; ">$</span></label>
			</div>
			<div class="col-md-12 p-0">
				<div class="form-group mb-3"> 
					<input type="number" name="price_road_const" class="form-control" placeholder="price">
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="road_const_type" name="type_road_const" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('type_road_const',' ')">-</div>
					@foreach(App\ConstrctonNRoadconstrtonType::all() as $type)
					<div class="ctm-option" onclick="setThis('type_road_const','<?= $type->type_name?>')">{{$type->type_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Make</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="make" name="make_road_const" class="make" />	
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('make_road_const',' ')">-</div>
					@foreach(App\ConstrctonNRoadconstrtonMake::all() as $make)
					<div class="ctm-option" onclick="setThis('make_road_const','<?= $make->make_name ?>')">{{$make->make_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">  Model </label>
			<input type="text" name="model_road_const" class="form-control" >
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">New / used</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="" name="new_used_road_const" class="new_used" />	
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('new_used_road_const',' ')">-</div>
					<div class="ctm-option" onclick="setThis('new_used_road_const','new')">new</div>
					<div class="ctm-option" onclick="setThis('new_used_road_const','used')">used</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Steering wheel</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">--</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="str_wheel_road_const" name="str_wheel_road_const" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('str_wheel_road_const',' ')">-</div>
					@foreach(App\UsedStrWheel::all() as $wheel)
					<div class="ctm-option" onclick="setThis('str_wheel_road_const','<?= $wheel->wheel_name?>')">{{$wheel->wheel_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">color</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="color_road_const" name="color_road_const" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('color_road_const',' ')">-</div>
					@foreach(App\UsedCarColor::all() as $color)
					<div class="ctm-option" onclick="setThis('color_road_const','<?= $color->color_name?>')">{{$color->color_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mar-0 car-hide-nav d-none">
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<div class="col-12 p-0">
				<label for="inputAddress">Price <span style="color:#DA233C; padding-left: 5px; ">$</span></label>
			</div>
			<div class="col-md-12 p-0">
				<div class="form-group mb-3"> 
					<input type="number" name="price_const_mach" class="form-control" placeholder="price">
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group">
			<label for="inputAddress">Type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="type_const_mach" name="type_const_mach" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('type_const_mach',' ')">-</div>
					@foreach(App\ConstructionMachinaryType::all() as $type)
					<div class="ctm-option" onclick="setThis('type_const_mach','<?= $type->type_name?>')">{{$type->type_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group">
			<label for="inputAddress">Make</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="make_const_mach" name="make_const_mach" class="make" />	
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('make_const_mach',' ')">-</div>
					@foreach(App\ConstructionMachinaryMake::all() as $make)
					<div class="ctm-option" onclick="setThis('make_const_mach','<?= $make->make_name ?>')">{{$make->make_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group">
			<label for="inputAddress">  Model </label>
			<input type="text" name="model_const_mach" class="form-control" >
		</div>
	</div>
</div>

<div class="row mar-0 car-hide-nav d-none">

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<div class="col-12 p-0">
				<label for="inputAddress">Price <span style="color:#DA233C; padding-left: 5px; ">$</span></label>
			</div>
			<div class="col-md-12 p-0">
				<div class="form-group mb-3"> 
					<input type="number" name="price_muni_mach" class="form-control" placeholder="price">
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="type_muni_mach" name="type_muni_mach" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('type_muni_mach',' ')">-</div>
					@foreach(App\MunicipalMachineType::all() as $type)
					<div class="ctm-option" onclick="setThis('type_muni_mach','<?= $type->type_name?>')">{{$type->type_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Make</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="make_muni_mach" name="make_muni_mach" class="make" />	
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('make_muni_mach',' ')">-</div>
					@foreach(App\MunicipalMachineMake::all() as $make)
					<div class="ctm-option" onclick="setThis('make_muni_mach','<?= $make->make_name ?>')">{{$make->make_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">  Model </label>
			<input type="text" name="model_muni_mach" class="form-control" >
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">New / used</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="new_used_muni_mach" name="new_used_muni_mach" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('new_used_muni_mach',' ')">-</div>
					<div class="ctm-option" onclick="setThis('new_used_muni_mach','new')">new</div>
					<div class="ctm-option" onclick="setThis('new_used_muni_mach','used')">used</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">  Fuel type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">-</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="fuel_type_muni_mach" name="fuel_type_muni_mach" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('fuel_type_muni_mach',' ')">-</div>
					@foreach(App\UsedCarFuelType::all() as $fuel)
					@if($fuel->fuel_tp_name !== 'lpg')
					<div class="ctm-option" onclick="setThis('fuel_type_muni_mach','<?= $fuel->fuel_tp_name?>')">{{$fuel->fuel_tp_name}}</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Gearbox</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">--</span>
				</div>
				<input type="hidden" id="gear_box_muni_mach" name="gear_box_muni_mach" class="" />
				<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('gear_box_muni_mach',' ')">-</div>
					@foreach(App\UsedCarGearBox::all() as $gbox)
					@if($gbox->gear_box_name !== 'Semi automatic')
					<div class="ctm-option" onclick="setThis('gear_box_muni_mach','<?= $gbox->gear_box_name?>')">{{$gbox->gear_box_name}}</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">color</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="color_muni_mach" name="color_muni_mach" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('color_muni_mach',' ')">-</div>
					@foreach(App\UsedCarColor::all() as $color)
					<div class="ctm-option" onclick="setThis('color_muni_mach','<?= $color->color_name?>')">{{$color->color_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Steering wheel</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">--</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="str_wheel_muni_mach" name="str_wheel_muni_mach" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('str_wheel_muni_mach',' ')">-</div>
					@foreach(App\UsedStrWheel::all() as $wheel)
					<div class="ctm-option" onclick="setThis('str_wheel_muni_mach','<?= $wheel->wheel_name?>')">{{$wheel->wheel_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mar-0 car-hide-nav d-none">
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<div class="col-12 p-0">
				<label for="inputAddress">Price <span style="color:#DA233C; padding-left: 5px; ">$</span></label>
			</div>
			<div class="col-md-12 p-0">
				<div class="form-group mb-3"> 
					<input type="number" name="price_storage" class="form-control" placeholder="price">
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="type_storage" name="type_storage" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('type_storage',' ')">-</div>
					@foreach(App\StorageNLoadingEqType::all() as $type)
					<div class="ctm-option" onclick="setThis('type_storage','<?= $type->type_name?>')">{{$type->type_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Make</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="make_storage" name="make_storage" class="make" />	
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('make_storage',' ')">-</div>
					@foreach(App\StorageNLoadingEqMake::all() as $make)
					<div class="ctm-option" onclick="setThis('make_storage','<?= $make->make_name ?>')">{{$make->make_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">  Model </label>
			<input type="text" name="model_storage" class="form-control" >
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">New / used</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="new_used_storage" name="new_used_storage" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('new_used_storage',' ')">-</div>
					<div class="ctm-option" onclick="setThis('new_used_storage','new')">new</div>
					<div class="ctm-option" onclick="setThis('new_used_storage','used')">used</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">  Fuel type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">-</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="fuel_type_storage" name="fuel_type_storage" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('fuel_type_storage',' ')">-</div>
					@foreach(App\UsedCarFuelType::all() as $fuel)
					@if($fuel->fuel_tp_name !== 'lpg')
					<div class="ctm-option" onclick="setThis('fuel_type_storage','<?= $fuel->fuel_tp_name?>')">{{$fuel->fuel_tp_name}}</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>

	
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Boom type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="boom_type_storage" name="boom_type_storage" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('boom_type_storage',' ')"> -</div>
					@foreach(App\StorageNLoadingEqBoomType::all() as $type)
					<div class="ctm-option" onclick="setThis('boom_type_storage','<?= $type->bom_type_name?>')">{{$type->bom_type_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">color</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="color_storage" name="color_storage" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('color_storage',' ')">-</div>
					@foreach(App\UsedCarColor::all() as $color)
					<div class="ctm-option" onclick="setThis('color_storage','<?= $color->color_name?>')">{{$color->color_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Transmission type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="trans_type_storage" name="trans_typ_storagee" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('trans_type_storage',' ')">-</div>
					@foreach(App\ConstrctonNRoadconstrtonTransmisionType::all() as $type)
					<div class="ctm-option" onclick="setThis('trans_type_storage','<?= $type->type_name ?>')">{{$type->type_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mar-0 car-hide-nav d-none">
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<div class="col-12 p-0">
				<label for="inputAddress">Price <span style="color:#DA233C; padding-left: 5px; ">$</span></label>
			</div>
			<div class="col-md-12 p-0">
				<div class="form-group mb-3"> 
					<input type="number" name="price_minivan" class="form-control" placeholder="price">
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Minivan Type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="type_minivan" name="type_minivan" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('type_minivan',' ')">-</div>
					@foreach(App\MiniBusType::all() as $body)
					<div class="ctm-option" onclick="setThis('type_minivan','<?= $body->type_name?>')">{{$body->type_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Make</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="make_minivan" name="make_minivan" class="make" />	
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('make_minivan',' ')">-</div>
					@foreach(App\MiniBusMake::orderBy('make_name')->get()->sortBy('make_name', SORT_NATURAL|SORT_FLAG_CASE) as $make)
					<div class="ctm-option" onclick="setThis('make_minivan','<?= $make->make_name ?>')">{{ucfirst($make->make_name)}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">New / used</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="new_used_minivan" name="new_used_minivan" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('new_used_minivan',' ')">-</div>
					<div class="ctm-option" onclick="setThis('new_used_minivan','new')">new</div>
					<div class="ctm-option" onclick="setThis('new_used_minivan','used')">used</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">  Fuel type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">-</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="fuel_type_minivan" name="fuel_type_minivan" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('fuel_type_minivan',' ')">-</div>
					@foreach(App\UsedCarFuelType::all() as $fuel)
					@if($fuel->fuel_tp_name !== 'lpg')
					<div class="ctm-option" onclick="setThis('fuel_type_minivan','<?= $fuel->fuel_tp_name?>')">{{$fuel->fuel_tp_name}}</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Steering wheel</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">--</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="str_wheel_minivan" name="str_wheel_minivan" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('str_wheel_minivan',' ')">-</div>
					@foreach(App\UsedStrWheel::all() as $wheel)
					<div class="ctm-option" onclick="setThis('str_wheel_minivan','<?= $wheel->wheel_name?>')">{{$wheel->wheel_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">color</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="color_minivan" name="color_minivan" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('color_minivan',' ')">-</div>
					@foreach(App\UsedCarColor::all() as $color)
					<div class="ctm-option" onclick="setThis('color_minivan','<?= $color->color_name?>')">{{$color->color_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Driven wheels</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">-</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="drivel_wheel_minivan" name="drivel_wheel_minivan" class=""/>
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('drivel_wheel_minivan',' ')">-</div>
					@foreach(App\UsedCarDrivenWheel::all() as $drwheel)
					<div class="ctm-option" onclick="setThis('drivel_wheel_minivan','<?= $drwheel->driven_wheel_name?>')">{{ucfirst($drwheel->driven_wheel_name)}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Gearbox</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">--</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="gear_box_minivan" name="gear_box_minivan" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('gear_box_minivan',' ')">-</div>
					@foreach(App\UsedCarGearBox::all() as $gbox)
					@if($gbox->gear_box_name !== 'Semi automatic')
					<div class="ctm-option" onclick="setThis('gear_box_minivan','<?= $gbox->gear_box_name?>')">{{$gbox->gear_box_name}}</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Climate control</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">-</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="climate_contrl_minivan" name="climate_contrl_minivan" class=""/>
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('climate_contrl_minivan',' ')">-</div>
					@foreach(App\UsedCarClimateControl::all() as $climate)
					<div class="ctm-option" onclick="setThis('climate_contrl_minivan','<?= $climate->climate_con_name?>')">{{ucfirst($climate->climate_con_name)}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row mar-0 car-hide-nav d-none">
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<div class="col-12 p-0">
				<label for="inputAddress">Price <span style="color:#DA233C; padding-left: 5px; ">$</span></label>
			</div>
			<div class="col-md-12 p-0">
				<div class="form-group mb-3"> 
					<input type="number" name="price_autotrains" class="form-control" placeholder="price">
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="type_autotrains" name="type_autotrains" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('type_autotrains',' ')">-</div>
					@foreach(App\AutoTrainType::all() as $type)
					<div class="ctm-option" onclick="setThis('type_autotrains','<?= $type->type_name?>')">{{$type->type_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Make</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="make_autotrains" name="make_autotrains" class="make" />	
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('make_autotrains',' ')">-</div>
					@foreach(App\AutoTrainMake::all() as $bus_make)
					<div class="ctm-option" onclick="setThis('make_autotrains','<?= $bus_make->make_name ?>')">{{$bus_make->make_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">  Model </label>
			<input type="text" name="model_autotrains" class="form-control" >
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">New / used</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="new_used_autotrains" name="new_used_autotrains" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('new_used_autotrains',' ')">-</div>
					<div class="ctm-option" onclick="setThis('new_used_autotrains','new')">new</div>
					<div class="ctm-option" onclick="setThis('new_used_autotrains','used')">used</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">  Fuel type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">-</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="fuel_type_autotrains" name="fuel_type_autotrains" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('fuel_type_autotrains',' ')">-</div>
					@foreach(App\UsedCarFuelType::all() as $fuel)
					@if($fuel->fuel_tp_name !== 'lpg')
					<div class="ctm-option" onclick="setThis('fuel_type_autotrains','<?= $fuel->fuel_tp_name?>')">{{$fuel->fuel_tp_name}}</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Steering wheel</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">--</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="str_wheel_autotrains" name="str_wheel_autotrains" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('str_wheel_autotrains',' ')">-</div>
					@foreach(App\UsedStrWheel::all() as $wheel)
					<div class="ctm-option" onclick="setThis('str_wheel_autotrains','<?= $wheel->wheel_name?>')">{{$wheel->wheel_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">color</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="color_autotrains" name="color_autotrains" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('color_autotrains',' ')">-</div>
					@foreach(App\UsedCarColor::all() as $color)
					<div class="ctm-option" onclick="setThis('color_autotrains','<?= $color->color_name?>')">{{$color->color_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Sleeping beds</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="sleep_bed_autotrains" name="sleep_bed_autotrains" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('sleep_bed_autotrains',' ')">-</div>
					@foreach(App\TruckSleepingBed::all() as $bed)
					<div class="ctm-option" onclick="setThis('sleep_bed_autotrains','<?= $bed->bed_name?>')">{{$bed->bed_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Gearbox</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">--</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="gear_box_autotrains" name="gear_box_autotrains" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('gear_box_autotrains',' ')">-</div>
					@foreach(App\UsedCarGearBox::all() as $gbox)
					@if($gbox->gear_box_name !== 'Semi automatic')
					<div class="ctm-option" onclick="setThis('gear_box_autotrains','<?= $gbox->gear_box_name?>')">{{$gbox->gear_box_name}}</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Layout</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="layout_autotrains" name="layout_autotrains" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option"onclick="setThis('layout_autotrains',' ')">-</div>
					@foreach(App\TruckLayout::all() as $layout)
					<div class="ctm-option"onclick="setThis('layout_autotrains','<?= $layout->layout_name?>')">{{$layout->layout_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row mar-0 car-hide-nav d-none">
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<div class="col-12 p-0">
				<label for="inputAddress">Price <span style="color:#DA233C; padding-left: 5px; ">$</span></label>
			</div>
			<div class="col-md-12 p-0">
				<div class="form-group mb-3"> 
					<input type="number" name="price_trailer_trucks" class="form-control" placeholder="price">
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Make</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="make_trailer_trucks" name="make_trailer_trucks" class="make" />	
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('make_trailer_trucks',' ')">-</div>
					@foreach(App\SemiTrailerTruckMake::all() as $make)
					<div class="ctm-option" onclick="setThis('make_trailer_trucks','<?= $make->make_name?>')">{{$make->make_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">  Model </label>
			<input type="text" name="model_trailer_trucks" class="form-control" >
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">New / used</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="new_used_trailer_trucks" name="new_used_trailer_trucks" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('new_used_trailer_trucks',' ')">-</div>
					<div class="ctm-option" onclick="setThis('new_used_trailer_trucks','new')">new</div>
					<div class="ctm-option" onclick="setThis('new_used_trailer_trucks','used')">used</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Steering wheel</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">--</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="str_wheel_trailer_trucks" name="str_wheel_trailer_trucks" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('str_wheel_trailer_trucks',' ')">-</div>
					@foreach(App\UsedStrWheel::all() as $wheel)
					<div class="ctm-option" onclick="setThis('str_wheel_trailer_trucks','<?= $wheel->wheel_name?>')">{{$wheel->wheel_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">color</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="color_trailer_trucks" name="color_trailer_trucks" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('color_trailer_trucks',' ')">-</div>
					@foreach(App\UsedCarColor::all() as $color)
					<div class="ctm-option" onclick="setThis('color_trailer_trucks','<?= $color->color_name?>')">{{$color->color_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Sleeping beds</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="sleep_bed_trailer_trucks" name="sleep_bed_trailer_trucks" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('sleep_bed_trailer_trucks',' ')">-</div>
					@foreach(App\TruckSleepingBed::all() as $bed)
					<div class="ctm-option" onclick="setThis('sleep_bed_trailer_trucks','<?= $bed->bed_name?>')">{{$bed->bed_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Gearbox</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">--</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="gear_box_trailer_trucks" name="gear_box_trailer_trucks" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('gear_box_trailer_trucks',' ')">-</div>
					@foreach(App\UsedCarGearBox::all() as $gbox)
					@if($gbox->gear_box_name !== 'Semi automatic')
					<div class="ctm-option" onclick="setThis('gear_box_trailer_trucks','<?= $gbox->gear_box_name?>')">{{$gbox->gear_box_name}}</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Layout</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="layout_trailer_trucks" name="layout_trailer_trucks" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option"onclick="setThis('layout_trailer_trucks',' ')">-</div>
					@foreach(App\TruckLayout::all() as $layout)
					<div class="ctm-option"onclick="setThis('layout_trailer_trucks','<?= $layout->layout_name?>')">{{$layout->layout_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row mar-0 car-hide-nav d-none">
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<div class="col-12 p-0">
				<label for="inputAddress">Price <span style="color:#DA233C; padding-left: 5px; ">$</span></label>
			</div>
			<div class="col-md-12 p-0">
				<div class="form-group mb-3"> 
					<input type="number" name="price_trucks" class="form-control" placeholder="price">
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="type_trucks" name="type_trucks" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('type_trucks',' ')"> -</div>
					@foreach(App\TruckType::all() as $type)
					<div class="ctm-option" onclick="setThis('type_trucks','<?= $type->type_name?>')">{{$type->type_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Make</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="make_trucks" name="make_trucks" class="make" />	
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('make_trucks',' ')">-</div>
					@foreach(App\TruckMake::all() as $bus_make)
					<div class="ctm-option" onclick="setThis('make_trucks','<?= $bus_make->make_name ?>')">{{$bus_make->make_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">  Model </label>
			<input type="text" name="model_trucks" class="form-control" >
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">New / used</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="new_used_trucks" name="new_used_trucks" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('new_used_trucks',' ')">-</div>
					<div class="ctm-option" onclick="setThis('new_used_trucks','new')">new</div>
					<div class="ctm-option" onclick="setThis('new_used_trucks','used')">used</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Fuel type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">-</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="fuel_type_trucks" name="fuel_type_trucks" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('fuel_type_trucks',' ')">-</div>
					@foreach(App\UsedCarFuelType::all() as $fuel)
					@if($fuel->fuel_tp_name !== 'lpg')
					<div class="ctm-option" onclick="setThis('fuel_type_trucks','<?= $fuel->fuel_tp_name?>')">{{$fuel->fuel_tp_name}}</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Steering wheel</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">--</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="str_wheel_trucks" name="str_wheel_trucks" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('str_wheel_trucks',' ')">-</div>
					@foreach(App\UsedStrWheel::all() as $wheel)
					<div class="ctm-option" onclick="setThis('str_wheel_trucks','<?= $wheel->wheel_name?>')">{{$wheel->wheel_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Gearbox</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">--</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="gear_box_trucks" name="gear_box_trucks" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('gear_box_trucks',' ')">- </div>
					@foreach(App\UsedCarGearBox::all() as $gbox)
					@if($gbox->gear_box_name !== 'Semi automatic')
					<div class="ctm-option" onclick="setThis('gear_box_trucks','<?= $gbox->gear_box_name?>')">{{$gbox->gear_box_name}}</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Sleeping beds</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="sleep_bed_trucks" name="sleep_bed_trucks" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('sleep_bed_trucks',' ')">-</div>
					@foreach(App\TruckSleepingBed::all() as $bed)
					<div class="ctm-option" onclick="setThis('sleep_bed_trucks','<?= $bed->bed_name?>')">{{$bed->bed_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">color</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="color_trucks" name="color_trucks" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('color_trucks',' ')">-</div>
					@foreach(App\UsedCarColor::all() as $color)
					<div class="ctm-option" onclick="setThis('color_trucks','<?= $color->color_name?>')">{{$color->color_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Layout</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="layout_trucks" name="layout_trucks" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option"onclick="setThis('layout_trucks',' ')">-</div>
					@foreach(App\TruckLayout::all() as $layout)
					<div class="ctm-option"onclick="setThis('layout_trucks','<?= $layout->layout_name?>')">{{$layout->layout_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row mar-0 car-hide-nav d-none">
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<div class="col-12 p-0">
				<label for="inputAddress">Price <span style="color:#DA233C; padding-left: 5px; ">$</span></label>
			</div>
			<div class="col-md-12 p-0">
				<div class="form-group mb-3"> 
					<input type="number" name="price_motorcycles" class="form-control" placeholder="price">
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Motorcycles Type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="type_motorcycles" name="type_motorcycles" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('type_motorcycles',' ')">-</div>
					@foreach(App\MotorcycleType:: all() as $motorcycle)
					<div class="ctm-option" onclick="setThis('type_motorcycles','<?= $motorcycle->type_name?>')">{{$motorcycle->type_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">New / used</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="" name="new_used_motorcycles" class="new_used_motorcycles" />	
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('new_used_motorcycles',' ')">-</div>
					<div class="ctm-option" onclick="setThis('new_used_motorcycles','new')">new</div>
					<div class="ctm-option" onclick="setThis('new_used_motorcycles','used')">used</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Make</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="" name="make_motorcycles" class="make" />	
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('make_motorcycles',' ')">-</div>
					@foreach(App\MotorcycleMake::orderBy('make_name')->get() as $make)
					<div class="ctm-option" onclick="setThis('make_motorcycles','<?= $make->make_name?>')">{{$make->make_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Cooling system type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">-</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="cooling_type_motorcycles" name="cooling_type_motorcycles" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('cooling_type_motorcycles',' ')">-</div>
					@foreach(App\MotorcycleCoolingSystemType:: all() as $motorcycle)
					<div class="ctm-option" onclick="setThis('cooling_type_motorcycles','<?= $motorcycle->type_name?>')">{{$motorcycle->type_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Fuel type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">-</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="fuel_type_motorcycles" name="fuel_type_motorcycles" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('fuel_type_motorcycles',' ')">-</div>
					@foreach(App\UsedCarFuelType::all() as $fuel)
					@if($fuel->fuel_tp_name !== 'lpg')
					<div class="ctm-option" onclick="setThis('fuel_type_motorcycles','<?= $fuel->fuel_tp_name?>')">{{$fuel->fuel_tp_name}}</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Engine type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="engine_type_motorcycles" name="engine_type_motorcycles" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('engine_type_motorcycles',' ')">-</div>
					<div class="ctm-option" onclick="setThis('engine_type_motorcycles','two-stroke')">two-stroke</div>
					<div class="ctm-option" onclick="setThis('engine_type_motorcycles','four-stroke')">four-stroke</div>
					<div class="ctm-option" onclick="setThis('engine_type_motorcycles','other')">other</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">color</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="color_motorcycles" name="color_motorcycles" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('color_motorcycles',' ')">-</div>
					@foreach(App\UsedCarColor::all() as $color)
					<div class="ctm-option" onclick="setThis('color_motorcycles','<?= $color->color_name?>')">{{$color->color_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row mar-0 car-hide-nav d-none">
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<div class="col-12 p-0">
				<label for="inputAddress">Price <span style="color:#DA233C; padding-left: 5px; ">$</span></label>
			</div>
			<div class="col-md-12 p-0">
				<div class="form-group mb-3"> 
					<input type="number" name="price_semitrailers" class="form-control" placeholder="price">
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Trailer / semi-trailer</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="trailer_semitrailers" name="trailer_semitrailers" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('trailer_semitrailers',' ')">-</div>
					<div class="ctm-option" onclick="setThis('trailer_semitrailers','Trailer')">Trailer</div>
					<div class="ctm-option" onclick="setThis('trailer_semitrailers','Semi-trailer')">Semi-trailer</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="type_semitrailers" name="type_semitrailers" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('type_semitrailers',' ')">-</div>
					@foreach(App\TrailerSemitrailersType::all() as $type)
					<div class="ctm-option" onclick="setThis('type_semitrailers','<?= $type->type_name?>')">{{$type->type_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">New / used</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="" name="new_used_semitrailers" class="new_used_semitrailers" />	
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('new_used_semitrailers',' ')">-</div>
					<div class="ctm-option" onclick="setThis('new_used_semitrailers','new')">new</div>
					<div class="ctm-option" onclick="setThis('new_used_semitrailers','used')">used</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Make</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="" name="make_semitrailers" class="make" />	
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('make_semitrailers',' ')">-</div>
					@foreach(App\TrailerSemitrailersMake::all() as $make)
					<div class="ctm-option" onclick="setThis('make_semitrailers','<?= $make->make_name ?>')">{{$make->make_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">  Model </label>
			<input type="text" name="model_semitrailers" class="form-control" >
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Axles make</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="alx_make_semitrailers" name="alx_make_semitrailers" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('alx_make_semitrailers',' ')">-</div>
					@foreach(App\TrailerSemitrailersAxlesMake::all() as $make)
					<div class="ctm-option" onclick="setThis('alx_make_semitrailers','<?= $make->alx_make_name ?>')">{{$make->alx_make_name}}</div>
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
				<input type="hidden" id="semi_axl_num_semitrailers" name="semi_axl_num_semitrailers" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('semi_axl_num_semitrailers',' ')" >0</div>
					<div class="ctm-option" onclick="setThis('semi_axl_num_semitrailers','1')" >1</div>
					<div class="ctm-option" onclick="setThis('semi_axl_num_semitrailers','2')" >2</div>
					<div class="ctm-option" onclick="setThis('semi_axl_num_semitrailers','3')" >3</div>
					<div class="ctm-option" onclick="setThis('semi_axl_num_semitrailers','>3')" >>3</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">color</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="color__semitrailers" name="color_semitrailers" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('color_semitrailers',' ')">-</div>
					@foreach(App\UsedCarColor::all() as $color)
					<div class="ctm-option" onclick="setThis('color_semitrailers','<?= $color->color_name?>')">{{$color->color_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row mar-0 car-hide-nav d-none">
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<div class="col-12 p-0">
				<label for="inputAddress">Price <span style="color:#DA233C; padding-left: 5px; ">$</span></label>
			</div>
			<div class="col-md-12 p-0">
				<div class="form-group mb-3"> 
					<input type="number" name="price_bus" class="form-control" placeholder="price">
				</div>
			</div>
		</div>
	</div>


	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="type_bus" name="type_bus" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('type_bus',' ')">-</div>
					@foreach(App\BusesType::all() as $bus_type)
					<div class="ctm-option" onclick="setThis('type_bus','<?= $bus_type->type_name?>')">{{$bus_type->type_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Make</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="make_bus" name="make_bus" class="make" />	
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('make_bus',' ')">-</div>
					@foreach(App\BusesMake::orderBy('make_name')->get()->sortBy('make_name', SORT_NATURAL|SORT_FLAG_CASE); as $bus_make)
					<div class="ctm-option" onclick="setThis('make_bus','<?= $bus_make->make_name ?>')">{{$bus_make->make_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">  Model </label>
			<input type="text" name="model_bus" class="form-control" >
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Number of seats</label>
			<input type="number" id="seat_num_bus" name="seat_num_bus" class="form-control" min="1">
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">New / used</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="new_used_bus" name="new_used_bus" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('new_used_bus',' ')">-</div>
					<div class="ctm-option" onclick="setThis('new_used_bus','new')">new</div>
					<div class="ctm-option" onclick="setThis('new_used_bus','used')">used</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Fuel type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">-</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="fuel_type_bus" name="fuel_type_bus" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('fuel_type_bus','')">-</div>
					@foreach(App\UsedCarFuelType::all() as $fuel)
					@if($fuel->fuel_tp_name !== 'lpg')
					<div class="ctm-option" onclick="setThis('fuel_type_bus','<?= $fuel->fuel_tp_name?>')">{{$fuel->fuel_tp_name}}</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Steering wheel</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">--</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="str_wheel_bus" name="str_wheel_bus" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('str_wheel_bus',' ')">-</div>
					@foreach(App\UsedStrWheel::all() as $wheel)
					<div class="ctm-option" onclick="setThis('str_wheel_bus','<?= $wheel->wheel_name?>')">{{$wheel->wheel_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Gearbox</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">--</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="gear_box_bus" name="gear_box_bus" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('gear_box_bus',' ')">-</div>
					@foreach(App\UsedCarGearBox::all() as $gbox)
					@if($gbox->gear_box_name !== 'Semi automatic')
					<div class="ctm-option" onclick="setThis('gear_box_bus','<?= $gbox->gear_box_name?>')">{{$gbox->gear_box_name}}</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Climate control</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">-</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="climate_contrl_bus" name="climate_contrl_bus" class=""/>
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('climate_contrl_bus',' ')">-</div>
					@foreach(App\UsedCarClimateControl::all() as $climate)
					<div class="ctm-option" onclick="setThis('climate_contrl_bus','<?= $climate->climate_con_name?>')">{{ucfirst($climate->climate_con_name)}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">color</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="color_bus" name="color_bus" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('color_bus',' ')">-</div>
					@foreach(App\UsedCarColor::all() as $color)
					<div class="ctm-option" onclick="setThis('color_bus','<?= $color->color_name?>')">{{$color->color_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Number of doors</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">--</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="doors_number_bus" name="doors_number_bus" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('doors_number_bus',' ')">-</div>
					@foreach(App\UsedCarDoor::all() as $doors)
					<div class="ctm-option" onclick="setThis('doors_number_bus','<?= $doors->doors?>')">{{$doors->doors}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mar-0 car-hide-nav d-none">
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<div class="col-12 p-0">
				<label for="inputAddress">Price <span style="color:#DA233C; padding-left: 5px; ">$</span></label>
			</div>
			<div class="col-md-12 p-0">
				<div class="form-group mb-3"> 
					<input type="number" name="price_vehicles_campers" class="form-control" placeholder="price">
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="type_vehicles_campers" name="type_vehicles_campers" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('type_vehicles_campers',' ')">-</div>
					@foreach(App\CampersType::all() as $campare)
					<div class="ctm-option" onclick="setThis('type_vehicles_campers','<?= $campare->type_name?>')">{{$campare->type_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Make</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="make_vehicles_campers" name="make_vehicles_campers" class="make" />	
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('make_vehicles_campers',' ')">-</div>
					@foreach(App\BusesMake::orderBy('make_name')->get()->sortBy('make_name', SORT_NATURAL|SORT_FLAG_CASE) as $bus_make)
					<div class="ctm-option" onclick="setThis('make_vehicles_campers','<?= $bus_make->make_name ?>')">{{$bus_make->make_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">  Model </label>
			<input type="text" name="model_vehicles_campers" class="form-control" >
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		
		<div class="form-group">
			<label for="inputAddress"> Number of beds</label>
			<input type="text" name="bed_num_vehicles_campers" id="bed_num_vehicles_campers" class="form-control required" min="1">
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Number of seats</label>
			<input type="number" id="seat_num_vehicles_campers" name="seat_num_vehicles_campers" class="form-control" min="1">
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">New / used</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="new_used_vehicles_campers" name="new_used_vehicles_campers" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('new_used_vehicles_campers',' ')">-</div>
					<div class="ctm-option" onclick="setThis('new_used_vehicles_campers','new')">new</div>
					<div class="ctm-option" onclick="setThis('new_used_vehicles_campers','used')">used</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Fuel type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">-</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="fuel_type_vehicles_campers" name="fuel_type_vehicles_campers" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('fuel_type_vehicles_campers',' ')">-</div>
					@foreach(App\UsedCarFuelType::all() as $fuel)
					@if($fuel->fuel_tp_name !== 'lpg')
					<div class="ctm-option" onclick="setThis('fuel_type_vehicles_campers','<?= $fuel->fuel_tp_name?>')">{{$fuel->fuel_tp_name}}</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Steering wheel</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">--</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="str_wheel_vehicles_campers" name="str_wheel_vehicles_campers" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('str_wheel_vehicles_campers',' ')">-</div>
					@foreach(App\UsedStrWheel::all() as $wheel)
					<div class="ctm-option" onclick="setThis('str_wheel_vehicles_campers','<?= $wheel->wheel_name?>')">{{$wheel->wheel_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Gearbox</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">--</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="gear_box_vehicles_campers" name="gear_box_vehicles_campers" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('gear_box_vehicles_campers',' ')">-</div>
					@foreach(App\UsedCarGearBox::all() as $gbox)
					@if($gbox->gear_box_name !== 'Semi automatic')
					<div class="ctm-option" onclick="setThis('gear_box_vehicles_campers','<?= $gbox->gear_box_name?>')">{{$gbox->gear_box_name}}</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Climate control</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">-</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="climate_contrl_vehicles_campers" name="climate_contrl_vehicles_campers" class=""/>
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('climate_contrl_vehicles_campers',' ')">-</div>
					@foreach(App\UsedCarClimateControl::all() as $climate)
					<div class="ctm-option" onclick="setThis('climate_contrl_vehicles_campers','<?= $climate->climate_con_name?>')">{{ucfirst($climate->climate_con_name)}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Driven wheels</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">-</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="drivel_wheel_vehicles_campers" name="drivel_wheel_vehicles_campers" class=""/>
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('drivel_wheel_vehicles_campers',' ')">-</div>
					@foreach(App\UsedCarDrivenWheel::all() as $drwheel)
					<div class="ctm-option" onclick="setThis('drivel_wheel_vehicles_campers','<?= $drwheel->driven_wheel_name?>')">{{ucfirst($drwheel->driven_wheel_name)}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">color</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="color_vehicles_campers" name="color_vehicles_campers" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('color_vehicles_campers',' ')">-</div>
					@foreach(App\UsedCarColor::all() as $color)
					<div class="ctm-option" onclick="setThis('color_vehicles_campers','<?= $color->color_name?>')">{{$color->color_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mar-0 car-hide-nav d-none">
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<div class="col-12 p-0">
				<label for="inputAddress">Price <span style="color:#DA233C; padding-left: 5px; ">$</span></label>
			</div>
			<div class="col-md-12 p-0">
				<div class="form-group mb-3"> 
					<input type="number" name="price_minibus" class="form-control" placeholder="price">
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Minivan Type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="type_minibus" name="type_minibus" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('type_minibus',' ')"> -</div>
					@foreach(App\MiniBusType::all() as $body)
					<div class="ctm-option" onclick="setThis('type_minibus','<?= $body->type_name?>')">{{$body->type_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Make</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="make_minibus" name="make_minibus" class="make" />	
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('make_minibus',' ')">-</div>
					@foreach(App\MiniBusMake::orderBy('make_name')->get()->sortBy('make_name', SORT_NATURAL|SORT_FLAG_CASE) as $make)
					<div class="ctm-option" onclick="setThis('make_minibus','<?= $make->make_name ?>')">{{ucfirst($make->make_name)}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">New / used</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="new_used_minibus" name="new_used_minibus" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('new_used_minibus',' ')">-</div>
					<div class="ctm-option" onclick="setThis('new_used_minibus','new')">new</div>
					<div class="ctm-option" onclick="setThis('new_used_minibus','used')">used</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">  Fuel type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">-</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="fuel_type_minibus" name="fuel_type_minibus" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('fuel_type_minibus',' ')">-</div>
					@foreach(App\UsedCarFuelType::all() as $fuel)
					@if($fuel->fuel_tp_name !== 'lpg')
					<div class="ctm-option" onclick="setThis('fuel_type_minibus','<?= $fuel->fuel_tp_name?>')">{{$fuel->fuel_tp_name}}</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Steering wheel</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">--</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="str_wheel_minibus" name="str_wheel_minibus" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('str_wheel_minibus',' ')">-</div>
					@foreach(App\UsedStrWheel::all() as $wheel)
					<div class="ctm-option" onclick="setThis('str_wheel_minibus','<?= $wheel->wheel_name?>')">{{$wheel->wheel_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">color</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="color_minibus" name="color_minibus" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('color_minibus',' ')">-</div>
					@foreach(App\UsedCarColor::all() as $color)
					<div class="ctm-option" onclick="setThis('color_minibus','<?= $color->color_name?>')">{{$color->color_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Driven wheels</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">-</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="drivel_wheel_minibus" name="drivel_wheel_minibus" class=""/>
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('drivel_wheel_minibus',' ')">-</div>
					@foreach(App\UsedCarDrivenWheel::all() as $drwheel)
					<div class="ctm-option" onclick="setThis('drivel_wheel_minibus','<?= $drwheel->driven_wheel_name?>')">{{ucfirst($drwheel->driven_wheel_name)}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Gearbox</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">--</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="gear_box_minibus" name="gear_box_minibus" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('gear_box_minibus',' ')">-</div>
					@foreach(App\UsedCarGearBox::all() as $gbox)
					@if($gbox->gear_box_name !== 'Semi automatic')
					<div class="ctm-option" onclick="setThis('gear_box_minibus','<?= $gbox->gear_box_name?>')">{{$gbox->gear_box_name}}</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Climate control</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">-</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="climate_contrl_minibus" name="climate_contrl_minibus" class=""/>
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('climate_contrl_minibus',' ')">-</div>
					@foreach(App\UsedCarClimateControl::all() as $climate)
					<div class="ctm-option" onclick="setThis('climate_contrl_minibus','<?= $climate->climate_con_name?>')">{{ucfirst($climate->climate_con_name)}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mar-0 car-hide-nav d-none">
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<div class="col-12 p-0">
				<label for="inputAddress">Price <span style="color:#DA233C; padding-left: 5px; ">$</span></label>
			</div>
			<div class="col-md-12 p-0">
				<div class="form-group mb-3"> 
					<input type="number" name="price_passenger_vans" class="form-control" placeholder="price">
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Make</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="make_passenger_vans" name="make_passenger_vans" class="make" />	
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('make_passenger_vans',' ')">-</div>
					@foreach(App\UsedCarMake::orderBy('make_name')->get()->sortBy('make_name', SORT_NATURAL|SORT_FLAG_CASE) as $make)
					<div class="ctm-option" onclick="setThis('make_passenger_vans','<?= $make->make_name?>')">{{ucfirst($make->make_name)}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">New / used</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="" name="new_used_passenger_vans" class="new_used" />	
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('new_used_passenger_vans',' ')">-</div>
					<div class="ctm-option" onclick="setThis('new_used_passenger_vans','new')">new</div>
					<div class="ctm-option" onclick="setThis('new_used_passenger_vans','used')">used</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Body Type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="body_type" name="body_type_passenger_vans" class="body_type" />
				<div class="ctm-option-box">
					<div class="ctm-option"  onclick="setThis('body_type_passenger_vans',' ')">-</div>
					@foreach(App\UsedCarBodyType::all() as $body)
					<div class="ctm-option"  onclick="setThis('body_type_passenger_vans','<?= $body->body_tp_name?>')">{{$body->body_tp_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Fuel Type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="fuel_type" name="fuel_type_passenger_vans" class="fuel_type" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('fuel_type_passenger_vans',' ')">-</div>
					@foreach(App\UsedCarFuelType::all() as $fuel)
					@if($fuel->fuel_tp_name !== 'lpg')
					<div class="ctm-option" onclick="setThis('fuel_type_passenger_vans','<?= $fuel->fuel_tp_name?>')">{{$fuel->fuel_tp_name}}</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Gear Box</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="gear_box_passenger_vans" name="gear_box_passenger_vans" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('gear_box_passenger_vans',' ')">-</div>
					@foreach(App\UsedCarGearBox::all() as $gbox)
					@if($gbox->gear_box_name !== 'Semi automatic')
					<div class="ctm-option" onclick="setThis('gear_box_passenger_vans','<?= $gbox->gear_box_name?>')">{{$gbox->gear_box_name}}</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Number of doors</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">--</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="doors_number_passenger_vans" name="doors_number_passenger_vans" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('doors_number_passenger_vans',' ')">-</div>
					@foreach(App\UsedCarDoor::all() as $doors)
					<div class="ctm-option" onclick="setThis('doors_number_passenger_vans','<?= $doors->doors?>')">{{$doors->doors}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">color</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="color_passenger_vans" name="color_passenger_vans" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('color_passenger_vans',' ')">-</div>
					@foreach(App\UsedCarColor::all() as $color)
					<div class="ctm-option" onclick="setThis('color_passenger_vans','<?= $color->color_name?>')">{{$color->color_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mar-0 car-hide-nav d-none">
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<div class="col-12 p-0">
				<label for="inputAddress">Price <span style="color:#DA233C; padding-left: 5px; ">$</span></label>
			</div>
			<div class="col-md-12 p-0">
				<div class="form-group mb-3"> 
					<input type="number" name="price_boat_raft" class="form-control" placeholder="price">
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="type_boat_raft" name="type_boat_raft" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('type_boat_raft', ' ')">-</div>
					@foreach(App\BoatsRaftsType::all() as $type)
					<div class="ctm-option" onclick="setThis('type_boat_raft', '<?= $type->type_name?>')">{{$type->type_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>	

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">  Model </label>
			<input type="text" name="model_boat_raft" class="form-control" >
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Number of seats</label>
			<input type="number" id="seat_num_boat_rafts" name="seat_num_boat_raft" class="form-control" min="1">
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">New / used</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="" name="new_used_boat_raft" class="new_used" />	
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('new_used_boat_raft',' ')">-</div>
					<div class="ctm-option" onclick="setThis('new_used_boat_raft','new')">new</div>
					<div class="ctm-option" onclick="setThis('new_used_boat_raft','used')">used</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Fuel Type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="fuel_type" name="fuel_type_boat_raft" class="fuel_type" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('fuel_type_boat_raft',' ')">-</div>
					@foreach(App\UsedCarFuelType::all() as $fuel)
					@if($fuel->fuel_tp_name !== 'lpg')
					<div class="ctm-option" onclick="setThis('fuel_type_boat_raft','<?= $fuel->fuel_tp_name?>')">{{$fuel->fuel_tp_name}}</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">color</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="color_boat_raft" name="color_boat_raft" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('color_boat_raft',' ')">-</div>
					@foreach(App\UsedCarColor::all() as $color)
					<div class="ctm-option" onclick="setThis('color_boat_raft','<?= $color->color_name?>')">{{$color->color_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mar-0 car-hide-nav d-none">
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<div class="col-12 p-0">
				<label for="inputAddress">Price <span style="color:#DA233C; padding-left: 5px; ">$</span></label>
			</div>
			<div class="col-md-12 p-0">
				<div class="form-group mb-3"> 
					<input type="number" name="price_watercraft" class="form-control" placeholder="price">
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">	
			<label for="inputAddress"> Manufacturer </label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">--</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="manufacturer_watercraft" name="manufacturer_watercraft" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('manufacturer_watercraft', ' ')" >-</div>
					@foreach(App\JetSkisManufacturer::all() as $manufacturer)	
					<div class="ctm-option" onclick="setThis('manufacturer_watercraft', '<?= $manufacturer->manufecturer_name?>')" >{{$manufacturer->manufecturer_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>	

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">  Model </label>
			<input type="text" name="model_watercraft" class="form-control" >
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Number of seats</label>
			<input type="number" id="seat_num_watercraft" name="seat_num_watercraft" class="form-control" min="1">
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">New / used</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="" name="new_used_watercraft" class="new_used" />	
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('new_used_watercraft',' ')">-</div>
					<div class="ctm-option" onclick="setThis('new_used_watercraft','new')">new</div>
					<div class="ctm-option" onclick="setThis('new_used_watercraft','used')">used</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Fuel Type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="" name="fuel_type_watercraft" class="fuel_type" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('fuel_type_watercraft',' ')">-</div>
					@foreach(App\UsedCarFuelType::all() as $fuel)
					@if($fuel->fuel_tp_name !== 'lpg')
					<div class="ctm-option" onclick="setThis('fuel_type_watercraft','<?= $fuel->fuel_tp_name?>')">{{$fuel->fuel_tp_name}}</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Engine(s) type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">--</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="eng_type_watercraft" name="eng_type_watercraft" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('eng_type_watercraft',' ')">-</div>
					<div class="ctm-option" onclick="setThis('eng_type_watercraft','Two-stroke')">Two-stroke</div>
					<div class="ctm-option" onclick="setThis('eng_type_watercraft','Four-stroke')">Four-stroke</div>
					<div class="ctm-option" onclick="setThis('eng_type_watercraft','Other')">Other</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">color</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="color_watercraft" name="color_watercraft" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('color_watercraft',' ')">-</div>
					@foreach(App\UsedCarColor::all() as $color)
					<div class="ctm-option" onclick="setThis('color_watercraft','<?= $color->color_name?>')">{{$color->color_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mar-0 car-hide-nav d-none">
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<div class="col-12 p-0">
				<label for="inputAddress">Price <span style="color:#DA233C; padding-left: 5px; ">$</span></label>
			</div>
			<div class="col-md-12 p-0">
				<div class="form-group mb-3"> 
					<input type="number" name="price_kay_can" class="form-control" placeholder="price">
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Kayaks / canoes</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="kay_can" name="kay_can" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option"onclick="setThis('kay_can', ' ')" >-</div>
					<div class="ctm-option"onclick="setThis('kay_can', 'Kayaks')" >Kayaks</div>
					<div class="ctm-option"onclick="setThis('kay_can', 'Canoes')" >Canoes</div>
				</div>
			</div>
		</div>
	</div>	

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="type_kay_can" name="type_kay_can" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('type_kay_can',' ')">-</div>
					@foreach(App\KayaksCanoesType::all() as $type)
					<div class="ctm-option" onclick="setThis('type_kay_can','<?= $type->type_name?>')">{{$type->type_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>	

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">  Model </label>
			<input type="text" name="model_kay_can" class="form-control" >
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Manufacturer</label>
			<input type="text" id="manufacturer_kay_can" name="manufacturer_kay_can" class="form-control required">
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Number of seats</label>
			<input type="number" id="seat_num_kay_can" name="seat_num_kay_can" class="form-control" min="1">
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">New / used</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="" name="new_used_kay_can" class="new_used" />	
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('new_used_kay_can',' ')">-</div>
					<div class="ctm-option" onclick="setThis('new_used_kay_can','new')">new</div>
					<div class="ctm-option" onclick="setThis('new_used_kay_can','used')">used</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">color</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="color_kay_can" name="color_kay_can" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('color_kay_can',' ')">-</div>
					@foreach(App\UsedCarColor::all() as $color)
					<div class="ctm-option" onclick="setThis('color_kay_can','<?= $color->color_name?>')">{{$color->color_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mar-0 car-hide-nav d-none">
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<div class="col-12 p-0">
				<label for="inputAddress">Price <span style="color:#DA233C; padding-left: 5px; ">$</span></label>
			</div>
			<div class="col-md-12 p-0">
				<div class="form-group mb-3"> 
					<input type="number" name="price_motorboats" class="form-control" placeholder="price">
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">  Purpose of a boat </label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">--</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="boat_purpose" name="boat_purpose" class="required" />
				<div class="ctm-option-box">	
					<div class="ctm-option" onclick="setThis('boat_purpose',' ')">-</div>
					@foreach(App\MotorboatsPerposeofBoat::all() as $perpose)
					<div class="ctm-option" onclick="setThis('boat_purpose','<?= $perpose->perpose?>')">{{$perpose->perpose}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>	

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="type_motorboats" name="type_motorboats" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('type_motorboats',' ')">-</div>
					@foreach(App\MotorboatsType::all() as $type)
					<div class="ctm-option" onclick="setThis('type_motorboats','<?= $type->type_name?>')">{{$type->type_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>	

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">  Model </label>
			<input type="text" name="model_motorboats" class="form-control" >
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Manufacturer</label>
			<input type="text" id="manufacturer_motorboats" name="manufacturer_motorboats" class="form-control required">
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">New / used</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="" name="new_used_motorboats" class="new_used" />	
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('new_used_motorboats',' ')">-</div>
					<div class="ctm-option" onclick="setThis('new_used_motorboats','new')">new</div>
					<div class="ctm-option" onclick="setThis('new_used_motorboats','used')">used</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Fuel Type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">-</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="fuel_type_motorboats" name="fuel_type_motorboats" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('fuel_type_motorboats',' ')">-</div>
					@foreach(App\UsedCarFuelType::all() as $fuel)
					@if($fuel->fuel_tp_name !== 'lpg')
					<div class="ctm-option" onclick="setThis('fuel_type_motorboats','<?= $fuel->fuel_tp_name?>')">{{$fuel->fuel_tp_name}}</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Engine(s) type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">--</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="eng_type_motorboats" name="eng_type_motorboats" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('eng_type_motorboats',' ')">-</div>
					@foreach(App\MotorboatsEngineType::all() as $type)
					<div class="ctm-option" onclick="setThis('eng_type_motorboats','<?= $type->type_name?>')">{{$type->type_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Number of engines	</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">--</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="eng_num_motorboats" name="eng_num_motorboats" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('eng_num_motorboats',' ')">0</div>
					<div class="ctm-option" onclick="setThis('eng_num_motorboats','1')">1</div>
					<div class="ctm-option" onclick="setThis('eng_num_motorboats','2')">2</div>
					<div class="ctm-option" onclick="setThis('eng_num_motorboats','3')">3</div>
					<div class="ctm-option" onclick="setThis('eng_num_motorboats','4')">4</div>
					<div class="ctm-option" onclick="setThis('eng_num_motorboats','5')">5</div>
					<div class="ctm-option" onclick="setThis('eng_num_motorboats','6')">6</div>
					<div class="ctm-option" onclick="setThis('eng_num_motorboats','none')">none</div>
					<div class="ctm-option" onclick="setThis('eng_num_motorboats','other')">other</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">color</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="color_motorboats" name="color_motorboats" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('color_motorboats',' ')">-</div>
					@foreach(App\UsedCarColor::all() as $color)
					<div class="ctm-option" onclick="setThis('color_motorboats','<?= $color->color_name?>')">{{$color->color_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mar-0 car-hide-nav d-none">
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<div class="col-12 p-0">
				<label for="inputAddress">Price <span style="color:#DA233C; padding-left: 5px; ">$</span></label>
			</div>
			<div class="col-md-12 p-0">
				<div class="form-group mb-3"> 
					<input type="number" name="price_engines" class="form-control" placeholder="price">
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Engine(s) type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">--</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="eng_type_engines" name="eng_type_engines" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('eng_type_engines',' ')">-</div>
					@foreach(App\MotorsandEngineEngineType::all() as $type)
					<div class="ctm-option" onclick="setThis('eng_type_engines','<?= $type->type_name?>')">{{$type->type_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>	

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Engine make</label>
			<input type="text" id="eng_make_engines" name="eng_make_engines" class="form-control required" >
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Engine model</label>
			<input type="text" id="eng_model_engines" name="eng_model_engines" class="form-control required">
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">New / used</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="" name="new_used_engines" class="new_used" />	
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('new_used_engines',' ')">-</div>
					<div class="ctm-option" onclick="setThis('new_used_engines','new')">new</div>
					<div class="ctm-option" onclick="setThis('new_used_engines','used')">used</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Fuel Type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">-</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="fuel_type_engines" name="fuel_type_engines" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('fuel_type_engines',' ')">-</div>
					@foreach(App\UsedCarFuelType::all() as $fuel)
					@if($fuel->fuel_tp_name !== 'lpg')
					<div class="ctm-option" onclick="setThis('fuel_type_engines','<?= $fuel->fuel_tp_name?>')">{{$fuel->fuel_tp_name}}</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mar-0 car-hide-nav d-none">
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<div class="col-12 p-0">
				<label for="inputAddress">Price <span style="color:#DA233C; padding-left: 5px; ">$</span></label>
			</div>
			<div class="col-md-12 p-0">
				<div class="form-group mb-3"> 
					<input type="number" name="price_other" class="form-control" placeholder="price">
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Product name</label>
			<input type="text" id="product_name" name="product_name" class="form-control required">
		</div>
	</div>	

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Manufacturer</label>
			<input type="text" name="manufacturer_other" id="manufacturer_other" class="form-control required">
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Model</label>
			<input type="text" name="model_other" id="model_other" class="form-control">
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">  Number of seats</label>
			<input type="number" id="seat_num_other" name="seat_num_other" class="form-control" min="1">
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">New / used</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="" name="new_used_other" class="new_used" />	
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('new_used_other',' ')">-</div>
					<div class="ctm-option" onclick="setThis('new_used_other','new')">new</div>
					<div class="ctm-option" onclick="setThis('new_used_other','used')">used</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Fuel Type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">-</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="fuel_type_other" name="fuel_type_other" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('fuel_type_other',' ')">-</div>
					@foreach(App\UsedCarFuelType::all() as $fuel)
					@if($fuel->fuel_tp_name !== 'lpg')
					<div class="ctm-option" onclick="setThis('fuel_type_other','<?= $fuel->fuel_tp_name?>')">{{$fuel->fuel_tp_name}}</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">color</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="color_other" name="color_other" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('color_other',' ')">-</div>
					@foreach(App\UsedCarColor::all() as $color)
					<div class="ctm-option" onclick="setThis('color_other','<?= $color->color_name?>')">{{$color->color_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mar-0 car-hide-nav d-none">
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<div class="col-12 p-0">
				<label for="inputAddress">Price <span style="color:#DA233C; padding-left: 5px; ">$</span></label>
			</div>
			<div class="col-md-12 p-0">
				<div class="form-group mb-3"> 
					<input type="number" name="price_sailboats" class="form-control" placeholder="price">
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Manufacturer</label>
			<input type="text" name="manufacturer_sailboats" id="manufacturer_sailboats" class="form-control required">
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Model</label>
			<input type="text" name="model_sailboats" id="model_sailboats" class="form-control">
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">New / used</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="" name="new_used_sailboats" class="new_used" />	
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('new_used_sailboats',' ')">-</div>
					<div class="ctm-option" onclick="setThis('new_used_sailboats','new')">new</div>
					<div class="ctm-option" onclick="setThis('new_used_sailboats','used')">used</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Sailboat type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="sailboat_type" name="sailboat_type" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('sailboat_type',' ')">-</div>
					@foreach(App\SailboatsType::all() as $type)
					<div class="ctm-option" onclick="setThis('sailboat_type','<?= $type->type_name?>')">{{$type->type_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Fuel Type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">-</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="fuel_type_sailboats" name="fuel_type_sailboats" class="required" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('fuel_type_sailboats',' ')">-</div>
					@foreach(App\UsedCarFuelType::all() as $fuel)
					@if($fuel->fuel_tp_name !== 'lpg')
					<div class="ctm-option" onclick="setThis('fuel_type_sailboats','<?= $fuel->fuel_tp_name?>')">{{$fuel->fuel_tp_name}}</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Engine(s) type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">--</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="eng_type_sailboats" name="eng_type_sailboats" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('eng_type_sailboats',' ')">-</div>
					@foreach(App\MotorboatsEngineType::all() as $type)
					<div class="ctm-option" onclick="setThis('eng_type_sailboats','<?= $type->type_name?>')">{{$type->type_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Number of engines	</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">--</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="eng_num_sailboats" name="eng_num_sailboats" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('eng_num_sailboats','1')">1</div>
					<div class="ctm-option" onclick="setThis('eng_num_sailboats','2')">2</div>
					<div class="ctm-option" onclick="setThis('eng_num_sailboats','3')">3</div>
					<div class="ctm-option" onclick="setThis('eng_num_sailboats','4')">4</div>
					<div class="ctm-option" onclick="setThis('eng_num_sailboats','5')">5</div>
					<div class="ctm-option" onclick="setThis('eng_num_sailboats','6')">6</div>
					<div class="ctm-option" onclick="setThis('eng_num_sailboats','none')">none</div>
					<div class="ctm-option" onclick="setThis('eng_num_sailboats','other')">other</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Rig Type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="rig_type_sailboats" name="rig_type_sailboats" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('rig_type_sailboats',' ')">-</div>
					@foreach(App\SailboatRigType::all() as $type)
					<div class="ctm-option" onclick="setThis('rig_type_sailboats','<?= $type->type_name?>')">{{$type->type_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Steering wheel Type</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">--</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="str_wheel_sailboats" name="str_wheel_sailboats" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('str_wheel_sailboats',' ')">-</div>
					@foreach(App\SailboatStrWheelType::all() as $type)
					<div class="ctm-option" onclick="setThis('str_wheel_sailboats','<?= $type->type_name?>')">{{$type->type_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">color</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="color_sailboats" name="color_sailboats" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('color_sailboats',' ')">-</div>
					@foreach(App\UsedCarColor::all() as $color)
					<div class="ctm-option" onclick="setThis('color_sailboats','<?= $color->color_name?>')">{{$color->color_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mar-0 car-hide-nav d-none">
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<div class="col-12 p-0">
				<label for="inputAddress">Price <span style="color:#DA233C; padding-left: 5px; ">$</span></label>
			</div>
			<div class="col-md-12 p-0">
				<div class="form-group mb-3"> 
					<input type="number" name="price_water_bikes" class="form-control" placeholder="price">
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Manufacturer</label>
			<input type="text" name="manufacturer_water_bikes" id="manufacturer_water_bikes" class="form-control required">
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Model</label>
			<input type="text" name="model_water_bikes" id="model_water_bikes" class="form-control">
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress"> Number of seats</label>
			<input type="number" name="seat_num_water_bikes" id="seat_num_water_bikes" class="form-control required" min="1">
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">New / used</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="" name="new_used_water_bikes" class="new_used" />	
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('new_used_water_bikes',' ')">-</div>
					<div class="ctm-option" onclick="setThis('new_used_water_bikes','new')">new</div>
					<div class="ctm-option" onclick="setThis('new_used_water_bikes','used')">used</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">color</label>
			<div class="ctm-select">
				<div class="ctm-select-txt pad-l-10">
					<span class="select-txt" id="category">----</span>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
				</div>
				<input type="hidden" id="color_water_bikes" name="color_water_bikes" class="" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('color_water_bikes',' ')">-</div>
					@foreach(App\UsedCarColor::all() as $color)
					<div class="ctm-option" onclick="setThis('color_water_bikes','<?= $color->color_name?>')">{{$color->color_name}}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>



