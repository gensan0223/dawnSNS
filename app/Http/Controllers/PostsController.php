<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;
use App\Post;

use Illuminate\Support\Facades\Auth;
class PostsController extends Controller
{
    //
    public function index(){
        $loginUser = Auth::user();
        //ログインユーザのフォローしている人数
        $follow = $loginUser->followUsers;
        $followCount = $follow->count();
        //ログインユーザのフォローされている人数
        $follower = $loginUser->followerUsers;
        $followerCount = $follower->count();

        // ログインユーザの投稿表示
        $loginUserPosts=Post::where('user_id', $loginUser->id)->orderBy('created_at', 'desc')->get();

        return view('posts.index',compact('loginUser', 'followCount', 'followerCount', 'loginUserPosts'));
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->posts = $request->post;
        $post->user_id = Auth::user()->id;
        $post->save();
        return redirect()->route('posts.top');
    }
}
