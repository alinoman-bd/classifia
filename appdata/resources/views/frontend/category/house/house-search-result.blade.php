@extends('frontend.app')
@section('style')
<style>
    #map {
        height: 100%;
    }

    .search-service .item-list {
        width: 100%;
        margin: 0;
    }

    .swiper-button-prev,
    .swiper-button-next {
        height: auto;
        top: 65%;
    }

    .swiper-button-next {
        right: 0;
    }

    .map-sidebar .re-link {
        display: block;
    }

    @media screen and (max-width: 575px) {
        .search .col-12 {
            padding: 0;
        }
    }

    .realestate-search .map-sidebar .m-side-list .fav {
        transform: scale(1);
        transition: .4s ease all;
        cursor: pointer;
    }

    .realestate-search .map-sidebar .m-side-list .fav:hover {
        transform: scale(1.5);
        color: #E2B715;
    }
</style>
@endsection
@section('content')
<section class="realestate-map ss-section realestate-search-s">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">realestate search</li>
        </ol>
    </nav>

    <div class="row mar-0">
        <div class="col-12 col-sm-6 col-md-7 pad-0">
            <div class="realestate-map-cnt hw-100">
                <div class="mapouter h-100">
                    <div id="realestateMap" style="height: 100%; width: 100%"></div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-5 pad-0">
            <div class="row mar-0">
                <div class="col-12">
                    <div class="ad">
                        ad
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="ad">
                        ad
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="ad">
                        ad
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="realestate-search">
    <div class="search mb-4">
        <!-- <form id="filterHouseTopBar" method="post"> -->
        <form id="filterHouse" method="post">
            @csrf
            <!-- <input type="hidden" class="formType"  name="form_type"> -->
            <div class="row mar-0">
                <div class="col-12 pad-0">
                    <div class="search-service tab-w-name search-tab rs-tab ss d-block mb-3">
                        <ul class="nav nav-pills nav-fill justify-content-center">
                            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="All Category">
                                <div
                                    class="item-list act-cat filter-advertisement {{!request('form_type')? 'active' : ''}}">
                                    <input type="checkbox" class="form-type-filter-all d-none" value=""
                                        {{!request('form_type')? 'checked' : ''}}>
                                    <div class="item-icon">
                                        <span class="item-img"><img src="assets/img/home.jpg" alt="lt flag"></span>
                                        <span class="item-h-img"><img src="assets/img/home.jpg" alt="lt flag"></span>
                                        <span class="item-txt">All Category</span>
                                    </div>
                                </div>
                            </li>
                            @foreach($sub_cats as $sub)
                            <li class="nav-item" data-original-title="{{$sub->category_name}}" data-toggle="tooltip"
                                data-placement="top" title="">
                                <div
                                    class="item-list act-cat filter-advertisement {{request('form_type') == $sub->slug ? 'active' : ''}}">
                                    <input type="checkbox" name="form_type[]" class="form-type-filter d-none"
                                        value="{{$sub->slug}}" {{request('form_type') == $sub->slug ? 'checked' : ''}}>
                                    <div class="item-icon">
                                        <span class="item-img"><img
                                                src="{{ asset('assets/img/subCatIcon/'.$sub->icon)}}"
                                                alt="lt flag"></span>
                                        <span class="item-h-img"><img
                                                src="{{ asset('assets/img/subCatIcon/'.$sub->icon)}}"
                                                alt="lt flag"></span>
                                        <span class="item-txt">{{ucfirst($sub->category_name)}}</span>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>

                    </div>
                </div>

            </div>

    </div>

    <div class="search-box">
        <div class="row mar-0">
            <div class="col-md-5 col-lg-3 pad-0">
                <div class="realestate-search-sidebar sidebar-s-n sidebar-filed-container">
                    <input type="hidden" id="cat" value="house" name="cat">
                    <input type="hidden" id="saleRent" value="{{$sale_rent}}" name="sale_rent">
                    <input type="hidden" id="formType" name="form_type">
                    <div class="form-group ctm-form-group">
                        <label for="staticEmail" class="ctm-form-label">Address</label>
                        <div class="form-cnt">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><img style="height: 20px;"
                                            src="https://cdn1.iconfinder.com/data/icons/streamline-map-location-2/60/cell-0-2-120.png"
                                            alt="lt flag"></span>
                                </div>
                                <!-- onkeyup="searchHouseByAddress(this.value)" -->
                                <input id="pac-input" type="text" value="{{@$address}}" name="address"
                                    class="form-control search-i controls pac-input address-filter map-search-value"
                                    placeholder="address" aria-label="Username" aria-describedby="basic-addon1">
                                <div id="map"></div>
                                <!-- <input type="text" class="form-control search-i" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1"> -->
                            </div>
                        </div>
                    </div>
                    <div class="form-group ctm-form-group">
                        <label for="staticEmail" class="ctm-form-label">Expand area with</label>
                        <div class="form-group ctm-form-group">
                            <select style="height: 50px;" name="distance" id=""
                                class="form-control  filter-advertisement-change distance-filter">
                                <option value="">Expand area with</option>
                                <option value="1000" {{request('distance') == "1000"? 'selected': ''}}>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">+ 1 km</font>
                                    </font>
                                </option>
                                <option value="2000" {{request('distance') == "2000"? 'selected': ''}}>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">+ 2 km</font>
                                    </font>
                                </option>
                                <option value="5000" {{request('distance') == "5000"? 'selected': ''}}>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">+ 5 km</font>
                                    </font>
                                </option>
                                <option value="10000" {{request('distance') == "10000"? 'selected': ''}}>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">+ 10 km</font>
                                    </font>
                                </option>
                                <option value="15000" {{request('distance') == "15000"? 'selected': ''}}>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">+ 15 km</font>
                                    </font>
                                </option>
                                <option value="30000" {{request('distance') == "30000"? 'selected': ''}}>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">+ 30 km</font>
                                    </font>
                                </option>
                                <option value="50000" {{request('distance') == "50000"? 'selected': ''}}>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">+ 50 km</font>
                                    </font>
                                </option>
                                <option value="100000" {{request('distance') == "100000"? 'selected': ''}}>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">+ 100 km</font>
                                    </font>
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group ctm-form-group">
                        <label for="staticEmail" class="ctm-form-label">Title</label>
                        <div class="form-cnt">
                            <div class="input-group">
                                <input type="text" name="title" value="{{request('title')?: ''}}"
                                    class="form-control filter-advertisement-blur title-filter" placeholder="title"
                                    aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                    <div class="form-group ctm-form-group">
                        <label for="staticEmail" class="ctm-form-label">Keyword</label>
                        <div class="form-cnt">
                            <div class="input-group">
                                <input type="text" name="keyword" value="{{request('keyword')? : ''}}"
                                    class="form-control filter-advertisement-blur keyword-filter" placeholder="keyword"
                                    aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                    @include('frontend.category.house.sidebar-nav')
                    <!-- <div class="col-12 search-btn">
						<button class="btn btn-danger" type="submit" id="search" >search</button>
					</div> -->
                    </form>
                </div>
            </div>
            <div class="col-md-7 pad-0">
                <div class="map-sidebar" id="loaddata">
                    @include('frontend.category.house.house-listing-section')
                </div>
            </div>
            <div class=" col-12 col-md-2 pad-0">
                <div class="ad">
                    ad
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    $(document).ready(function() {});
var swiper = new Swiper('.ctm-container-s', {
    slidesPerView: 8,
    spaceBetween: 10,
    loop: false,
    navigation: {
        nextEl: '.swiper-button-next-s',
        prevEl: '.swiper-button-prev-s',
    },

    breakpoints: {
        991: {
            slidesPerView: 6,
        },
        767: {
            slidesPerView: 4,
        },
        575: {
            slidesPerView: 6,
        },
        450: {
            slidesPerView: 5,
        },
        380: {
            slidesPerView: 4,
        }
    }
});
window.filter_house_by_all_value = '<?= url('filter-house-by-all-values')?>'



