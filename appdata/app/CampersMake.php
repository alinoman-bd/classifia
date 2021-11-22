<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class CampersMake extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
