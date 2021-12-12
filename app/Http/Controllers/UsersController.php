<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class UsersController extends Controller
{
    //
    public function logout(Request $request){
        Auth::logout();
        redirect('auth.login');
    }

    public function profile(){
        return view('users.profile');
    }
    public function search(){
        return view('users.search');
    }
}
