<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class AgriculturalImplementType extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
