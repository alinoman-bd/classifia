<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class AutoTrainMake extends Eloquent
{
    protected $connection = 'mongodb';
	protected $guarded = [];
}
