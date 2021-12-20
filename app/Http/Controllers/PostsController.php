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
        $follow = User::find(1);
        dd($follow);
        return view('posts.index',['user'=>$user]);
    }
}
