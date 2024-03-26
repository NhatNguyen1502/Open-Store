<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Wishlists extends Model
{
    use HasFactory;
    public $timestamps = false;
    // protected $table = 'wishlists';

    public function getWishlist($user_id)
    {
        return $this->select('product_id', 'user_id')
            ->where('user_id', $user_id)
            ->get();
    }
}
