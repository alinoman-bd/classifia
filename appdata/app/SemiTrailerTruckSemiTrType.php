<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class SemiTrailerTruckSemiTrType extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
