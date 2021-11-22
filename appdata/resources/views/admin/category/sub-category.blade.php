@extends('layouts.back-master')
@section('title','Sub Category')
@section('style')
<style>
	.add-btn{
		position: relative;
		top: -30px;
		left: -15px;
	}
	#InsertSuccessAlert,
	#UpdateSuccessAlertPop,
	#popupAlert{
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
			<div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
				<h5 class="font-medium text-uppercase mb-0">Sub Category</h5> 
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
					<h5 class="card-title text-uppercase">Sub Category List</h5>
					<button class="btn btn-primary no-radius float-right add-btn" data-toggle="modal" data-target="#exampleModal">Add New Sub Category</button>
					<div class="table-responsive">
						<table class="table product-overview" id="zero_config">
							<thead>
								<tr>
									<th>Icons</th>
									<th>Category Name</th>
									<th>Main Category</th>
									<th>Actions</th>
								</tr>
							</thead>
							<?php $tr = 0 ?>
							<tbody class="existingItems">
								@foreach($sub_categories as  $subCat)
								<tr class="tr-{{++$tr}}">
									<td><img src="{{asset('assets/img/subCatIcon/'. $subCat->icon)}}" height="50" width="50" alt="{{$subCat->category_name}}"></td>

									<td class="text-capitalize cat_nam">
										EN: {{$subCat->category_name}} <br>
										@if($subCat->languages)
										@foreach($subCat->languages as $lang)
										{{$lang->key}}: {{$lang->value}} <br>
										@endforeach
										@endif
									</td>

									<td class="text-capitalize cat_nam">{{$subCat->mainCategory->category_name}}</td>
									<td>
										<button onclick="getThisSubCat('<?= $subCat->_id?>','<?= $tr?>')" data-toggle="modal" data-target="#editModal" data-placement="bottom" title="edit"  class="btn btn-sm btn-info text-light"><i class="fa fa-edit"></i>
										</button>
										<button onclick="deleteSubCat('<?= $subCat->_id?>','<?= $tr?>')" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="delete"  class="btn btn-sm btn-danger text-light" ><i class="fa fa-trash"></i>
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
				<h5 class="card-title text-uppercase">Add Category</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" id="storeSubCat" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label for="">Main Category</label>
						<select name="main_cat_id" class="form-control" id="" >
							<option value="">select a category</option>
							@foreach(App\MainCategory::orderBy('category_name', 'asc')->get() as $category)
							<option value="{{$category->_id}}">{{$category->category_name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="">Category Name</label>
						<input type="text" placeholder="Sub category name" class="form-control" name="category_name">
					</div>
					<div class="form-group">
						<label for="">Slug</label>
						<input type="text" placeholder="slug(url)" class="form-control" name="slug">
					</div>
					<div class="form-group">
						<label for="">Icon</label>
						<input type="file"  class="form-control" name="icon">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button id="closeInsrtModal" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" form="storeSubCat" class="btn btn-primary">Save</button>
			</div>
		</div>
	</div>
</div>
<!-- insert modal -->
<!-- update modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="card-title text-uppercase">Update Category</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" id="updateSubCat" enctype="multipart/form-data">
					@csrf
					<input type="hidden" value="" name="editID" id="SubCatEditId">
					<input type="hidden" value="" name="tr" id="trNumber">
					<div class="form-group">
						<label for="">Main Category</label>
						<select name="main_cat_id" class="form-control" id="MainCategory">
							@foreach(App\MainCategory::orderBy('category_name', 'asc')->get() as $category)
							<option value="{{$category->_id}}">{{$category->category_name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="">Category Name</label>
						<input type="text" id="subCat_name" placeholder="category name" class="form-control" name="category_name">
					</div>
					@foreach($langs as $lang)
					<div class="form-group">
						<label for="">Sub Category Name({{$lang->title}})</label>
						<input type="text" id="" placeholder="sub category name ({{$lang->title}})" class="form-control" name="{{$lang->key}}_sub_category_name">
					</div>
					@endforeach
					<div class="form-group">
						<label for="">Icon</label><br>
						<img src="http://localhost/classifia/assets/img/mainCatIcon/icon1_1576741685.png" id="editicon" height="50" width="50" alt=""><br><br>
						<input type="file"  class="form-control" name="icon">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button id="closeeditModal" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" form="updateSubCat" class="btn btn-primary">Update</button>
			</div>
		</div>
	</div>
</div>
<!-- update modal -->
@endsection

@section('script')
<script>
	window.img_path = "<?= asset("assets/img/subCatIcon")?>"
	window.insert_Subcategory = "<?= url('admin/insert-sub-category')?>"
	window.edit_Subcategory = "<?= url('admin/edit-sub-category')?>"
	window.update_Subcategory = "<?= url('admin/update-sub-category')?>"
	window.delete_Subcategory = "<?= url('admin/delete-sub-category')?>"
</script>
@endSection