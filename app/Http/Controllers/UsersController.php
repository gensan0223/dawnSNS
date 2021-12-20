<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Follow;

class UsersController extends Controller
{
    //

    public function profile(){
        $user = Auth::user();
        return view('users.profile',['user'=>$user]);
    }
    public function search(){
        $user = Auth::user();
        return view('users.search',['user'=>$user]);
    }
}
