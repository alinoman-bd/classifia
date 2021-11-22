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

<div class="col-12">
	<div class="section-tlt" style='border: none'>Add photos</div>
</div>
<div class="col-12" style="position: relative;">
	<div class="e-txt"><i class="fa fa-exclamation-circle"></i> It is possible to upload multiple photos at once</div>
</div>
<div class="col-md-6"  style="position: relative;">
	<div class="section-tlt pb-0" style='border: none'>Add cover (Required)</div>
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
			Select Image
			<label class="img-req-lb-msg" for="model"><span class="asterisk text-danger reqired-wth-custom-css">Cover field is required</span></label>
			<input type="file" id="cover" name="cover"  class="required">
		</label> 
	</div>
</div>
<div class="col-md-6"  style="position: relative;">
	<div class="section-tlt pb-0" style='border: none'>Add More Photos (Optional)</div>
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
			<label class="img-req-lb-msg" for="model">
				<!-- <span class="asterisk text-danger reqired-wth-custom-css">Image field is required</span></label> -->
				<input type="file" id="files" name="files[]" multiple>
			</label> 
		</div>
	</div>