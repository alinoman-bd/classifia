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
     top: 15px;
     left: 8px;
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
        position: absolute;
        z-index: 1;
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
    @endsection
    <?php 
    // if (Session::has('ad_info')) {
      // Session::forget('ad_info');
      // dd(Session::get('ad_info'));
    // } 
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    @section('content')
    <a id="popupAlertSuccess">Ad Submitted Successfully</a>
    <a id="popupAlert">You must provide all values of reqiured field</a>
    <section class="category-form-section sec-pad">
      <div class="step-menu">
       <div class="row mar-0">
        <div class="col-12"> 
         <div class="step-ul">
          <span class="step-li step_one active">1</span>
          <span class="step-li step_two">2</span>
          <span class="step-li step_three">3</span>
          <span class="step-li step_four">4</span>
        </div>
      </div>
    </div>
  </div>
  @include('frontend.category.payment-form')
  <form id="formForm" class="formForHouse" method="post" enctype="multipart/form-data">
   @csrf

   <input type="hidden" value="{{$type}}" name="type">
   <input type="hidden" value="{{$cat}}" name="cat">
   <div class="row">
    <div class="col-sm-6 col-md-4 col-lg-3" style="position: relative;top: 4em;left: 1em;">
     <div class="form-group">
      <label for="inputAddress"> Title</label>
      <div class="form-group">
       <label for="title"><span class="asterisk text-danger">This field is required</span></label>
       <input type="text" name="title" id="" autofocus class="form-control required">
     </div>
   </div>
 </div>
</div>
@if($type ==  'sale')
@if($cat ==  'apartments')
@include('frontend.category.house.forms.sale.apartments')
@elseif($cat ==  'leisure-hotels')
@include('frontend.category.house.forms.sale.leisure-hotels')
@elseif($cat ==  'country-house')
@include('frontend.category.house.forms.sale.office')
@elseif($cat ==  'other')
@include('frontend.category.house.forms.sale.other')
@elseif($cat ==  'plots')
@include('frontend.category.house.forms.sale.plots')
@elseif($cat ==  'townhouse')
@include('frontend.category.house.forms.sale.townhouse')
@elseif($cat ==  'villas')
@include('frontend.category.house.forms.sale.villas')
@elseif($cat ==  'forest-farm')
@include('frontend.category.house.forms.sale.farms-forests')
@endif
@else
@if($cat ==  'apartments')
@include('frontend.category.house.forms.rent.apartments')
@elseif($cat ==  'leisure-hotels')
@include('frontend.category.house.forms.rent.leisure-hotels')
@elseif($cat ==  'country-house')
@include('frontend.category.house.forms.rent.office')
@elseif($cat ==  'other')
@include('frontend.category.house.forms.rent.other')
@elseif($cat ==  'plots')
@include('frontend.category.house.forms.rent.plots')
@elseif($cat ==  'townhouse')
@include('frontend.category.house.forms.rent.townhouse')
@elseif($cat ==  'villas')
@include('frontend.category.house.forms.rent.villas')
@elseif($cat ==  'forest-farm')
@include('frontend.category.house.forms.rent.farms-forests')
@endif
@endif
<section id="user-info-section-for-form">
 @if(Auth::check())
 @include('frontend.category.user-action.user-contact-info')
 <div class="extra-info2">
  <div class="row mar-0">
    <div class="col-12">
      <div class="please">
        <img src="{{ asset('assets/img/please-wait.gif') }}" alt="">
      </div>
      <button class="btn ctm-btn next-btn" onclick="showPlease()" form="formForm" type="submit">Next</button>
    </div>	
  </div>	

</div>	
@else
@include('frontend.category.user-action.login-or-not')
@endif
</form>

</section>
</section>

@endsection
@section('script')
<script>
 window.insert_house_form = '<?= url('insert-house-form')?>'
 window.check_login = '<?= url('action-for-login')?>'
 window.get_this_country_cities = '<?= url('get-cities-under-the-country')?>'
 window.get_this_region_cities = '<?= url('get-cities-under-the-region')?>'
</script>
<!-- 
@if(Session::has('insert'))
<script type="text/javascript">
  $(".formForHouse").hide();
  $(".step_one").removeClass('active');
  $(".step_two").addClass('active');
  $("#paymentForm").removeClass('d-none');
</script>
@endif -->



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
 }else if(filed == 'job_city'){
   $("#jobCity").val(item);
 }
}
</script>

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.js" ></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
@endsection