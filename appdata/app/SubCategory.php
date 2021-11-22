<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class SubCategory extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
	protected $table = 'sub_categories';


	public function mainCategory(){

		return $this->belongsTo('App\MainCategory', 'main_cat_id', '_id');
	}

	public function languages()
	{
		return $this->morphMany(Languageable::class, 'languageable');
	}
}
