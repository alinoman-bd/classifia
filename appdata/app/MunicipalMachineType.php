<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MunicipalMachineType extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
