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
							<textarea class="form-control" name="description" id="description" rows="3"></textarea>
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
		@include('frontend.category.advertisement-image-section')
	</div>
</div>

<script>
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
</script>
