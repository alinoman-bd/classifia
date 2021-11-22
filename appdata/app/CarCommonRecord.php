<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class CarCommonRecord extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];




	public function carAdposter(){
		return $this->belongsTo('App\CarAddPosterInfo', 'post_id', 'ad_id');
	}
}
