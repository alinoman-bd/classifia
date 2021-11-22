<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class UsedCarFristRegCountry extends Eloquent
{
    protected $connection = 'mongodb';
	protected $guarded = [];
}
