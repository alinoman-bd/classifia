<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class TrailerSemitrailersFeatureEqTitle extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
