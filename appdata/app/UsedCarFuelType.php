<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class UsedCarFuelType extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
