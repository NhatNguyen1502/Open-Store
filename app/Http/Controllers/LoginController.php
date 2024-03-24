<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{   
    public function showLogin(){
        return view('clients.loginForm');
    }
    
    public function login( Request $request){
        $email = $request->input('email');    
        $password = $request->input('password');    
        return view('welcome',['email' => $email, 'password' => $password]);
    }

    public function signup(){
        return view('welcome');
    }
}
