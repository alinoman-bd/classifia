<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class UsedCarDamage extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
