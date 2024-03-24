<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;

class OrderController extends Controller
{
    private $orders;
    
    public function __construct()
    {   
        $this->orders = new Orders();
    } 

    public function index()
    {
        $orders = $this->orders->getAllOrders();
        $UI = 'orders';
        return view('admin.order', compact('orders', 'UI'));
    }

    public function update(Request $request, string $id)
    {
        $order = $this->orders::findOrFail($id);
        $data = $request->all();
        $order->update($data);
        return redirect()->route('orders.index');
    }
}