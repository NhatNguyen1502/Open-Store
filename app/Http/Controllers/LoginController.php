<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{   

    private $users;
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

        $user = Users::where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->withInput($request->only('email'))->withErrors(['email' => 'Email không tồn tại']);
        }
        if (Hash::check($password, $user->password)) {
            Session::put('user_id', $user->id);
            Session::put('email', $user->email);
            Session::put('role', $user->role);
            if ($user->role == 'admin') return redirect()->route('users.index');
            return redirect()->intended('/');
        } else {
            return redirect()->back()->withInput($request->only('email'))->withErrors(['password' => 'Mật khẩu sai']);
        }
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

    public function logout(Request $request) {
        // Xóa session user_id và email
        Session::forget('user_id');
        Session::forget('email');
        return response()->json(['message' => 'Logout success'], 200);
    }


}
