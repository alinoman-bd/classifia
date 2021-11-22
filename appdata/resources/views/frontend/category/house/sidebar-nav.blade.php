<style>
    .price-box {
        border: none !important;
    }
</style>
<div class="checkbox-ctm">
    <div class="price-box">
        <div class="form-group ctm-form-group">
            <label for="staticEmail" class="ctm-form-label">Room</label>
            <div class="form-cnt">
                <div class="row mar-0">
                    <div class=" col-6 pad-0 price-i">
                        <div class="ctm-select">
                            <div class="ctm-select-txt">
                                <span class="select-txt" id="city">{{request('m_room').' room'?:'Min'}}</span>
                            </div>
                            <span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}"
                                    alt="lt flag"></span>
                            <input type="hidden" id="roomMin" value="{{request('m_room')?: ''}}" name="room_min" />
                            <div class="ctm-option-box">
                                <div class="ctm-option filter-advertisement" onclick="setThis('room_min',' ')">Min</div>
                                @foreach(App\House\MinimumRoom::all() as $m_room)
                                <div class="ctm-option filter-advertisement"
                                    onclick="setThis('room_min','<?= $m_room->room_quantity?>')">
                                    {{$m_room->room_quantity}} <?= $m_room->room_quantity == 1? 'room' : 'rooms' ?>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-6 pad-r-0 price-i">
                        <div class="ctm-select">
                            <div class="ctm-select-txt">
                                <span class="select-txt" id="city">Max</span>
                            </div>
                            <span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}"
                                    alt="lt flag"></span>
                            <input type="hidden" class="max-room-filter" id="roomMax" name="room_max" />
                            <div class="ctm-option-box">
                                <div class="ctm-option filter-advertisement" onclick="setThis('room_max',' ')">Max</div>
                                @foreach(App\House\MinimumRoom::all() as $m_room)
                                <div class="ctm-option filter-advertisement"
                                    onclick="setThis('room_max','<?= $m_room->room_quantity?>')">
                                    {{$m_room->room_quantity}} <?= $m_room->room_quantity == 1? 'room' : 'rooms' ?>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="price-box">
        <div class="form-group ctm-form-group">
            <label for="staticEmail" class="ctm-form-label">Living Area</label>
            <div class="form-cnt">
                <div class="row mar-0">
                    <div class=" col-6 pad-0 price-i">
                        <div class="ctm-select">
                            <div class="ctm-select-txt">
                                <span class="select-txt"
                                    id="city">{{request('living_area_max')? request('living_area_min').' m²':'Min'}}</span>
                            </div>
                            <span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}"
                                    alt="lt flag"></span>
                            <input type="hidden" value="{{request('living_area_min')?: ''}}" id="LivibAreaMin"
                                name="living_area_min" />
                            <div class="ctm-option-box">
                                <div class="ctm-option filter-advertisement" onclick="setThis('living_area_min',' ')">
                                    Min</div>
                                @foreach(App\House\LivingArea::all() as $area)
                                <div class="ctm-option filter-advertisement"
                                    onclick="setThis('living_area_min','<?= $area->area_size?>')">{{$area->area_size}}
                                    <span class="text-lowercase"> m²</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-6 pad-r-0 price-i">
                        <div class="ctm-select">
                            <div class="ctm-select-txt">
                                <span class="select-txt"
                                    id="city">{{request('living_area_max')? request('living_area_max').' m²':'Max'}}</span>
                            </div>
                            <span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}"
                                    alt="lt flag"></span>
                            <input type="hidden" value="{{request('living_area_max')?: ''}}" id="LivibAreaMax"
                                name="living_area_max" />
                            <div class="ctm-option-box">
                                <div class="ctm-option filter-advertisement" onclick="setThis('living_area_max',' ')">
                                    Max</div>
                                @foreach(App\House\LivingArea::all() as $area)
                                <div class="ctm-option filter-advertisement"
                                    onclick="setThis('living_area_max','<?= $area->area_size?>')">{{$area->area_size}}
                                    <span class="text-lowercase"> m²</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="price-box">
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
                                <div class="ctm-option filter-advertisement"
                                    onclick="setThis('award','<?=  $award->award_value?>')">{{$award->award_value}} Kr
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="price-box">
        <div class="form-group ctm-form-group">
            <label for="staticEmail" class="ctm-form-label">New Development</label>
            <div class="form-cnt">
                <div class="row mar-0">
                    <div class=" col-12 pad-0 price-i">
                        <div class="ctm-select">
                            <div class="ctm-select-txt">
                                <span class="select-txt" id="city">{{request('new_development')?: '--choose--' }}</span>
                            </div>
                            <span class="select-arr">
                                <img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag">
                            </span>
                            <input type="hidden" value="{{request('new_development')? : ''}}" id="neDevelopment"
                                name="new_development" />
                            <div class="ctm-option-box">
                                <div class="ctm-option filter-advertisement" onclick="setThis('new_development',' ')">
                                    --choose--</div>
                                <div class="ctm-option filter-advertisement"
                                    onclick="setThis('new_development','Show new production')">Show new production</div>
                                <div class="ctm-option filter-advertisement"
                                    onclick="setThis('new_development','Show only new production')">Show only new
                                    production</div>
                                <div class="ctm-option filter-advertisement"
                                    onclick="setThis('new_development','Hide new production')">Hide new production</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="price-box">
        <div class="form-group ctm-form-group">
            <label for="staticEmail" class="ctm-form-label">Price</label>
            <div class="form-cnt">
                <div class="row mar-0">
                    <div class=" col-6 pad-0 price-i">
                        <div class="form-group">
                            <div class="ctm-select">
                                <div class="ctm-select-txt">
                                    <span class="select-txt" id="city">min</span>
                                </div>
                                <span class="select-arr">
                                    <img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag">
                                </span>
                                <input type="hidden" id="priceMin" name="price_min" />
                                <div class="ctm-option-box">
                                    <div class="ctm-option filter-advertisement" onclick="setThis('price_min',0)">0 kr
                                    </div>
                                    @foreach(App\House\HighestPrice::all() as $h_price)
                                    <div class="ctm-option filter-advertisement"
                                        onclick="setThis('price_min','<?= $h_price->max_price?>')">
                                        {{$h_price->max_price}} kr</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6  pad-r-0 price-i">
                        <div class="form-group">
                            <div class="ctm-select">
                                <div class="ctm-select-txt">
                                    <span class="select-txt"
                                        id="city">{{request('h_price')? request('h_price').' kr' :'max'}}</span>
                                </div>
                                <span class="select-arr">
                                    <img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag">
                                </span>
                                <input type="hidden" value="{{request('h_price')? :''}}" id="priceMax"
                                    name="price_max" />
                                <div class="ctm-option-box">
                                    <div class="ctm-option filter-advertisement" onclick="setThis('price_max',0)">0 kr
                                    </div>
                                    @foreach(App\House\HighestPrice::all() as $h_price)
                                    <div class="ctm-option filter-advertisement"
                                        onclick="setThis('price_max','<?= $h_price->max_price?>')">
                                        {{$h_price->max_price}} kr</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="price-box">
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

    <div class="price-box">
        <div class="form-group ctm-form-group">
            <label for="staticEmail" class="ctm-form-label">Year of construction</label>
            <div class="form-cnt">
                <div class="row mar-0">
                    <div class="col-6 pad-0">
                        <div class="form-group">
                            <input type="number" name="min_year" placeholder="Min"
                                class="form-control filter-advertisement-blur min_year" />
                        </div>
                    </div>
                    <div class="col-6 pad-r-0 price-i">
                        <div class="form-group">
                            <input type="number" name="max_year" placeholder="Max"
                                class="form-control filter-advertisement-blur max_year" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="price-box">
        <div class="form-group ctm-form-group">
            <label for="staticEmail" class="ctm-form-label">Show Only </label>
            <div class="form-cnt">
                <div class="ctm-select">
                    <div class="ctm-select-txt pad-l-10">
                        <span class="select-txt" id="category">----</span>
                        <span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
                    </div>
                    <input type="hidden" id="houseType" name="house_type" />
                    <div class="ctm-option-box">
                        <div class="ctm-option filter-advertisement" onclick="setThis('house_type',' ')">--choose--
                        </div>
                        @foreach(App\House\Equipment::all() as $eqiupment)
                        <div class="ctm-option filter-advertisement"
                            onclick="setThis('house_type','<?= $eqiupment->eq_name?>')">{{$eqiupment->eq_name}}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="price-box">
        <div class="form-group ctm-form-group">
            <label for="staticEmail" class="ctm-form-label">Square Meters Price ( /m <sup>2</sup> )</label>
            <div class="form-cnt">
                <div class="row mar-0">
                    <div class="col-6 pad-0">
                        <div class="form-group">
                            <input type="number" name="per_sq_price_min" placeholder="Min"
                                class="form-control filter-advertisement sqr_mtr_price_min" />
                        </div>
                    </div>
                    <div class="col-6 pad-r-0 price-i">
                        <div class="form-group">
                            <input type="number" name="per_sq_price_max" placeholder="Max"
                                class="form-control filter-advertisement sqr_mtr_price_max" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>