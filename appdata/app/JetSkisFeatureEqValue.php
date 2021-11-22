<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class JetSkisFeatureEqValue extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
