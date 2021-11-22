<?php

namespace App\House;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class HouseType extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
