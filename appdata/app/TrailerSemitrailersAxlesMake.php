<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class TrailerSemitrailersAxlesMake extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
