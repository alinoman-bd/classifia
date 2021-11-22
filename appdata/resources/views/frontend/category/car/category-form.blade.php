 @extends('frontend.app')
 @section('style')

 <style>
 	.header-section .main-menu {
 		border-bottom: 1px solid #ddd;
 	}

 	.ctm-option-box {
 		overflow: auto;
 		max-height: 250px;
 	}

 	.extra-info1 .des-tips {
 		padding: 6%;
 	}

 	#popupAlert {
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

 	#popupAlert.show {
 		visibility: visible;
 		-webkit-animation: fadein 0.5s, fadeout 0.5s 5s;
 		animation: fadein 0.5s, fadeout 0.5s 5s;
 	}

 	@-webkit-keyframes fadein {
 		from {
 			bottom: 0;
 			opacity: 0;
 		}

 		to {
 			bottom: 30px;
 			opacity: 1;
 		}
 	}

 	@keyframes fadein {
 		from {
 			bottom: 0;
 			opacity: 0;
 		}

 		to {
 			bottom: 30px;
 			opacity: 1;
 		}
 	}

 	@-webkit-keyframes fadeout {
 		from {
 			bottom: 30px;
 			opacity: 1;
 		}

 		to {
 			bottom: 0;
 			opacity: 0;
 		}
 	}

 	@keyframes fadeout {
 		from {
 			bottom: 30px;
 			opacity: 1;
 		}

 		to {
 			bottom: 0;
 			opacity: 0;
 		}
 	}

 	input {
 		display: block;
 	}

 	label span.asterisk {
 		display: none;
 	}

 	.reqired-wth-custom-css {
 		position: absolute;
 		z-index: 1;
 	}

 	.form-group .input-group .reqired-wth-custom-css {
 		top: 49px;
 		left: 0;
 	}

 	.form-group .reqired-wth-custom-css {
 		top: 80px;
 		left: 15px;
 	}

 	.please {
 		position: absolute;
 		z-index: 1;
 		text-align: center;
 		top: 15px;
 		left: 8px;
 		background: rgba(255, 255, 255, 0.5);
 		border-radius: 4px;
 		padding: 6px 40px;
 		display: none;
 	}

 	.try-again {
 		color: red;
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
 	<form id="formForm" method="post" enctype="multipart/form-data">
 		@csrf
 		<input hidden value="{{$cat}}" name="form_type">
 		<input hidden value="{{@$sub_cat?: ''}}" name="sub_cat">
 		<div class="row">
 			<div class="col-sm-6 col-md-4 col-lg-3" style="position: relative;top: 4em;left: 1em;">
 				<div class="form-group">
 					<label for="inputAddress"> Title</label>
 					<div class="form-group">
 						<label for="title"><span class="asterisk text-danger">This field is required</span></label>
 						<input type="text" name="title" autofocus class="form-control required">
 					</div>
 				</div>
 			</div>
 		</div>
 		@if($cat == 'used-cars')
 		@include('frontend.category.car.forms.used-car-form')

 		@elseif($cat == 'trailers-and-semitrailers')
 		@include('frontend.category.car.forms.trailers-and-semitrailers-form')

 		@elseif($cat == 'passenger-vans')
 		@include('frontend.category.car.forms.used-car-form')

 		@elseif($cat == 'minibus')
 		@include('frontend.category.car.forms.minibus-form')

 		@elseif($cat == 'minivans-minibus')
 		@include('frontend.category.car.forms.minibus-form')

 		@elseif($cat == 'buses')
 		@include('frontend.category.car.forms.buses-form')

 		@elseif($cat == 'recreational-vehicles-campers')
 		@include('frontend.category.car.forms.campers-form')

 		@elseif($cat == 'motorcycles')
 		@include('frontend.category.car.forms.motorcycle-form')

 		@elseif($cat == 'trucks')
 		@include('frontend.category.car.forms.trucks-form')

 		@elseif($cat == 'autotrains')
 		@include('frontend.category.car.forms.autotrains-form')

 		@elseif($cat == 'semi-trailer-trucks')
 		@include('frontend.category.car.forms.semi-trailer-trucks-form')

 		@elseif($cat == 'sailboats')
 		@include('frontend.category.car.forms.sailboats-form')

 		@elseif($cat == 'motorboats')
 		@include('frontend.category.car.forms.motorboats-form')

 		@elseif($cat == 'personal-watercraft')
 		@include('frontend.category.car.forms.personal-watercraft-form')

 		@elseif($cat == 'water-bikes')
 		@include('frontend.category.car.forms.water-bikes-form')

 		@elseif($cat == 'boats-rafts')
 		@include('frontend.category.car.forms.boats-rafts-form')

 		@elseif($cat == 'kayaks-canoes')
 		@include('frontend.category.car.forms.kayaks-canoes-form')

 		@elseif($cat == 'motors-and-engines')
 		@include('frontend.category.car.forms.motors-and-engines-form')

 		@elseif($cat == 'water-transport-other')
 		@include('frontend.category.car.forms.other-form')

 		@elseif($cat == 'construction-and-road-construction-equipment')
 		@include('frontend.category.car.forms.construction-and-road-construction-form')

 		@elseif($cat == 'storage-and-loading-equipment')
 		@include('frontend.category.car.forms.storage-and-loading-equipment-form')

 		@elseif($cat == 'municipal-machinery')
 		@include('frontend.category.car.forms.municipal-machinery-form')

 		@elseif($cat == 'construction-machinery-accessories')
 		@include('frontend.category.car.forms.construction-machinery-accessories-form')

 		@elseif($cat == 'agricultural-machinery')
 		@include('frontend.category.car.forms.agricultural-machinery-form')

 		@elseif($cat == 'agricultural-implements')
 		@include('frontend.category.car.forms.agricultural-implements-form')

 		@elseif($cat == 'forest-machinery')
 		@include('frontend.category.car.forms.forest-machinery-form')
 		@else
 		<h1>Design Form FIrst</h1>
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
 		</section>
 	</form>
 </section>
 @endsection
 @section('script')
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
 	window.get_this_mark_models = '<?= url('get-models-under-the-marke') ?>'
 	window.get_this_gamybos_periods = '<?= url('get-periods-under-the-model') ?>'
 	window.insert_form = '<?= url('insert-form') ?>'
 	window.check_login = '<?= url('action-for-login') ?>'
 	window.get_this_country_cities = '<?= url('get-cities-under-the-country') ?>'


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
 						$(".remove").click(function() {
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
 						$(".remove").click(function() {
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
 						$(".remove").click(function() {
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
 <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.js"></script>
 <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
 @endsection