// window.search_house = '<?= url('search-house')?>'
// window.get_this_country_cities = '<?= url('get-cities-under-the-country')?>'
// window.get_this_region_cities = '<?= url('get-cities-under-the-region')?>'
// window.sear_house_by_address = '<?= url('search-house-by-address')?>'
// window.check_actve_match_menu_house = '<?= url('check-active-menu-value')?>'
// window.get_actve_menu_data = '<?= url('get-active-menu-data')?>'
// window.filter_house_by_top_bar = '<?= url('filter-house-by-all-top-values')?>'
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});

function setThis(field, value) {
    if (field == 'room_min') {
        $('#roomMin').val(value);
    } else if (field == 'room_max') {
        $('#roomMax').val(value);
    } else if (field == 'living_area_min') {
        $('#LivibAreaMin').val(value);
    } else if (field == 'living_area_max') {
        $('#LivibAreaMax').val(value);
    } else if (field == 'award') {
        $('#award').val(value);
    } else if (field == 'new_development') {
        $('#neDevelopment').val(value);
    } else if (field == 'price_min') {
        $('#priceMin').val(value);
    } else if (field == 'price_max') {
        $('#priceMax').val(value);
    } else if (field == 'water_dis') {
        $('#waterDistance').val(value);
    } else if (field == 'house_type') {
        $('#houseType').val(value);
    }
}
</script>


@endsection