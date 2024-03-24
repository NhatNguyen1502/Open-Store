<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['status'];
    function getAllOrders() {
        return Orders::all();
    }

    public function deleteOrder($id) {
        Orders::where('id', $id)->delete();
    }
}
