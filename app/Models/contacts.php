<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contacts extends Model{
    use HasFactory;
    protected $table = 'contacts';
    public $timestamps = false;

    public function getAllContacts(){
        return DB::table('contacts')->get();
    }

    
}