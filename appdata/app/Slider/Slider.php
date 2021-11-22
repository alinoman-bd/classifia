<?php

namespace App\Slider;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Slider extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
