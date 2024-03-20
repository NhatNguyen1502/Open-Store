<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UserController extends Controller
{
    private $users;
    public function __construct()
    {   
        $this->users = new Users();
    }
    public function index()
    {
        $users = $this->users->getAllUsers();
        return view('admin.user' , ['users' =>$users]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|unique:users',
            'name' => 'required',
            'password' => 'required',
            'role' => 'required',
            'status' => 'required',
        ]);

        $this->users->addUser($request);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }
    public function edit($id)
    {
        $user = $this->users::findOrFail($id);
        return view('admin.userEdit', compact('user'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'name' => 'required',
            'role' => 'required',
            'status' => 'required',
        ]);
        $data = $request->only([
            'name',
            'email',
            'role',
            'status',
            'phone_number',
        ]);
        $user = $this->users::findOrFail($id);
        $user->update($data);
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }     

    public function destroy(string $id)
    {
        
    }
}
