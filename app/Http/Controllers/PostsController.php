<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
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
        // $loginUserPosts = Post::where('user_id', $loginUser->id)->orderBy('created_at', 'desc')->get();
        // フォローしているユーザの投稿表示
        $followId = $follow->pluck('id');

        //自分の投稿とフォローしているユーザの投稿を両方表示
        $followId[] = $loginUser->id;
        $followPosts = Post::whereIn('user_id', $followId)->orderBy('created_at', 'desc')->get();

        return view('posts.index',compact('loginUser', 'followCount', 'followerCount', 'followPosts','loginUser'));
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->posts = $request->post;
        $post->user_id = Auth::user()->id;
        $post->save();
        return redirect()->route('posts.top');
    }

    public function edit(Request $request, $id)
    {
        $post = Post::find($id);
        $post->posts = $request->post;
        $post->save();
        return redirect()->route('posts.top');
    }

    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect()->route('posts.top');
    }

    public function showSelfProfile()
    {
        $loginUser = Auth::user();
        //ログインユーザのフォローしている人数
        $follow = $loginUser->followUsers;
        $followCount = $follow->count();
        //ログインユーザのフォローされている人数
        $follower = $loginUser->followerUsers;
        $followerCount = $follower->count();

        return view('posts.showSelfProfile',compact('loginUser', 'followCount', 'followerCount'));
    }

    public function getSelfProfile(ProfileRequest $request)
    {
        $loginUser = Auth::user();
        //ログインユーザのフォローしている人数
        $follow = $loginUser->followUsers;
        $followCount = $follow->count();
        //ログインユーザのフォローされている人数
        $follower = $loginUser->followerUsers;
        $followerCount = $follower->count();

        //プロフィール更新
        if($request->has('username')){
            $loginUser->username = $request->username;
            $loginUser->save();
        }
        if($request->has('mail')){
            $loginUser->mail = $request->mail;
            $loginUser->save();
        }
        if($request->has('newPassword')){
            $loginUser->password = bcrypt($request->newPassword);
            $loginUser->save();
        }
        if($request->has('bio')){
            $loginUser->bio = $request->bio;
            $loginUser->save();
        }
        if($request->has('icon')){
            $fileName = $request->file('icon')->getClientOriginalName();
            $request->file('icon')->storeAs('public/images/icons', $fileName);
            $loginUser->images = $fileName;
            $loginUser->save();
        }

        return redirect()->route('posts.top');
    }
}
