<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MotorsandEngineEngineType extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
