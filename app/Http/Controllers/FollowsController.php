<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    //
    public function followList(){
        $user = Auth::user();
        //ログインユーザのフォローしている人数
        $follow = $user->followUsers;
        $followCount = $follow->count();
        //ログインユーザのフォローされている人数
        $follower = $user->followerUsers;
        $followerCount = $follower->count();
        return view('follows.followList', compact('user', 'followCount', 'followerCount'));
    }
    public function followerList(){
        $user = Auth::user();
        //ログインユーザのフォローしている人数
        $follow = $user->followUsers;
        $followCount = $follow->count();
        //ログインユーザのフォローされている人数
        $follower = $user->followerUsers;
        $followerCount = $follower->count();
        return view('follows.followerList', compact('user', 'followCount', 'followerCount'));
    }
}
