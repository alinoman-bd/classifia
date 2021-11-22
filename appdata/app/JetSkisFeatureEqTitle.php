<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class JetSkisFeatureEqTitle extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
