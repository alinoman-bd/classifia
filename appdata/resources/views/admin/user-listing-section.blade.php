<div class="card">
	<div class="card-body">
		<h5 class="card-title text-uppercase">Advertisement List</h5>
		<div class="table-responsive">
			<table class="table product-overview" id="zero_config">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Actions</th>
					</tr>
				</thead>
				<?php $tr = 0 ?>
				<tbody class="existingItems">
					@foreach($users as  $user)
					<tr class="tr-{{++$tr}}">
						<td>{{$user->userinfo->name? $user->userinfo->name: 'not provided' }}</td>
						<td class="cat_nam">{{$user->email}}</td>
						<td class="text-capitalize cat_nam">{{$user->userinfo->phone? $user->userinfo->phone: 'not provided' }}</td>
						<td>
							<button onclick="userSuspendBan('<?= $user->_id?>','suspend')" data-toggle="tooltip" data-placement="bottom"data-original-title="Suspend User"  class="btn btn-sm btn-secondary text-light"><i class="fa fa-times"></i>
							</button>
							<button onclick="userSuspendBan('<?= $user->_id?>','ban')" data-toggle="tooltip" data-placement="bottom"data-original-title="Ban User"  class="btn btn-sm btn-warning text-light"><i class="fa fa-ban"></i>
							</button>
							<button onclick="remveUsr('<?= $user->_id?>')" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete User"  class="btn btn-sm btn-danger text-light" ><i class="fa fa-trash"></i>
							</button>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>