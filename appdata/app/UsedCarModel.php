<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class UsedCarModel extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
