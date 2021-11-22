<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Languageable extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
	protected $table = 'languageable';

	public function languageable()
	{
		return $this->morphTo();
	}
}
