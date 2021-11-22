<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class SailboatRigType extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
