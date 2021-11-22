@foreach($posts as  $post)
@if($post->cat == 'cars')
@php $category = 'transport'; @endphp 
@elseif($post->cat == 'house')
@php $category = 'realestate'; @endphp
@elseif($post->cat == 'job')
@php $category = 'job'; @endphp
@elseif($post->cat == 'services')
@php $category = 'services'; @endphp
@elseif($post->cat == 'buy-sale')
@php $category = 'buy-sale'; @endphp
@endif
<tr class="tr-{{++$tr}}">
	<td>
		<img src="{{asset('ad_thumbnail/'.@$post->coverImage->image) }}" height="120" width="120" alt="{{$post->title}}">
	</td>
	<td class="text-capitalize cat_nam">
		<b>Title:</b> {{$post->title}} <br>
		<b>Category:</b> {{$post->cat}} | {{$post->form_type}}<br>
		<b>Address:</b> {{$post->address}} <br>
		<b>City:</b> {{$post->city}} <br>
		<b>Price:</b> ${{$post->price}}<br>
		<b>Posted By:</b>
		<a onclick="getThisUserInfo('<?= @$post->user->_id?>')" type="button"data-toggle="modal" data-target="#userInfoModal"href="javascript:void(0)">
			<?= @$post->user->userinfo ? @$post->user->userinfo->name:@$post->user->email ?>
		</a><br>
		<b>Posted at:</b> {{$post->created_at->diffForHumans()}}
	</td>
	<td>
		<input <?= $post->featured ? 'checked': ''?> 
		onclick="makeitFeatured('<?= $post->_id?>',<?= $post->featured?0:1 ?>)" type="checkbox" data-toggle="tooltip" data-placement="bottom" data-original-title=" <?= $post->featured ? 'featured': 'make featured'?>">
	</td>
	<td>
		<a target="_blank" href="{{url('advertisement-details',['cat' => @$category,'form_type' => @$post->form_type,'post_id' => @$post->_id])}}" title="">
			<button data-toggle="tooltip" data-placement="bottom"data-original-title="View"  class="btn btn-sm btn-info text-light"><i class="fa fa-eye"></i>
			</button>
		</a>
		<button onclick="suspend('<?= $post->_id?>')" data-toggle="tooltip" data-placement="bottom"data-original-title="Suspend"  class="btn btn-sm btn-warning text-light"><i class="fa fa-ban"></i>
		</button>
		<button onclick="deleteAdvertisement('<?= $post->_id?>')" data-toggle="tooltip" data-placement="bottom" data-original-title="delete"  class="btn btn-sm btn-danger text-light" ><i class="fa fa-trash"></i>
		</button>
	</td>
</tr>
@endforeach