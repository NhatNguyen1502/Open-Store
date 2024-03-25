<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Products;
use App\Models\Category;
use Illuminate\Support\Str;


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
        $products = Products::with('category')->get();
        $UI = 'products';
        $categories = DB::table('category')->get();
        return view('admin.product', compact('products', 'UI', 'categories'));
    }

    public function showProducts()
    {
        $products = $this->products->getAllProducts();
        $categories = Category:: get();
        return view('clients.product', compact('products','categories'));
    }

    public function showDetail($product_id)
    {
        $product = $this->products->getDetail($product_id);
        $categories = Category:: get();
        return view('clients.detail', compact('product','categories'));
        
    }

    public function addToCart( Request $request, $product_id)
    {
        $user_id = session('user_id');
        $quantity = $request->quantity;
        DB::table('carts')->insert([
            'product_id' => $product_id,
            'user_id' => $user_id,
            'quantity' => $quantity,    
        ]);
        return redirect()->route('homepage')->with('success', 'Product is added to cart successfully.');
        
    }

    public function showCategory($category_id)
    {
        $products = $this->products->showCategory($category_id);        
        $categories = Category:: get();
        return view('clients.product', compact('products','categories'));
        // return dd($products, $categories);
        return dd($products, $categories);
    }

    public function showCart($user_id)
    {
        $cartProducts = DB::table('carts')
            ->where('user_id', $user_id)
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->select('products.*', DB::raw('SUM(carts.quantity) as total_quantity'))
            ->groupBy('products.id')
            ->get();
        return view('clients.cart', compact('cartProducts'));
    }
    
    


    public function showCheckout($userId = 1)
    {
        $cartProducts = DB::table('carts')
            ->where('user_id', $userId)
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->select('products.*', 'carts.quantity')
            ->get();
        return view('clients.checkout', compact('cartProducts'));
    }

    public function store(Request $request)
    {
        $imageName = Str::uuid() . '.' . $request->image->extension();
        $request->file('image')->storeAs('images', $imageName, 'public');
        $data = $request;
        $data->image = $imageName;
        $this->products->addProduct($data);
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(string $id)
    {
        $product = $this->products::findOrFail($id);
        $categories = DB::table('category')->get();
        return view('admin.productEdit', compact('product', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->only([
            'name', 'description', 'price', 'discount', 'stock', 'category_id', 'status'
        ]);
        if ($request->hasFile('image')) {
            $imageName = Str::uuid() . '.' . $request->image->extension();
            $request->file('image')->storeAs('images', $imageName, 'public');
            $data['image'] = $imageName;
        }

        $product = $this->products::findOrFail($id);
        $product->update($data);
        return redirect()->route('products.index')->with('success', 'product updated successfully.');
    }

    public function destroy(string $id)
    {
        $this->products->deleteProduct($id);
        return redirect()->route('products.index')->with('success', 'product deleted successfully.');
    }
}
