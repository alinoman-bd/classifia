<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MiniBusHeight extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
