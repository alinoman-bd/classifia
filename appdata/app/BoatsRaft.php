<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class BoatsRaft extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];

	
	public function CarAddPosterInfo(){
		return $this->belongsTo('App\CarAddPosterInfo', '_id', 'ad_id');
	}
	public function CarCommonRecord(){
		return $this->belongsTo('App\CarCommonRecord', '_id', 'post_id');
	}

	public function search()
	{
		return $this->morphMany(Search::class, 'searchable');
	}
}
