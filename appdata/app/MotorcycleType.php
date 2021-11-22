<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MotorcycleType extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
