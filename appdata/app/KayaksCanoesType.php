<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class KayaksCanoesType extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
