 @extends('frontend.app')
 @section('style')
 <style>
      /* Always set the map height explicitly to define the size of the div
      * element that contains the map. */
      #map {
        height: 100%;
      }
      #map1 {
      	height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
      	height: 100%;
      	margin: 0;
      	padding: 0;
      }
      #description {
      	font-family: Roboto;
      	font-size: 15px;
      	font-weight: 300;
      }

      #infowindow-content .title {
      	font-weight: bold;
      }

      #infowindow-content {
      	display: none;
      }

      #map #infowindow-content {
      	display: inline;
      }

      .pac-card {
      	margin: 10px 10px 0 0;
      	border-radius: 2px 0 0 2px;
      	box-sizing: border-box;
      	-moz-box-sizing: border-box;
      	outline: none;
      	box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      	background-color: #fff;
      	font-family: Roboto;
      }

      #pac-container {
      	padding-bottom: 12px;
      	margin-right: 12px;
      }

      .pac-controls {
      	display: inline-block;
      	padding: 5px 11px;
      }

      .pac-controls label {
      	font-family: Roboto;
      	font-size: 13px;
      	font-weight: 300;
      }

      .pac-input {
      	background-color: #fff;
      	font-family: Roboto;
      	font-size: 15px;
      	font-weight: 300;
      	padding: 0 11px 0 13px;
      	text-overflow: ellipsis;
      	width: 400px;
      }


      #title {
      	color: #fff;
      	background-color: #4d90fe;
      	font-size: 25px;
      	font-weight: 500;
      	padding: 6px 12px;
      }
      #target {
      	width: 345px;
      }
    </style>
    @endsection
    @section('content')

    <section class="ss-section rea-ss-section">
      <div class="search">
       <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">job browse</li>
        </ol>
      </nav>
      <div class="row">
       <div class="col-md-7">
        <div class="rea-ss-nav">
         <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">@lang('frontend.job.browse.findjob')</a>
          </li>
          <li class="nav-item">
           <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">@lang('frontend.job.browse.getjob')</a>
         </li>
       </ul>

       <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
         <form action="{{url('search-job')}}" id="SearchForm" class="formForHouseSearch" method="get"  enctype="multipart/form-data" >
          @csrf
          <div class="row mar-0">
           <div class="col-sm-12">
            <div class="input-group mb-3">
             <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><img src="{{ asset('assets/img/search1.svg') }}" class="search-img" alt="lt flag"></span>
            </div>
            <input id="pac-input" type="text" name="address" class="form-control search-i controls pac-input" placeholder="@lang('frontend.house.browse.search.address')" aria-label="Username" aria-describedby="basic-addon1">
            <div id="map"></div>
          </div>
        </div>

        <div class="col-12">
          <div class="search-service">
           <div class="row mar-0 house-category">
            <input type="hidden" class="formType" id="formType" value="find-job" name="form_type">
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="">Job Title</label>
          <input type="text" class="form-control" name="title">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for=""style='visibility: hidden;'>Category</label>
          <div class="ctm-select">
            <div class="ctm-select-txt">
              <span class="select-txt" id="category">-choose-</span>
            </div>
            <span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
            <input type="hidden" class="jobCategory" name="job_category">
            <div class="ctm-option-box">
              <div class="ctm-option" onclick="setThis('job_category',' ')">-</div>
              <div class="ctm-option" onclick="setThis('job_category','IT')">IT</div>
              <div class="ctm-option" onclick="setThis('job_category','Customer Service')">Customer Service</div>
              <div class="ctm-option" onclick="setThis('job_category','Retail')">Retail</div>
              <div class="ctm-option" onclick="setThis('job_category','Sales')">Sales</div>
              <div class="ctm-option" onclick="setThis('job_category','Cleaning')">Cleaning</div>
              <div class="ctm-option" onclick="setThis('job_category','Logistics')">Logistics</div>
              <div class="ctm-option" onclick="setThis('job_category','Warehouse')">Warehouse</div>
              <div class="ctm-option" onclick="setThis('job_category','Waiting/Bar staff')">Waiting/Bar staff</div>
              <div class="ctm-option" onclick="setThis('job_category','Accounting')">Accounting</div>
              <div class="ctm-option" onclick="setThis('job_category','Management')">Management</div>
              <div class="ctm-option" onclick="setThis('job_category','Construction')">Construction</div>
              <div class="ctm-option" onclick="setThis('job_category','Design')">Design</div>
              <div class="ctm-option" onclick="setThis('job_category','Finance')">Finance</div>
              <div class="ctm-option" onclick="setThis('job_category','Health Care')">Health Care</div>
              <div class="ctm-option" onclick="setThis('job_category','Manufacturing')">Manufacturing</div>
              <div class="ctm-option" onclick="setThis('job_category','Marketing')">Marketing</div>
              <div class="ctm-option" onclick="setThis('job_category','Media')">Media</div>
              <div class="ctm-option" onclick="setThis('job_category','Nursing')">Nursing</div>
              <div class="ctm-option" onclick="setThis('job_category','Teaching')">Teaching</div>
              <div class="ctm-option" onclick="setThis('job_category','Driver')">Driver</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="">Salary Type</label>
          <div class="ctm-select">
            <div class="ctm-select-txt">
              <span class="select-txt" id="category">-choose-</span>
            </div>
            <span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
            <input type="hidden" name="salary_type" class="salaryType">
            <div class="ctm-option-box">
              <div class="ctm-option" onclick="setThis('salary_type',' ')"  >-</div>
              <div class="ctm-option" onclick="setThis('salary_type','month')"  >Per Month</div>
              <div class="ctm-option" onclick="setThis('salary_type','hour')"  >Per Hour</div>
              <div class="ctm-option" onclick="setThis('salary_type','year')"  >Per Year</div>
              <div class="ctm-option" onclick="setThis('salary_type','project')" >Per Project</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="">Job Type </label>
          <div class="ctm-select">
            <div class="ctm-select-txt">
              <span class="select-txt" id="category">-choose-</span>
            </div>
            <span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
            <input type="hidden" name="job_type" class="jobType">
            <div class="ctm-option-box">
              <div class="ctm-option" onclick="setThis('job_type',' ')"  >-</div>
              <div class="ctm-option" onclick="setThis('job_type','fulltime')"  >Full Time</div>
              <div class="ctm-option" onclick="setThis('job_type','parttime')"  >Part Time</div>
              <div class="ctm-option" onclick="setThis('job_type','contract')"  >Contract</div>
              <div class="ctm-option" onclick="setThis('job_type','internship')" >Internship</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 search-btn">
        <button class="btn" id="search" >@lang('frontend.button.search')</button>
      </div>
    </div>
  </form>
