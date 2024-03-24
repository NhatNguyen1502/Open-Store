<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getAllCategory()
    {
        return DB::table('category')->get();
    }

    public function addCategory($data)
    {
        $category = new Category();
        $category->name = $data['name'];
        $category->save();
    }

    public function deleteCategory($id)
    {
        DB::table('category')->where('id', $id)->delete();
    }

    public function updateCategory($data, $id)
    {
        DB::table('category')
            ->where('id', $id)
            ->update(['name' => $data['categoryName']]);
    }

    public function getCategory($id)
    {
        return DB::table('category')->where('id', $id)->first();
    }
}
