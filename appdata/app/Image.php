<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Image extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];

	public function advertisement()
	{
		return $this->belongsTo(Advertisement::class, '_id', 'post_id');
	}
	function scopeCover($q) {
		return $q->where('type', 'cover');
	}
}
