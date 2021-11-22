 @extends('frontend.app')
 @section('style')

 <style>
 	.header-section .main-menu {
 		border-bottom: 1px solid #ddd;
 	}
 	.ctm-option-box{
 		overflow: auto;
 		max-height: 250px;
 	}
 	.extra-info1 .des-tips{
 		padding: 6%;
 	}	
 	.check-req{
 		position: relative;
 		top: 78px;
 		z-index: 1;
 		left: 163px;
 		display: none;
 	}

 	#popupAlert  {
 		visibility: hidden;
 		min-width: 250px;
 		margin-left: -125px;
 		background-color: #f91039;
 		color: #fff;
 		text-align: center;
 		border-radius: 2px;
 		padding: 16px;
 		position: fixed;
 		z-index: 1111;
 		left: 50%;
 		bottom: 30px;
 		font-size: 17px;
 	}
 	#popupAlert.show
 	{
 		visibility: visible;
 		-webkit-animation: fadein 0.5s, fadeout 0.5s 5s;
 		animation: fadein 0.5s, fadeout 0.5s 5s;
 	}
 	@-webkit-keyframes fadein {
 		from {bottom: 0; opacity: 0;} 
 		to {bottom: 30px; opacity: 1;}
 	}

 	@keyframes fadein {
 		from {bottom: 0; opacity: 0;}
 		to {bottom: 30px; opacity: 1;}
 	}

 	@-webkit-keyframes fadeout {
 		from {bottom: 30px; opacity: 1;} 
 		to {bottom: 0; opacity: 0;}
 	}

 	@keyframes fadeout {
 		from {bottom: 30px; opacity: 1;}
 		to {bottom: 0; opacity: 0;}
 	}

 	input { display: block; }
 	label span.asterisk { display: none; }
 	.reqired-wth-custom-css{
 		position: absolute;
 		z-index: 1;
 	}
 	.form-group .input-group .reqired-wth-custom-css{
 		top: 49px;
 		left: 0;
 	}
 	.form-group .reqired-wth-custom-css{
 		top: 80px;
 		left: 15px;
 	}
 	.please{
 		position: absolute;
 		z-index: 1;
 		text-align: center;
 		top: 33px;
 		left: 706px;
 		background: rgba(255, 255, 255,0.5);
 		border-radius: 4px;
 		padding: 6px 40px;
 		display: none;
 	}
 	.try-again{
 		color:red;
 		position: absolute;
 		top: 80px;
 		left: 105px;
 		font-size: 12px;
 		display: none;
 	}

 	.img-req-lb-msg{
 		padding: 0 !important;
 		margin: 0 !important;
 		position: relative !important;
 		left: -202px !important;
 		top: 53px !important;
 		width: 206% !important;
 	}
 </style>
 <style>
      /* Always set the map height explicitly to define the size of the div
      * element that contains the map. */
      #map {
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

      #pac-input {
      	background-color: #fff;
      	font-family: Roboto;
      	font-size: 15px;
      	font-weight: 300;
      	margin-left: 12px;
      	padding: 0 11px 0 13px;
      	text-overflow: ellipsis;
      	width: 400px;
      }

      #pac-input:focus {
      	border-color: #4d90fe;
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
    <style>
      #files{
        /*display: block;*/
      }
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
      .add-photo .ctm-file-cover input[type="file"]{
        display: none;
      }
      .add-photo .ctm-file-cover{
        width: 200px;
      }
      .add-photo .ctm-file-cover label {
        padding: 50px 0;
        background: #F6F7F9;
        display: table;
        color: #000;
        width: 100%;
        text-align: center;
        font-size: 20px;
        border-radius: 10px;
        margin-top: 30px;
        cursor: pointer;
      }
    </style>
    @endsection
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    @section('content')
    <a id="popupAlertSuccess">Ad Submitted Successfully</a>
    <a id="popupAlert">You must provide all values of reqiured field</a>
    <section class="category-form-section sec-pad">
     <form id="formForm" class="formForHouseUpdate" method="post" enctype="multipart/form-data">
      @csrf
      <input type="hidden" value="{{$post->cat}}" name="cat">
      <input type="hidden" value="{{$post->type}}" name="type">
      <input type="hidden" value="{{$post->form_type}}" name="form_type">
      <input type="hidden" value="{{$post->_id}}" name="post_id">
      <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-3" style="position: relative;top: 4em;left: 1em;">
         <div class="form-group">
          <label for="inputAddress"> Title</label>
          <div class="form-group">
           <label for="title"><span class="asterisk text-danger">This field is required</span></label>
           <input type="text" name="title" value="{{$post->title}}" id="" autofocus class="form-control required">
         </div>
       </div>
     </div>
   </div>
   <div class="search main-info">
     <div class="row mar-0">
      <div class="col-12">
       <div class="section-tlt">Basic Information</div>
     </div>
     <div class="col-sm-6 col-md-4 col-lg-6"style="padding-bottom: 10px;">
       <!-- <label for="inputAddress">Address</label> -->
       <label for="region"><span class="asterisk text-danger">This field is required</span></label>
       <input id="pac-input" value="{{$post->address}}" name="address" class="controls form-control required" type="text" placeholder="Search Address">
       <div id="map"></div>
       <input type="hidden" id="contactAddressUpdate" name="contact_address_update" value="0">
     </div>
     <div class="col-sm-6 col-md-4 col-lg-3">
       <div class="form-group">
        <label for="inputAddress">Award</label>
        <div class="ctm-select">
         <div class="ctm-select-txt">
          <span class="select-txt" id="city">{{$post->award}} Kr</span>
        </div>
        <span class="select-arr">
          <img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag">
        </span>
        <input type="hidden" value="{{$post->award}}" id="award" name="award"/>
        <div class="ctm-option-box">
          @foreach(App\House\Award::all() as $award)
          <div class="ctm-option" onclick="setThis('award','<?=  $award->award_value?>')">{{$award->award_value}} Kr</div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4 col-lg-3">
   <div class="form-group">
    <label for="inputAddress">Room Nr.</label>
    <input type="number" value="{{$post->room_nr}}" class="form-control" placeholder="mention how much room" name="room_nr">
  </div>
