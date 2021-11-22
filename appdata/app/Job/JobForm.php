<?php

namespace App\Job;
use App\Search;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class JobForm extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];

	public function search()
	{
		return $this->morphMany(Search::class, 'searchable');
	}

	public function jobAdposter(){
		return $this->belongsTo('App\Job\JobAdPosterInfo', '_id', 'ad_id');
	}
}
