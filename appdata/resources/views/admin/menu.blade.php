@extends('layouts.back-master')
@section('title','Home')
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
			<div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
				<h5 class="font-medium text-uppercase mb-0">Main Menu</h5> 
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
					<h5 class="card-title text-uppercase">Menu List</h5>
					<button class="btn btn-primary no-radius float-right add-btn" data-toggle="modal" data-target="#exampleModal">Add New Menu</button>
					<div class="table-responsive">
						<table class="table product-overview" id="zero_config">
							<thead>
								<tr>
									<th>Sl</th>
									<th>Menu</th>
									<th>Actions</th>
								</tr>
							</thead>
							<?php $tr = 0 ?>
							<tbody class="existingItems">
								@foreach($menus as  $menu)
								<tr class="tr-{{++$tr}}">
									<td>{{+$tr}}</td>
									<td class="text-capitalize cat_nam">
										EN: {{$menu->menu_name}} <br>
										@if($menu->languages)
										@foreach($menu->languages as $lang)
										{{$lang->key}}: {{$lang->value}} <br>
										@endforeach
										@endif
									</td>
									<td>
										<button onclick="getThisMenu('<?= $menu->_id?>','<?= $tr?>')" data-toggle="modal" data-target="#editModal" data-placement="bottom" title="edit"  class="btn btn-sm btn-info text-light"><i class="fa fa-edit"></i>
										</button>
										<button onclick="deleteMenu('<?= $menu->_id?>','<?= $tr?>')" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="delete"  class="btn btn-sm btn-danger text-light" ><i class="fa fa-trash"></i>
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
				<h5 class="card-title text-uppercase">Add Menu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" id="storeMenu" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label for="">Menu Name - English (Default)</label>
						<input type="text" required="" placeholder="category name" class="form-control" name="menu_name">
					</div>
					@foreach($langs as $lang)
					<div class="form-group">
						<label for="">Menu Name({{$lang->title}})</label>
						<input type="text" placeholder="menu name ({{$lang->title}})" class="form-control" name="{{$lang->key}}_menu_name">
					</div>
					@endforeach
					<div class="form-group">
						<label for="">Slug</label>
						<input type="text" placeholder="slug" required="" class="form-control" name="slug">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button id="closeInsrtModal" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" form="storeMenu" class="btn btn-primary">Save</button>
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
				<h5 class="card-title text-uppercase">Update Menu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" id="updateMenu" enctype="multipart/form-data">
					@csrf
					<input type="text" value="" name="editID" id="menuCatEditId">
					<input type="text" value="" name="tr" id="trNumber">
					<div class="resData">
						<!-- data -->
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button id="closeeditModal" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" form="updateMenu" class="btn btn-primary">Update</button>
			</div>
		</div>
	</div>
</div>
<!-- insert modal -->
@endsection

@section('script')
<script>
	window.insert_Menu = "<?= url('admin/insert-menu')?>"
	window.edit_Menu = "<?= url('admin/edit-menu')?>"
	window.update_Menu = "<?= url('admin/update-menu')?>"
	window.delete_Menu = "<?= url('admin/delete-menu')?>"
</script>
@endSection