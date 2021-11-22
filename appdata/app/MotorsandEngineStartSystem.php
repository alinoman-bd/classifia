<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MotorsandEngineStartSystem extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
