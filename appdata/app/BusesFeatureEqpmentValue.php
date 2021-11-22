<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class BusesFeatureEqpmentValue extends Eloquent
{
    protected $connection = 'mongodb';
	protected $guarded = [];
}
