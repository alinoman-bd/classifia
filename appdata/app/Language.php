<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Language extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];

	
}
