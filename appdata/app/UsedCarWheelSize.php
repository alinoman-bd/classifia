<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class UsedCarWheelSize extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
