<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Favourite extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];


	public function houseAdInfoForFvrt(){
		return $this->belongsTo('App\House\HouseCommonRecord', 'post_id', 'post_id');
	}
	public function carAdInfoForFvrt(){
		return $this->belongsTo('App\CarCommonRecord', 'post_id', 'post_id');
	}
	public function jobAdInfoForFvrt(){
		return $this->belongsTo('App\Job\JobForm', 'post_id', '_id');
	}
}