</div>

<div class="col-sm-6 col-md-4 col-lg-3">
 <div class="form-group">
  <label for="inputAddress">Area (m²) </label>
  <div class="ctm-select">
   <div class="ctm-select-txt">
    <span class="select-txt" id="city">{{$post->area}}</span>
  </div>
  <span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
  <input type="hidden" value="{{$post->area}}" id="LivibArea" name="area"/>
  <div class="ctm-option-box">
    @foreach(App\House\LivingArea::all() as $area)
    <div class="ctm-option" onclick="setThis('living_area','<?= $area->area_size?>')">{{$area->area_size}}</div>
    @endforeach
  </div>
</div>			
</div>
</div> 
@if($post->type == 'sale')
<div class="col-sm-6 col-md-4 col-lg-3">
 <div class="form-group">
  <label for="inputAddress">Price</label>
  <div class="input-group">
   <label for="model"><span class="asterisk text-danger reqired-wth-custom-css">This field is required</span></label>
   <input style="border-left: 1px solid #ced4da;border-right: none;" type="text" class="form-control search-i required" placeholder="5000" value="{{$post->price}}" name="price" id="price">
   <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1" style="border-right: 1px solid #ced4da;border-left: none;padding-left: 0;padding-right: 15px;">$</span>
  </div>
</div>
</div>
</div>
@elseif($post->type == 'rent')
<div class="col-sm-6 col-md-4 col-lg-3">
 <div class="form-group">
  <label for="inputAddress">Rent Type</label>
  <div class="ctm-select">
   <div class="ctm-select-txt pad-l-10">
    <span class="select-txt" id="">{{$post->rent_type}}</span>
    <span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
  </div>
  <label for="rentType"><span class="asterisk text-danger">This field is required</span></label>
  <input type="hidden" id="rentType" value="{{$post->rent_type}}" name="rent_type" class="required" />	
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
   <label for="model"><span class="asterisk text-danger reqired-wth-custom-css">This field is required</span></label>
   <input style="border-left: 1px solid #ced4da;border-right: none;" type="text" class="form-control search-i required" placeholder="amount" name="price" value="{{$post->price}}" id="price">
   <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1" style="border-right: 1px solid #ced4da;border-left: none;padding-left: 0;padding-right: 15px;">$</span>
  </div>
</div>
</div>
</div>
@endif
<div class="col-sm-6 col-md-4 col-lg-3">
 <div class="form-group">
  <label for="inputAddress">Keyword</label>
  <div class="form-group">
   <input type="text" value="{{$post->keyword}}" class="form-control" name="keyword">
 </div>
