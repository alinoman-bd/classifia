<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class PaymentInfo extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
	protected $table = 'payment_info';

	public function package(){
		return $this->belongsTo('App\Package', 'package_id', '_id');
	}
	public function promot(){
		return $this->belongsTo('App\AdsValidity', 'promot_id', '_id');
	}
	public function advert(){
		return $this->belongsTo('App\AdsValidity', 'advert_id', '_id');
	}
	public function advertisement(){
		return $this->belongsTo(Advertisement::class, 'post_id', '_id');
	}


}