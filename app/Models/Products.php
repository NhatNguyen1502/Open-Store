<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'price',
        'category_id',
        'discount',
        'stock',
        'image',
        'description',
        'status',
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

    public function getDetail($product_id)
    {
        $product = DB::table('products')->where('id', $product_id)->first();
        return $product;
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

    public function deleteProduct($id)
    {
        DB::table('products')->where('id', $id)->delete();
    }

    public function showCategory($category_id)
    {
        $products = DB::table('products')->where('category_id', $category_id)->get();
        return $products;
    }
    

}