</div>
<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
 <form action="{{url('search-job')}}" id="SearchForm" class="formForHouseSearch" method="get"  enctype="multipart/form-data" >
  @csrf
  <div class="row mar-0">
   <div class="col-sm-12">
    <div class="input-group mb-3">
     <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon1"><img src="{{ asset('assets/img/search1.svg') }}" class="search-img" alt="lt flag"></span>
    </div>
    <input id="pac-input1" type="text" name="address" class="form-control search-i controls pac-input" placeholder="@lang('frontend.house.browse.search.address')" aria-label="Username" aria-describedby="basic-addon1">
    <div id="map1"></div>
  </div>
</div>
<div class="col-12">
  <div class="search-service">
   <div class="row mar-0 house-category">
    <input type="hidden" class="formType" id="formType" value="get-job" name="form_type">
  </div>
</div>
</div>
<div class="col-md-6">
  <div class="form-group">
    <label for="">Job Title</label>
    <input type="text" class="form-control" name="title">
  </div>
</div>
<div class="col-md-6">
  <div class="form-group">
    <label for=""style='visibility: hidden;'>Category</label>
    <div class="ctm-select">
      <div class="ctm-select-txt">
        <span class="select-txt" id="category">-choose-</span>
      </div>
      <span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
      <input type="hidden" class="jobCategory" name="job_category">
      <div class="ctm-option-box">
       
        <div class="ctm-option" onclick="setThis('job_category',' ')">-</div>
        <div class="ctm-option" onclick="setThis('job_category','IT')">IT</div>
        <div class="ctm-option" onclick="setThis('job_category','Customer Service')">Customer Service</div>
        <div class="ctm-option" onclick="setThis('job_category','Retail')">Retail</div>
        <div class="ctm-option" onclick="setThis('job_category','Sales')">Sales</div>
        <div class="ctm-option" onclick="setThis('job_category','Cleaning')">Cleaning</div>
        <div class="ctm-option" onclick="setThis('job_category','Logistics')">Logistics</div>
        <div class="ctm-option" onclick="setThis('job_category','Warehouse')">Warehouse</div>
        <div class="ctm-option" onclick="setThis('job_category','Waiting/Bar staff')">Waiting/Bar staff</div>
        <div class="ctm-option" onclick="setThis('job_category','Accounting')">Accounting</div>
        <div class="ctm-option" onclick="setThis('job_category','Management')">Management</div>
        <div class="ctm-option" onclick="setThis('job_category','Construction')">Construction</div>
        <div class="ctm-option" onclick="setThis('job_category','Design')">Design</div>
        <div class="ctm-option" onclick="setThis('job_category','Finance')">Finance</div>
        <div class="ctm-option" onclick="setThis('job_category','Health Care')">Health Care</div>
        <div class="ctm-option" onclick="setThis('job_category','Manufacturing')">Manufacturing</div>
        <div class="ctm-option" onclick="setThis('job_category','Marketing')">Marketing</div>
        <div class="ctm-option" onclick="setThis('job_category','Media')">Media</div>
        <div class="ctm-option" onclick="setThis('job_category','Nursing')">Nursing</div>
        <div class="ctm-option" onclick="setThis('job_category','Teaching')">Teaching</div>
        <div class="ctm-option" onclick="setThis('job_category','Driver')">Driver</div>
        
      </div>
    </div>
  </div>
