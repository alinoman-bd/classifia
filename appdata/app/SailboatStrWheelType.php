<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class SailboatStrWheelType extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
