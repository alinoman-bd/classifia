<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MiniBusMake extends Eloquent
{
    protected $connection = 'mongodb';
	protected $guarded = [];
}
