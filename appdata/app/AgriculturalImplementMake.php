<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class AgriculturalImplementMake extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
