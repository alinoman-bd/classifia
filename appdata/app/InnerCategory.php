<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class InnerCategory extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
	protected $table = 'inner_categories';


	public function mainCategory(){
		return $this->belongsTo('App\MainCategory', 'main_cat_id', '_id');
	}

	public function subCategory(){
		return $this->belongsTo('App\SubCategory', 'sub_cat_id', '_id');
	}

	public function languages()
	{
		return $this->morphMany(Languageable::class, 'languageable');
	}
}
