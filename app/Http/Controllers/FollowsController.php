<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Follow;
use App\Post;
use App\User;

class FollowsController extends Controller
{
    //
    public function followList(){
        $loginUser = Auth::user();
        //ログインユーザのフォローしている人数
        $follow = $loginUser->followUsers;
        $followCount = $follow->count();
        //ログインユーザのフォローされている人数
        $follower = $loginUser->followerUsers;
        $followerCount = $follower->count();

        $followId = $follow->pluck('id');
        $followPosts = Post::whereIn('user_id', $followId)->orderBy('created_at', 'desc')->get();

        return view('follows.followList', compact('loginUser', 'followCount', 'followerCount', 'follow', 'followPosts'));
    }

    public function followerList(){
        $loginUser = Auth::user();
        //ログインユーザのフォローしている人数
        $follow = $loginUser->followUsers;
        $followCount = $follow->count();
        //ログインユーザのフォローされている人数
        $follower = $loginUser->followerUsers;
        $followerCount = $follower->count();

        $followerId = $follower->pluck('id');
        $followerPosts = Post::whereIn('user_id', $followerId)->orderBy('created_at', 'desc')->get();

        return view('follows.followerList', compact('loginUser', 'followCount', 'followerCount', 'follower', 'followerPosts'));
    }

    public function follow(Request $request)
    {
        // dd($request->input('is-follow'));
        $loginUser = Auth::user();
        //ログインユーザのフォローしている人数
        $follow = $loginUser->followUsers;
        $followCount = $follow->count();
        //ログインユーザのフォローされている人数
        $follower = $loginUser->followerUsers;
        $followerCount = $follower->count();

        //follow機能
        if($request->has('follow')){
            $newFollow = new Follow;
            $newFollow->follow_id = auth::id();
            $newFollow->follower_id = $request->input('userId');
            $newFollow->save();
        }
        if($request->has('unfollow')){
            $deleteFollow=Follow::where('follow_id', auth::id())->where('follower_id', $request->input('userId'))->first();
            $deleteFollow->delete();
        }

        // dd($isFollow);

        //検索結果表示のため
        $users = User::all();
        return view('users.search', compact('loginUser', 'followCount', 'followerCount', 'users'));
    }
}
