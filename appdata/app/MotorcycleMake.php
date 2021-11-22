<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MotorcycleMake extends Eloquent
{
    protected $connection = 'mongodb';
	protected $guarded = [];
}