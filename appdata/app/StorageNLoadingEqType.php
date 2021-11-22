<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class StorageNLoadingEqType extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
