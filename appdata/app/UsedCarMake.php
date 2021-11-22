<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class UsedCarMake extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
