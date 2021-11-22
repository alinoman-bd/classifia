<?php

namespace App\Services;

use App\Search;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ServicesForm extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];

	public function servicesAdPosterInfo(){
		return $this->belongsTo('App\Services\ServicesAdPosterInfo', '_id','ad_id');
	}

	public function search()
	{
		return $this->morphMany(Search::class, 'searchable');
	}
}
