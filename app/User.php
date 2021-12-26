<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $rememberTokenName = false;

    public function followUsers(){
        return $this->belongsToMany('App\User', 'follows', 'follow_id', 'follower_id');
    }
    public function followerUsers(){
        return $this->belongsToMany('App\User', 'follows', 'follower_id', 'follow_id');
    }

    public function posts(){
        return $this->hasMany('App\Post');
    }
}