</div>
<div class="col-md-6">
  <div class="form-group">
    <label for="">Salary Type</label>
    <div class="ctm-select">
      <div class="ctm-select-txt">
        <span class="select-txt" id="category">-choose-</span>
      </div>
      <span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
      <input type="hidden" name="salary_type" class="salaryType">
      <div class="ctm-option-box">
        <div class="ctm-option" onclick="setThis('salary_type',' ')"  >-</div>
        <div class="ctm-option" onclick="setThis('salary_type','month')"  >Per Month</div>
        <div class="ctm-option" onclick="setThis('salary_type','hour')"  >Per Hour</div>
        <div class="ctm-option" onclick="setThis('salary_type','year')"  >Per Year</div>
        <div class="ctm-option" onclick="setThis('salary_type','project')" >Per Project</div>
      </div>
    </div>
  </div>
</div>
<div class="col-md-6">
  <div class="form-group">
    <label for="">Job Type </label>
    <div class="ctm-select">
      <div class="ctm-select-txt">
        <span class="select-txt" id="category">-choose-</span>
      </div>
      <span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
      <input type="hidden" name="job_type" class="jobType">
      <div class="ctm-option-box">
        <div class="ctm-option" onclick="setThis('job_type',' ')"  >-</div>
        <div class="ctm-option" onclick="setThis('job_type','fulltime')"  >Full Time</div>
        <div class="ctm-option" onclick="setThis('job_type','parttime')"  >Part Time</div>
        <div class="ctm-option" onclick="setThis('job_type','contract')"  >Contract</div>
        <div class="ctm-option" onclick="setThis('job_type','internship')" >Internship</div>
      </div>
    </div>
  </div>
</div>
<div class="col-12 search-btn">
  <button class="btn" id="search" >@lang('frontend.button.search')</button>
</div>
</div>
</form>
</div>
</div>

</div>
</div>
<div class="col-12 col-md-5">
  <div class="row mar-0">
    <div class="col-12 pad-0">
      <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          @php $n = 1 @endphp
          @if($sliders->count())
          @foreach($sliders as $slider)
          <div class="carousel-item <?= $n == 1 ? 'active': '' ?>">
            <a target="_blank" href="{{$slider->url}}">
              <div class="home-slider-img">
                <img class="cover" src="{{asset('assets/img/Sliders/'. $slider->slider)}}" alt="product">
              </div>
            </a>
          </div>
          @php ++$n @endphp
          @endforeach
          @else
          <div class="carousel-item active">
            <a href="#">
              <div class="home-slider-img">
                <img class="cover" src="{{asset('assets/img/Sliders/demo_1.jpg')}}" alt="slider">
              </div>
            </a>
          </div>
          @endif
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls1" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls1" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</section>
<section class="product-wrapper"style="background-color: #fff">
 <div class="row mar-0">
  <div class="col-12 pad-0">
   <div class="section-tlt"> @lang('frontend.home.heading.feature')</div>
 </div>
 <div class="col-10 pad-0">
   <div class="posted">
    <div class="row mar-0">
      @if(@$feature_products)
      @foreach($feature_products as $post)
      @if($post->advertisement)
      <div class="col-12 col-sm-6 col-md-4 col-lg-3 pad-l-0">
        <div class="product-list">
          <div class="product">
            <div class="product-img-p">
              <div class="product-img">
                <img class="cover" src="{{('ad_thumbnail/'.@$post->advertisement->coverImage->image) }}" alt="product">
              </div>
              <span class="img-txt">@ {{ucfirst(@$post->advertisement->form_type)}}</span>
            </div>
            <div class="product-txt">
             <div class="product-price">{{@$post->advertisement->salary_from}} - {{@$post->advertisement->salary_to}} / {{@$post->advertisement->salary_type}} ({{@$post->advertisement->salary_currency}})
              <span onclick="addToFavourite('<?= $post->advertisement['_id'] ?>')" class="fav"><i class="far fa-heart"></i></span></div>
              <div class="product-tlt">{{ucfirst(@$post->advertisement->title)}}</div>
              <div class="product-time">{{@$post->created_at->diffForHumans()}}</div>
              <div class="view-btn"> 
                <a onclick="addToLastVisit('<?= $post->advertisement['_id'] ?>')" href="{{url('advertisement-details',['cat' => 'job','form_type' => @$post->advertisement->form_type,'post_id' => @$post->advertisement->_id])}}" class="text-light" >
                  @lang('frontend.button.view')
                </a>  
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif
      @endforeach
      @else
      @lang('frontend.message.no.feature.product')
      @endif
    </div>
    <div class="row mar-0">
     <div class="col-12 pad-l-0">
      <div class="all-view">
       <!-- <div class="view-btn"><i class="fa fa-bars"></i> view all new posts</div> -->
     </div>
   </div>
 </div>
