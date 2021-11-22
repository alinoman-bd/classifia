<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ForestMachinaryType extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
