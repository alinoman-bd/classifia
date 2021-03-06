<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Auth\Authenticatable as AthenticableTrait;
use Illuminate\Contracts\Auth\Authenticatable;
class User extends Eloquent implements Authenticatable
{
    use Notifiable;
    use AthenticableTrait;
    protected $connection = 'mongodb';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'acount_type','suspend','ban',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userinfo(){
        return $this->belongsTo('App\UserInformation', '_id', 'user_id');
    }
}
