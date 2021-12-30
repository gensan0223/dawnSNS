<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UsersController extends Controller
{
    //

    public function profile(){
        $loginUser = Auth::user();
        return view('users.profile',compact('loginUser'));
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
