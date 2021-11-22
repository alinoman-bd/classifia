<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class SailboatsType extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
