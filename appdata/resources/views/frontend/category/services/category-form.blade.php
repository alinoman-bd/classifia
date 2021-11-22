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

 	#files {
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
 </style>
 @endsection
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 @section('content')
 <a id="popupAlert">You must provide all values of reqiured field</a>
 <a id="popupAlertSuccess">Ad Submitted Successfully</a>

 <section class="category-form-section sec-pad">
 	<div class="step-menu">
 		<div class="row mar-0">
 			<div class="col-12">
 				<!--<select name="ssc_year" class="yearselect form-control">
 				</select> -->
 				<div class="step-ul">
 					<span class="step-li step_one active">1</span>
 					<span class="step-li step_two">2</span>
 					<span class="step-li step_three">3</span>
 					<span class="step-li step_four">4</span>
 				</div>
 			</div>
 		</div>
 		@include('frontend.category.payment-form')
 		<form id="formForm" method="post" class="formForServicesAd" enctype="multipart/form-data">
 			@csrf
 			<input hidden value="{{$cat}}" name="form_type">
 			<input hidden value="{{@$sub_cat?: ''}}" name="sub_cat">
 			<input hidden value="{{@$inner_cat?: ''}}" name="inner_cat">
 			<div class="row m-0">
 				<div class="col-12 col-md-10" style="margin-top: 30px;">
 					<div class="form-group">
 						<label for="">Title</label>
 						<div class="form-group">
 							<label for="title"><span class="asterisk text-danger">Title field is required</span></label>
 							<input type="text" placeholder="title" name="title" id="" class="form-control required">
 						</div>
 					</div>
 					<div class="form-group">
 						<label for="">Description</label>
 						<textarea class="form-control" style="height: 200px;" name="description" id="Description" rows="3"></textarea>
 					</div>
 				</div>
 				<div class="col-12 col-md-8" style="margin-top: 30px;">
 					<div class="form-group">
 						<label for="">Price</label>
 						<label for="price"><span class="asterisk text-danger">Price field is required</span></label>
 						<input type="text" class="form-control controls required" placeholder="Price" name="price">
 						<div id="map"></div>
 					</div>
 					<div class="form-group">
 						<label for="">Website url</label>
 						<input type="text" class="form-control controls" placeholder="website url" name="web_url">
 					</div>
 				</div>
 				<div class="col-12 col-md-12 p-0">
 					<div class="additional-info extra-info1 add-photo">
 						<div class="row mar-0">
 							<div class="col-12 col-md-6" style="position: relative;">
 								<div class="section-tlt" style='border: none'>Add Cover (Single)</div>
 								<div class="ctm-file cover-photo">
 									<label class="m-0">
 										<div>
 											<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 63.618 53.015">
 												<g id="Group_121" data-name="Group 121" transform="translate(0 -2)">
 													<path id="Path_81" data-name="Path 81" d="M55.665,9.952H46.481L41.966,3.18A2.654,2.654,0,0,0,39.761,2h-15.9a2.654,2.654,0,0,0-2.205,1.18L17.137,9.952H7.952A7.962,7.962,0,0,0,0,17.9V47.062a7.962,7.962,0,0,0,7.952,7.952H55.665a7.962,7.962,0,0,0,7.952-7.952V17.9A7.962,7.962,0,0,0,55.665,9.952Zm2.651,37.11a2.652,2.652,0,0,1-2.651,2.651H7.952A2.653,2.653,0,0,1,5.3,47.062V17.9a2.655,2.655,0,0,1,2.651-2.651h10.6a2.654,2.654,0,0,0,2.205-1.18L25.275,7.3H38.343l4.514,6.773a2.654,2.654,0,0,0,2.205,1.18h10.6A2.653,2.653,0,0,1,58.316,17.9Z" transform="translate(0 0)" fill="#cacaca" />
 													<path id="Path_82" data-name="Path 82" d="M20.254,8A13.254,13.254,0,1,0,33.507,21.254,13.269,13.269,0,0,0,20.254,8Zm0,21.206a7.952,7.952,0,1,1,7.952-7.952A7.962,7.962,0,0,1,20.254,29.206Z" transform="translate(11.555 9.904)" fill="#cacaca" />
 												</g>
 											</svg>
 										</div>
 										Select Image
 										<label class="img-req-lb-msg p-0 m-0" for="model"><span class="asterisk text-danger reqired-wth-custom-css">Image field is required</span></label>
 										<input type="file" id="cover" name="cover" class="required">
 									</label>
 								</div>
 							</div>
 							<div class="col-12 col-md-6" style="position: relative;">
 								<div class="section-tlt" style='border: none'>Add photos(multiple)</div>
 								<div class="ctm-file multi-photo">
 									<label class="m-0">
 										<div>
 											<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 63.618 53.015">
 												<g id="Group_121" data-name="Group 121" transform="translate(0 -2)">
 													<path id="Path_81" data-name="Path 81" d="M55.665,9.952H46.481L41.966,3.18A2.654,2.654,0,0,0,39.761,2h-15.9a2.654,2.654,0,0,0-2.205,1.18L17.137,9.952H7.952A7.962,7.962,0,0,0,0,17.9V47.062a7.962,7.962,0,0,0,7.952,7.952H55.665a7.962,7.962,0,0,0,7.952-7.952V17.9A7.962,7.962,0,0,0,55.665,9.952Zm2.651,37.11a2.652,2.652,0,0,1-2.651,2.651H7.952A2.653,2.653,0,0,1,5.3,47.062V17.9a2.655,2.655,0,0,1,2.651-2.651h10.6a2.654,2.654,0,0,0,2.205-1.18L25.275,7.3H38.343l4.514,6.773a2.654,2.654,0,0,0,2.205,1.18h10.6A2.653,2.653,0,0,1,58.316,17.9Z" transform="translate(0 0)" fill="#cacaca" />
 													<path id="Path_82" data-name="Path 82" d="M20.254,8A13.254,13.254,0,1,0,33.507,21.254,13.269,13.269,0,0,0,20.254,8Zm0,21.206a7.952,7.952,0,1,1,7.952-7.952A7.962,7.962,0,0,1,20.254,29.206Z" transform="translate(11.555 9.904)" fill="#cacaca" />
 												</g>
 											</svg>
 										</div>
 										Select Images
 										<input type="file" id="files" name="files[]" multiple="" class="">
 									</label>
 								</div>
 							</div>
 						</div>
 					</div>
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
 				</div>
 			</div>
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
@endif
-->
 <script>
 	function setThis(field, value) {
 		if (field == 'job_city') {
 			$("#jobCity").val(value);
 		}
 	}

 	window.insert_services_form = '<?= url('insert-services-form') ?>'
 	window.check_login = '<?= url('action-for-login') ?>'
 	window.get_this_country_cities = '<?= url('get-cities-under-the-country') ?>'

 	$(document).ready(function() {
 		if (window.File && window.FileList && window.FileReader) {
 			$(".cover-photo #cover").on("change", function(e) {
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
 							"</span>").insertAfter(".cover-photo");
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
 	});
 	$(document).ready(function() {
 		if (window.File && window.FileList && window.FileReader) {
 			$("#files").on("change", function(e) {
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
 @endsection