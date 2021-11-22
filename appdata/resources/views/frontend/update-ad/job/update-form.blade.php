 @extends('frontend.app')
 @section('style')
 <!-- Latest compiled and minified CSS -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
 <style>
 	.privicy-txt,
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

 	.dropdown-toggle{
 		border: 2px solid #ddd;
 		padding: 11px;
 		position: relative;
 		top: 32px;
 		left: 0;
 		background: #fff;
 	}

 	.jb-tp .dropdown-toggle{
 		top: initial;

 	}
 </style>
 @endsection
 @section('content')
 <a id="popupAlert">You must provide all values of reqiured field</a>
 <a id="popupAlertSuccess">Ad Submitted Successfully</a>
 <section class="ss-section">
 	<div class="services"style="    max-width: 900px;margin: 0 auto;">
 		<form action="" method="post" id="jobformUpdate">
 			@csrf
 			<input type="hidden" value="{{$post->form_type}}" name="form_type">
 			<input type="hidden" value="{{$post->_id}}" name="post_id">
 			<div class="row">
 				<div class="col-12 col-md-6"style="margin-top: 30px;">
 					<div class="form-group">
 						<label for="">Job Title</label>
 						<input type="text"  value="{{$post->title}}" required="" class="form-control" name="title">
 					</div>
 					<div class="form-group">
 						<label for="">Address</label>
 						<input type="text" value="{{$post->address}}" required="" class="form-control controls" placeholder="address" id="pac-input" name="address">
 						<div id="map"></div>
 					</div>

 					<div class="form-group">
 						<label for="">Salary From</label>
 						<input type="number" value="{{$post->salary_from}}" required="" class="form-control" placeholder="amount"  name="salary_from">
 					</div>
 					<div class="form-group">
 						<label for="">City</label>
 						<div class="ctm-select">
 							<div class="ctm-select-txt">
 								<span class="select-txt" id="category">{{$post->job_city?:'-choose-'}}</span>
 							</div>
 							<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
 							<input type="hidden" value="{{$post->job_city}}" name="job_city" id="jobCity">
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
 					<div class="form-group">
 						<label for="">Salary Type</label>
 						<div class="ctm-select">
 							<div class="ctm-select-txt">
 								<span class="select-txt" id="category">{{$post->salary_type?:'-choose-'}}</span>
 							</div>
 							<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
 							<input type="hidden" value="{{$post->salary_type}}" name="salary_type" id="salaryType">
 							<div class="ctm-option-box">
 								<div class="ctm-option" onclick="setThis('salary_type','month')"  >Per Month</div>
 								<div class="ctm-option" onclick="setThis('salary_type','hour')"  >Per Hour</div>
 								<div class="ctm-option" onclick="setThis('salary_type','year')"  >Per Year</div>
 								<div class="ctm-option" onclick="setThis('salary_type','project')" >Per Project</div>
 							</div>
 						</div>
 					</div>
 					<div class="form-group">
 						<label for="">Job Type</label>
 						<select class="selectpicker jb-tp" name="job_type[]" multiple data-live-search="true">
 							@if($post->job_type)
 							@php
 							$job_type = json_decode(@$post->job_type);
 							@endphp
 							@foreach(@$job_type as $val)
 							<option selected="">{{$val}}</option>
 							@endforeach
 							@endif
 							<option>Full Time</option>
 							<option>Part Time</option>
 							<option>Contract</option>
 							<option>Internship</option>
 						</select>
 					</div>
 				</div>
 				<div class="col-12 col-md-6" style="margin-top: 30px;">
 					<div class="form-group">
 						<select class="selectpicker" name="job_category[]" multiple data-live-search="true">
 							@if($post->job_category)
 							@php
 							$job_cat = json_decode($post->job_category);
 							@endphp
 							@foreach($job_cat as $val)
 							<option selected="">{{$val}}</option>
 							@endforeach
 							@endif
 							<option>IT</option>
 							<option>Customer Service</option>
 							<option>Retail</option>
 							<option>Sales</option>
 							<option>Cleaning</option>
 							<option>Logistics</option>
 							<option>Warehouse</option>
 							<option>Waiting/Bar staff</option>
 							<option>Accounting</option>
 							<option>Management</option>
 							<option>Construction</option>
 							<option>Design</option>
 							<option>Finance</option>
 							<option>Health Care</option>
 							<option>Manufacturing</option>
 							<option>Marketing</option>
 							<option>Media</option>
 							<option>Nursing</option>
 							<option>Teaching</option>
 							<option>Driver</option>
 						</select>
 					</div>
 					<div class="form-group">
 						<div class="checkbox-ctm"style="position: relative; top: 40px;margin-top: 47px;">
 							<div class="checkbox-ctm-s">
 								<label class="ctm-con">Remote Job ?
 									<input type="checkbox" <?= $post->remote_job? 'checked': '' ?>   name="remote_job" value="1">
 									<span class="checkmark"></span>
 								</label>
 							</div>
 						</div>
 					</div>
 					<div class="form-group"style="margin-top: 49px;">
 						<label for="">Salary To</label>
 						<input type="number" required="" class="form-control" value="{{$post->salary_to}}" placeholder="amount"  name="salary_to">
 					</div>
 					<div class="form-group">
 						<label for="">Adds Validity</label>
 						<div class="ctm-select">
 							<div class="ctm-select-txt">
 								<span class="select-txt" id="category">{{$post->adds_validaty}}</span>
 							</div>
 							<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
 							<input type="hidden" value="{{$post->adds_validaty}}" name="adds_validaty" id="addsValidaty">
 							<div class="ctm-option-box">
 								<div class="ctm-option" onclick="setThis('adds_validaty','15')"  >15 Days</div>
 								<div class="ctm-option" onclick="setThis('adds_validaty','30')"  >30 Days</div>
 							</div>
 						</div>
 						<p style="position: absolute; font-size: 12px;left: 70px;">Price: 
 							<span id="jobAdPrice">
 								<?php 
 								if($post->adds_validaty == 15){
 									echo 5;
 								}elseif($post->adds_validaty == 30) {
 									echo 10;
 								}  
 								?>
 							</span> Euro</p>
 						</div>
 						<div class="form-group">
 							<label for="">Currency</label>
 							<div class="ctm-select">
 								<div class="ctm-select-txt">
 									<span class="select-txt" id="category">{{$post->salary_currency}}</span>
 								</div>
 								<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
 								<input value="{{$post->salary_currency}}" type="hidden" name="salary_currency" id="salaryCurrency">
 								<div class="ctm-option-box">
 									<div class="ctm-option"  onclick="setThis('salary_currency','euro')"  >Euro (€)</div>
 									<div class="ctm-option"  onclick="setThis('salary_currency','dolor')"  >Dolor ($)</div>
 								</div>
 							</div>
 						</div>
 					</div>
 					<div class="col-12 col-md-12">
 						<div class="form-group">
 							<label for="">About position</label>
 							<textarea name="about_position" class="form-control" id="" style="height:100px"><?=$post->about_position?></textarea>
 						</div>
 					</div>
 					<div class="col-12 col-md-12">
 						<div class="form-group">
 							<label for="">Requirements</label>
 							<textarea name="requirements" class="form-control" id="" style="height:100px"><?=$post->requirements?></textarea>
 						</div>
 					</div>
 					<div class="col-12 col-md-12">
 						@if($post->form_type == 'find-job')
 						<div class="form-group">
 							<label for="">About Company</label>
 							<textarea name="about_company" class="form-control" id="" style="height:100px"><?=$post->about_company?></textarea>
 						</div>
 						@else
 						<div class="form-group">
 							<label for="">About Myself</label>
 							<textarea name="about_me" class="form-control" id="" style="height:100px"><?=$post->about_me?></textarea>
 						</div>
 						@endif

 						<div class="additional-info extra-info1 add-photo" >
 							<div class="row mar-0"> <div class="col-12 col-md-6" style="position: relative;">
 								<div class="section-tlt" style='border: none'>Add Cover (single)</div>
 								<div class="ctm-file single-cover">
 									<label class="m-0 " style="border: 1px solid #ddd;"> 
 										<div>
 											<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 63.618 53.015">
 												<g id="Group_121" data-name="Group 121" transform="translate(0 -2)">
 													<path id="Path_81" data-name="Path 81" d="M55.665,9.952H46.481L41.966,3.18A2.654,2.654,0,0,0,39.761,2h-15.9a2.654,2.654,0,0,0-2.205,1.18L17.137,9.952H7.952A7.962,7.962,0,0,0,0,17.9V47.062a7.962,7.962,0,0,0,7.952,7.952H55.665a7.962,7.962,0,0,0,7.952-7.952V17.9A7.962,7.962,0,0,0,55.665,9.952Zm2.651,37.11a2.652,2.652,0,0,1-2.651,2.651H7.952A2.653,2.653,0,0,1,5.3,47.062V17.9a2.655,2.655,0,0,1,2.651-2.651h10.6a2.654,2.654,0,0,0,2.205-1.18L25.275,7.3H38.343l4.514,6.773a2.654,2.654,0,0,0,2.205,1.18h10.6A2.653,2.653,0,0,1,58.316,17.9Z" transform="translate(0 0)" fill="#cacaca"/>
 													<path id="Path_82" data-name="Path 82" d="M20.254,8A13.254,13.254,0,1,0,33.507,21.254,13.269,13.269,0,0,0,20.254,8Zm0,21.206a7.952,7.952,0,1,1,7.952-7.952A7.962,7.962,0,0,1,20.254,29.206Z" transform="translate(11.555 9.904)" fill="#cacaca"/>
 												</g>
 											</svg>
 										</div>
 										Select Image
 										<label class="img-req-lb-msg p-0 m-0" for="model"><span class="asterisk text-danger reqired-wth-custom-css">Cover field is required</span></label>
 										<input type="file" id="cover" onchange="removeCvrPip()" name="cover"  class="">
 									</label> 
 									<span class="pip" id="cvrPip">
 										<img class="imageThumb" src="{{asset('ad_thumbnail/'. $post->coverImage->image)}}" alt="{{$post->coverImage->image}}">
 										<!-- <br/><span onclick="removeCoverImg(event,'<?= @$post->coverImage->_id?>')" class="remove">Remove image</span> -->
 									</span>
 								</div>
 							</div>
 							<div class="col-12 col-md-6" style="position: relative;">
 								<div class="section-tlt pb-0" style='border: none'>Add photos (multiple)</div>
 								<div class="ctm-file single-photo">
 									<label style="border: 1px solid #ddd;"> 
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
 										<input type="file" id="files" multiple="" name="files"  class="">
 									</label> 
 								</div>
 							</div>

 						</div>
 					</div>
 					<div class="row">
 						<div class="col-sm-6 col-md-6 col-lg-6">
 							<div class="form-group">
 								<label for="inputAddress">Contact Phone</label>
 								<label for="contact_number"><span class="asterisk text-danger reqired-wth-custom-css">This field is required</span></label>
 								<input type="text" class="form-control required" id="contact_number" name="contact_number" value="{{$post->userInfo->contact_number}}">
 							</div>
 						</div>
 						<div class="col-sm-6 col-md-6 col-lg-6">
 							<div class="form-group">
 								<label for="inputAddress">Email</label>
 								<label for="contact_mail"><span class="asterisk text-danger reqired-wth-custom-css">This field is required</span></label>
 								<input type="email" name="contact_mail" id="contact_mail" class="form-control
 								required search-i" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1"  value="{{$post->userInfo->contact_mail}}">
 							</div>
 						</div>
 					</div>
 					<div class="col-12">
 						<button class="btn ctm-btn next-btn" form="jobformUpdate" type="submit">Update</button>
 					</div>
 				</div>
 			</form>
 		</div>
 	</div>

 </section>
 @endsection
 @section('script')
 <script>

 	function setThis(filed,item){
 		if(filed == 'salary_type'){
 			$("#salaryType").val(item);
 		}else if(filed == 'salary_currency'){
 			$("#salaryCurrency").val(item);
 		}else if(filed == 'job_category'){
 			$("#jobCategory").val(item);
 		}else if(filed == 'job_city'){
 			$("#jobCity").val(item);
 		}else if(filed == 'job_type'){
 			$("#jobType").val(item);
 		}else if(filed == 'adds_validaty'){
 			$("#addsValidaty").val(item);
 			if (item == '15') {
 				$("#jobAdPrice").text(5);
 			}else{
 				$("#jobAdPrice").text(10);
 			}
 		}
 	}

 	window.update_job_form = '<?= url('update-job-form')?>'
 	window.check_login = '<?= url('action-for-login')?>'

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

// Material Select Initialization
$(document).ready(function() {
	$('select').selectpicker();
});

$(function () {
	$('select').selectpicker();
});
</script>
<script>
	$(document).ready(function() { 
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
			$(".single-photo #files").on("change", function(e) {
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
	});	
</script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
@endsection