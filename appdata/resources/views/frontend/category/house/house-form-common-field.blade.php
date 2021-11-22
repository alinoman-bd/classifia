<div class="row mar-0">
    <div class="col-12">
        <div class="section-tlt">Basic Information</div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-6" style="padding-bottom: 10px;">
        @if(Auth::check())
        @php
        $user_name = App\UserInformation::where('user_id', Auth::user()->id)->first();
        @endphp
        @endif
        <!-- <label for="inputAddress">Address</label> -->
        <label for="region"><span class="asterisk text-danger">This field is required</span></label>
        <input id="pac-input" onchange="checkContactInfo('address')" value="{{@$user_name->address}}" name="address"
            class="controls form-control required" type="text" placeholder="Search Address">
        <div id="map"></div>
        <input type="hidden" id="contactAddressUpdate" name="contact_address_update" value="0">
    </div>
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="form-group">
            <label for="inputAddress">Award</label>
            <div class="ctm-select">
                <div class="ctm-select-txt">
                    <span class="select-txt" id="city">--choose--</span>
                </div>
                <span class="select-arr">
                    <img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag">
                </span>
                <input type="hidden" id="award" name="award" />
                <div class="ctm-option-box">
                    @foreach(App\House\Award::all() as $award)
                    <div class="ctm-option" onclick="setThis('award','<?=  $award->award_value?>')">
                        {{$award->award_value}} Kr</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="form-group">
            <label for="inputAddress">Room Nr.</label>
            <input type="number" class="form-control" placeholder="mention how much room" name="room_nr">
        </div>
    </div>

    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="form-group">
            <label for="inputAddress">Area (m²) </label>
            <div class="ctm-select">
                <div class="ctm-select-txt">
                    <span class="select-txt" id="city">-choose-</span>
                </div>
                <span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
                <input type="hidden" id="LivibArea" name="area" />
                <div class="ctm-option-box">
                    @foreach(App\House\LivingArea::all() as $area)
                    <div class="ctm-option" onclick="setThis('living_area','<?= $area->area_size?>')">
                        {{$area->area_size}}</div>
                    @endforeach
                </div>
            </div>

            <!-- <div class="input-group">
				<label for="model"><span class="asterisk text-danger reqired-wth-custom-css">This field is required</span></label>
				<input style="    border-left: 1px solid #ced4da;border-right: none;" type="text" class="form-control search-i required" placeholder="" name="area" id="area">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1" style="border-right: 1px solid #ced4da;border-left: none;padding-left: 0;padding-right: 15px;">m <sup>2</sup></span>
				</div>
			</div> -->
        </div>
    </div>
    @if($type == 'sale')
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="form-group">
            <label for="inputAddress">Price</label>
            <div class="input-group">
                <label for="model"><span class="asterisk text-danger reqired-wth-custom-css">This field is
                        required</span></label>
                <input style="border-left: 1px solid #ced4da;border-right: none;" type="text"
                    class="form-control search-i required" placeholder="5000" name="price" id="price">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"
                        style="border-right: 1px solid #ced4da;border-left: none;padding-left: 0;padding-right: 15px;">$</span>
                </div>
            </div>
        </div>
    </div>
    @elseif($type == 'rent')
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="form-group">
            <label for="inputAddress">Rent Type</label>
            <div class="ctm-select">
                <div class="ctm-select-txt pad-l-10">
                    <span class="select-txt" id="">----</span>
                    <span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
                </div>
                <label for="rentType"><span class="asterisk text-danger">This field is required</span></label>
                <input type="hidden" id="rentType" name="rent_type" class="required" />
                <div class="ctm-option-box">
                    <div class="ctm-option" onclick="setThis('rent_type','Weekly')">Weekly</div>
                    <div class="ctm-option" onclick="setThis('rent_type','Monthly')">Monthly</div>
                    <div class="ctm-option" onclick="setThis('rent_type','Yearly')">Yearly</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="form-group">
            <label for="inputAddress">Price</label>
            <div class="input-group">
                <label for="model"><span class="asterisk text-danger reqired-wth-custom-css">This field is
                        required</span></label>
                <input style="border-left: 1px solid #ced4da;border-right: none;" type="text"
                    class="form-control search-i required" placeholder="amount" name="price" id="price">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"
                        style="border-right: 1px solid #ced4da;border-left: none;padding-left: 0;padding-right: 15px;">$</span>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="form-group">
            <label for="inputAddress">Keyword</label>
            <div class="form-group">
                <input type="text" class="form-control" name="keyword">
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-3">
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
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="form-group">
            <label for="inputAddress">Distance To Water</label>
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
                        <div class="ctm-option" onclick="setThis('water_dis','100')">100 m</div>
                        <div class="ctm-option" onclick="setThis('water_dis','250')">250 m</div>
                        <div class="ctm-option" onclick="setThis('water_dis','500')">500 m</div>
                        <div class="ctm-option" onclick="setThis('water_dis','1000')">1 km</div>
                        <div class="ctm-option" onclick="setThis('water_dis','5000')">5 km</div>
                        <div class="ctm-option" onclick="setThis('water_dis','10000')">10 km</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="form-group">
            <label for="basic-url">Year Built</label>
            <div class="row mar-0">
                <div class=" col-12 pad-0 price-i">
                    <div class="form-group">
                        <input type="text" name="built_year" id="built_year" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="form-group">
            <label for="inputAddress">Building Type </label>
            <div class="ctm-select">
                <div class="ctm-select-txt pad-l-10">
                    <span class="select-txt" id="category">----</span>
                    <span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
                </div>
                <input type="hidden" id="bType" name="building_type" />
                <div class="ctm-option-box">
                    @foreach(App\House\Equipment::all() as $eqiupment)
                    <div class="ctm-option" onclick="setThis('b_type', '<?= $eqiupment->eq_name?>')">
                        {{$eqiupment->eq_name}}</div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="form-group">
            <label for="basic-url">Square Meters Price ( /m <sup>2</sup> )</label>
            <div class="row mar-0">
                <div class=" col-12 pad-0 price-i">
                    <div class="form-group">
                        <input type="text" name="per_Sqr_price" id="built_year" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>