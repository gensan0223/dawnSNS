<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;

use Illuminate\Support\Facades\Auth;
class PostsController extends Controller
{
    //
    public function index(){
        $user = Auth::user();
        //ログインユーザのフォローしている人数
        $follow = $user->followUsers;
        $followCount = $follow->count();
        //ログインユーザのフォローされている人数
        $follower = $user->followerUsers;
        $followerCount = $follower->count();

        return view('posts.index',compact('user', 'followCount', 'followerCount'));
    }
}
