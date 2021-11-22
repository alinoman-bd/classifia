<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MiniBusLength extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
