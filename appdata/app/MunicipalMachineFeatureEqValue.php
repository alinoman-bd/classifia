<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MunicipalMachineFeatureEqValue extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
