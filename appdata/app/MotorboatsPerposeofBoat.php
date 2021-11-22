<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MotorboatsPerposeofBoat extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
