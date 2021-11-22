<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MinibusFeatureEqpmentValue extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
