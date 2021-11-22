<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class TrailerSemitrailersType extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
