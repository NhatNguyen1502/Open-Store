<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Orders extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['status'];
    function getAllOrders() {
        return Orders::all();
    }

     public function addOrder($data)
    {
        $order = new Orders();
        $order->user_id = $data->user_id;
        $order->phone_number = $data->phone_number;
        $order->address = $data->address;
        $order->payment_method = $data->payment_method;
        $order->total_price = $data->total_price;
        $order->status = 'new';

        $products = DB::table('carts')
            ->where('user_id', $order->user_id)
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->select('carts.*', 'products.price', 'products.discount')
            ->get();
        $order->save();
        $order_id = $order->getKey();
        foreach ($products as $product) {
            DB::table('orderitems')->insert([
                'order_id' => $order_id,
                'product_id' => $product->product_id,
                'quantity' => $product->quantity,
                'price' => $product->price * (100 - $product->discount) 
            ]);
        };
        DB::table('carts')->where('user_id', $order->user_id)->delete();
    }

    public function deleteOrder($id) {
        Orders::where('id', $id)->delete();
    }
}
