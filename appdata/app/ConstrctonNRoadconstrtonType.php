<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ConstrctonNRoadconstrtonType extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
