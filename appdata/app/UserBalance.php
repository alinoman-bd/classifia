<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class UserBalance extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
