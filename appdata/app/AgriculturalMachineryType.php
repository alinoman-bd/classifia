<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class AgriculturalMachineryType extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
