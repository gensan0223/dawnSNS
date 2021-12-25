<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //

    public function profile(){
        $user = Auth::user();
        return view('users.profile',['user'=>$user]);
    }
    public function search(){
        $user = Auth::user();
        //ログインユーザのフォローしている人数
        $follow = $user->followUsers;
        $followCount = $follow->count();
        //ログインユーザのフォローされている人数
        $follower = $user->followerUsers;
        $followerCount = $follower->count();
        return view('users.search', compact('user', 'followCount', 'followerCount'));
    }
}
