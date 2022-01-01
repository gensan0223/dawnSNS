<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;

class UsersController extends Controller
{
    //

    public function profile($id){
        $loginUser = Auth::user();
        //ログインユーザのフォローしている人数
        $follow = $loginUser->followUsers;
        $followCount = $follow->count();
        //ログインユーザのフォローされている人数
        $follower = $loginUser->followerUsers;
        $followerCount = $follower->count();

        $posts = Post::where('user_id', $id)->orderBy('created_at', 'desc')->get();
        $user = User::where('id', $id)->first();

        return view('users.profile',compact('loginUser', 'followCount', 'followerCount', 'posts', 'user'));
    }
    public function search(Request $request){
        $loginUser = Auth::user();
        //ログインユーザのフォローしている人数
        $follow = $loginUser->followUsers;
        $followCount = $follow->count();
        //ログインユーザのフォローされている人数
        $follower = $loginUser->followerUsers;
        $followerCount = $follower->count();


        //検索
        $keyword = $request->input('search');
        $query = User::query();
        if(!empty($keyword)){
            $query->where('username', 'like', '%'.$keyword.'%');
        }
        $users = $query->get();
        $users = $users->reject(function($values, $key){
            return $values['id'] == auth::id();
        });
        if(empty($users)){
            return "なし";
        }

        return view('users.search', compact('loginUser', 'followCount', 'followerCount', 'users', 'keyword'));
    }
}
