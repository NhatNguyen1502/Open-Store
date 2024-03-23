<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Products;

class ProductController extends Controller
{
    private $products;
    public function __construct()
    {   
        $this->products = new Products();
    }

    public function index()
    {
        $products = $this->products->getAllProducts();
        return view('admin.product', compact('products'));
    }

    public function showProducts()
    {
        $products = $this->products->getAllProducts();
        return view('clients.product', compact('products'));
    }
    
    public function showCart()
    {
        // $products = $this->products->getAllProducts();
        return view('clients.cart');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
