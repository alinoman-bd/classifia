<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class TruckRearSuspension extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
