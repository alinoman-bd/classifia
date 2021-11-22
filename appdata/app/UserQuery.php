<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class UserQuery extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
