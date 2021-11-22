<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class UsedCarGearBox extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
