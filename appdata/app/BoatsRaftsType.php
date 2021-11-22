<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class BoatsRaftsType extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
