<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Products;
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
        return view('clients.product', compact('products'));
    }

    public function showCart($userId = 1)
    {
        $cartProducts = DB::table('carts')
            ->where('user_id', $userId)
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->select('products.*', 'carts.quantity')
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
