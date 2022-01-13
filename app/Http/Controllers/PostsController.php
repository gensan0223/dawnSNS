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
        $follow = $loginUser->followUsers;
        $followId = $follow->pluck('id');
        $followId[] = $loginUser->id;
        $followPosts = Post::whereIn('user_id', $followId)->orderBy('created_at', 'desc')->get();

        return view('posts.index',compact('followPosts'));
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->posts = $request->post;
        $post->user_id = Auth::user()->id;
        $post->save();
        return redirect()->route('posts.top');
    }

    public function edit(Request $request)
    {
        $post = Post::find($request->id);
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
        return view('posts.showSelfProfile');
    }

    public function getSelfProfile(ProfileRequest $request)
    {
        $loginUser = Auth::user();
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
