<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Products;
use App\Models\Contacts;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    private $products;
    private $contacts;
    public function __construct()
    {   
        $this->products = new Products();
    }

    public function index()
    {
        $products = $this->products->getAllProducts();
        return view('clients.home', compact('products'));
        // return dd($products);
    }

    public function contact(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = session('user_id');
        $data['user_email'] = session('email');
        $data['is_contact'] = '0';
        Contacts::create($data);
        return redirect()->route('homepage')->with('success', 'Contact is sent successfully.');
        // return dd($data);

    }
}
