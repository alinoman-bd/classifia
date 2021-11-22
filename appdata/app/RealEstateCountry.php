<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class RealEstateCountry extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
