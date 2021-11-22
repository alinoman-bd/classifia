<div class="extra-sidebar-nav">
	<div class="checkbox-ctm">
		<!-- {{-- <i>Search all category according to minimum and maximum price, you can also make specific search result with
			more fields by changing the category from the heading area.</i> --}} -->
	</div>
</div>


<div class="row mar-0 extra-sidebar-nav {{request('form_type') == 'agricultural-implements'? 'active': 'd-none'}}">
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('type_ag_eq') ? request('type_ag_eq') : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="type_ag_eq" value="{{request('type_ag_eq')}}" name="type_ag_eq"
						 />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('type_ag_eq',' ')">-</div>
						@foreach(App\AgriculturalImplementType::all() as $type)
						<div class="ctm-option" onclick="setThis('type_ag_eq','<?= $type->type_name?>')">
							{{$type->type_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">New / used</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('new_used_ag_eq')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="" name="new_used_ag_eq" class="new_used_ag_eq" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('new_used_ag_eq',' ')">-</div>
						<div class="ctm-option" onclick="setThis('new_used_ag_eq','new')">new</div>
						<div class="ctm-option" onclick="setThis('new_used_ag_eq','used')">used</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Make</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('make_ag_eq')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="" value="{{request('make_ag_eq')}}" name="make_ag_eq" class="make" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('make_ag_eq',' ')">-</div>
						@foreach(App\AgriculturalImplementMake::all() as $make)
						<div class="ctm-option" onclick="setThis('make_ag_eq','<?= $make->make_name ?>')">
							{{$make->make_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Model</label>
			<div class="form-cnt">
				<input type="text" value="{{request('model_ag_eq')? : ' '}}" name="model_ag_eq" class="form-control">
			</div>
		</div>
	</div>
</div>

<div class="row mar-0 extra-sidebar-nav {{request('form_type') == 'agricultural-machinery'? 'active': 'd-none'}}">
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('type_ag_mac')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" value="{{request('type_ag_mac')}}" id="type_ag_mac" name="type_ag_mac"
						 />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('type_ag_mac',' ')">-</div>
						@foreach(App\AgriculturalMachineryType::all() as $type)
						<div class="ctm-option" onclick="setThis('type_ag_mac','<?= $type->type_name?>')">
							{{$type->type_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">New / used</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('new_used_ag_mac')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="" name="new_used_ag_mac" value="{{request('new_used_ag_mac')}}"
						class="new_used_ag_mac" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('new_used_ag_mac',' ')">-</div>
						<div class="ctm-option" onclick="setThis('new_used_ag_mac','new')">new</div>
						<div class="ctm-option" onclick="setThis('new_used_ag_mac','used')">used</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Make</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('make_ag_mac')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="" value="{{request('make_ag_mac')}}" name="make_ag_mac" class="make" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('make_ag_mac',' ')">-</div>
						@foreach(App\AgriculturalMachineryMake::all() as $make)
						<div class="ctm-option" onclick="setThis('make_ag_mac','<?= $make->make_name ?>')">
							{{$make->make_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Model</label>
			<div class="form-cnt">
				<input type="text" value="{{request('make_ag_mac')}}" name="model_ag_mac" class="form-control">
			</div>
		</div>
	</div>
</div>


<div class="row mar-0 extra-sidebar-nav {{request('form_type') == 'forest-machinery'? 'active': 'd-none'}}">
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('type_frs_mac')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="type_frs_mac" name="type_frs_mac" value="{{request('type_frs_mac')}}"
						 />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('type_frs_mac',' ')">-</div>
						@foreach(App\ForestMachinaryType::all() as $type)
						<div class="ctm-option" onclick="setThis('type_frs_mac','<?= $type->type_name?>')">
							{{$type->type_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">New / used</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('new_used_frs_mac')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="" value="{{request('new_used_frs_mac')}}" name="new_used_frs_mac"
						class="new_used_frs_mac" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('new_used_frs_mac',' ')">-</div>
						<div class="ctm-option" onclick="setThis('new_used_frs_mac','new')">new</div>
						<div class="ctm-option" onclick="setThis('new_used_frs_mac','used')">used</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Make</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('make_frs_mac')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="" value="{{request('make_frs_mac')}}" name="make_frs_mac" class="make" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('make_frs_mac',' ')">-</div>
						@foreach(App\ForestMachinaryMake::all() as $make)
						<div class="ctm-option" onclick="setThis('make_frs_mac','<?= $make->make_name ?>')">
							{{$make->make_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Model</label>
			<div class="form-cnt">
				<input type="text" value="{{request('model_frs_mac')? : ' '}}" name="model_frs_mac"
					class="form-control">
			</div>
		</div>
	</div>
</div>

<div class="row mar-0 extra-sidebar-nav {{request('form_type') == 'used-cars'? ' ': 'd-none'}} ">
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Make</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('make_cars')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="make_cars" value="{{request('make_cars')}}" name="make_cars"
						class="make" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('make_cars',' ')">-</div>
						@foreach(App\UsedCarMake::orderBy('make_name')->get()->sortBy('make_name',
						SORT_NATURAL|SORT_FLAG_CASE) as $make)
						<div class="ctm-option" onclick="setThis('make_cars','<?= $make->make_name?>')">
							{{ucfirst($make->make_name)}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">New / used</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('new_used_cars')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="" name="new_used_cars" value="{{request('new_used_cars')}}"
						class="new_used" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('new_used_cars',' ')">-</div>
						<div class="ctm-option" onclick="setThis('new_used_cars','new')">new</div>
						<div class="ctm-option" onclick="setThis('new_used_cars','used')">used</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Body Type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('body_type_cars')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="body_type" value="{{request('body_type_cars')}}" name="body_type_cars"
						class="body_type" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('body_type_cars',' ')">-</div>
						@foreach(App\UsedCarBodyType::all() as $body)
						<div class="ctm-option" onclick="setThis('body_type_cars','<?= $body->body_tp_name?>')">
							{{$body->body_tp_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Fuel Type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('fuel_type_cars')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="fuel_type" value="{{request('fuel_type_cars')}}" name="fuel_type_cars"
						class="fuel_type" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('fuel_type_cars',' ')">-</div>
						@foreach(App\UsedCarFuelType::all() as $fuel)
						@if($fuel->fuel_tp_name !== 'lpg')
						<div class="ctm-option" onclick="setThis('fuel_type_cars','<?= $fuel->fuel_tp_name?>')">
							{{$fuel->fuel_tp_name}}</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Gear Box</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('gear_box_cars')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="gear_box_cars" value="{{request('gear_box_cars')}}" name="gear_box_cars"
						 />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('gear_box_cars',' ')">-</div>
						@foreach(App\UsedCarGearBox::all() as $gbox)
						@if($gbox->gear_box_name !== 'Semi automatic')
						<div class="ctm-option" onclick="setThis('gear_box_cars','<?= $gbox->gear_box_name?>')">
							{{$gbox->gear_box_name}}</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Number of doors</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('doors_number_cars')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="doors_number_cars" value="{{request('doors_number_cars')}}"
						name="doors_number_cars"/>
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('doors_number_cars',' ')">-</div>
						@foreach(App\UsedCarDoor::all() as $doors)
						<div class="ctm-option" onclick="setThis('doors_number_cars','<?= $doors->doors?>')">
							{{$doors->doors}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">color</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('color_cars')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="color_cars" value="{{request('color_cars')}}" name="color_cars" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('color_cars',' ')">-</div>
						@foreach(App\UsedCarColor::all() as $color)
						<div class="ctm-option" onclick="setThis('color_cars','<?= $color->color_name?>')">
							{{$color->color_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div
	class="row mar-0 extra-sidebar-nav {{request('form_type') == 'construction-and-road-construction-equipment'? 'active': 'd-none'}}">
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('type_road_const')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="road_const_type" value="{{request('type_road_const')}}"
						name="type_road_const" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('type_road_const',' ')">-</div>
						@foreach(App\ConstrctonNRoadconstrtonType::all() as $type)
						<div class="ctm-option" onclick="setThis('type_road_const','<?= $type->type_name?>')">
							{{$type->type_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Make</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('make_road_const')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="make" name="make_road_const" class="make"
						value="{{request('make_road_const')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('make_road_const',' ')">-</div>
						@foreach(App\ConstrctonNRoadconstrtonMake::all() as $make)
						<div class="ctm-option" onclick="setThis('make_road_const','<?= $make->make_name ?>')">
							{{$make->make_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Model</label>
			<div class="form-cnt">
				<input type="text" value="{{request('model_road_const')}}" name="model_road_const" class="form-control">
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">New / used</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('new_used_road_const')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="" name="new_used_road_const" value="{{request('new_used_road_const')}}"
						class="new_used" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('new_used_road_const',' ')">-</div>
						<div class="ctm-option" onclick="setThis('new_used_road_const','new')">new</div>
						<div class="ctm-option" onclick="setThis('new_used_road_const','used')">used</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Steering wheel</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('str_wheel_road_const')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="str_wheel_road_const" value="{{request('str_wheel_road_const')}}"
						name="str_wheel_road_const" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('str_wheel_road_const',' ')">-</div>
						@foreach(App\UsedStrWheel::all() as $wheel)
						<div class="ctm-option" onclick="setThis('str_wheel_road_const','<?= $wheel->wheel_name?>')">
							{{$wheel->wheel_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">color</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('color_road_const')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="color_road_const" name="color_road_const"
						value="{{request('color_road_const')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('color_road_const',' ')">-</div>
						@foreach(App\UsedCarColor::all() as $color)
						<div class="ctm-option" onclick="setThis('color_road_const','<?= $color->color_name?>')">
							{{$color->color_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div
	class="row mar-0 extra-sidebar-nav {{request('form_type') == 'construction-machinery-accessories'? 'active': 'd-none'}}">
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('type_const_mach')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="type_const_mach" name="type_const_mach"
						value="{{request('type_const_mach')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('type_const_mach',' ')">-</div>
						@foreach(App\ConstructionMachinaryType::all() as $type)
						<div class="ctm-option" onclick="setThis('type_const_mach','<?= $type->type_name?>')">
							{{$type->type_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Make</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('make_const_mach')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="make_const_mach" name="make_const_mach" class="make"
						value="{{request('make_const_mach')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('make_const_mach',' ')">-</div>
						@foreach(App\ConstructionMachinaryMake::all() as $make)
						<div class="ctm-option" onclick="setThis('make_const_mach','<?= $make->make_name ?>')">
							{{$make->make_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Model</label>
			<div class="form-cnt">
				<input type="text" value="{{request('model_const_mach')}}" name="model_const_mach" class="form-control">
			</div>
		</div>
	</div>
</div>

<div class="row mar-0 extra-sidebar-nav {{request('form_type') == 'municipal-machinery'? 'active': 'd-none'}}">
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('type_muni_mach')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="type_muni_mach" name="type_muni_mach"
						value="{{request('type_muni_mach')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('type_muni_mach',' ')">-</div>
						@foreach(App\MunicipalMachineType::all() as $type)
						<div class="ctm-option" onclick="setThis('type_muni_mach','<?= $type->type_name?>')">
							{{$type->type_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Make</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('make_muni_mach')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="make_muni_mach" name="make_muni_mach" class="make"
						value="{{request('make_muni_mach')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('make_muni_mach',' ')">-</div>
						@foreach(App\MunicipalMachineMake::all() as $make)
						<div class="ctm-option" onclick="setThis('make_muni_mach','<?= $make->make_name ?>')">
							{{$make->make_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Model</label>
			<div class="form-cnt">
				<input type="text" value="{{request('model_muni_mach')}}" name="model_muni_mach" class="form-control">
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">New / used</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('new_used_muni_mach')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="new_used_muni_mach" name="new_used_muni_mach"
						value="{{request('new_used_muni_mach')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('new_used_muni_mach',' ')">-</div>
						<div class="ctm-option" onclick="setThis('new_used_muni_mach','new')">new</div>
						<div class="ctm-option" onclick="setThis('new_used_muni_mach','used')">used</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Fuel type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('fuel_type_muni_mach')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="fuel_type_muni_mach" name="fuel_type_muni_mach"
						value="{{request('fuel_type_muni_mach')}}" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('fuel_type_muni_mach',' ')">-</div>
						@foreach(App\UsedCarFuelType::all() as $fuel)
						@if($fuel->fuel_tp_name !== 'lpg')
						<div class="ctm-option" onclick="setThis('fuel_type_muni_mach','<?= $fuel->fuel_tp_name?>')">
							{{$fuel->fuel_tp_name}}</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Gearbox</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('gear_box_muni_mach')? : '--'}}</span>
					</div>
					<input type="hidden" id="gear_box_muni_mach" name="gear_box_muni_mach" class=""
						value="{{request('gear_box_muni_mach')}}" />
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('gear_box_muni_mach',' ')">-</div>
						@foreach(App\UsedCarGearBox::all() as $gbox)
						@if($gbox->gear_box_name !== 'Semi automatic')
						<div class="ctm-option" onclick="setThis('gear_box_muni_mach','<?= $gbox->gear_box_name?>')">
							{{$gbox->gear_box_name}}</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">color</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('color_muni_mach')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="color_muni_mach" value="{{request('color_muni_mach')}}"
						name="color_muni_mach" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('color_muni_mach',' ')">-</div>
						@foreach(App\UsedCarColor::all() as $color)
						<div class="ctm-option" onclick="setThis('color_muni_mach','<?= $color->color_name?>')">
							{{$color->color_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Steering wheel</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('str_wheel_muni_mach')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="str_wheel_muni_mach" name="str_wheel_muni_mach"
						value="{{request('str_wheel_muni_mach')}}" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('str_wheel_muni_mach',' ')">-</div>
						@foreach(App\UsedStrWheel::all() as $wheel)
						<div class="ctm-option" onclick="setThis('str_wheel_muni_mach','<?= $wheel->wheel_name?>')">
							{{$wheel->wheel_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div
	class="row mar-0 extra-sidebar-nav {{request('form_type') == 'storage-and-loading-equipment'? 'active': 'd-none'}}">
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('type_storage')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="type_storage" name="type_storage" value="{{request('type_storage')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('type_storage',' ')">-</div>
						@foreach(App\StorageNLoadingEqType::all() as $type)
						<div class="ctm-option" onclick="setThis('type_storage','<?= $type->type_name?>')">
							{{$type->type_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Make</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('make_storage')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="make_storage" name="make_storage" class="make"
						value="{{request('make_storage')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('make_storage',' ')">-</div>
						@foreach(App\StorageNLoadingEqMake::all() as $make)
						<div class="ctm-option" onclick="setThis('make_storage','<?= $make->make_name ?>')">
							{{$make->make_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Model</label>
			<div class="form-cnt">
				<input type="text" value="{{request('model_storage')}}" name="model_storage" class="form-control">
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">New / used</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('new_used_storage')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="new_used_storage" name="new_used_storage"
						value="{{request('new_used_storage')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('new_used_storage',' ')">-</div>
						<div class="ctm-option" onclick="setThis('new_used_storage','new')">new</div>
						<div class="ctm-option" onclick="setThis('new_used_storage','used')">used</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Fuel type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('fuel_type_storage')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="fuel_type_storage" name="fuel_type_storage"
						value="{{request('fuel_type_storage')}}" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('fuel_type_storage',' ')">-</div>
						@foreach(App\UsedCarFuelType::all() as $fuel)
						@if($fuel->fuel_tp_name !== 'lpg')
						<div class="ctm-option" onclick="setThis('fuel_type_storage','<?= $fuel->fuel_tp_name?>')">
							{{$fuel->fuel_tp_name}}</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Boom type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('boom_type_storage')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="boom_type_storage" name="boom_type_storage"
						value="{{request('boom_type_storage')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('boom_type_storage',' ')">-</div>
						@foreach(App\StorageNLoadingEqBoomType::all() as $type)
						<div class="ctm-option" onclick="setThis('boom_type_storage','<?= $type->bom_type_name?>')">
							{{$type->bom_type_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">color</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('color_storage')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="color_storage" name="color_storage" value="{{request('color_storage')}}"
						class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('color_storage',' ')">-</div>
						@foreach(App\UsedCarColor::all() as $color)
						<div class="ctm-option" onclick="setThis('color_storage','<?= $color->color_name?>')">
							{{$color->color_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Transmission type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('trans_typ_storagee')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="trans_type_storage" name="trans_typ_storagee"
						value="{{request('trans_typ_storagee')}}" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('trans_type_storage',' ')">-</div>
						@foreach(App\ConstrctonNRoadconstrtonTransmisionType::all() as $type)
						<div class="ctm-option" onclick="setThis('trans_type_storage','<?= $type->type_name ?>')">
							{{$type->type_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mar-0 extra-sidebar-nav {{request('form_type') == 'minivans-minibus'? 'active': 'd-none'}}">
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Minivan Type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('type_minivan')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="type_minivan" name="type_minivan" value="{{request('type_minivan')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('type_minivan',' ')">-</div>
						@foreach(App\MiniBusType::all() as $body)
						<div class="ctm-option" onclick="setThis('type_minivan','<?= $body->type_name?>')">
							{{$body->type_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Make</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('make_minivan')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="make_minivan" name="make_minivan" class="make"
						value="{{request('make_minivan')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('make_minivan',' ')">-</div>
						@foreach(App\MiniBusMake::orderBy('make_name')->get()->sortBy('make_name',
						SORT_NATURAL|SORT_FLAG_CASE) as $make)
						<div class="ctm-option" onclick="setThis('make_minivan','<?= $make->make_name ?>')">
							{{ucfirst($make->make_name)}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">New / used</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('new_used_minivan')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="new_used_minivan" name="new_used_minivan"
						value="{{request('new_used_minivan')? : '--'}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('new_used_minivan',' ')">-</div>
						<div class="ctm-option" onclick="setThis('new_used_minivan','new')">new</div>
						<div class="ctm-option" onclick="setThis('new_used_minivan','used')">used</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Fuel type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('fuel_type_minivan')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="fuel_type_minivan" value="{{request('fuel_type_minivan')? : '--'}}"
						name="fuel_type_minivan" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('fuel_type_minivan',' ')">-</div>
						@foreach(App\UsedCarFuelType::all() as $fuel)
						@if($fuel->fuel_tp_name !== 'lpg')
						<div class="ctm-option" onclick="setThis('fuel_type_minivan','<?= $fuel->fuel_tp_name?>')">
							{{$fuel->fuel_tp_name}}</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Steering wheel</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('str_wheel_minivan')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="str_wheel_minivan" name="str_wheel_minivan"
						value="{{request('str_wheel_minivan')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('str_wheel_minivan',' ')">-</div>
						@foreach(App\UsedStrWheel::all() as $wheel)
						<div class="ctm-option" onclick="setThis('str_wheel_minivan','<?= $wheel->wheel_name?>')">
							{{$wheel->wheel_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">color</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('color_minivan')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="color_minivan" value="{{request('color_minivan')}}" name="color_minivan"
						class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('color_minivan',' ')">-</div>
						@foreach(App\UsedCarColor::all() as $color)
						<div class="ctm-option" onclick="setThis('color_minivan','<?= $color->color_name?>')">
							{{$color->color_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Driven wheels</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('drivel_wheel_minivan')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="drivel_wheel_minivan" name="drivel_wheel_minivan"
						value="{{request('drivel_wheel_minivan')}}" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('drivel_wheel_minivan','')">-</div>
						@foreach(App\UsedCarDrivenWheel::all() as $drwheel)
						<div class="ctm-option"
							onclick="setThis('drivel_wheel_minivan','<?= $drwheel->driven_wheel_name?>')">
							{{ucfirst($drwheel->driven_wheel_name)}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Gearbox</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('gear_box_minivan')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="gear_box_minivan" value="{{request('gear_box_minivan')? : '--'}}"
						name="gear_box_minivan" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('gear_box_minivan',' ')">-</div>
						@foreach(App\UsedCarGearBox::all() as $gbox)
						@if($gbox->gear_box_name !== 'Semi automatic')
						<div class="ctm-option" onclick="setThis('gear_box_minivan','<?= $gbox->gear_box_name?>')">
							{{$gbox->gear_box_name}}</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Climate control</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('climate_contrl_minivan')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="climate_contrl_minivan" name="climate_contrl_minivan"
						value="{{request('climate_contrl_minivan')}}" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('climate_contrl_minivan','')">-</div>
						@foreach(App\UsedCarClimateControl::all() as $climate)
						<div class="ctm-option"
							onclick="setThis('climate_contrl_minivan','<?= $climate->climate_con_name?>')">
							{{ucfirst($climate->climate_con_name)}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mar-0 extra-sidebar-nav {{request('form_type') == 'autotrains'? 'active': 'd-none'}}">
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('type_autotrains')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="type_autotrains" name="type_autotrains"
						value="{{request('type_autotrains')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('type_autotrains',' ')">-</div>
						@foreach(App\AutoTrainType::all() as $type)
						<div class="ctm-option" onclick="setThis('type_autotrains','<?= $type->type_name?>')">
							{{$type->type_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Make</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('make_autotrains')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="make_autotrains" name="make_autotrains" class="make"
						value="{{request('make_autotrains')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('make_autotrains',' ')">-</div>
						@foreach(App\AutoTrainMake::all() as $bus_make)
						<div class="ctm-option" onclick="setThis('make_autotrains','<?= $bus_make->make_name ?>')">
							{{$bus_make->make_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Model</label>
			<div class="form-cnt">
				<input type="text" value="{{request('model_autotrains')}}" name="model_autotrains" class="form-control">
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">New / used</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('new_used_autotrains')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="new_used_autotrains" name="new_used_autotrains"
						value="{{request('new_used_autotrains')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('new_used_autotrains',' ')">-</div>
						<div class="ctm-option" onclick="setThis('new_used_autotrains','new')">new</div>
						<div class="ctm-option" onclick="setThis('new_used_autotrains','used')">used</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Fuel type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('fuel_type_autotrains')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="fuel_type_autotrains" name="fuel_type_autotrains" class=""
						value="{{request('fuel_type_autotrains')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('fuel_type_autotrains',' ')">-</div>
						@foreach(App\UsedCarFuelType::all() as $fuel)
						@if($fuel->fuel_tp_name !== 'lpg')
						<div class="ctm-option" onclick="setThis('fuel_type_autotrains','<?= $fuel->fuel_tp_name?>')">
							{{$fuel->fuel_tp_name}}</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label"> Steering wheel</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('str_wheel_autotrains')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="str_wheel_autotrains" name="str_wheel_autotrains"
						value="{{request('str_wheel_autotrains')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('str_wheel_autotrains',' ')">-</div>
						@foreach(App\UsedStrWheel::all() as $wheel)
						<div class="ctm-option" onclick="setThis('str_wheel_autotrains','<?= $wheel->wheel_name?>')">
							{{$wheel->wheel_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">color</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('color_autotrains')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="color_autotrains" name="color_autotrains" class=""
						value="{{request('color_autotrains')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('color_autotrains',' ')">-</div>
						@foreach(App\UsedCarColor::all() as $color)
						<div class="ctm-option" onclick="setThis('color_autotrains','<?= $color->color_name?>')">
							{{$color->color_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Sleeping beds</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('sleep_bed_autotrains')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="sleep_bed_autotrains" name="sleep_bed_autotrains"
						value="{{request('sleep_bed_autotrains')}}" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('sleep_bed_autotrains',' ')">-</div>
						@foreach(App\TruckSleepingBed::all() as $bed)
						<div class="ctm-option" onclick="setThis('sleep_bed_autotrains','<?= $bed->bed_name?>')">
							{{$bed->bed_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Gearbox</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('gear_box_autotrains')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="gear_box_autotrains" value="{{request('gear_box_autotrains')}}"
						name="gear_box_autotrains" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('gear_box_autotrains',' ')">-</div>
						@foreach(App\UsedCarGearBox::all() as $gbox)
						@if($gbox->gear_box_name !== 'Semi automatic')
						<div class="ctm-option" onclick="setThis('gear_box_autotrains','<?= $gbox->gear_box_name?>')">
							{{$gbox->gear_box_name}}</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Layout</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('layout_autotrains')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="layout_autotrains" name="layout_autotrains"
						value="{{request('layout_autotrains')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('layout_autotrains',' ')">-</div>
						@foreach(App\TruckLayout::all() as $layout)
						<div class="ctm-option" onclick="setThis('layout_autotrains','<?= $layout->layout_name?>')">
							{{$layout->layout_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mar-0 extra-sidebar-nav {{request('form_type') == 'semi-trailer-trucks'? 'active': 'd-none'}}">
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Make</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('make_trailer_trucks')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="make_trailer_trucks" name="make_trailer_trucks"
						value="{{request('make_trailer_trucks')}}" class="make" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('make_trailer_trucks',' ')">-</div>
						@foreach(App\SemiTrailerTruckMake::all() as $make)
						<div class="ctm-option" onclick="setThis('make_trailer_trucks','<?= $make->make_name?>')">
							{{$make->make_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Model</label>
			<div class="form-cnt">
				<input type="text" value="{{request('model_trailer_trucks')}}" name="model_trailer_trucks"
					class="form-control">
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">New / used</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('new_used_trailer_trucks')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="new_used_trailer_trucks" name="new_used_trailer_trucks"
						value="{{request('new_used_trailer_trucks')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('new_used_trailer_trucks',' ')">-</div>
						<div class="ctm-option" onclick="setThis('new_used_trailer_trucks','new')">new</div>
						<div class="ctm-option" onclick="setThis('new_used_trailer_trucks','used')">used</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Steering wheel</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('str_wheel_trailer_trucks')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="str_wheel_trailer_trucks" name="str_wheel_trailer_trucks"
						value="{{request('str_wheel_trailer_trucks')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('str_wheel_trailer_trucks',' ')">-</div>
						@foreach(App\UsedStrWheel::all() as $wheel)
						<div class="ctm-option"
							onclick="setThis('str_wheel_trailer_trucks','<?= $wheel->wheel_name?>')">
							{{$wheel->wheel_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">color</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('color_trailer_trucks')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="color_trailer_trucks" name="color_trailer_trucks" class=""
						value="{{request('color_trailer_trucks')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('color_trailer_trucks',' ')"> </div>
						@foreach(App\UsedCarColor::all() as $color)
						<div class="ctm-option" onclick="setThis('color_trailer_trucks','<?= $color->color_name?>')">
							{{$color->color_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Sleeping beds</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('sleep_bed_trailer_trucks')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="sleep_bed_trailer_trucks" value="{{request('sleep_bed_trailer_trucks')}}"
						name="sleep_bed_trailer_trucks" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('sleep_bed_trailer_trucks',' ')">-</div>
						@foreach(App\TruckSleepingBed::all() as $bed)
						<div class="ctm-option" onclick="setThis('sleep_bed_trailer_trucks','<?= $bed->bed_name?>')">
							{{$bed->bed_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Gearbox</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('gear_box_trailer_trucks')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="gear_box_trailer_trucks" name="gear_box_trailer_trucks"
						value="{{request('gear_box_trailer_trucks')}}" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('gear_box_trailer_trucks',' ')">-</div>
						@foreach(App\UsedCarGearBox::all() as $gbox)
						@if($gbox->gear_box_name !== 'Semi automatic')
						<div class="ctm-option"
							onclick="setThis('gear_box_trailer_trucks','<?= $gbox->gear_box_name?>')">
							{{$gbox->gear_box_name}}</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Layout</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('layout_trailer_trucks')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="layout_trailer_trucks" name="layout_trailer_trucks"
						value="{{request('layout_trailer_trucks')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('layout_trailer_trucks',' ')">-</div>
						@foreach(App\TruckLayout::all() as $layout)
						<div class="ctm-option" onclick="setThis('layout_trailer_trucks','<?= $layout->layout_name?>')">
							{{$layout->layout_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mar-0 extra-sidebar-nav {{request('form_type') == 'trucks'? 'active': 'd-none'}}">

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('type_trucks')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="type_trucks" name="type_trucks" value="{{request('type_trucks')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('type_trucks',' ')">-</div>
						@foreach(App\TruckType::all() as $type)
						<div class="ctm-option" onclick="setThis('type_trucks','<?= $type->type_name?>')">
							{{$type->type_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Make</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('make_trucks')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="make_trucks" name="make_trucks" class="make"
						value="{{request('make_trucks')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('make_trucks',' ')">-</div>
						@foreach(App\TruckMake::all() as $bus_make)
						<div class="ctm-option" onclick="setThis('make_trucks','<?= $bus_make->make_name ?>')">
							{{$bus_make->make_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Model</label>
			<div class="form-cnt">
				<input type="text" value="{{request('model_trucks')}}" name="model_trucks" class="form-control">
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">New / used</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('new_used_trucks')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="new_used_trucks" name="new_used_trucks"
						value="{{request('new_used_trucks')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('new_used_trucks',' ')">-</div>
						<div class="ctm-option" onclick="setThis('new_used_trucks','new')">new</div>
						<div class="ctm-option" onclick="setThis('new_used_trucks','used')">used</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Fuel type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('fuel_type_trucks')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="fuel_type_trucks" name="fuel_type_trucks"
						value="{{request('fuel_type_trucks')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('fuel_type_trucks',' ')">-</div>
						@foreach(App\UsedCarFuelType::all() as $fuel)
						@if($fuel->fuel_tp_name !== 'lpg')
						<div class="ctm-option" onclick="setThis('fuel_type_trucks','<?= $fuel->fuel_tp_name?>')">
							{{$fuel->fuel_tp_name}}</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Steering wheel</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('str_wheel_trucks')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="str_wheel_trucks" name="str_wheel_trucks"
						value="{{request('str_wheel_trucks')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('str_wheel_trucks',' ')">-</div>
						@foreach(App\UsedStrWheel::all() as $wheel)
						<div class="ctm-option" onclick="setThis('str_wheel_trucks','<?= $wheel->wheel_name?>')">
							{{$wheel->wheel_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Gearbox</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('gear_box_trucks')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="gear_box_trucks" value="{{request('gear_box_trucks')}}"
						name="gear_box_trucks" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('gear_box_trucks',' ')">-</div>
						@foreach(App\UsedCarGearBox::all() as $gbox)
						@if($gbox->gear_box_name !== 'Semi automatic')
						<div class="ctm-option" onclick="setThis('gear_box_trucks','<?= $gbox->gear_box_name?>')">
							{{$gbox->gear_box_name}}</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Sleeping beds</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('sleep_bed_trucks')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="sleep_bed_trucks" name="sleep_bed_trucks" class=""
						value="{{request('sleep_bed_trucks')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('sleep_bed_trucks',' ')">-</div>
						@foreach(App\TruckSleepingBed::all() as $bed)
						<div class="ctm-option" onclick="setThis('sleep_bed_trucks','<?= $bed->bed_name?>')">
							{{$bed->bed_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">color</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('color_trucks')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="color_trucks" name="color_trucks" value="{{request('color_trucks')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('color_trucks',' ')">-</div>
						@foreach(App\UsedCarColor::all() as $color)
						<div class="ctm-option" onclick="setThis('color_trucks','<?= $color->color_name?>')">
							{{$color->color_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Layout</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('layout_trucks')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="layout_trucks" name="layout_trucks" value="{{request('layout_trucks')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('layout_trucks',' ')">-</div>
						@foreach(App\TruckLayout::all() as $layout)
						<div class="ctm-option" onclick="setThis('layout_trucks','<?= $layout->layout_name?>')">
							{{$layout->layout_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

</div>


<div class="row mar-0 extra-sidebar-nav {{request('form_type') == 'motorcycles'? 'active': 'd-none'}} ">
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Motorcycles Type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('type_motorcycles')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="type_motorcycles" name="type_motorcycles" value="{{request('type_motorcycles')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('type_motorcycles',' ')">-</div>
						@foreach(App\MotorcycleType:: all() as $motorcycle)
						<div class="ctm-option" onclick="setThis('type_motorcycles','<?= $motorcycle->type_name?>')">
							{{$motorcycle->type_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">New / used</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('new_used_motorcycles')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="" name="new_used_motorcycles" value="{{request('new_used_motorcycles')}}" class="new_used_motorcycles" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('new_used_motorcycles',' ')">-</div>
						<div class="ctm-option" onclick="setThis('new_used_motorcycles','new')">new</div>
						<div class="ctm-option" onclick="setThis('new_used_motorcycles','used')">used</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Make</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('make_motorcycles')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="" name="make_motorcycles" value="{{request('make_motorcycles')}}" class="make" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('make_motorcycles',' ')">-</div>
						@foreach(App\MotorcycleMake::orderBy('make_name')->get() as $make)
						<div class="ctm-option" onclick="setThis('make_motorcycles','<?= $make->make_name?>')">
							{{$make->make_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Cooling system type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('cooling_type_motorcycles')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="cooling_type_motorcycles" value="{{request('cooling_type_motorcycles')}}" name="cooling_type_motorcycles"
						 />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('cooling_type_motorcycles',' ')">-</div>
						@foreach(App\MotorcycleCoolingSystemType:: all() as $motorcycle)
						<div class="ctm-option"
							onclick="setThis('cooling_type_motorcycles','<?= $motorcycle->type_name?>')">
							{{$motorcycle->type_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Fuel type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('fuel_type_motorcycles')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="fuel_type_motorcycles" value="{{request('fuel_type_motorcycles')}}" name="fuel_type_motorcycles" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('fuel_type_motorcycles',' ')">-</div>
						@foreach(App\UsedCarFuelType::all() as $fuel)
						@if($fuel->fuel_tp_name !== 'lpg')
						<div class="ctm-option" onclick="setThis('fuel_type_motorcycles','<?= $fuel->fuel_tp_name?>')">
							{{$fuel->fuel_tp_name}}</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Engine type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('engine_type_motorcycles')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="engine_type_motorcycles" name="engine_type_motorcycles" value="{{request('engine_type_motorcycles')}}" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('engine_type_motorcycles',' ')">-</div>
						<div class="ctm-option" onclick="setThis('engine_type_motorcycles','two-stroke')">two-stroke
						</div>
						<div class="ctm-option" onclick="setThis('engine_type_motorcycles','four-stroke')">four-stroke
						</div>
						<div class="ctm-option" onclick="setThis('engine_type_motorcycles','other')">other</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">color</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('color_motorcycles')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="color_motorcycles" value="{{request('color_motorcycles')}}" name="color_motorcycles" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('color_motorcycles',' ')">-</div>
						@foreach(App\UsedCarColor::all() as $color)
						<div class="ctm-option" onclick="setThis('color_motorcycles','<?= $color->color_name?>')">
							{{$color->color_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mar-0 extra-sidebar-nav {{request('form_type') == 'trailers-and-semitrailers'? 'active': 'd-none'}}">
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Trailer / semi-trailer</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('trailer_semitrailers')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="trailer_semitrailers" value="{{request('trailer_semitrailers')}}" name="trailer_semitrailers" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('trailer_semitrailers',' ')">-</div>
						<div class="ctm-option" onclick="setThis('trailer_semitrailers','Trailer')">Trailer</div>
						<div class="ctm-option" onclick="setThis('trailer_semitrailers','Semi-trailer')">Semi-trailer
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('type_semitrailers')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="type_semitrailers" name="type_semitrailers" value="{{request('type_semitrailers')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('type_semitrailers',' ')">-</div>
						@foreach(App\TrailerSemitrailersType::all() as $type)
						<div class="ctm-option" onclick="setThis('type_semitrailers','<?= $type->type_name?>')">
							{{$type->type_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">New / used</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('new_used_semitrailers')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="" name="new_used_semitrailers" value="{{request('new_used_semitrailers')}}" class="new_used_semitrailers" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('new_used_semitrailers',' ')">-</div>
						<div class="ctm-option" onclick="setThis('new_used_semitrailers','new')">new</div>
						<div class="ctm-option" onclick="setThis('new_used_semitrailers','used')">used</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Make</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('make_semitrailers')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="" name="make_semitrailers" value="{{request('make_semitrailers')}}" class="make" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('make_semitrailers',' ')">-</div>
						@foreach(App\TrailerSemitrailersMake::all() as $make)
						<div class="ctm-option" onclick="setThis('make_semitrailers','<?= $make->make_name ?>')">
							{{$make->make_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Model</label>
			<div class="form-cnt">
				<input type="text" value="{{request('model_semitrailers')}}" name="model_semitrailers" class="form-control">
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Axles make</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('alx_make_semitrailers')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="alx_make_semitrailers" name="alx_make_semitrailers" value="{{request('alx_make_semitrailers')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('alx_make_semitrailers',' ')">-</div>
						@foreach(App\TrailerSemitrailersAxlesMake::all() as $make)
						<div class="ctm-option"
							onclick="setThis('alx_make_semitrailers','<?= $make->alx_make_name ?>')">
							{{$make->alx_make_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Number of axles</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('semi_axl_num_semitrailers')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="semi_axl_num_semitrailers" name="semi_axl_num_semitrailers" value="{{request('semi_axl_num_semitrailers')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('semi_axl_num_semitrailers',' ')">0</div>
						<div class="ctm-option" onclick="setThis('semi_axl_num_semitrailers','1')">1</div>
						<div class="ctm-option" onclick="setThis('semi_axl_num_semitrailers','2')">2</div>
						<div class="ctm-option" onclick="setThis('semi_axl_num_semitrailers','3')">3</div>
						<div class="ctm-option" onclick="setThis('semi_axl_num_semitrailers','>3')">>3</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">color</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('color_semitrailers')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="color__semitrailers" value="{{request('color_semitrailers')}}" name="color_semitrailers" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('color_semitrailers',' ')">-</div>
						@foreach(App\UsedCarColor::all() as $color)
						<div class="ctm-option" onclick="setThis('color_semitrailers','<?= $color->color_name?>')">
							{{$color->color_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mar-0 extra-sidebar-nav {{request('form_type') == 'buses'? 'active': 'd-none'}}">

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('type_bus')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="type_bus" name="type_bus" value="{{request('type_bus')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('type_bus',' ')">-</div>
						@foreach(App\BusesType::all() as $bus_type)
						<div class="ctm-option" onclick="setThis('type_bus','<?= $bus_type->type_name?>')">
							{{$bus_type->type_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Make</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('make_bus')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="make_bus" name="make_bus" value="{{request('make_bus')}}" class="make" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('make_bus',' ')">-</div>
						@foreach(App\BusesMake::orderBy('make_name')->get()->sortBy('make_name',
						SORT_NATURAL|SORT_FLAG_CASE); as $bus_make)
						<div class="ctm-option" onclick="setThis('make_bus','<?= $bus_make->make_name ?>')">
							{{$bus_make->make_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Model</label>
			<div class="form-cnt">
				<input type="text" value="{{request('model_bus')}}" name="model_bus" class="form-control">
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Number of seats</label>
			<div class="form-cnt">
				<input type="number" value="{{request('seat_num_bus')}}" id="seat_num_bus" name="seat_num_bus" class="form-control" min="1">
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">New / used</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('new_used_bus')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="new_used_bus" name="new_used_bus" value="{{request('new_used_bus')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('new_used_bus',' ')">-</div>
						<div class="ctm-option" onclick="setThis('new_used_bus','new')">new</div>
						<div class="ctm-option" onclick="setThis('new_used_bus','used')">used</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Fuel type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('fuel_type_bus')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="fuel_type_bus" name="fuel_type_bus" value="{{request('fuel_type_bus')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('fuel_type_bus',' ')">-</div>
						@foreach(App\UsedCarFuelType::all() as $fuel)
						@if($fuel->fuel_tp_name !== 'lpg')
						<div class="ctm-option" onclick="setThis('fuel_type_bus','<?= $fuel->fuel_tp_name?>')">
							{{$fuel->fuel_tp_name}}</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Steering wheel</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('str_wheel_bus')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="str_wheel_bus" name="str_wheel_bus" value="{{request('str_wheel_bus')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('str_wheel_bus',' ')">-</div>
						@foreach(App\UsedStrWheel::all() as $wheel)
						<div class="ctm-option" onclick="setThis('str_wheel_bus','<?= $wheel->wheel_name?>')">
							{{$wheel->wheel_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Gearbox</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('gear_box_bus')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="gear_box_bus" name="gear_box_bus" value="{{request('gear_box_bus')}}" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('gear_box_bus',' ')">-</div>
						@foreach(App\UsedCarGearBox::all() as $gbox)
						@if($gbox->gear_box_name !== 'Semi automatic')
						<div class="ctm-option" onclick="setThis('gear_box_bus','<?= $gbox->gear_box_name?>')">
							{{$gbox->gear_box_name}}</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Climate control</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('climate_contrl_bus')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="climate_contrl_bus" name="climate_contrl_bus" value="{{request('climate_contrl_bus')}}" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('climate_contrl_bus',' ')">-</div>
						@foreach(App\UsedCarClimateControl::all() as $climate)
						<div class="ctm-option"
							onclick="setThis('climate_contrl_bus','<?= $climate->climate_con_name?>')">
							{{ucfirst($climate->climate_con_name)}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">color</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('color_bus')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="color_bus" name="color_bus" value="{{request('color_bus')}}" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('color_bus',' ')">-</div>
						@foreach(App\UsedCarColor::all() as $color)
						<div class="ctm-option" onclick="setThis('color_bus','<?= $color->color_name?>')">
							{{$color->color_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Number of doors</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('doors_number_bus')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="doors_number_bus" name="doors_number_bus" value="{{request('doors_number_bus')}}" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('doors_number_bus',' ')">-</div>
						@foreach(App\UsedCarDoor::all() as $doors)
						<div class="ctm-option" onclick="setThis('doors_number_bus','<?= $doors->doors?>')">
							{{$doors->doors}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

</div>


<div
	class="row mar-0 extra-sidebar-nav {{request('form_type') == 'recreational-vehicles-campers'? 'active': 'd-none'}}">

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('type_vehicles_campers')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="type_vehicles_campers" value="{{request('type_vehicles_campers')}}" name="type_vehicles_campers"  />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('type_vehicles_campers',' ')">-</div>
						@foreach(App\CampersType::all() as $campare)
						<div class="ctm-option" onclick="setThis('type_vehicles_campers','<?= $campare->type_name?>')">
							{{$campare->type_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Make</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('make_vehicles_campers')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="make_vehicles_campers" value="{{request('make_vehicles_campers')}}" name="make_vehicles_campers" class="make" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('make_vehicles_campers',' ')">-</div>
						@foreach(App\BusesMake::orderBy('make_name')->get()->sortBy('make_name',
						SORT_NATURAL|SORT_FLAG_CASE) as $bus_make)
						<div class="ctm-option"
							onclick="setThis('make_vehicles_campers','<?= $bus_make->make_name ?>')">
							{{$bus_make->make_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Model</label>
			<div class="form-cnt">
				<input type="text" value="{{request('model_vehicles_campers')}}<" name="model_vehicles_campers" class="form-control">
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Number of beds</label>
			<div class="form-cnt">
				<input type="text" value="{{request('bed_num_vehicles_campers')}}" name="bed_num_vehicles_campers" id="bed_num_vehicles_campers"
					class="form-control required" min="1">
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Number of seats</label>
			<div class="form-cnt">
				<input type="number" value="{{request('seat_num_vehicles_campers')}}" id="seat_num_vehicles_campers" name="seat_num_vehicles_campers"
					class="form-control" min="1">
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">New / used</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('new_used_vehicles_campers')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="new_used_vehicles_campers" value="{{request('new_used_vehicles_campers')}}" name="new_used_vehicles_campers" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('new_used_vehicles_campers',' ')">-</div>
						<div class="ctm-option" onclick="setThis('new_used_vehicles_campers','new')">new</div>
						<div class="ctm-option" onclick="setThis('new_used_vehicles_campers','used')">used</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Fuel type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('fuel_type_vehicles_campers')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="fuel_type_vehicles_campers" name="fuel_type_vehicles_campers" value="{{request('fuel_type_vehicles_campers')}}"/>
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('fuel_type_vehicles_campers',' ')">-</div>
						@foreach(App\UsedCarFuelType::all() as $fuel)
						@if($fuel->fuel_tp_name !== 'lpg')
						<div class="ctm-option"
							onclick="setThis('fuel_type_vehicles_campers','<?= $fuel->fuel_tp_name?>')">
							{{$fuel->fuel_tp_name}}</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label"> Steering wheel</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('str_wheel_vehicles_campers')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="str_wheel_vehicles_campers" name="str_wheel_vehicles_campers"
						value="{{request('str_wheel_vehicles_campers')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('str_wheel_vehicles_campers',' ')">-</div>
						@foreach(App\UsedStrWheel::all() as $wheel)
						<div class="ctm-option"
							onclick="setThis('str_wheel_vehicles_campers','<?= $wheel->wheel_name?>')">
							{{$wheel->wheel_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Gearbox</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('gear_box_vehicles_campers')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="gear_box_vehicles_campers" name="gear_box_vehicles_campers" value="{{request('gear_box_vehicles_campers')}}" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('gear_box_vehicles_campers',' ')"> -</div>
						@foreach(App\UsedCarGearBox::all() as $gbox)
						@if($gbox->gear_box_name !== 'Semi automatic')
						<div class="ctm-option"
							onclick="setThis('gear_box_vehicles_campers','<?= $gbox->gear_box_name?>')">
							{{$gbox->gear_box_name}}</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Climate control</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('climate_contrl_vehicles_campers')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="climate_contrl_vehicles_campers" value="{{request('climate_contrl_vehicles_campers')}}" name="climate_contrl_vehicles_campers"
						class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('climate_contrl_vehicles_campers',' ')">-</div>
						@foreach(App\UsedCarClimateControl::all() as $climate)
						<div class="ctm-option"
							onclick="setThis('climate_contrl_vehicles_campers','<?= $climate->climate_con_name?>')">
							{{ucfirst($climate->climate_con_name)}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Driven wheels</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('drivel_wheel_vehicles_campers')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="drivel_wheel_vehicles_campers" value="{{request('drivel_wheel_vehicles_campers')}}" name="drivel_wheel_vehicles_campers"
						class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('drivel_wheel_vehicles_campers',' ')">-</div>
						@foreach(App\UsedCarDrivenWheel::all() as $drwheel)
						<div class="ctm-option"
							onclick="setThis('drivel_wheel_vehicles_campers','<?= $drwheel->driven_wheel_name?>')">
							{{ucfirst($drwheel->driven_wheel_name)}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">color</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('color_vehicles_campers')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="color_vehicles_campers" value="{{request('color_vehicles_campers')}}" name="color_vehicles_campers" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('color_vehicles_campers',' ')">-</div>
						@foreach(App\UsedCarColor::all() as $color)
						<div class="ctm-option" onclick="setThis('color_vehicles_campers','<?= $color->color_name?>')">
							{{$color->color_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<div class="row mar-0 extra-sidebar-nav {{request('form_type') == 'minibus'? 'active': 'd-none'}}">
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Minivan Type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('type_minibus')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="type_minibus" name="type_minibus" value="{{request('type_minibus')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('type_minibus',' ')">-</div>
						@foreach(App\MiniBusType::all() as $body)
						<div class="ctm-option" onclick="setThis('type_minibus','<?= $body->type_name?>')">
							{{$body->type_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Make</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('make_minibus')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="make_minibus" name="make_minibus" value="{{request('make_minibus')}}" class="make" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('make_minibus',' ')">-</div>
						@foreach(App\MiniBusMake::orderBy('make_name')->get()->sortBy('make_name',
						SORT_NATURAL|SORT_FLAG_CASE) as $make)
						<div class="ctm-option" onclick="setThis('make_minibus','<?= $make->make_name ?>')">
							{{ucfirst($make->make_name)}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">New / used</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('new_used_minibus')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="new_used_minibus" name="new_used_minibus" value="{{request('new_used_minibus')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('new_used_minibus',' ')">-</div>
						<div class="ctm-option" onclick="setThis('new_used_minibus','new')">new</div>
						<div class="ctm-option" onclick="setThis('new_used_minibus','used')">used</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Fuel type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('fuel_type_minibus')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="fuel_type_minibus" value="{{request('fuel_type_minibus')}}" name="fuel_type_minibus" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('fuel_type_minibus',' ')">-</div>
						@foreach(App\UsedCarFuelType::all() as $fuel)
						@if($fuel->fuel_tp_name !== 'lpg')
						<div class="ctm-option" onclick="setThis('fuel_type_minibus','<?= $fuel->fuel_tp_name?>')">
							{{$fuel->fuel_tp_name}}</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Steering wheel</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('str_wheel_minibus')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="str_wheel_minibus" value="{{request('str_wheel_minibus')}}" name="str_wheel_minibus" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('str_wheel_minibus',' ')">-</div>
						@foreach(App\UsedStrWheel::all() as $wheel)
						<div class="ctm-option" onclick="setThis('str_wheel_minibus','<?= $wheel->wheel_name?>')">
							{{$wheel->wheel_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">color</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('color_minibus')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="color_minibus" value="{{request('color_minibus')}}" name="color_minibus" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('color_minibus',' ')">-</div>
						@foreach(App\UsedCarColor::all() as $color)
						<div class="ctm-option" onclick="setThis('color_minibus','<?= $color->color_name?>')">
							{{$color->color_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Driven wheels</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('drivel_wheel_minibus')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="drivel_wheel_minibus" value="{{request('drivel_wheel_minibus')}}" name="drivel_wheel_minibus" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('drivel_wheel_minibus',' ')">-</div>
						@foreach(App\UsedCarDrivenWheel::all() as $drwheel)
						<div class="ctm-option"
							onclick="setThis('drivel_wheel_minibus','<?= $drwheel->driven_wheel_name?>')">
							{{ucfirst($drwheel->driven_wheel_name)}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Gearbox</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('gear_box_minibus')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="gear_box_minibus" value="{{request('gear_box_minibus')}}" name="gear_box_minibus" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('gear_box_minibus',' ')">-</div>
						@foreach(App\UsedCarGearBox::all() as $gbox)
						@if($gbox->gear_box_name !== 'Semi automatic')
						<div class="ctm-option" onclick="setThis('gear_box_minibus','<?= $gbox->gear_box_name?>')">
							{{$gbox->gear_box_name}}</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Climate control</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('climate_contrl_minibus')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="climate_contrl_minibus" value="{{request('climate_contrl_minibus')}}" name="climate_contrl_minibus" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('climate_contrl_minibus','')">-</div>
						@foreach(App\UsedCarClimateControl::all() as $climate)
						<div class="ctm-option"
							onclick="setThis('climate_contrl_minibus','<?= $climate->climate_con_name?>')">
							{{ucfirst($climate->climate_con_name)}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mar-0 extra-sidebar-nav {{request('form_type') == 'passenger-vans'? 'active': 'd-none'}}">
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Make</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('make_passenger_vans')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="make_passenger_vans" value="{{request('make_passenger_vans')}}" name="make_passenger_vans" class="make" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('make_passenger_vans',' ')">-</div>
						@foreach(App\UsedCarMake::orderBy('make_name')->get()->sortBy('make_name',
						SORT_NATURAL|SORT_FLAG_CASE) as $make)
						<div class="ctm-option" onclick="setThis('make_passenger_vans','<?= $make->make_name?>')">
							{{ucfirst($make->make_name)}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">New / used</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('new_used_passenger_vans')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="" name="new_used_passenger_vans" value="{{request('new_used_passenger_vans')}}" class="new_used" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('new_used_passenger_vans',' ')">-</div>
						<div class="ctm-option" onclick="setThis('new_used_passenger_vans','new')">new</div>
						<div class="ctm-option" onclick="setThis('new_used_passenger_vans','used')">used</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Body Type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('body_type_passenger_vans')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="body_type" value="{{request('body_type_passenger_vans')}}" name="body_type_passenger_vans" class="body_type" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('body_type_passenger_vans',' ')">-</div>
						@foreach(App\UsedCarBodyType::all() as $body)
						<div class="ctm-option"
							onclick="setThis('body_type_passenger_vans','<?= $body->body_tp_name?>')">
							{{$body->body_tp_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Fuel Type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('fuel_type_passenger_vans')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="fuel_type" name="fuel_type_passenger_vans" value="{{request('fuel_type_passenger_vans')}}" class="fuel_type" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('fuel_type_passenger_vans',' ')">-</div>
						@foreach(App\UsedCarFuelType::all() as $fuel)
						@if($fuel->fuel_tp_name !== 'lpg')
						<div class="ctm-option"
							onclick="setThis('fuel_type_passenger_vans','<?= $fuel->fuel_tp_name?>')">
							{{$fuel->fuel_tp_name}}</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Gear Box</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('gear_box_passenger_vans')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="gear_box_passenger_vans" name="gear_box_passenger_vans" value="{{request('gear_box_passenger_vans')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('gear_box_passenger_vans',' ')">-</div>
						@foreach(App\UsedCarGearBox::all() as $gbox)
						@if($gbox->gear_box_name !== 'Semi automatic')
						<div class="ctm-option"
							onclick="setThis('gear_box_passenger_vans','<?= $gbox->gear_box_name?>')">
							{{$gbox->gear_box_name}}</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Number of doors</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('doors_number_passenger_vans')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="doors_number_passenger_vans"  name="doors_number_passenger_vans"
						value="{{request('doors_number_passenger_vans')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('doors_number_passenger_vans',' ')">-</div>
						@foreach(App\UsedCarDoor::all() as $doors)
						<div class="ctm-option" onclick="setThis('doors_number_passenger_vans','<?= $doors->doors?>')">
							{{$doors->doors}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">color</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('color_passenger_vans')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="color_passenger_vans" value="{{request('color_passenger_vans')}}" name="color_passenger_vans" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('color_passenger_vans',' ')">-</div>
						@foreach(App\UsedCarColor::all() as $color)
						<div class="ctm-option" onclick="setThis('color_passenger_vans','<?= $color->color_name?>')">
							{{$color->color_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mar-0 extra-sidebar-nav {{request('form_type') == 'boats-rafts'? 'active': 'd-none'}}">

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('type_boat_raft')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="type_boat_raft" name="type_boat_raft" value="{{request('type_boat_raft')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('type_boat_raft', ' ')">-</div>
						@foreach(App\BoatsRaftsType::all() as $type)
						<div class="ctm-option" onclick="setThis('type_boat_raft', '<?= $type->type_name?>')">
							{{$type->type_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Model</label>
			<div class="form-cnt">
				<input type="text" value="{{request('model_boat_raft')}}" name="model_boat_raft" class="form-control">
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Number of seats</label>
			<div class="form-cnt">
				<input type="number" id="seat_num_boat_rafts" value="{{request('seat_num_boat_raft')}}" name="seat_num_boat_raft" class="form-control" min="1">
			</div>
		</div>
	</div>
	<div class="col-12 p-0">

		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">New / used</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('new_used_boat_raft')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id=""  value="{{request('new_used_boat_raft')}}" name="new_used_boat_raft" class="new_used" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('new_used_boat_raft',' ')">-</div>
						<div class="ctm-option" onclick="setThis('new_used_boat_raft','new')">new</div>
						<div class="ctm-option" onclick="setThis('new_used_boat_raft','used')">used</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Fuel Type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('fuel_type_boat_raft')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="fuel_type" value="{{request('fuel_type_boat_raft')}}" name="fuel_type_boat_raft" class="fuel_type" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('fuel_type_boat_raft',' ')">-</div>
						@foreach(App\UsedCarFuelType::all() as $fuel)
						@if($fuel->fuel_tp_name !== 'lpg')
						<div class="ctm-option" onclick="setThis('fuel_type_boat_raft','<?= $fuel->fuel_tp_name?>')">
							{{$fuel->fuel_tp_name}}</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">color</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('color_boat_raft')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="color_boat_raft" value="{{request('color_boat_raft')}}" name="color_boat_raft" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('color_boat_raft',' ')">-</div>
						@foreach(App\UsedCarColor::all() as $color)
						<div class="ctm-option" onclick="setThis('color_boat_raft','<?= $color->color_name?>')">
							{{$color->color_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mar-0 extra-sidebar-nav {{request('form_type') == 'personal-watercraft'? 'active': 'd-none'}}">

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Manufacturer</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('manufacturer_watercraft')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="manufacturer_watercraft" name="manufacturer_watercraft" value="{{request('manufacturer_watercraft')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('manufacturer_watercraft', ' ')">-</div>
						@foreach(App\JetSkisManufacturer::all() as $manufacturer)
						<div class="ctm-option"
							onclick="setThis('manufacturer_watercraft', '<?= $manufacturer->manufecturer_name?>')">
							{{$manufacturer->manufecturer_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Model</label>
			<div class="form-cnt">
				<input type="text" name="model_watercraft" value="{{request('model_watercraft')}}" class="form-control">
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Number of seats</label>
			<div class="form-cnt">
				<input type="number" id="seat_num_watercraft"  value="{{request('seat_num_watercraft')}}" name="seat_num_watercraft" class="form-control" min="1">
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">New / used</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('new_used_watercraft')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="" name="new_used_watercraft" value="{{request('new_used_watercraft')}}" class="new_used" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('new_used_watercraft',' ')">-</div>
						<div class="ctm-option" onclick="setThis('new_used_watercraft','new')">new</div>
						<div class="ctm-option" onclick="setThis('new_used_watercraft','used')">used</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Fuel Type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('fuel_type_watercraft')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="" name="fuel_type_watercraft" value="{{request('fuel_type_watercraft')}}" class="fuel_type" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('fuel_type_watercraft',' ')">-</div>
						@foreach(App\UsedCarFuelType::all() as $fuel)
						@if($fuel->fuel_tp_name !== 'lpg')
						<div class="ctm-option" onclick="setThis('fuel_type_watercraft','<?= $fuel->fuel_tp_name?>')">
							{{$fuel->fuel_tp_name}}</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Engine(s) type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('eng_type_watercraft')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="eng_type_watercraft" value="{{request('eng_type_watercraft')}}" name="eng_type_watercraft" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('eng_type_watercraft',' ')">-</div>
						<div class="ctm-option" onclick="setThis('eng_type_watercraft','Two-stroke')">Two-stroke</div>
						<div class="ctm-option" onclick="setThis('eng_type_watercraft','Four-stroke')">Four-stroke</div>
						<div class="ctm-option" onclick="setThis('eng_type_watercraft','Other')">Other</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">color</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('color_watercraft')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="color_watercraft" name="color_watercraft" value="{{request('color_watercraft')}}" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('color_watercraft',' ')">-</div>
						@foreach(App\UsedCarColor::all() as $color)
						<div class="ctm-option" onclick="setThis('color_watercraft','<?= $color->color_name?>')">
							{{$color->color_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mar-0 extra-sidebar-nav {{request('form_type') == 'kayaks-canoes'? 'active': 'd-none'}}">

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Kayaks / canoes</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('kay_can')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="kay_can" name="kay_can" value="{{request('kay_can')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('kay_can', ' ')">-</div>
						<div class="ctm-option" onclick="setThis('kay_can', 'Kayaks')">Kayaks</div>
						<div class="ctm-option" onclick="setThis('kay_can', 'Canoes')">Canoes</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('type_kay_can')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="type_kay_can" name="type_kay_can" value="{{request('type_kay_can')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('type_kay_can',' ')">-</div>
						@foreach(App\KayaksCanoesType::all() as $type)
						<div class="ctm-option" onclick="setThis('type_kay_can','<?= $type->type_name?>')">
							{{$type->type_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Model</label>
			<div class="form-cnt">
				<input type="text" value="{{request('model_kay_can')}}" name="model_kay_can" class="form-control">
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Manufacturer</label>
			<div class="form-cnt">
				<input type="text" id="manufacturer_kay_can" value="{{request('manufacturer_kay_can')}}" name="manufacturer_kay_can" class="form-control required">
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Number of seats</label>
			<div class="form-cnt">
				<input type="number" id="seat_num_kay_can" value="{{request('seat_num_kay_can')}}" name="seat_num_kay_can" class="form-control" min="1">
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">New / used</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('new_used_kay_can')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="" name="new_used_kay_can" value="{{request('new_used_kay_can')}}"  class="new_used" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('new_used_kay_can',' ')">-</div>
						<div class="ctm-option" onclick="setThis('new_used_kay_can','new')">new</div>
						<div class="ctm-option" onclick="setThis('new_used_kay_can','used')">used</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">color</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('color_kay_can')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="color_kay_can" name="color_kay_can" value="{{request('color_kay_can')}}" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('color_kay_can',' ')">-</div>
						@foreach(App\UsedCarColor::all() as $color)
						<div class="ctm-option" onclick="setThis('color_kay_can','<?= $color->color_name?>')">
							{{$color->color_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mar-0 extra-sidebar-nav {{request('form_type') == 'motorboats'? 'active': 'd-none'}}">

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Purpose of a boat</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('boat_purpose')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="boat_purpose" name="boat_purpose" value="{{request('boat_purpose')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('boat_purpose',' ')">-</div>
						@foreach(App\MotorboatsPerposeofBoat::all() as $perpose)
						<div class="ctm-option" onclick="setThis('boat_purpose','<?= $perpose->perpose?>')">
							{{$perpose->perpose}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('type_motorboats')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="type_motorboats" name="type_motorboats" value="{{request('type_motorboats')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('type_motorboats',' ')">-</div>
						@foreach(App\MotorboatsType::all() as $type)
						<div class="ctm-option" onclick="setThis('type_motorboats','<?= $type->type_name?>')">
							{{$type->type_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Model</label>
			<div class="form-cnt">
				<input type="text" value="{{request('model_motorboats')}}" name="model_motorboats" class="form-control">
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Manufacturer</label>
			<div class="form-cnt">
				<input type="text" id="manufacturer_motorboats" value="{{request('manufacturer_motorboats')}}" name="manufacturer_motorboats"
					class="form-control">
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">New / used</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('new_used_motorboats')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="" name="new_used_motorboats" value="{{request('new_used_motorboats')}}" class="new_used" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('new_used_motorboats',' ')">-</div>
						<div class="ctm-option" onclick="setThis('new_used_motorboats','new')">new</div>
						<div class="ctm-option" onclick="setThis('new_used_motorboats','used')">used</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Fuel Type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('fuel_type_motorboats')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="fuel_type_motorboats" value="{{request('fuel_type_motorboats')}}" name="fuel_type_motorboats"  />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('fuel_type_motorboats',' ')">-</div>
						@foreach(App\UsedCarFuelType::all() as $fuel)
						@if($fuel->fuel_tp_name !== 'lpg')
						<div class="ctm-option" onclick="setThis('fuel_type_motorboats','<?= $fuel->fuel_tp_name?>')">
							{{$fuel->fuel_tp_name}}</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Engine(s) type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('eng_type_motorboats')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="eng_type_motorboats" value="{{request('eng_type_motorboats')}}" name="eng_type_motorboats" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('eng_type_motorboats',' ')">-</div>
						@foreach(App\MotorboatsEngineType::all() as $type)
						<div class="ctm-option" onclick="setThis('eng_type_motorboats','<?= $type->type_name?>')">
							{{$type->type_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Number of engines</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('eng_num_motorboats')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="eng_num_motorboats" value="{{request('eng_num_motorboats')}}" name="eng_num_motorboats" class="" />
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
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">color</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('color_motorboats')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="color_motorboats" value="{{request('color_motorboats')}}" name="color_motorboats" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('color_motorboats',' ')">-</div>
						@foreach(App\UsedCarColor::all() as $color)
						<div class="ctm-option" onclick="setThis('color_motorboats','<?= $color->color_name?>')">
							{{$color->color_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row mar-0 extra-sidebar-nav {{request('form_type') == 'motors-and-engines'? 'active': 'd-none'}}">

	<div class="col-12 p-0">

		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Engine(s) type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('eng_type_engines')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="eng_type_engines" name="eng_type_engines" value="{{request('eng_type_engines')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('eng_type_engines',' ')">-</div>
						@foreach(App\MotorsandEngineEngineType::all() as $type)
						<div class="ctm-option" onclick="setThis('eng_type_engines','<?= $type->type_name?>')">
							{{$type->type_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Engine make</label>
			<div class="form-cnt">
				<input type="text" id="eng_make_engines" value="{{request('eng_make_engines')}}" name="eng_make_engines" class="form-control required">
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Engine model</label>
			<div class="form-cnt">
				<input type="text" id="eng_model_engines" value="{{request('eng_model_engines')}}" name="eng_model_engines" class="form-control required">
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">New / used</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('new_used_engines')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="" name="new_used_engines" value="{{request('new_used_engines')}}" class="new_used" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('new_used_engines',' ')">-</div>
						<div class="ctm-option" onclick="setThis('new_used_engines','new')">new</div>
						<div class="ctm-option" onclick="setThis('new_used_engines','used')">used</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Fuel Type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('fuel_type_engines')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="fuel_type_engines" name="fuel_type_engines" value="{{request('fuel_type_engines')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('fuel_type_engines',' ')">-</div>
						@foreach(App\UsedCarFuelType::all() as $fuel)
						@if($fuel->fuel_tp_name !== 'lpg')
						<div class="ctm-option" onclick="setThis('fuel_type_engines','<?= $fuel->fuel_tp_name?>')">
							{{$fuel->fuel_tp_name}}</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mar-0 extra-sidebar-nav {{request('form_type') == 'water-transport-other'? 'active': 'd-none'}}">

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Product name</label>
			<div class="form-cnt">
				<input type="text" id="product_name" value="{{request('product_name')}}" name="product_name" class="form-control">
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Manufacturer</label>
			<div class="form-cnt">
				<input type="text" name="manufacturer_other" value="{{request('manufacturer_other')}}" id="manufacturer_other" class="form-control">
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Model</label>
			<div class="form-cnt">
				<input type="text" name="model_other" value="{{request('model_other')}}" id="model_other" class="form-control">
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Number of seats</label>
			<div class="form-cnt">
				<input type="number" id="seat_num_other" value="{{request('seat_num_other')? : '--'}}" name="seat_num_other" class="form-control" min="1">
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">New / used</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('new_used_other')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="" name="new_used_other" value="{{request('new_used_other')}}" class="new_used" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('new_used_other',' ')">-</div>
						<div class="ctm-option" onclick="setThis('new_used_other','new')">new</div>
						<div class="ctm-option" onclick="setThis('new_used_other','used')">used</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Fuel Type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('fuel_type_other')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="fuel_type_other" name="fuel_type_other" value="{{request('fuel_type_other')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('fuel_type_other',' ')">-</div>
						@foreach(App\UsedCarFuelType::all() as $fuel)
						@if($fuel->fuel_tp_name !== 'lpg')
						<div class="ctm-option" onclick="setThis('fuel_type_other','<?= $fuel->fuel_tp_name?>')">
							{{$fuel->fuel_tp_name}}</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">color</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('color_other')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="color_other" name="color_other" value="{{request('color_other')}}" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('color_other',' ')">-</div>
						@foreach(App\UsedCarColor::all() as $color)
						<div class="ctm-option" onclick="setThis('color_other','<?= $color->color_name?>')">
							{{$color->color_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mar-0 extra-sidebar-nav {{request('form_type') == 'sailboats'? 'active': 'd-none'}}">
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Manufacturer</label>
			<div class="form-cnt">
				<input type="text" value="{{request('manufacturer_sailboats')}}" name="manufacturer_sailboats" id="manufacturer_sailboats"
					class="form-control ">
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Model</label>
			<div class="form-cnt">
				<input type="text" value="{{request('model_sailboats')}}" name="model_sailboats" id="model_sailboats" class="form-control">
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">New / used</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('new_used_sailboats')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="" name="new_used_sailboats" class="new_used" value="{{request('new_used_sailboats')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('new_used_sailboats',' ')">-</div>
						<div class="ctm-option" onclick="setThis('new_used_sailboats','new')">new</div>
						<div class="ctm-option" onclick="setThis('new_used_sailboats','used')">used</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Sailboat type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('sailboat_type')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="sailboat_type" name="sailboat_type" value="{{request('sailboat_type')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('sailboat_type',' ')">-</div>
						@foreach(App\SailboatsType::all() as $type)
						<div class="ctm-option" onclick="setThis('sailboat_type','<?= $type->type_name?>')">
							{{$type->type_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Fuel Type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('fuel_type_sailboats')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="fuel_type_sailboats" name="fuel_type_sailboats" value="{{request('fuel_type_sailboats')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('fuel_type_sailboats',' ')">-</div>
						@foreach(App\UsedCarFuelType::all() as $fuel)
						@if($fuel->fuel_tp_name !== 'lpg')
						<div class="ctm-option" onclick="setThis('fuel_type_sailboats','<?= $fuel->fuel_tp_name?>')">
							{{$fuel->fuel_tp_name}}</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Engine(s) type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('eng_type_sailboats')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="eng_type_sailboats" name="eng_type_sailboats" value="{{request('eng_type_sailboats')}}" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('eng_type_sailboats',' ')">-</div>
						@foreach(App\MotorboatsEngineType::all() as $type)
						<div class="ctm-option" onclick="setThis('eng_type_sailboats','<?= $type->type_name?>')">
							{{$type->type_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Number of engines</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('eng_num_sailboats')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="eng_num_sailboats" name="eng_num_sailboats" value="{{request('eng_num_sailboats')}}" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('eng_num_sailboats',' ')">0</div>
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
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Rig Type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('rig_type_sailboats')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="rig_type_sailboats" name="rig_type_sailboats" value="{{request('rig_type_sailboats')}}" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('rig_type_sailboats',' ')">-</div>
						@foreach(App\SailboatRigType::all() as $type)
						<div class="ctm-option" onclick="setThis('rig_type_sailboats','<?= $type->type_name?>')">
							{{$type->type_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Steering wheel Type</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('str_wheel_sailboats')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="str_wheel_sailboats" name="str_wheel_sailboats" value="{{request('str_wheel_sailboats')}}" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('str_wheel_sailboats',' ')">-</div>
						@foreach(App\SailboatStrWheelType::all() as $type)
						<div class="ctm-option" onclick="setThis('str_wheel_sailboats','<?= $type->type_name?>')">
							{{$type->type_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">color</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('color_sailboats')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="color_sailboats" name="color_sailboats" value="{{request('color_sailboats')}}" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('color_sailboats',' ')">-</div>
						@foreach(App\UsedCarColor::all() as $color)
						<div class="ctm-option" onclick="setThis('color_sailboats','<?= $color->color_name?>')">
							{{$color->color_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row mar-0 extra-sidebar-nav {{request('form_type') == 'water-bikes'? 'active': 'd-none'}}">
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Manufacturer</label>
			<div class="form-cnt">
				<input type="text" value="{{request('manufacturer_water_bikes')}}" name="manufacturer_water_bikes" id="manufacturer_water_bikes"
					class="form-control required">
			</div>
		</div>
	</div>

	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Model</label>
			<div class="form-cnt">
				<input type="text" value="{{request('model_water_bikes')}}" name="model_water_bikes" id="model_water_bikes" class="form-control">
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">Number of seats</label>
			<div class="form-cnt">
				<input type="number" value="{{request('seat_num_water_bikes')}}" name="seat_num_water_bikes" id="seat_num_water_bikes" class="form-control required"
					min="1">
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">New / used</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('new_used_water_bikes')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="" name="new_used_water_bikes" value="{{request('new_used_water_bikes')}}" class="new_used" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('new_used_water_bikes',' ')">-</div>
						<div class="ctm-option" onclick="setThis('new_used_water_bikes','new')">new</div>
						<div class="ctm-option" onclick="setThis('new_used_water_bikes','used')">used</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-0">
		<div class="form-group ctm-form-group">
			<label class="ctm-form-label">color</label>
			<div class="form-cnt">
				<div class="ctm-select">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">{{request('color_water_bikes')? : '--'}}</span>
						<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					</div>
					<input type="hidden" id="color_water_bikes" name="color_water_bikes" value="{{request('color_water_bikes')}}" class="" />
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setThis('color_water_bikes',' ')">-</div>
						@foreach(App\UsedCarColor::all() as $color)
						<div class="ctm-option" onclick="setThis('color_water_bikes','<?= $color->color_name?>')">
							{{$color->color_name}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>