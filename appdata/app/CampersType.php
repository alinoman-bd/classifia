<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class CampersType extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
