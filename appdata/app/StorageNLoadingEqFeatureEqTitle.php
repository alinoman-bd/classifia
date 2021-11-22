<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class StorageNLoadingEqFeatureEqTitle extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
