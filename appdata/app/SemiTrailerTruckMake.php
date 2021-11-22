<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class SemiTrailerTruckMake extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
