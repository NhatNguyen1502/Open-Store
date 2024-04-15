<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class Users extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'email',
        'role',
        'status',
        'phone_number',
    ];

    public function getAllUsers()
    {
        $users = DB::select('SELECT * from users');
        return $users;
    }

    public function addUser($data)
    {
        $user = new Users();
        $user->email = $data->email;
        $user->name = $data->name;
        $user->role = $data->role;
        $user->password = bcrypt($data->password);
        $user->phone_number = $data->phone_number;
        $user->status = $data->status;
        $user->save();
    }

    public function deleteUser($id){
        DB::table('users')->where('id', $id)->delete();
    }
}
