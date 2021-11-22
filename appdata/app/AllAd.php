<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class AllAd extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
	
	public function CarAddPosterInfo(){
		return $this->belongsTo('App\CarAddPosterInfo', '_id', 'ad_id');
	}
	public function paymentInfo(){
		return $this->belongsTo('App\PaymentInfo', '_id', 'all_table_id');
	}
}