</div>
</div>
<div class="col-sm-6 col-md-4 col-lg-3">
 <div class="form-group">
  <label for="inputAddress">New Development</label>
  <div class="ctm-select">
   <div class="ctm-select-txt">
    <span class="select-txt" id="city">{{$post->new_development?: '-choose-' }}</span>
  </div>
  <span class="select-arr">
    <img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag">
  </span>
  <input type="hidden" id="neDevelopment" value="{{$post->new_development}}" name="new_development"/>
  <div class="ctm-option-box">
    <div class="ctm-option" onclick="setThis('new_development','Show new production')">Show new production</div>
    <div class="ctm-option" onclick="setThis('new_development','Show only new production')">Show only new production</div>
    <div class="ctm-option" onclick="setThis('new_development','Hide new production')">Hide new production</div>
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
     <span class="select-txt" id="city">{{$post->water_distance}} M</span>
   </div>
   <span class="select-arr">
     <img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag">
   </span>
   <input type="hidden" id="waterDistance" value="{{$post->water_distance}}" name="water_distance" />
   <div class="ctm-option-box">
     <div class="ctm-option" onclick="setThis('water_dis','all')">All</div>
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
     <input type="text" name="built_year" value="{{$post->built_year}}" id="built_year" class="form-control">
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
    <span class="select-txt" id="category">{{$post->house_type?: '-choose-' }}</span>
    <span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
  </div>
  <input type="hidden" id="bType" value="{{$post->house_type}}" name="building_type" />
  <div class="ctm-option-box">
    @foreach(App\House\Equipment::all() as $eqiupment)
    <div class="ctm-option" onclick="setThis('b_type', '<?= $eqiupment->eq_name?>')">{{$eqiupment->eq_name}}</div>
    @endforeach
  </div>
</div>
</div>

</div>
<div class="col-sm-6 col-md-4 col-lg-3">
 <div class="form-group">
  <label for="basic-url">Square Meters Price (  /m <sup>2</sup>  )</label>
  <div class="row mar-0">
   <div class=" col-12 pad-0 price-i">
    <div class="form-group">
     <input type="text"name="per_Sqr_price" id="built_year" value="{{$post->per_Sqr_price}}" class="form-control">
   </div>
 </div>
</div>
</div>
</div>
</div>
</div>
<div class="additional-info extra-info1 add-photo" >
 <div class="row mar-0">
  <div class="col-12 pad-0">
   <div class="row mar-0">
    <div class="col-12">
     <div class="section-tlt">Description</div>
   </div>
   <div class="col-12 col-sm-7 col-md-8">
     <div class="des-box">
      <div class="form-group mar-0">
       <textarea class="form-control" name="description" id="description" rows="3"><?=$post->description?></textarea>
     </div>
   </div>
 </div>
 <div class="col-12 col-sm-5 col-md-4" style="position: relative;">
   <div class="des-tips">
    <div class="arrow-right"></div>
    <div class="tips-tlt">Tips</div>
    <div class="tip">
     <div class="tip-tlt"><span>1</span> Detailed comment can attract more attention to your ad.</div>
   </div>
   <div class="tip">
     <div class="tip-tlt"><span>2</span>The more informative your ad is, the less questions you will be asked.</div>
   </div>
   <div class="tip">
     <div class="tip-tlt"><span>3</span>Adverts with interesting comments can be featured on Autoplius.lt facebook page.</div>
     <!-- <div class="tip-txt">Lorem Extra name expented</div> -->
   </div>
 </div>
</div>
</div>
</div>
<div class="col-12">
 <div class="section-tlt" style='border: none'>Add photos</div>
</div>
<div class="col-12" style="position: relative;">
 <div class="e-txt"><i class="fa fa-exclamation-circle"></i> It is possible to upload multiple photos at once</div>
