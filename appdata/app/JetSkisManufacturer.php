<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class JetSkisManufacturer extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