</div>
</div>
<div class="col-2 pad-0">
 @foreach(@$ad_products as $post)
 @if($post->advertisement)
 <div class="col-12 col-sm-12 col-md-12 col-lg-12 pad-l-0"style="margin-bottom: 15px;">
  <div class="product-list">
    <div class="product">
      <div class="product-img-p">
        <div class="product-img">
          <img class="cover" src="{{('ad_thumbnail/'.@$post->advertisement->coverImage->image) }}" alt="product">
        </div>
        <span class="img-txt">@ {{ucfirst(@$post->advertisement->form_type)}}</span>
      </div>
      <div class="product-txt">
       <div class="product-price">{{@$post->advertisement->salary_from}} - {{@$post->advertisement->salary_to}} / {{@$post->advertisement->salary_type}} ({{@$post->advertisement->salary_currency}})
        <span onclick="addToFavourite('<?= $post->advertisement['_id'] ?>')" class="fav"><i class="far fa-heart"></i></span></div>
        <div class="product-tlt">{{ucfirst(@$post->advertisement->title)}}</div>
        <div class="product-time">{{@$post->created_at->diffForHumans()}}</div>
        <div class="view-btn">
         <a onclick="addToLastVisit('<?= $post->advertisement['_id'] ?>')" href="{{url('advertisement-details',['cat' => 'job','form_type' => @$post->advertisement->form_type,'post_id' => @$post->advertisement->_id])}}" class="text-light" >
           @lang('frontend.button.view')
         </a> 
       </div>
     </div>
   </div>
 </div>
</div>
@endif
@endforeach
</div>
</div>
</section>
@endsection
@section('script')
<script>
 $(document).ready(function(){
 });
 var swiper = new Swiper('.ctm-container', {
  slidesPerView: 5,
  spaceBetween: 15,
  loop: false,
  navigation: {
   nextEl: '.swiper-button-next',
   prevEl: '.swiper-button-prev',
 },

 breakpoints: {
   1400: {
    slidesPerView: 4,
  },
  1000: {
    slidesPerView: 3,
  },
  700: {
    slidesPerView: 2,
  },
  450: {
    slidesPerView: 1,
  }
}
});


 $(document).ready(function(){

  $(".item-list-p").click(function(){
   window.val = $(this).find('.this_cat').val();
 			// alert(val);
 		});

  $('#search').click(function(){
 			// var aaa = $('.active').find('.this_cat').val();
 			// alert(aaa);
 			if ($('.item-list-p').hasClass('active')){
 				var activeElement = document.getElementsByClassName('item-list-p active');
 				var activeElementValue = activeElement[0].querySelector('.this_cat').value;
 				if (activeElementValue) {
 					// alert(activeElementValue);
 				}
 			}
 			else{
 				console.log(2);
 			}

 			
 		});

});

 window.search_house = '<?= url('search-house')?>'
 window.get_this_country_cities = '<?= url('get-cities-under-the-country')?>'
 window.get_this_region_cities = '<?= url('get-cities-under-the-region')?>'

 function setThis(filed,item){
  if(filed == 'salary_type'){
    $(".salaryType").val(item);
  }else if(filed == 'job_category'){
    $(".jobCategory").val(item);
  }else if(filed == 'job_type'){
    $(".jobType").val(item);
  }
}
</script>
@endsection