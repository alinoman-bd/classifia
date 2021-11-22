<?php

namespace App\House;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Equipment extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
