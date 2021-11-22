<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MotorboatsEngineType extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
