<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Products;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    private $products;
    public function __construct()
    {   
        $this->products = new Products();
    }

    public function index()
    {
        $products = $this->products->getAllProducts();
        return view('clients.home', compact('products'));
        return dd($products);
    }
}
