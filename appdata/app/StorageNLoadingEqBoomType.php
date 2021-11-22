<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class StorageNLoadingEqBoomType extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
