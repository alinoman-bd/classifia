<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MunicipalMachineFeatureEqTitle extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
