@if(@$cars->count() == 0)
<h1>No Match Found!</h1>
@else
@foreach(@$cars as $post)
<div class="m-side-list mar-b-15 ">
	<div class="m-side-img">
		<a onclick="addToLastVisit('<?= $post->_id ?>')" href="{{url('advertisement-details',['cat' => 'transport','form_type' => @$post->form_type,'post_id' => @$post->_id])}}">
			<img class="cover" src="{{('ad_thumbnail/'.$post->coverImage->image) }}" alt="{{$post->coverImage->image}}">
		</a>
	</div>
	<div class="m-side-cnt">
		<span class="fav" onclick="addToFavourite('<?= $post->_id ?>')"><i class="far fa-heart"></i></span>
		<a onclick="addToLastVisit('<?= $post->_id ?>')" href="{{url('advertisement-details',['cat' => 'transport','form_type' => @$post->form_type,'post_id' => @$post->_id])}}">
			<div class="loc-name"><i class="fas fa-map-marker-alt"></i> {{$post->address}}</div>
			<div class="house-name">{{ucfirst($post->title)}}</div>
			<div class="house-name">{{str_replace("-"," ",ucfirst($post->form_type))}}</div>
			<div class="house-price-len"><span class="h-price">{{$post->price}} &#128;</span></div>
			<div class="house-price-len">
				<span class=""><i class="far fa-clock"></i> {{$post->created_at->diffForHumans()}}</span>
			</div>
		</a>
	</div>
</div>
@endforeach
@endif
{{$cars->links()}}