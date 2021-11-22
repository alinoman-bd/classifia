<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class UsedCarGamybosPeriod extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
