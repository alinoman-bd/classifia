<?php

namespace App\Job;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class JobAdPosterInfo extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];

	public function jobPostInfo(){
		return $this->belongsTo('App\Job\JobForm', 'ad_id', '_id');
	}
}
