@extends('layouts.back-master')
@section('title','All Advertisement')
@section('style')
<style>
	.add-btn{
		position: relative;
		top: -30px;
		left: -15px;
	}
	#InsertSuccessAlert,
	#addedFeatured,
	#removedFeatured,
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
	#addedFeatured,
	#removedFeatured
	{
		background-color: green;
	}


	#InsertSuccessAlert.show,
	#addedFeatured.show,
	#popupAlert.show,
	#removedFeatured.show
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
	.please{
		position: fixed;
		z-index: 1111;
		text-align: center;
		top: 139px;
		left: 46%;
		background: rgba(255, 255, 255,0.5);
		border-radius: 4px;
		padding: 6px 40px;
		display: none;
	}

</style>
@endSection
@section('contents')
<a id="popupAlert">You must provide all values first</a>
<a id="InsertSuccessAlert">Item Inserted Successfull!</a>
<a id="addedFeatured">This Advertisement marked as featured Advertisement</a>
<a id="removedFeatured">This Advertisement removed from featured list</a>
<div class="page-content container-fluid"id="exstData">
	<div class="page-breadcrumb border-bottom">
		<div class="row">

			<div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
				<h5 class="font-medium text-uppercase mb-0">All Advertisement</h5> 
			</div>
			<div class="please">
				<img src="{{ asset('assets/img/please-wait.gif') }}" alt="">
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
		<div class="col-md-12 col-lg-12" id="fffff">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title text-uppercase">Advertisement List</h5>
					<div class="table-responsive">
						<table class="table product-overview" id="zero_config">
							<thead>
								<tr>
									<th>Icons</th>
									<th>Details</th>
									<th>Feature</th>
									<th>Actions</th>
								</tr>
							</thead>
							<?php $tr = 0 ?>
							<tbody class="existingItems">
								@include('admin.ad-listing-section')
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div> 
</div>

<!-- user modal -->
<div class="modal fade" id="userInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="card-title text-uppercase">User Information</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="existingDiv">
				<div class="info">
					<p><b>Email : </b><span id="email"></span></p>
					<p><b>Name : </b><span id="name"></span></p>
					<p><b>City : </b><span id="city"></span></p>
					<p><b>Address : </b><span id="address"></span></p>
					<p><b>Company Name : </b><span id="companyName"></span></p>
					<p><b>Company Code : </b><span id="companyCode"></span></p>
					<p><b>Phone : </b><span id="phone"></span></p>
				</div>
			</div>
			<input type="hidden" value="" id="usId">
			<div class="modal-body">
				<h5>Actions</h5>
				<button onclick="userSuspendBan('<?= null ?>','suspend')" data-toggle="tooltip" data-placement="bottom"data-original-title="Suspend User"  class="btn btn-sm btn-secondary text-light"><i class="fa fa-times"></i>
				</button>
				<button onclick="userSuspendBan('<?= null ?>','ban')" data-toggle="tooltip" data-placement="bottom"data-original-title="Ban User"  class="btn btn-sm btn-warning text-light"><i class="fa fa-ban"></i>
				</button>
				<button onclick="remveUsr('<?=  null ?>')" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete User"  class="btn btn-sm btn-danger text-light" ><i class="fa fa-trash"></i>
				</button>
			</div>
			<div class="modal-footer">
				<button id="closeInsrtModal" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- user modal -->

@endsection

@section('script')
<script>
	window.user_info = "<?= url("admin/get-this-user-info")?>"
	window.delete_post = "<?= url("admin/delete-advertisement")?>"
	window.suspend_post = "<?= url("admin/suspend-advertisement")?>"
	window.featured_post = "<?= url("admin/featured-advertisement")?>"
	window.img_path = "<?= asset("assets/img/mainCatIcon")?>"

	window.suspend_ban_user = "<?= url('admin/suspend-ban-user')?>";
	window.delete_user = "<?= url('admin/delete-this-user')?>";
</script>
@endSection