<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MotorboatsTypeofBattery extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
