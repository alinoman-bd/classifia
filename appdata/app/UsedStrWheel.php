<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class UsedStrWheel extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
