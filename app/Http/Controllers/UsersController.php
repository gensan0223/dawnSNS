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
        $posts = Post::where('user_id', $id)->orderBy('created_at', 'desc')->get();
        $user = User::where('id', $id)->first();

        return view('users.profile',compact('posts', 'user'));
    }

    public function search(Request $request){
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

        return view('users.search', compact('users', 'keyword'));
    }
}
