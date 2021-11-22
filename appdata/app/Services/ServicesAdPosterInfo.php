<?php

namespace App\Services;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ServicesAdPosterInfo extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];

	public function servicesPostInfo(){
		return $this->belongsTo('App\Services\ServicesForm', 'ad_id', '_id');
	}
}
