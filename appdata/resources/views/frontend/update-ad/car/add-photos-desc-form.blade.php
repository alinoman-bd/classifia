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
							<textarea class="form-control" name="description" id="description" rows="3"><?= $post->description?></textarea>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-5 col-md-4" style="position: relative;">
					<div class="des-tips">
						<div class="arrow-right"></div>
						<div class="tips-tlt">Tips</div>
						<div class="tip">
							<div class="tip-tlt"><span>1</span> Detailed comment can attract more attention to your ad.</div>
							<!-- <div class="tip-txt">Lorem Extra name expented</div> -->
						</div>
						<div class="tip">
							<div class="tip-tlt"><span>2</span>The more informative your ad is, the less questions you will be asked.</div>
							<!-- <div class="tip-txt">Lorem Extra name expented</div> -->
						</div>
						<div class="tip">
							<div class="tip-tlt"><span>3</span>Adverts with interesting comments can be featured on Autoplius.lt facebook page.</div>
							<!-- <div class="tip-txt">Lorem Extra name expented</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row mar-0">
		<div class="col-12">
			<div class="section-tlt" style='border: none'>Add photos</div>
		</div>
		<div class="col-12" style="position: relative;">
			<div class="e-txt"><i class="fa fa-exclamation-circle"></i> Lorem</div>
		</div>
		<div class="col-12 col-md-6" style="position: relative;">
			<div class="section-tlt pb-0" style='border: none'>Add Cover (single)</div>
			<div class="ctm-file single-cover">
				<label class=""> 
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
					<input type="file"  onchange="removeCvrPip()" id="cover" name="cover"  class="">
				</label> 
			</div>
			@if($post->coverImage)
			<span class="pip" id="cvrPip">
				<img class="imageThumb" src="{{asset('ad_thumbnail/'.@$post->coverImage->image)}}" alt="{{$post->coverImage->image}}">
			</span>
			@endif
		</div>
		<div class="col-12 col-md-6" style="position: relative;">
			<div class="section-tlt pb-0" style='border: none'>Add photos(multiple)</div>
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
					<label class="img-req-lb-msg p-0 m-0" for="model"><span class="asterisk text-danger reqired-wth-custom-css">Image field is required</span></label>
					<input type="file" id="files" name="files[]" multiple class="">
				</label> 
			</div>
			@foreach($post->images as $key => $img)
			@if($img->type !== 'cover')
			<span class="pip">
				<img class="imageThumb" src="{{asset('carAdimages/'. $img->image)}}" title=""/>
				<br/><span onclick="removeAltImg(event,'<?=$img->_id?>')" class="remove">Remove image</span>
			</span>
			@endif
			@endforeach
		</div>
	</div>
</div>
<div class="extra-info2">
	<div class="row mar-0"> 
		<div class="col-12">
			<div class="section-tlt">Video</div>
		</div>
		<div class="col-12">
			<div class="row mar-0"> 
				<div class="col-md-4 pad-0">
					<input type="text" name="video" value="{{$post->video}}" class="form-control">
				</div>
				<div class="col-md-8  pad-0">
					<div class="hin-txt">Lorem Ipsum is simply dummy text of the printing and typesetting</div>
				</div>
			</div>
		</div>
	</div>
</div>