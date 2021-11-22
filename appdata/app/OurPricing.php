<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class OurPricing extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];

	public function languages()
	{
		return $this->morphMany(Languageable::class, 'languageable');
	}
}
