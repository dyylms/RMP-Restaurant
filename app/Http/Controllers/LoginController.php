<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function halamanlogin(){
        return view('login.login');
    }

    public function postlogin(Request $request){
        if(Auth::attempt($request->only('username','password'))){
            return redirect('/home');
        }
        return redirect('/login');
    }

    public function logout(){
        Auth::logout();
        return redirect ('login');
    }

    public function register(){
        return view('login.register');
    }

}

