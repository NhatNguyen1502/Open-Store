<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Users extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    public function getAllUsers()
    {
        $users = DB::select('SELECT * from users');
        return $users;
    }

    public function addUser($data)
    {
        Db::insert('INSERT INTO users (fullname,email,create_at) value (?,?,?)', $data);
    }

    public function updateUser($data, $id)
    {
        $data = array_merge($data, [$id]);
        return DB::update('UPDATE ' . $this->table . ' SET fullname =?,email =?, update_at= ? where id=?', $data);
    }
    
    public function deleteUser($id)
    {
        return  DB::delete("DELETE FROM $this->table WHERE id=? ", [$id]);
    }
}
