<?php

namespace App\BuySale;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class BuySaleAdposterInfo extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];

	public function buysalePostInfo(){
		return $this->belongsTo('App\BuySale\BuySale', 'ad_id', '_id');
	}
}
