<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class UsedCarDrivenWheel extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
