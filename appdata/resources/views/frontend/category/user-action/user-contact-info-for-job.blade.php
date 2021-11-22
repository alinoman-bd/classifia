<div class="menu-cnt user-con" id="eeeeeee">
	<div class="row mar-0"> 
		<div class="col-12">
			@if(Auth::check())
			<div class="e-txt"style="margin: 15px 0;">Contact info</div>
			@else
			<div class="e-txt"><i class="fas fa-exclamation-triangle"></i> You have to provide your contact info below..</div>
			@endif
		</div>
		@if(Auth::check())
		@php
		$userInfo = App\UserInformation::where('user_id',Auth::user()->id)->first();
		@endphp
		@endif
		<div class="col-sm-6 col-md-6 col-lg-6">
			<div class="form-group">
				<label for="inputAddress">Contact Phone</label>
				<label for="contact_number"><span class="asterisk text-danger reqired-wth-custom-css">This field is required</span></label>
				<input type="text" class="form-control required" id="contact_number" name="contact_number" value="{{@$userInfo->phone}}">
			</div>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6">
			<div class="form-group">
				<label for="inputAddress">Email</label>
				<label for="contact_mail"><span class="asterisk text-danger reqired-wth-custom-css">This field is required</span></label>
				<input type="email" name="contact_mail" id="contact_mail" class="form-control
				required search-i" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1"  value="{{@Auth::user()->email}}">
			</div>
		</div>
		<div class="col-12">
			<div class="privicy-txt">Lorem Ipsum is simply dummy text of the printing <a href="">rulse</a> and <a href="">privicy</a></div>
		</div>
	</div>
</div>
