<?php

namespace App\House;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class HouseAdPosterInfo extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];

	public function housePostInfo(){
		return $this->belongsTo('App\House\HouseCommonRecord', 'ad_id', 'post_id');
	}
}