</div>
<div class="col-md-6"  style="position: relative;">
  <div class="section-tlt pb-0" style='border: none'>Add cover (single)</div>
  <div class="ctm-file-cover single-cover">
    <label> 
      <div>
        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 63.618 53.015">
          <g id="Group_121" data-name="Group 121" transform="translate(0 -2)">
            <path id="Path_81" data-name="Path 81" d="M55.665,9.952H46.481L41.966,3.18A2.654,2.654,0,0,0,39.761,2h-15.9a2.654,2.654,0,0,0-2.205,1.18L17.137,9.952H7.952A7.962,7.962,0,0,0,0,17.9V47.062a7.962,7.962,0,0,0,7.952,7.952H55.665a7.962,7.962,0,0,0,7.952-7.952V17.9A7.962,7.962,0,0,0,55.665,9.952Zm2.651,37.11a2.652,2.652,0,0,1-2.651,2.651H7.952A2.653,2.653,0,0,1,5.3,47.062V17.9a2.655,2.655,0,0,1,2.651-2.651h10.6a2.654,2.654,0,0,0,2.205-1.18L25.275,7.3H38.343l4.514,6.773a2.654,2.654,0,0,0,2.205,1.18h10.6A2.653,2.653,0,0,1,58.316,17.9Z" transform="translate(0 0)" fill="#cacaca"/>
            <path id="Path_82" data-name="Path 82" d="M20.254,8A13.254,13.254,0,1,0,33.507,21.254,13.269,13.269,0,0,0,20.254,8Zm0,21.206a7.952,7.952,0,1,1,7.952-7.952A7.962,7.962,0,0,1,20.254,29.206Z" transform="translate(11.555 9.904)" fill="#cacaca"/>
          </g>
        </svg>
      </div>
      Select Image <!--  -->
      <label class="img-req-lb-msg" for="model"><span class="asterisk text-danger reqired-wth-custom-css">Cover field is required</span></label>
      <input type="file" id="cover" onchange="removeCvrPip()" name="cover"  class="{{$post->coverImage?:'required'}}">
    </label> 
    @if($post->coverImage)
    <span class="pip" id="cvrPip">
      <img class="imageThumb" src="{{asset('ad_thumbnail/'. $post->coverImage->image)}}" alt="{{$post->coverImage->image}}">
      <!-- <br/><span onclick="removeCoverImg(event,'<?= @$post->coverImage->_id?>')" class="remove">Remove image</span> -->
    </span>
    @endif
  </div>
</div>
<div class="col-md-6"  style="position: relative;">
  <div class="section-tlt pb-0" style='border: none'>Add photos (Multiple)</div>
  <div class="ctm-file multi-photo">
    <label> 
      <div>
        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 63.618 53.015">
          <g id="Group_121" data-name="Group 121" transform="translate(0 -2)">
            <path id="Path_81" data-name="Path 81" d="M55.665,9.952H46.481L41.966,3.18A2.654,2.654,0,0,0,39.761,2h-15.9a2.654,2.654,0,0,0-2.205,1.18L17.137,9.952H7.952A7.962,7.962,0,0,0,0,17.9V47.062a7.962,7.962,0,0,0,7.952,7.952H55.665a7.962,7.962,0,0,0,7.952-7.952V17.9A7.962,7.962,0,0,0,55.665,9.952Zm2.651,37.11a2.652,2.652,0,0,1-2.651,2.651H7.952A2.653,2.653,0,0,1,5.3,47.062V17.9a2.655,2.655,0,0,1,2.651-2.651h10.6a2.654,2.654,0,0,0,2.205-1.18L25.275,7.3H38.343l4.514,6.773a2.654,2.654,0,0,0,2.205,1.18h10.6A2.653,2.653,0,0,1,58.316,17.9Z" transform="translate(0 0)" fill="#cacaca"/>
            <path id="Path_82" data-name="Path 82" d="M20.254,8A13.254,13.254,0,1,0,33.507,21.254,13.269,13.269,0,0,0,20.254,8Zm0,21.206a7.952,7.952,0,1,1,7.952-7.952A7.962,7.962,0,0,1,20.254,29.206Z" transform="translate(11.555 9.904)" fill="#cacaca"/>
          </g>
        </svg>
      </div>
      Select Image
      <label class="img-req-lb-msg" for="model"><span class="asterisk text-danger reqired-wth-custom-css">Image field is required</span></label>
      <input type="file" id="files" name="files[]" multiple  class="">
    </label>
  </div>
  @foreach($post->images as $key => $img)
  @if($img->type !== 'cover')
  <span class="pip">
    <img class="imageThumb" src="{{asset('houseAdimages/'. $img->image)}}" title=""/>
    <br/><span onclick="removeAltImg(event,'<?=$img->_id?>')" class="remove">Remove image</span>
  </span>
  @endif
  @endforeach
</div>
</div>
</div>
</div>
</div>
<div class="extra-info2">
 <div class="row mar-0"> 
  <div class="col-12">
   <div class="section-tlt">Youtube.com video link</div>
 </div>
 <div class="col-12">
   <div class="row mar-0"> 
    <div class="col-md-4 pad-0">
     <input type="text" placeholder="Youtube.com video link" value="{{$post->youtube}}"  name="youtube" class="form-control">
   </div>
 </div>
