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
 </style>
 @endsection
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 @section('content')
 <a id="popupAlertSuccess">Ad Updated Successfully</a>
 <a id="popupAlert">You must provide all values of reqiured field</a>
 <form id="formForm" method="post"  class="formForBuySellAdUpdate" enctype="multipart/form-data">
 	@csrf
 	<input type="hidden" name="post_id" value="{{$post->_id}}">
 	<section class="category-form-section sec-pad">
 		<!-- <div class="step-menu">
 			<div class="row mar-0">
 				<div class="col-12"> 
 				<div class="step-ul">
 					<span class="step-li active">1</span>
 					<span class="step-li">2</span>
 					<span class="step-li">3</span>
 					<span class="step-li">4</span>
 				</div>
 			</div>
 		</div>
 	</div> -->
 	
 	<input type="hidden" value="{{$post->form_type}}"  name="form_type">
 	<div class="row m-0">
 		<div class="col-12 col-md-10" style="margin-top: 30px;">
 			<div class="form-group">
 				<label for="">Title</label>
 				<input type="text" value="{{$post->title}}" class="form-control" placeholder="Title" name="title">
 			</div>
 			<div class="form-group">
 				<label for="">Description</label>
 				<textarea class="form-control" style="height: 200px;" name="description" id="Description" rows="3"><?= $post->description?></textarea>
 			</div>
 		</div>
 		<div class="col-12 col-md-8" style="margin-top: 30px;">
 			<div class="form-group">
 				<label for="">Price</label>
 				<input type="text" value="{{$post->price}}" class="form-control controls" placeholder="Price"  name="price">
 				<div id="map"></div>
 			</div>
 			<!-- 
 			<div class="form-group">
 				<label for="">Phone</label>
 				<input type="text" value="{{$post->phone}}"  class="form-control controls" placeholder="Phone" name="phone">
 			</div> -->
 		</div>
 		<div class="col-12 col-md-12 p-0">
 			<div class="additional-info extra-info1 add-photo" >
 				<div class="row mar-0">
 					<div class="col-12 col-md-6" style="position: relative;">
 						<div class="section-tlt" style='border: none'>Add Cover (single)</div>
 						<div class="ctm-file single-cover">
 							<label class="m-0"> 
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
 								<input type="file" id="cover" onchange="removeCvrPip()"  name="cover"  class="">
 							</label> 
 						</div>
 						<span class="pip" id="cvrPip">
 							<img class="imageThumb" src="{{asset('ad_thumbnail/'. $post->coverImage->image)}}" alt="{{$post->coverImage->image}}">
 						</span>
 					</div>
 					<div class="col-12 col-md-6" style="position: relative;">
 						<div class="section-tlt" style='border: none'>Add photos(multiple)</div>
 						<div class="ctm-file multi-photo">
 							<label class="m-0"> 
 								<div>
 									<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 63.618 53.015">
 										<g id="Group_121" data-name="Group 121" transform="translate(0 -2)">
 											<path id="Path_81" data-name="Path 81" d="M55.665,9.952H46.481L41.966,3.18A2.654,2.654,0,0,0,39.761,2h-15.9a2.654,2.654,0,0,0-2.205,1.18L17.137,9.952H7.952A7.962,7.962,0,0,0,0,17.9V47.062a7.962,7.962,0,0,0,7.952,7.952H55.665a7.962,7.962,0,0,0,7.952-7.952V17.9A7.962,7.962,0,0,0,55.665,9.952Zm2.651,37.11a2.652,2.652,0,0,1-2.651,2.651H7.952A2.653,2.653,0,0,1,5.3,47.062V17.9a2.655,2.655,0,0,1,2.651-2.651h10.6a2.654,2.654,0,0,0,2.205-1.18L25.275,7.3H38.343l4.514,6.773a2.654,2.654,0,0,0,2.205,1.18h10.6A2.653,2.653,0,0,1,58.316,17.9Z" transform="translate(0 0)" fill="#cacaca"/>
 											<path id="Path_82" data-name="Path 82" d="M20.254,8A13.254,13.254,0,1,0,33.507,21.254,13.269,13.269,0,0,0,20.254,8Zm0,21.206a7.952,7.952,0,1,1,7.952-7.952A7.962,7.962,0,0,1,20.254,29.206Z" transform="translate(11.555 9.904)" fill="#cacaca"/>
 										</g>
 									</svg>
 								</div>
 								Select Images
 								<label class="img-req-lb-msg p-0 m-0" for="model"><span class="asterisk text-danger reqired-wth-custom-css">Image field is required</span></label>
 								<input type="file" id="files" name="files[]" multiple=""  class="" >
 							</label> 
 						</div>
 						@foreach($post->images as $key => $img)
 						@if($img->type !== 'cover')
 						<span class="pip">
 							<img class="imageThumb" src="{{asset('buySaleImages/'. $img->image)}}" title=""/>
 							<br/><span onclick="removeAltImg(event,'<?=$img->_id?>')" class="remove">Remove image</span>
 						</span>
 						@endif
 						@endforeach
 					</div>
 				</div>
 			</div>
 			<div class="row mar-0">
 				<div class="col-sm-6 col-md-4 col-lg-3">
 					<div class="form-group">
 						<label for="inputAddress">Contact Phone</label>
 						<label for="contact_number"><span class="asterisk text-danger reqired-wth-custom-css">This field is required</span></label>
 						<input type="number" class="form-control required" id="contact_number" name="contact_number" value="{{$post->userInfo->contact_number}}">
 					</div>
 				</div>
 				<div class="col-sm-6 col-md-4 col-lg-3">
 					<div class="form-group">
 						<label for="inputAddress">Email</label>
 						<label for="contact_mail"><span class="asterisk text-danger reqired-wth-custom-css">This field is required</span></label>
 						<input type="email" name="contact_mail" id="contact_mail" class="form-control
 						required search-i" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1" value="{{$post->userInfo->contact_mail}}">
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
 						<input type="text" class="form-control" name="contact_name" value="{{$post->userInfo->contact_name}}">
 					</div>
 				</div>
 				<div class="col-sm-6 col-md-4 col-lg-3">
 					<div class="form-group">
 						<label for="">Address</label>
 						<input type="text"  value="{{$post->address}}" class="form-control controls" placeholder="address" id="pac-input" name="address">
 						<div id="map"></div>
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
 			<div class="col-12">
 				<button class="btn ctm-btn next-btn" form="formForm" type="submit">Update</button>
 			</div>
 		</div>
 	</div>
 </section>
</form>
@endsection
@section('script')
<script>
	function setThis(field, value){
		if (field == 'job_city') {
			$("#jobCity").val(value);
		}
	}
	window.update_buysale_form = '<?= url('update-buy-sale-form')?>'
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
	});

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
	});
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection