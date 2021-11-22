<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ConstrctonNRoadconstrtonMake extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
