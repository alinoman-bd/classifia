<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class AdPosterInfo extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];

	public function advertisements()
	{
		return $this->belongsTo(Advertisement::class,'_id', 'post_id');
	}
}
