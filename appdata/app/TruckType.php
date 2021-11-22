<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class TruckType extends Eloquent
{	
	protected $connection = 'mongodb';
	protected $guarded = [];
}
