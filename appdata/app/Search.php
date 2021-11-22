<?php

namespace App;

use App\BuySale\BuySale;

use App\House\Apartment;
use App\House\FirmsForest;
use App\House\LeisureHotel;
use App\House\Office;
use App\House\Other;
use App\House\Plot;
use App\House\TownHouse;
use App\House\Villa;

use App\Job\JobForm;

use App\Services\ServicesForm;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Search extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
	

	public function searchable()
	{
		return $this->morphTo();
	}

	public function user(){
		return $this->belongsTo(User::class, 'user_id', '_id');
	}

	public function category()
	{
		return $this->belongsTo(MainCategory::class, 'cat', 'cat_key');
	}

}
