<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MunicipalMachineMake extends Eloquent
{
	
	protected $connection = 'mongodb';
	protected $guarded = [];
}
