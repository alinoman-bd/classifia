<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class TruckFrontSuspension extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
