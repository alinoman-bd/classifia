<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class CarAddPosterInfo extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];

	
	public function carPostInfo(){
		return $this->belongsTo('App\CarCommonRecord', 'ad_id', 'post_id');
	}
}
