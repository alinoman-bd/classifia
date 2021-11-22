<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class UsedCarClimateControl extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
