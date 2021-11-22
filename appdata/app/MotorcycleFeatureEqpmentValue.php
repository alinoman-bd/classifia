<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MotorcycleFeatureEqpmentValue extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
