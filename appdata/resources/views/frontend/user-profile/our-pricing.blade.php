@extends('frontend.app')
@section('style')
<style>
	.header-section {
		border-bottom: 1px solid #ddd;
	}
</style>
@endsection
@section('content')
<section class="user-profile-section">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Our Pricing</li>
		</ol>
	</nav>
	<div class="row mar-0">
		@include('frontend.user-profile.user-sidebar')
		<div class=" col-lg-9 pad-0">
			<div class="user-cnt">
				<div class="user-tab">
					<div class="map-sidebar">
						<div class="row">
							<div class="col-md-12">
								<?= $description[0]->description ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Modal -->
<div class="modal fade" id="balanceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add your new balance amount</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{route('addNewBalace')}}" method="post" id="balaceMdl">
					@csrf
					<div class="form-group">
						<label for="">Amount</label>
						<input type="number" required="" placeholder="amount" name="amount" class="form-control">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" form="balaceMdl" class="btn btn-sm btn-danger">Add Balace</button>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script>
	
</script>
@endsection