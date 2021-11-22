@extends('layouts.back-master')
@section('title','Third Inner Category')
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
				<h5 class="font-medium text-uppercase mb-0">Third Inner Category</h5>  
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
					<h5 class="card-title text-uppercase">Third Inner Category List</h5> 
					<button class="btn btn-primary no-radius float-right add-btn" data-toggle="modal" data-target="#exampleModal">Add New Third Inner Category </button>
					<div class="table-responsive">
						<table class="table existing_item product-overview" id="zero_config">
							@include('admin.category.thrd-inr-listing-section')
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
				<form method="post" id="storeThrdInnerCat" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label for="">Main Category</label>
						<select name="main_cat_id" class="form-control" id="" onchange="GetAllSubCat(this.value,1)">
							<option value="">select a category</option>
							@foreach(App\MainCategory::orderBy('category_name', 'asc')->get() as $category)
							<option value="{{$category->_id}}">{{$category->category_name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="">Sub Category</label>
						<select name="sub_cat_id" onchange="getInnerCats(this.value)" class="form-control" id="SubCats">
							<option value="">----><------</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Inner Category</label>
						<select name="inner_cat_id" class="form-control" id="InnerCats">
							<option value="">----><------</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Category Name</label>
						<input type="text" placeholder="third inner category name" class="form-control" name="category_name">
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
				<button type="submit" form="storeThrdInnerCat" class="btn btn-primary">Save</button>
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
				<form method="post" id="updateThrdInnerCat" enctype="multipart/form-data">
					@csrf
					<input type="hidden" class="form-control" value="" name="editID" id="thrdInnerCatEditId">
					<input type="hidden" class="form-control" value="" name="tr" id="trNumber">
					<div class="form-group">
						<label for="">Main Category</label>
						<select name="main_cat_id" class="form-control" id="MainCategory" onchange="GetAllSubCat(this.value,2)">
							@foreach(App\MainCategory::orderBy('category_name', 'asc')->get() as $category)
							<option value="{{$category->_id}}">{{$category->category_name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="">Sub Category</label>
						<select name="sub_cat_id" onchange="getInnerCats(this.value)" class="form-control" id="subcategoryeditedid">
							<option value=""></option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Inner Category</label>
						<select name="inner_cat_id" class="form-control" id="innerCategoryeditedid">
							<option value=""></option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Category Name</label>
						<input type="text" id="InnerCat_name" placeholder="category name" class="form-control" name="category_name">
					</div>
					@foreach($langs as $lang)
					<div class="form-group">
						<label for="">Third Inner Category Name({{$lang->title}})</label>
						<input type="text" id="" placeholder="third inner category name ({{$lang->title}})" class="form-control" name="{{$lang->key}}_third_inner_category_name">
					</div>
					@endforeach
					<div class="form-group">
						<label for="">Slug</label>
						<input type="text" id="ThrdInnerCat_slug" placeholder="slug" class="form-control" name="slug">
					</div>
					<div class="form-group">
						<label for="">Icon</label><br>
						<img src="http://localhost/classifia/assets/img/mainCatIcon/icon1_1576741685.png" id="editicon" height="50" width="50" alt=""><br><br>
						<input type="file"  class="form-control" name="icon">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button id="closeeditModal" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" form="updateThrdInnerCat" class="btn btn-primary">Update</button>
			</div>
		</div>
	</div>
</div>
<!-- update modal -->
@endsection

@section('script')
<script>
	window.get_Subcategories = "<?= url('admin/get-sub-categories')?>"
	window.get_Innercategories = "<?= url('admin/get-inner-categories')?>"
	window.img_path = "<?= asset("assets/img/thirdInnerCatIcon")?>"
	
	window.insert_thrd_inner = "<?= url('admin/insert-thrd-inner-category')?>"
	window.edit_thrd_inner = "<?= url('admin/edit-thrd-inner-category')?>"
	window.update_thrd_inner = "<?= url('admin/update-thrd-inner-category')?>"
	window.delete_thrd_inner = "<?= url('admin/delete-thrd-inner-category')?>"
</script>
@endSection