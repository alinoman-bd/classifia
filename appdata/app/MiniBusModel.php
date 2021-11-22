<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MiniBusModel extends Eloquent
{
    protected $connection = 'mongodb';
	protected $guarded = [];
}
