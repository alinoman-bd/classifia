<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MotorcycleCoolingSystemType extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
