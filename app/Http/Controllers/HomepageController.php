<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomepageController extends Controller
{

    public function index()
    {
        $products = Products::where('status', 'active')->where('stock', '>', 0)->get();
        return view('clients.home', compact('products'));
    }

    public function showRecommendations() {
        $categories = Category::all();
        return view('clients.recommendations', compact('categories'));
    }

    public function handleRecommendations(Request $request) {
        $data = $request->category;
        $products = Products::where('status', 'active')->where('stock', '>', 0)->get();
        $recommendProducts = Products::whereIn('category_id', $data)->where('status', 'active')->where('stock', '>', 0)->get();   
        return view('clients.home', compact('recommendProducts', 'products'));
    }
}
