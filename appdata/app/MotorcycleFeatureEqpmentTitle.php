<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MotorcycleFeatureEqpmentTitle extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
