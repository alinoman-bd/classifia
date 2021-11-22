<style>
	.ctm-option-box {
		overflow: auto;
		max-height: 250px;
	}
</style>
<div class="row mar-0  ">
	<!-- filter-field  -->
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group ctm-form-group">
			<label for="staticEmail" class="ctm-form-label">Title</label>
			<div class="form-cnt">
				<div class="input-group">
					<input type="text" name="title" value="{{request('title')?: ''}}" class="form-control filter-advertisement-blur title-filter" placeholder="title" aria-label="Username" aria-describedby="basic-addon1">
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Minimum RR Number of Rooms </label>
			<div class="ctm-select">
				<div class="ctm-select-txt">
					<span class="select-txt" id="city">--choose--</span>
				</div>
				<span class="select-arr">
					<img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag">
				</span>
				<input type="hidden" id="mRoom" name="m_room" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('min_room',' ')">-</div>
					@foreach(App\House\MinimumRoom::all() as $m_room)
					<div class="ctm-option" onclick="setThis('min_room','<?= $m_room->room_quantity ?>')">At least
						{{$m_room->room_quantity}} rooms
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Living Area (m²) </label>
			<div class="ctm-select">
				<div class="ctm-select-txt">
					<span class="select-txt" id="city">--choose--</span>
				</div>
				<span class="select-arr">
					<img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag">
				</span>
				<input type="hidden" id="LivibAreaMin" name="living_area_min" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('living_area_min',' ')">-</div>
					@foreach(App\House\LivingArea::all() as $area)
					<div class="ctm-option" onclick="setThis('living_area_min','<?= $area->area_size ?>')">At Least
						{{$area->area_size}} m<sup>2</sup>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>


	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group ctm-form-group">
			<label for="staticEmail" class="ctm-form-label">Award</label>
			<div class="form-cnt">
				<div class="row mar-0">
					<div class=" col-12 pad-0 price-i">
						<div class="ctm-select">
							<div class="ctm-select-txt">
								<span class="select-txt" id="city">--choose--</span>
							</div>
							<span class="select-arr">
								<img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag">
							</span>
							<input type="hidden" id="award" name="award" />
							<div class="ctm-option-box">
								<div class="ctm-option filter-advertisement" onclick="setThis('award',' ')">0 Kr</div>
								@foreach(App\House\Award::all() as $award)
								<div class="ctm-option filter-advertisement" onclick="setThis('award','<?= $award->award_value ?>')">{{$award->award_value}} Kr
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Highest Price</label>
			<div class="ctm-select">
				<div class="ctm-select-txt">
					<span class="select-txt" id="city">--choose--</span>
				</div>
				<span class="select-arr">
					<img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag">
				</span>
				<input type="hidden" class="hPrice" name="h_price" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('high_price',' ')">-</div>
					@foreach(App\House\HighestPrice::all() as $h_price)
					<div class="ctm-option" onclick="setThis('high_price',<?= $h_price->max_price ?>)">
						{{$h_price->max_price}} kr
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group ctm-form-group">
			<label for="staticEmail" class="ctm-form-label">Square Meters Price ( /m <sup>2</sup> )</label>
			<div class="form-cnt">
				<div class="row mar-0">
					<div class="col-6 pad-0">
						<div class="form-group">
							<input type="number" name="per_sq_price_min" placeholder="Min" class="form-control filter-advertisement sqr_mtr_price_min" />
						</div>
					</div>
					<div class="col-6 pad-r-0 price-i">
						<div class="form-group">
							<input type="number" name="per_sq_price_max" placeholder="Max" class="form-control filter-advertisement sqr_mtr_price_max" />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group ctm-form-group">
			<label for="staticEmail" class="ctm-form-label">Distance To Water</label>
			<div class="form-cnt">
				<div class="row mar-0">
					<div class=" col-12 pad-0 price-i">
						<div class="form-group">
							<div class="ctm-select">
								<div class="ctm-select-txt">
									<span class="select-txt" id="city">--choose--</span>
								</div>
								<span class="select-arr">
									<img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag">
								</span>
								<input type="hidden" id="waterDistance" name="water_distance" />
								<div class="ctm-option-box">
									<div class="ctm-option filter-advertisement" onclick="setThis('water_dis',' ')">
										--choose--</div>
									<div class="ctm-option filter-advertisement" onclick="setThis('water_dis','all')">
										All</div>
									<div class="ctm-option filter-advertisement" onclick="setThis('water_dis','100')">
										100 m</div>
									<div class="ctm-option filter-advertisement" onclick="setThis('water_dis','250')">
										250 m</div>
									<div class="ctm-option filter-advertisement" onclick="setThis('water_dis','500')">
										500 m</div>
									<div class="ctm-option filter-advertisement" onclick="setThis('water_dis','1000')">1
										km</div>
									<div class="ctm-option filter-advertisement" onclick="setThis('water_dis','5000')">5
										km</div>
									<div class="ctm-option filter-advertisement" onclick="setThis('water_dis','10000')">
										10 km</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group ctm-form-group">
			<label for="staticEmail" class="ctm-form-label">Year of construction</label>
			<div class="form-cnt">
				<div class="row mar-0">
					<div class="col-6 pad-0">
						<div class="form-group">
							<input type="number" name="min_year" placeholder="Min" class="form-control filter-advertisement-blur min_year" />
						</div>
					</div>
					<div class="col-6 pad-r-0 price-i">
						<div class="form-group">
							<input type="number" name="max_year" placeholder="Max" class="form-control filter-advertisement-blur max_year" />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">New Development</label>
			<div class="ctm-select">
				<div class="ctm-select-txt">
					<span class="select-txt" id="city">--choose--</span>
				</div>
				<span class="select-arr">
					<img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag">
				</span>
				<input type="hidden" id="neDevelopment" name="new_development" />
				<div class="ctm-option-box">
					<div class="ctm-option" onclick="setThis('new_development',' ')">-</div>
					<div class="ctm-option" onclick="setThis('new_development','Show new production')">Show new
						production</div>
					<div class="ctm-option" onclick="setThis('new_development','Show only new production')">Show only
						new production</div>
					<div class="ctm-option" onclick="setThis('new_development','Hide new production')">Hide new
						production</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 pad-l-0">
		<div class="form-group">
			<label for="inputAddress">Keyword </label>
			<div class="input-group">
				<input style="border-left: 1px solid #ced4da;" type="text" class="form-control search-i " placeholder="keyword" name="keyword" id="keyword">
			</div>
		</div>
	</div>
</div>