<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Follow extends Model
{
    const UPDATED_AT = null;
 
    protected $table = 'follows';
    public $timestamps = false;

    //
    public function users(){
        return $this->belongsTo('App\User', 'users', 'id', ['follow_id', 'follower_id']);
    }


}
