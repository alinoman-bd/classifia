<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ConstructionMachinaryMake extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
