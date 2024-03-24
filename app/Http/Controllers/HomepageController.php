<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Products;
use App\Models\Contacts;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomepageController extends Controller
{
    private $products;
    private $contacts;
    public function __construct()
    {   
        $this->products = new Products();
    }

    public function contact(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = session('user_id');
        $data['user_email'] = session('email');
        $data['is_contact'] = '0';
        Contacts::create($data);
        return redirect()->route('homepage')->with('success', 'Contact is sent successfully.');
    }

    public function index()
    {
        $products = Products::where('status', 'active')->where('stock', '>', 0)->get();
        $saleProducts = Products::where('status', 'active')->where('stock', '>', 0)->where('discount', '>', 0) ->get();
        return view('clients.home', compact('products', 'saleProducts'));
    }

    public function showRecommendations() {
        $categories = Category::all();
        return view('clients.recommendations', compact('categories'));
    }

    public function handleRecommendations(Request $request) {
        $data = $request->category;
        $products = Products::where('status', 'active')->where('stock', '>', 0)->get();
        $recommendProducts = Products::whereIn('category_id', $data)->where('status', 'active')->where('stock', '>', 0)->get();   
        $saleProducts = Products::where('status', 'active')->where('stock', '>', 0)->where('discount', '>', 0) ->get();
        return view('clients.home', compact('recommendProducts', 'products', 'saleProducts',));
    }
}
