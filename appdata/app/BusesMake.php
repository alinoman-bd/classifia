<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class BusesMake extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
