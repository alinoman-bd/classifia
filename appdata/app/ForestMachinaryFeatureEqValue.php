<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ForestMachinaryFeatureEqValue extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
