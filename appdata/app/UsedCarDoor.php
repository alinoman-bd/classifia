<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class UsedCarDoor extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
