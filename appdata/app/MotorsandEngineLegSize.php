<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MotorsandEngineLegSize extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
