<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ConstructionMachinaryType extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
