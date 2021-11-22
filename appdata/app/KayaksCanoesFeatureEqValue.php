<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class KayaksCanoesFeatureEqValue extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
