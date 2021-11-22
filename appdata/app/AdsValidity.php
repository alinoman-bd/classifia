<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class AdsValidity extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
	protected $table = 'ads_validity';
}
