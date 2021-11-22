<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class TruckLayout extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
