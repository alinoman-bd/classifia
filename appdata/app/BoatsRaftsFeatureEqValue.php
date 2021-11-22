<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class BoatsRaftsFeatureEqValue extends Eloquent
{
    protected $connection = 'mongodb';
	protected $guarded = [];
}
