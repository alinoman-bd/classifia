@if($jobs->count() == 0)
<h1>No Match Found!</h1>
@else
@foreach($jobs as $job)
<div class="m-side-list mar-b-15 "> <!-- active -->
	<div class="m-side-img">
		<a onclick="addToLastVisit('<?= $job->_id ?>')" href="{{url('advertisement-details',['cat' => 'job','form_type' => @$job->form_type,'post_id' => @$job->_id])}}" class="re-link">
			<img class="cover" src="{{('ad_thumbnail/'.$job->coverImage->image) }}" alt="{{$job->coverImage->image}}">
		</a>
	</div>
	<div class="m-side-cnt">
		<span class="fav" onclick="addToFavourite('<?= $job->_id ?>')"><i class="far fa-heart"></i></span>
		<a onclick="addToLastVisit('<?= $job->_id ?>')" href="{{url('advertisement-details',['cat' => 'job','form_type' => @$job->form_type, 'post_id' => @$job->_id])}}">
			<div class="star"><i class="far fa-star"></i> Features</div>
			<div class="loc-name">
				<span  class="pr-4"><i class="fas fa-map-marker-alt"></i> {{$job->address}}</span>
				<span><i class="far fa-clock"></i> {{$job->created_at->diffForHumans()}}</span>
			</div>
			<div class="house-name text-uppercase">{{ucfirst($job->title)}}</div>
			<div class="house-name text-uppercase">vilniuje (15:00-00:00 val)</div>
			<div class="house-price-len">
				<span class="h-price job-salary">{{$job->salary_from}}-{{$job->salary_to}} </span>
				<span class="job-salary-v">€/
					<?php $types = json_decode($job->job_type);
					foreach ($types as $jb_type) {
						echo '<span>'.$jb_type.'</span>,';
					}  ?>
				</span>
			</div>
		</a>
	</div>
</div>
@endforeach
{{$jobs->links()}}
@endif