@extends('frontend.app')
@section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

<style>
	.search-service .item-list {
		padding: 12px 0;
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

	.select2-selection {
		padding: 7px;
		/*height: 42px;*/
	}

	.select2-selection__choice {
		/*margin-top: 7px;*/
	}

	.swiper-slide {
		width: 65px !important;
	}

	.realestate-search {
		padding-top: 60px;
	}

	.realestate-search .search-slct {
		margin: 0;
		position: absolute;
		top: -46px;
		right: 17px;
	}

	.realestate-search .search-slct svg {
		position: relative;
		top: 3px;
	}

	.realestate-search .search-slct .cat-slct-txt {
		padding: 0 5px;
	}

	.realestate-search .map-sidebar .m-side-list .m-side-img {
		padding-bottom: 20%;
		position: relative;
	}

	.map-sidebar .re-link {
		width: 100%;
		height: 100%;
		position: absolute;
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

	.map-sidebar .m-side-list .m-side-cnt .house-name {
		font-size: 14px;
		font-weight: 600;
	}

	.map-sidebar .m-side-list .m-side-cnt .loc-name {
		padding-right: 20px;
		font-size: 14px;
		padding-bottom: 4px;
	}

	.map-sidebar .m-side-list .m-side-cnt .house-price-len {
		font-size: 14px;
	}
</style>
@endsection
@section('content')

<form id="filterJob" method="post">
	<section class="ss-section realestate-search-s">
		<!-- <form id="filterJobByTopBar"  method="post"> -->
		<input type="hidden" class="formType" name="form_type" value="{{request('form_type')}}">
		<div class="search">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">job search</li>
				</ol>
			</nav>
			<div class="row mar-0">
				<div class="col-12 col-sm-4 col-md-3 pl-0">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><img style="height: 20px;"
									src="{{ asset('assets/img/search1.svg') }}" class="search-img" alt="lt flag"></span>
						</div>
						<input type="" value="{{request('title')?:''}}" name="job_title" class="form-control search-i"
							onkeyup="searchJobWithTopIndValue()" placeholder="job title">
					</div>
				</div>
				<div class="col-12 col-sm-4 col-md-3 pl-0">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><img style="height: 20px;"
									src="https://cdn1.iconfinder.com/data/icons/streamline-map-location-2/60/cell-0-2-120.png"
									alt="lt flag"></span>
						</div>
						<input id="pac-input" type="text" name="address" onkeyup="searchJobWithTopIndValue()"
							class="form-control search-i controls pac-input" value="{{request('address')?: ''}}"
							placeholder="Search by Address" aria-label="Username" aria-describedby="basic-addon1">
						<div id="map"></div>
					</div>
				</div>
				<div class="col-12 col-sm-4 col-md-3 p-0">
					<div class="input-group mb-3">
						<select onchange="searchJobWithTopIndValue()" name="city"
							class="js-example-basic-multiple city form-control search-i" multiple="">
							<option value="Plats">Plats</option>
							<option value="Stockholm">Stockholm</option>
							<option value="Skåne">Skåne</option>
							<option value="Göteborg">Göteborg</option>
							<option value="Östergötland">Östergötland</option>
							<option value="Norrbotten">Norrbotten</option>
							<option value="Uppsala">Uppsala</option>
							<option value="Jönköping">Jönköping</option>
							<option value="Älvsborg">Älvsborg</option>
							<option value="Västerbotten">Västerbotten</option>
							<option value="Västmanland">Västmanland</option>
							<option value="Dalarna">Dalarna</option>
							<option value="Örebro">Örebro</option>
							<option value="Södermanland">Södermanland</option>
							<option value="Västernorrland">Västernorrland</option>
							<option value="Gävleborg">Gävleborg</option>
							<option value="Skaraborg">Skaraborg</option>
							<option value="Halland">Halland</option>
							<option value="Utomlands">Utomlands</option>
							<option value="Blekinge">Blekinge</option>
							<option value="Kronoberg">Kronoberg</option>
							<option value="Kalmar">Kalmar</option>
							<option value="Norge">Norge</option>
							<option value="Jämtland">Jämtland</option>
							<option value="Gotland">Gotland</option>
						</select>
					</div>
				</div>
				<div class="col-12 col-sm-3  col-md-3 pad-r-0 search-btn">
					<button class="btn" type="submit">search</button>
				</div>
			</div>
		</div>
	</section>
	<section class="realestate-search">
		<div class="search-box">
			<div class="row mar-0">
				<div class="col-md-5 col-lg-3 pad-0">
					<div class="realestate-search-sidebar sidebar-s-n sidebar-filed-container">
						<div class="rea-price mar-b-15">
							<label>Salary Range</label>
							<div class="price-box">
								<div class="row mar-0">
									<div class=" col-12 pad-0 price-i">
										<label for="basic-url">Minimum starting salary</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">$</span>
											</div>
											<input type="number" min="1" name="salary_from" class="form-control"
												placeholder="0" aria-label="Username" aria-describedby="basic-addon1">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="quick-links mar-b-15">
							<div class="form-group">
								<label for="">Sector</label>
								<select class="job-sector-select-box form-control search-i" multiple="" name="sector[]">
									<option {{request('job_category')== 'IT' ? 'selected' : '' }} value="IT">IT</option>
									<option {{request('job_category')== 'Customer Service' ? 'selected' : '' }}
										value="Customer Service">Customer Service</option>
									<option {{request('job_category')== 'Retail' ? 'selected' : '' }} value="Retail">
										Retail</option>
									<option {{request('job_category')== 'Sales' ? 'selected' : '' }} value="Sales">Sales
									</option>
									<option {{request('job_category')== 'Cleaning' ? 'selected' : '' }}
										value="Cleaning">Cleaning</option>
									<option {{request('job_category')== 'Logistics' ? 'selected' : '' }}
										value="Logistics">Logistics</option>
									<option {{request('job_category')== 'Warehouse' ? 'selected' : '' }}
										value="Warehouse">Warehouse</option>
									<option {{request('job_category')== 'Waiting/Bar staff' ? 'selected' : '' }}
										value="Waiting/Bar staff">Waiting/Bar staff</option>
									<option {{request('job_category')== 'Accounting' ? 'selected' : '' }}
										value="Accounting">Accounting</option>
									<option {{request('job_category')== 'Management' ? 'selected' : '' }}
										value="Management">Management</option>
									<option {{request('job_category')== 'Construction' ? 'selected' : '' }}
										value="Construction">Construction</option>
									<option {{request('job_category')== 'Design' ? 'selected' : '' }} value="Design">
										Design</option>
									<option {{request('job_category')== 'Finance' ? 'selected' : '' }} value="Finance">
										Finance</option>
									<option {{request('job_category')== 'Health Care' ? 'selected' : '' }}
										value="Health Care">Health Care</option>
									<option {{request('job_category')== 'Manufacturing' ? 'selected' : '' }}
										value="Manufacturing">Manufacturing</option>
									<option {{request('job_category')== 'Marketing' ? 'selected' : '' }}
										value="Marketing">Marketing</option>
									<option {{request('job_category')== 'Media' ? 'selected' : '' }} value="Media">Media
									</option>
									<option {{request('job_category')== 'Nursing' ? 'selected' : '' }} value="Nursing">
										Nursing</option>
									<option {{request('job_category')== 'Teaching' ? 'selected' : '' }}
										value="Teaching">Teaching</option>
									<option {{request('job_category')== 'Driver' ? 'selected' : '' }} value="Driver">
										Driver</option>
								</select>
							</div>
						</div>
						<div class="quick-links mar-b-15">
							<div class="form-group">
								<label for="">Job Type</label>
								<select class="job-type-select-box form-control search-i" multiple="" name="job_type[]">
									<option {{request('job_type')== 'fulltime' ? 'selected': '' }}>Full Time</option>
									<option {{request('job_type')== 'parttime' ? 'selected': '' }}>Part Time</option>
									<option {{request('job_type')== 'contract' ? 'selected': '' }}>Contract</option>
									<option {{request('job_type')== 'internship' ? 'selected': '' }}>Internship</option>
								</select>
							</div>
						</div>
						<div class="quick-links mar-b-15">
							<div class="form-group">
								<label for="">Salary Type</label>
								<div class="ctm-select">
									<div class="ctm-select-txt">
										<span class="select-txt"
											id="category">{{request('salary_type')?:'-choose-'}}</span>
									</div>
									<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}"
											alt="lt flag"></span>
									<input type="hidden" value="{{request('salary_type')?:' '}}" name="salary_type"
										class="salaryType">
									<div class="ctm-option-box">
										<div class="ctm-option" onclick="setThis('salary_type','month')">Per Month
										</div>
										<div class="ctm-option" onclick="setThis('salary_type','hour')">Per Hour
										</div>
										<div class="ctm-option" onclick="setThis('salary_type','year')">Per Year
										</div>
										<div class="ctm-option" onclick="setThis('salary_type','project')">Per
											Project
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 search-btn">
							<button class="btn btn-danger" form="filterJob" type="submit" id="search">search</button>
						</div>
					</div>
				</div>
				<div class="col-md-7 pad-0">
					<div class="search-slct">
					</div>
					<div class="map-sidebar" id="loaddata">
						@include('frontend.category.job.job-listing-section')
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
</form>
@endsection
@section('script')
<script>
	$(document).ready(function() {
			$(".js-example-basic-multiple").select2({
				maximumSelectionLength: 1,
				placeholder: 'search with city name'
			});

			$(".job-sector-select-box").select2({
				placeholder: 'Search With Job Industries'
			});
			$(".job-type-select-box").select2({
				placeholder: 'Search With Job Industries'
			});
		});
		function setThis(filed,item){
			if(filed == 'salary_type'){
				$(".salaryType").val(item);
			}else if(filed == 'job_category'){
				$(".jobCategory").val(item);
			}else if(filed == 'job_type'){
				$(".jobType").val(item);
			}
		}

		$(document).ready(function(){
		});
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


		window.filter_job = '<?= url('filter-job-by-all-values')?>'

		window.filter_job_by_top_val = '<?= url('filter-job-by-top-bar-values')?>'
		// window.search_job_with_city = '<?= url('search-job-with-city')?>'

		window.get_actve_menu_data_job = '<?= url('get-active-job-data')?>'


		window.search_house = '<?= url('search-house')?>'
		window.get_this_country_cities = '<?= url('get-cities-under-the-country')?>'
		window.get_this_region_cities = '<?= url('get-cities-under-the-region')?>'

		window.filter_house_by_filed_value = '<?= url('filter-house-by-filed-value')?>'
		window.check_actve_match_menu = '<?= url('check-active-menu-value')?>'
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();   
		});
</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
@endsection