@extends('layouts.back-master')
@section('title','Main Slider')
@section('style')
<style>
	.add-btn{
		position: relative;
		top: -30px;
		left: -15px;
	}
	#InsertSuccessAlert,
	#UpdateSuccessAlertPop,
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

	#InsertSuccessAlert,
	#UpdateSuccessAlertPop{
		background-color: green;
	}


	#InsertSuccessAlert.show,
	#UpdateSuccessAlertPop.show,
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
</style>
@endSection
@section('contents')
<a id="popupAlert">You must provide all values first</a>
<a id="InsertSuccessAlert">Item Inserted Successfull!</a>
<a id="UpdateSuccessAlertPop">Item Updated Successfull!</a>
<div class="page-content container-fluid">
	<div class="page-breadcrumb border-bottom">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12 align-self-center">
				<h5 class="font-medium text-uppercase mb-0">Slider Two <small>will appear only on home page after feaure product section</small></h5> 
			</div>
			<div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
				<nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
					<ol class="breadcrumb mb-0 justify-content-end p-0">
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-lg-12">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title text-uppercase">Slider List</h5>
					<button class="btn btn-primary no-radius float-right add-btn" data-toggle="modal" data-target="#exampleModal">Add New Slider</button>
					<div class="table-responsive">
						<table class="table product-overview" id="zero_config">
							<thead>
								<tr>
									<th>Slider Images</th>
									<th>Slider Links</th>
									<th>Actions</th>
								</tr>
							</thead>
							<?php $tr = 0 ?>
							<tbody class="existingSlider">
								@foreach($sliders as  $slider)
								<tr class="tr-{{++$tr}}">
									<td><img src="{{asset('assets/img/Sliders/'. $slider->slider)}}" height="200" width="300" alt="{{$slider->category_name}}"></td>
									<td class="text-capitalize cat_nam">
										<a target="_blank" href="{{$slider->url}}">link</a>
									</td>
									<td>
										<button onclick="getThisSlider('<?= $slider->_id?>','<?= $tr?>')" data-toggle="modal" data-target="#editModal" data-placement="bottom" title="edit"  class="btn btn-sm btn-info text-light"><i class="fa fa-edit"></i>
										</button>
										<button onclick="deleteSlider('<?= $slider->_id?>','<?= $tr?>')" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="delete"  class="btn btn-sm btn-danger text-light" ><i class="fa fa-trash"></i>
										</button>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div> 
</div>
<!-- insert modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="card-title text-uppercase">Add Slider</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" id="storeSlider" enctype="multipart/form-data">
					@csrf
					<input type="hidden" name="role" value="2">
					<div class="form-group">
						<label for="">Slider Link</label>
						<input type="url" placeholder="slider url" class="form-control" name="url">
					</div>
					<div class="form-group">
						<label for="">Slier</label>
						<input type="file"  class="form-control" name="slider">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button id="closeInsrtModal" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" form="storeSlider" class="btn btn-primary">Save</button>
			</div>
		</div>
	</div>
</div>
<!-- insert modal -->
<!-- insert modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="card-title text-uppercase">Update Slider</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" id="updateSlider" enctype="multipart/form-data">
					@csrf
					<input type="hidden" value="" name="editID" id="sliderEditId">
					<input type="hidden" value="" name="tr" id="trNumber">
					<div class="form-group">
						<label for="">Slider Link</label>
						<input type="url" placeholder="slider url" id="sliderUrl" class="form-control" name="url">
					</div>
					<div class="form-group">
						<label for="">Slider Image : </label>
						<img src="http://localhost/classifia/assets/img/mainCatIcon/icon1_1576741685.png" id="sliderImg" height="50" width="50" alt=""><br><br>
						<input type="file"  class="form-control" name="slider">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button id="closeeditModal" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" form="updateSlider" class="btn btn-primary">Update</button>
			</div>
		</div>
	</div>
</div>
<!-- insert modal -->
@endsection

@section('script')
<script>
	window.img_path = "<?= asset("assets/img/Sliders")?>"
	window.insert_slider_one = "<?= url('admin/insert-slider-one')?>"
	window.edit_slider_one = "<?= url('admin/edit-slider-one')?>"
	window.update_slider_one = "<?= url('admin/update-slider-one')?>"
	window.delete_slider_one = "<?= url('admin/delete-slider-one')?>"
</script>
@endSection