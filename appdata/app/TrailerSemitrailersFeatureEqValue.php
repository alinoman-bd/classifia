<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class TrailerSemitrailersFeatureEqValue extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
