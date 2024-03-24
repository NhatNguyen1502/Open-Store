<?php

namespace App\Http\Controllers;
use App\Models\Users;

use Illuminate\Http\Request;

class LoginController extends Controller
{   

    private $products;
    public function __construct()
    {   
        $this->users = new Users();
    }   

    public function showLogin(){
        return view('clients.loginForm');
    }

    public function showSignup(){
        return view('clients.signup');
    }
    
    public function login( Request $request){
        $email = $request->input('email');    
        $password = $request->input('password');    
        return view('welcome',['email' => $email, 'password' => $password]);
    }


    public function signup(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|unique:users',
            'name' => 'required',
            'password' => 'required',
        ]);
        $data = $request;
        $data->role = 'user';
        $data->status = 'active';

        $this->users->addUser($data);

        return redirect()->route('user.showLogin')->with('success', 'User created successfully.');
        return dd($request);
    }

}
