<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class SemiTrailerTruckSemiTrManufacturer extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
