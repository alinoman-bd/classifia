<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ForestMachinaryMake extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
