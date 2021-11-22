<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MotorboatsHullMaterial extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
