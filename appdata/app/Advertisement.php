<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Advertisement extends Eloquent
{
	protected $connection = 'mongodb';
	protected $guarded = [];
	protected $table = 'advertisements';

	public function userInfo()
	{
		return $this->hasOne(AdPosterInfo::class,'post_id','_id');	
	}

	public function images()
	{
		return $this->hasMany(Image::class,'post_id','_id');
	}

	public function coverImage()
	{
		return $this->BelongsTo(Image::class,'_id','post_id')->cover();
	}
	public function paymentInfo()
	{
		return $this->BelongsTo(PaymentInfo::class,'_id','post_id');
	}
	public function user()
	{
		return $this->BelongsTo(User::class,'user_id','_id');
	}
	public function category()
	{
		return $this->belongsTo(MainCategory::class, 'cat', 'cat_key');
	}
}
