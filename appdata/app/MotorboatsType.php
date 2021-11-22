<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MotorboatsType extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
