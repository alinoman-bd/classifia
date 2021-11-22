<?php

namespace App\House;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class BuildingType extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
