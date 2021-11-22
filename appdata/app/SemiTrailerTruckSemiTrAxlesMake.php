<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class SemiTrailerTruckSemiTrAxlesMake extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
