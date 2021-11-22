<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class UsedCarEuroStandard extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
