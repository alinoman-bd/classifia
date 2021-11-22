<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class TruckSleepingBed extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
