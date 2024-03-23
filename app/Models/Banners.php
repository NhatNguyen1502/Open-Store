<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'image',
        'status'
    ];

    function getAllBanners() {
        return Banners::all();
    }

    function addBanner($data) {
        Banners::create($data);
    }
}
