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
 	#popupAlertSuccess,
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
 	#popupAlertSuccess{
 		background: green;
 	}
 	#popupAlertSuccess.show,
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
 </style>
 @endsection
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 @section('content')
 <a id="popupAlertSuccess">Ad Updated Successfully</a>
 <a id="popupAlert">You must provide all values of reqiured field</a>
 
 <section class="category-form-section sec-pad">
 	<!-- <div class="step-menu">
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
 	</div> -->
 	@include('frontend.category.payment-form')
 	<form id="uPdateCarForm" method="post"  enctype="multipart/form-data">
 		@csrf
 		<input type="hidden" value="{{$post->form_type}}" class="form-control" name="cat">
 		<input type="hidden" value="{{$post->_id}}" class="form-control" name="post_id">
 		<div class="row">
 			<div class="col-sm-6 col-md-4 col-lg-3" style="position: relative;top: 4em;left: 1em;">
 				<div class="form-group">
 					<label for="inputAddress"> Title</label>
 					<div class="form-group">
 						<label for="title"><span class="asterisk text-danger">This field is required</span></label>
 						<input type="text" value="{{$post->title}}" name="title" id="" autofocus class="form-control required">
 					</div>
 				</div>
 			</div>
 		</div>
 		@if($post->form_type == 'used-cars')
 		@include('frontend.update-ad.car.forms.used-car-form')

 		@elseif($post->form_type == 'trailers-and-semitrailers')
 		@include('frontend.update-ad.car.forms.trailers-and-semitrailers-form')

 		@elseif($post->form_type == 'passenger-vans')
 		@include('frontend.update-ad.car.forms.used-car-form')

 		@elseif($post->form_type == 'minibus')
 		@include('frontend.update-ad.car.forms.minibus-form')

 		@elseif($post->form_type == 'minivans-minibus')
 		@include('frontend.update-ad.car.forms.minibus-form')

 		@elseif($post->form_type == 'buses')
 		@include('frontend.update-ad.car.forms.buses-form')

 		@elseif($post->form_type == 'recreational-vehicles-campers')
 		@include('frontend.update-ad.car.forms.campers-form')

 		@elseif($post->form_type == 'motorcycles')
 		@include('frontend.update-ad.car.forms.motorcycle-form')

 		@elseif($post->form_type == 'trucks')
 		@include('frontend.update-ad.car.forms.trucks-form')

 		@elseif($post->form_type == 'autotrains')
 		@include('frontend.update-ad.car.forms.autotrains-form')

 		@elseif($post->form_type == 'semi-trailer-trucks')
 		@include('frontend.update-ad.car.forms.semi-trailer-trucks-form')

 		@elseif($post->form_type == 'sailboats')
 		@include('frontend.update-ad.car.forms.sailboats-form')

 		@elseif($post->form_type == 'motorboats')
 		@include('frontend.update-ad.car.forms.motorboats-form')

 		@elseif($post->form_type == 'personal-watercraft')
 		@include('frontend.update-ad.car.forms.personal-watercraft-form')

 		@elseif($post->form_type == 'water-bikes')
 		@include('frontend.update-ad.car.forms.water-bikes-form')

 		@elseif($post->form_type == 'boats-rafts')
 		@include('frontend.update-ad.car.forms.boats-rafts-form')

 		@elseif($post->form_type == 'kayaks-canoes')
 		@include('frontend.update-ad.car.forms.kayaks-canoes-form')

 		@elseif($post->form_type == 'motors-and-engines')
 		@include('frontend.update-ad.car.forms.motors-and-engines-form')

 		@elseif($post->form_type == 'water-transport-other')
 		@include('frontend.update-ad.car.forms.other-form')

 		@elseif($post->form_type == 'construction-and-road-construction-equipment')
 		@include('frontend.update-ad.car.forms.construction-and-road-construction-form')

 		@elseif($post->form_type == 'storage-and-loading-equipment')
 		@include('frontend.update-ad.car.forms.storage-and-loading-equipment-form')

 		@elseif($post->form_type == 'municipal-machinery')
 		@include('frontend.update-ad.car.forms.municipal-machinery-form')

 		@elseif($post->form_type == 'construction-machinery-accessories')
 		@include('frontend.update-ad.car.forms.construction-machinery-accessories-form')

 		@elseif($post->form_type == 'agricultural-machinery')
 		@include('frontend.update-ad.car.forms.agricultural-machinery-form')

 		@elseif($post->form_type == 'agricultural-implements')
 		@include('frontend.update-ad.car.forms.agricultural-implements-form')

 		@elseif($post->form_type == 'forest-machinery')
 		@include('frontend.update-ad.car.forms.forest-machinery-form')
 		@endif


 		<section id="user-info-section-for-form">
 			<div class="extra-info2" >
 				<div class="row mar-0">
 					<div class="col-12">
 						<div class="e-txt"style="margin: 15px 0;">Contact info</div>
 					</div>
 					<div class="col-sm-6 col-md-4 col-lg-3">
 						<div class="form-group">
 							<label for="inputAddress">Contact Phone</label>

 							<label for="contact_number"><span class="asterisk text-danger reqired-wth-custom-css">This field is required</span></label>
 							<input type="number" onchange="checkContactInfo('number')" class="form-control required" id="contact_number" name="contact_number" value="{{$post->userInfo->contact_number}}">
 							<input type="hidden" id="contactNumberUpdate" name="contact_number_update" value="">
 						</div>
 					</div>
 					<div class="col-sm-6 col-md-4 col-lg-3">
 						<div class="form-group">
 							<label for="inputAddress">Email</label>
 							<label for="contact_mail"><span class="asterisk text-danger reqired-wth-custom-css">This field is required</span></label>
 							<input type="email" name="contact_mail" id="contact_mail" class="form-control
 							required search-i" placeholder="Email" onchange="checkContactInfo('email')" aria-label="Username" aria-describedby="basic-addon1" value="{{$post->userInfo->contact_mail}}">
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
 							<input type="text" onchange="checkContactInfo('name')" class="form-control required" name="contact_name" value="{{$post->userInfo->contact_name}}">
 							<input type="hidden" id="contactNameUpdate" name="contact_name_update" value="">
 						</div>
 					</div>
 					<div class="col-sm-6 col-md-4 col-lg-3">
 						<div class="form-group">
 							<label for="inputAddress">Address</label>
 							<label for="region"><span class="asterisk text-danger">This field is required</span></label>
 							<input id="pac-input" onchange="checkContactInfo('address')" value="{{$post->address}}" name="address" class="controls form-control required" type="text" placeholder="Search Address">
 							<div id="map"></div>
 							<input type="hidden" id="contactAddressUpdate" name="contact_address_update" value="">
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
 					<div class="col-12">
 						<button class="btn ctm-btn next-btn" form="uPdateCarForm" type="submit">Next</button>
 					</div>	
 				</div>	
 			</div>	
 		</section>
 	</form>
 </section>
 @endsection
 @section('script')
 <script>
 	window.update_car_form = '<?= url('update-car-form')?>'
 	window.get_this_mark_models = '<?= url('get-models-under-the-marke')?>'
 	window.get_this_gamybos_periods = '<?= url('get-periods-under-the-model')?>'
 	window.check_login = '<?= url('action-for-login')?>'
 	window.get_this_country_cities = '<?= url('get-cities-under-the-country')?>'

 	$(document).ready(function() {
 		if (window.File && window.FileList && window.FileReader) {
 			$(".single-photo #file").on("change", function(e) {
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
 							"</span>").insertAfter(".single-photo");
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
 	});



 </script>
 <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.js" ></script>
 <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>	
 @endsection