<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class JetSkisHullMaterial extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
}
