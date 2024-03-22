<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class Products extends Model
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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getAllProducts()
    {
        $products = DB::select('SELECT * from products');
        return $products;
    }

    public function addProduct($data)
    {
        $product = new Products();
        $product->name = $data->name;
        $product->price = $data->price;
        $product->category_id = $data->category_id;
        $product->discount = $data->discount;
        $product->stock = $data->stock;
        $product->image = $data->image;
        $product->description = $data->description;
        $product->status = $data->status;
        $product->save();
    }

}