</div>
</div>
<div class="row mar-0"> 
  <div class="col-12">
   <div class="section-tlt">3D tour</div>
 </div>
 <div class="col-12">
   <div class="row mar-0"> 
    <div class="col-md-4 pad-0">
     <input type="text" placeholder="3D tour" value="{{$post->youtube}}" name="thDTour" class="form-control">
   </div>
 </div>
</div>
</div>
</div>
<div class="extra-info2">
 <div class="menu-cnt user-con" id="eeeeeee">
  <div class="row mar-0"> 
   <div class="col-12">
    <div class="e-txt"style="margin: 15px 0;">Contact info</div>
  </div>
  <div class="col-sm-6 col-md-4 col-lg-3">
    <div class="form-group">
     <label for="inputAddress">Contact Phone</label>
     <label for="contact_number"><span class="asterisk text-danger reqired-wth-custom-css">This field is required</span></label>
     <input type="number"  class="form-control required" id="contact_number" name="contact_number" value="{{$post->userInfo->contact_number}}">
     <input type="hidden" id="contactNumberUpdate" name="contact_number_update" value="">
   </div>
 </div>
 <div class="col-sm-6 col-md-4 col-lg-3">
  <div class="form-group">
   <label for="inputAddress">Email</label>
   <label for="contact_mail"><span class="asterisk text-danger reqired-wth-custom-css">This field is required</span></label>
   <input type="email" name="contact_mail" id="contact_mail" class="form-control
   required search-i" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1" value="{{$post->userInfo->contact_mail}}">
   <input type="hidden" id="contactEmailUpdate" name="contact_email_update" value="">
 </div>
</div>

<div class="col-sm-6 col-md-4 col-lg-3">
  <div class="form-group">
   <label for="inputAddress">Additional Phone</label>
   <input type="number" class="form-control" name="additional_number" value="{{$post->userInfo->additional_number}}">
 </div>
</div>
<div class="col-sm-6 col-md-4 col-lg-3">
  <div class="form-group">
   <label for="inputAddress">Name</label>
   <label for="make"><span class="asterisk text-danger  reqired-wth-custom-css">This field is required</span></label>
   <input type="text"  class="form-control required" name="contact_name" value="{{$post->userInfo->contact_name}}">
   <input type="hidden" id="contactNameUpdate" name="contact_name_update" value="">
 </div>
</div>
<div class="col-sm-6 col-md-4 col-lg-3">
  <div class="form-group">
    <label for="">City</label>
    <div class="ctm-select">
     <div class="ctm-select-txt">
      <span class="select-txt" id="category">{{$post->city}}</span>
    </div>
    <label for="make">
      <span class="asterisk text-danger  reqired-wth-custom-css">This field is required</span>
    </label>
    <span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
    <input type="hidden" name="city" value="{{$post->city}}" class="required" id="jobCity">
    <div class="ctm-option-box">
      <div class="ctm-option" onclick="setThis('job_city','Plats')"  >Plats</div>
      <div class="ctm-option" onclick="setThis('job_city','Stockholm')"  >Stockholm</div>
      <div class="ctm-option" onclick="setThis('job_city','Skåne')"  >Skåne</div>
      <div class="ctm-option" onclick="setThis('job_city','Göteborg')" >Göteborg</div>
      <div class="ctm-option" onclick="setThis('job_city','Östergötland')" >Östergötland</div>
      <div class="ctm-option" onclick="setThis('job_city','Norrbotten')" >Norrbotten</div>
      <div class="ctm-option" onclick="setThis('job_city','Uppsala')" >Uppsala</div>
      <div class="ctm-option" onclick="setThis('job_city','Jönköping')" >Jönköping</div>
      <div class="ctm-option" onclick="setThis('job_city','Älvsborg')" >Älvsborg</div>
      <div class="ctm-option" onclick="setThis('job_city','Västerbotten')" >Västerbotten</div>
      <div class="ctm-option" onclick="setThis('job_city','Västmanland')" >Västmanland</div>
      <div class="ctm-option" onclick="setThis('job_city','Dalarna')" >Dalarna</div>
      <div class="ctm-option" onclick="setThis('job_city','Örebro')" >Örebro</div>
      <div class="ctm-option" onclick="setThis('job_city','Södermanland')" >Södermanland</div>
      <div class="ctm-option" onclick="setThis('job_city','Västernorrland')" >Västernorrland</div>
      <div class="ctm-option" onclick="setThis('job_city','Gävleborg')" >Gävleborg</div>
      <div class="ctm-option" onclick="setThis('job_city','Skaraborg')" >Skaraborg</div>
      <div class="ctm-option" onclick="setThis('job_city','Halland')" >Halland</div>
      <div class="ctm-option" onclick="setThis('job_city','Utomlands')" >Utomlands</div>
      <div class="ctm-option" onclick="setThis('job_city','Blekinge')" >Blekinge</div>
      <div class="ctm-option" onclick="setThis('job_city','Kronoberg')" >Kronoberg</div>
      <div class="ctm-option" onclick="setThis('job_city','Kalmar')" >Kalmar</div>
      <div class="ctm-option" onclick="setThis('job_city','Norge')" >Norge</div>
      <div class="ctm-option" onclick="setThis('job_city','Jämtland')" >Jämtland</div>
      <div class="ctm-option" onclick="setThis('job_city','Gotland')" >Gotland</div>
    </div>
  </div>
