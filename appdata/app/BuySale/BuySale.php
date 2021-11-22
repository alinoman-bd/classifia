<?php

namespace App\BuySale;

use App\Search;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class BuySale extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];

	
	public function search()
	{
		return $this->morphMany(Search::class, 'searchable');
	}

	public function buySaleAdposter(){
		return $this->belongsTo('App\BuySale\BuySaleAdposterInfo', '_id','ad_id');
	}
}
