<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class TrailerSemitrailersMake extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
