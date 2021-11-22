<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class SailboatsFeatureEqTitle extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
