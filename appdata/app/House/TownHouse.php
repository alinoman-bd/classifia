<?php

namespace App\House;

use App\Search;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class TownHouse extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
	
	public function houseAdposter(){
		return $this->belongsTo('App\House\HouseAdPosterInfo', '_id','ad_id');
	}
	public function search()
	{
		return $this->morphMany(Search::class, 'searchable');
	}
}
