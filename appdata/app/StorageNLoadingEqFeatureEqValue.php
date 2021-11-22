<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class StorageNLoadingEqFeatureEqValue extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
