@if($advertisements->count() == 0)
<h1>No Match Found!</h1>
@else
@foreach($advertisements as $post)
<div class="m-side-list mar-b-15 "> <!-- active -->
	<div class="m-side-img">
		<a onclick="addToLastVisit('<?= $post->_id ?>')" href="{{url('advertisement-details',['cat' => 'services','form_type' => @$post->form_type,'post_id' => @$post->_id])}}" class="re-link">
			<img class="cover" src="{{('ad_thumbnail/'.$post->coverImage->image) }}" alt="{{$post->coverImage->image}}">
		</a>
	</div>
	<span class="fav" onclick="addToFavourite('<?= $post->_id ?>')"style='top: 10px;right: 11px;'>
		<i class="far fa-heart"></i>
	</span>
	<span class="fav d-none"><i class="fa fa-heart text-danger"></i></span>
	<a onclick="addToLastVisit('<?= $post->_id ?>')" href="{{url('advertisement-details',['cat' => 'services','form_type' => @$post->form_type,'post_id' => @$post->_id])}}" class="re-link">
		<div class="m-side-cnt"style="width: 100%;">
			<div class="star"><i class="far fa-star"></i>Features</div>
			<div class="loc-name"><i class="fas fa-map-marker-alt"></i> {{$post->address}}</div>
			<div class="house-name">{{ucfirst($post->title)}}</div>
			<div class="">{{str_replace("-"," ",ucfirst($post->form_type))}}</div> 
			<div class="house-price-len"><span class="h-price">{{$post->price}} &#128;</span></div>
			<div class="house-price-len">
				<span class="">
					<i class="far fa-clock"></i> {{$post->created_at->diffForHumans()}}
				</span>
			</div>
		</div>
	</a>
</div>
@endforeach
{{$advertisements->links()}}
@endif