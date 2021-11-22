<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MainCategory extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
	protected $table = 'main_categories';

	public function languages()
	{
		return $this->morphMany(Languageable::class, 'languageable');
	}

	public function advertisement()
	{
		return $this->hasMany(Advertisement::class, 'cat', 'cat_key');
	}
}
