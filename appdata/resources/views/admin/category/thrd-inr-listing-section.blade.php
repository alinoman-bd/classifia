<thead>
	<tr>
		<th>Icons</th>
		<th>Category Name</th>
		<th>Inner Category</th>
		<th>Sub Category</th>
		<th>Main Category</th>
		<th>Actions</th>
	</tr>
</thead>
<?php $tr = 0 ?>
<tbody class="existingItems">
	@foreach($thrd_inner_cats as  $thrd_inner)
	<tr class="tr-{{++$tr}}">
		<td><img src="{{asset('assets/img/thirdInnerCatIcon/'. $thrd_inner->icon)}}" height="50" width="50" alt="{{$thrd_inner->category_name}}"></td>
		<td class="text-capitalize cat_nam">
			EN: {{$thrd_inner->category_name}} <br>
			@if($thrd_inner->languages)
			@foreach($thrd_inner->languages as $lang)
			{{$lang->key}}: {{$lang->value}} <br>
			@endforeach
			@endif
		</td>

		<td class="text-capitalize cat_nam">{{$thrd_inner->innerCategory->category_name}}</td>
		<td class="text-capitalize cat_nam">{{$thrd_inner->subCategory->category_name}}</td>
		<td class="text-capitalize cat_nam">{{$thrd_inner->mainCategory->category_name}}</td>
		<td>
			<button onclick="getThisThrdInnerCat('<?= $thrd_inner->_id?>','<?= $tr?>')" data-toggle="modal" data-target="#editModal" data-placement="bottom" title="edit" class="btn btn-sm btn-info text-light"><i class="fa fa-edit"></i>
			</button>
			<button onclick="dltTrdInnr('<?= $thrd_inner->_id?>','<?= $tr?>')" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="delete"  class="btn btn-sm btn-danger text-light" ><i class="fa fa-trash"></i>
			</button>
		</td>
	</tr>
	@endforeach
</tbody>