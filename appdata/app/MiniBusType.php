<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MiniBusType extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
