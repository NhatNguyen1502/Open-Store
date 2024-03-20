<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

    public function updateUser($data, $id)
    {
        $data = array_merge($data, [$id]);
        return DB::update('UPDATE ' . $this->table . ' SET name =?,email =?, role=?, phone_number=?, status=? where id=?', $data);
    }

    public function deleteUser($id)
    {
        return  DB::delete("DELETE FROM $this->table WHERE id=? ", [$id]);
    }
}
