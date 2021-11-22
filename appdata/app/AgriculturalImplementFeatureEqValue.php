<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class AgriculturalImplementFeatureEqValue extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
