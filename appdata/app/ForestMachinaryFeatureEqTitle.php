<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ForestMachinaryFeatureEqTitle extends Eloquent
{
	protected $connection = 'mongodb';	
	protected $guarded = [];
}
