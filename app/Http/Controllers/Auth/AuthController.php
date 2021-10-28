<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
       return view('auth.pages.login');
    }
    public function registration(){
        return view('auth.pages.register');
    }
    public function forgot(){
        return view('auth.pages.forgot');
    }
    public function recover($token){
        $target = User::where('remember_token',$token)->first();
        return view('auth.pages.recover',compact('target'));
    }
    public function logout(){
        session()->flush();
        Auth::logout();
        return redirect()->route('/')->withErrors(['msg'=>'<div class="alert alert-primary" id="alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>Thank You! </strong> See you soon...
                        </div>']);
    }
}
