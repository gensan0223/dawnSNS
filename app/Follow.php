<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //
    public function users(){
        return $this->belongsTo('App\User', 'users', 'id', 'follow_id');
    }

}