</div>
</div>
</div>
</div>
<div class="row mar-0">
  <div class="col-12">
   <button class="btn ctm-btn next-btn" form="formForm" type="submit">Update</button>
 </div>	
</div>
</div>
</form>
</section>
</section>

@endsection
@section('script')
<script>
  window.update_house_form = '<?= url('update-house-form')?>'
  window.check_login = '<?= url('action-for-login')?>'
  window.get_this_country_cities = '<?= url('get-cities-under-the-country')?>'
  window.get_this_region_cities = '<?= url('get-cities-under-the-region')?>'
  window.remove_cover_img = '<?= url('remove-advertisement-cover')?>'
</script>

<script>
	function setThis(filed,item){

		if(filed == 'region'){
			$("#region").val(item);
		}else if(filed == 'job_city'){
			$("#jobCity").val(item);
		}else if(filed == 'municipalities'){
			$("#municipalitie").val(item);
		}else if(filed == 'closest_body'){
			$("#closestBody").val(item);
		}else if(filed == 'building_type'){
			$("#building_type").val(item);
		}else if(filed == 'house_type'){
			$("#house_type").val(item);
		}else if(filed == 'equipment'){
			$("#equipment").val(item);
		}else if(filed == 'BuildingEnergyClass'){
			$("#BuildingEnergyClass").val(item);
		}else if(filed == 'rent_type'){
			$('#rentType').val(item);
		}else if(filed == 'municipalities'){
			$('#municipalitie').val(item);
		}else if(filed == 'leisure_hotel_type'){
			$("#leisure_hotel_type").val(item);
		}else if(filed == 'new_development'){
			$("#neDevelopment").val(item);
		}else if(filed == 'water_dis'){
			$("#waterDistance").val(item);
		}else if(filed == 'b_type'){
			$("#bType").val(item);
		}else if(filed == 'award'){
			$("#award").val(item);
		}else if(filed == 'living_area'){
			$("#LivibArea").val(item);
		}
	}
</script>

<script>

  $(document).ready(function() {
    if (window.File && window.FileList && window.FileReader) {
      $(".multi-photo #files").on("change", function(e) {
        var files = e.target.files,
        filesLength = files.length;
        for (var i = 0; i < filesLength; i++) {
          var f = files[i]
          var fileReader = new FileReader();
          fileReader.onload = (function(e) {
            var file = e.target;
            $("<span class=\"pip\">" +
              "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
              "<br/><span class=\"remove\">Remove image</span>" +
              "</span>").insertAfter(".multi-photo");
            $(".remove").click(function(){
              $(this).parent(".pip").remove();
            });     
          });
          fileReader.readAsDataURL(f);
        }
      });
    } else {
      alert("Your browser doesn't support to File API")
    }

    
    if (window.File && window.FileList && window.FileReader) {
      $(".single-cover #cover").on("change", function(e) {
        var files = e.target.files,
        filesLength = files.length;
        for (var i = 0; i < filesLength; i++) {
          var f = files[i]
          var fileReader = new FileReader();
          fileReader.onload = (function(e) {
            var file = e.target;
            $("<span class=\"pip\">" +
              "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
              "<br/><span class=\"remove\">Remove image</span>" +
              "</span>").insertAfter(".single-cover");
            $(".remove").click(function(){
              $(this).parent(".pip").remove();
            });     
          });
          fileReader.readAsDataURL(f);
        }
      });
    } else {
      alert("Your browser doesn't support to File API")
    }

  });
</script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.js" ></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection