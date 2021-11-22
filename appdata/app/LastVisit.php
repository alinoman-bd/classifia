<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class LastVisit extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
	protected $table = 'last_visits';
	
	public function advertisementInfo()
	{
		return $this->BelongsTo(Advertisement::class,'post_id','_id');
	}
}
