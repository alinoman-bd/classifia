<style type="text/css">
	#rgForm .rgForm-asterisk{
		display: none;	
		position: absolute;
		z-index: 1;
		right: 31px;
		top: -29px;
	}
</style>
<div class="menu-cnt user-con" id="eeeeeee">
	<div class="row mar-0"> 
		<div class="col-12">
			@if(Auth::check())
			<div class="e-txt"style="margin: 15px 0;">Contact info</div>
			@else
			<div class="e-txt"><i class="fas fa-exclamation-triangle"></i> Before Submitting an advertize you must login in our area. if you have an account already you must login by clicking the Register User Tab or if you don't have any account you must register first by submitting the <b>register form</b> below.</div>
			@endif
		</div>
		@if(Auth::check())
		@php
		$userInfo = App\UserInformation::where('user_id',Auth::user()->id)->first();
		@endphp
		
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">Contact Phone</label>
				<label for="contact_number"><span class="asterisk text-danger reqired-wth-custom-css">This field is required</span></label>
				<input type="number" onchange="checkContactInfo('number')" class="form-control required" id="contact_number" name="contact_number" value="{{@$userInfo->phone}}">
				<input type="hidden" id="contactNumberUpdate" name="contact_number_update" value="">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">Email</label>
				<label for="contact_mail"><span class="asterisk text-danger reqired-wth-custom-css">Email field is required</span></label>
				<input type="email" name="contact_mail" id="contact_mail" class="form-control
				required search-i" placeholder="Email" onchange="checkContactInfo('email')" aria-label="Username" aria-describedby="basic-addon1" value="{{@Auth::user()->email}}">
				<input type="hidden" id="contactEmailUpdate" name="contact_email_update" value="">
			</div>
		</div>
		
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">Additional Phone</label>
				<input type="number" class="form-control" name="additional_number" value="{{@$userInfo->additional_phone}}">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="inputAddress">Name</label>
				<label for="make"><span class="asterisk text-danger  reqired-wth-custom-css">This Name is required</span></label>
				<input type="text" onchange="checkContactInfo('name')" class="form-control required" name="contact_name" value="{{@$userInfo->name}}">
				<input type="hidden" id="contactNameUpdate" name="contact_name_update" value="">
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="form-group">
				<label for="">City</label>
				<div class="ctm-select">
					<div class="ctm-select-txt">
						<span class="select-txt" id="category">-choose-</span>
					</div>
					<span class="select-arr"><img src="{{ asset('assets/img/down-ar.png') }}" alt="lt flag"></span>
					<label for="make"><span style="    margin-top: -32px;" class="asterisk text-danger  reqired-wth-custom-css">City field is required</span></label>
					<input type="hidden" name="city" class="required" id="jobCity">
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
		@if(Request::segment(1) == 'house')
		@else
		<div class="col-sm-6 col-md-5 col-lg-4">
			<div class="form-group">
				<label for="inputAddress">Address</label>
				<label for="region"><span class="asterisk text-danger">Address field is required</span></label>
				<input id="pac-input" onchange="checkContactInfo('address')" value="{{@$userInfo->address}}" name="address" class="controls form-control required" type="text" placeholder="Search Address">
				<div id="map"></div>
				<input type="hidden" id="contactAddressUpdate" name="contact_address_update" value="">
			</div>
		</div>
		@endif
		@else
		<!-- <div class="modal-body row" id="rgForm">
			@csrf
			<div class="col-md-3">
				<label for="recipient-name" class="col-form-label">Account Type</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-check"></i></span>
					</div>
					<label for="accountType"><span class="rgForm-asterisk text-danger">This field is required</span></label>
					<select class="form-control required" style="height: 50px;" id="accountType" name="acount_type" required >
						<option value="">--choose--</option>
						<option value="2">General</option>
						<option value="1">Company</option>
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<label for="recipient-name" class="col-form-label">Email</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-envelope"></i></span>
					</div>
					<label for="email"><span class="rgForm-asterisk text-danger">This field is required</span></label>
					<input required="" name="email" id="email" type="email" class="form-control r-mail search-i @error('email') is-invalid @enderror required" autocomplete="email" placeholder="email" aria-label="email"  value="{{ old('email') }}" aria-describedby="basic-addon1">
					@error('email')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>
			<div class="col-md-3">
				<label for="recipient-name" class="col-form-label">Password</label>
				<div class="input-group pr">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-lock"></i></span>
					</div>
					<label for="password"><span class="rgForm-asterisk text-danger">This field is required</span></label>
					<input required=""  name="password" id="password" type="password" class="form-control r-pass br-r-none search-i @error('password') is-invalid @enderror pass required" placeholder="password" aria-label="Username"  name="password" aria-describedby="basic-addon1" autocomplete="new-password">
					<div class="input-group-append">
						<span onclick="changeTypeTotext('pass')" class="input-group-text"><i class="fas fa-eye"></i></span>
					</div>
					@error('password')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>
			<div class="col-md-3">
				<label for="recipient-name" class="col-form-label">Re-Password</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-lock"></i></span>
					</div>
					<label for="password-confirm"><span class="rgForm-asterisk text-danger">This field is required</span></label>
					<input required="" id="password-confirm" type="password" class="form-control r-pass-re search-i br-r-none repass required" placeholder="re enter password" autocomplete="new-password" aria-label="Username" name="password_confirmation" aria-describedby="basic-addon1">
					<div class="input-group-append">
						<span onclick="changeTypeTotext('repass')" class="input-group-text"><i class="fas fa-eye"></i></span>
					</div>
				</div>
			</div>
			<div class="col-md-3 mar-0">
				<span style="width: max-content !important" onclick="registerFromForm()" class="btn ctm-btn w-100 next-btn">Sign up</span>
				<label class="col-form-label label-txt">Already have an account? <span>Tap</span></label> 
			</div>
			<div class="modal-footer">
			</div>
		</div> -->
		@endif
		
		<div class="col-12">
			<div class="privicy-txt">Lorem Ipsum is simply dummy text of the printing <a href="">rulse</a> and <a href="">privicy</a></div>
		</div>
	</div>
</div>
@if(Auth::check())
<script type="text/javascript">

	function checkContactInfo(filed){

		swal({		
			title: "Account Update!",
			text: "Do you want to set this information to  your account info permanently? (you can also update it in your account settings by the way !)",
			icon: "warning",
			buttons: ["cancel?", "Yes update this?"],
			radio: true,
			dangerMode: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		})
		.then((setValue) => {
			if (setValue) {
				if (filed == 'number') {
					$('#contactNumberUpdate').val(1);
				}else if(filed == 'email'){
					$('#contactEmailUpdate').val(1);
				}else if(filed == 'name'){
					$('#contactNameUpdate').val(1);
				}else if(filed == 'address'){
					$('#contactAddressUpdate').val(1);
				}
				swal('we are going to update your profile info by posting your ad at this moment!', {
					icon: "success",
				});
			} 
		});
	}

</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endif