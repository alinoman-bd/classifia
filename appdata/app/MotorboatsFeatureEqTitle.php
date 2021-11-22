<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MotorboatsFeatureEqTitle extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
