<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class AgriculturalMachineryMake extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
