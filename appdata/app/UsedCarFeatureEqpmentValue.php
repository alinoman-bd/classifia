<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class UsedCarFeatureEqpmentValue extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
