<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class TruckMake extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];

}
