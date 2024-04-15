<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Products;
use App\Models\Contacts;
use App\Models\Category;
use App\Models\Banners;
use App\Models\Wishlists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomepageController extends Controller
{

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
        $saleProducts = Products::where('status', 'active')->where('stock', '>', 0)->where('discount', '>', 0)->get();
        $banners = new Banners();
        $banners = $banners->getAllBanners();
        $wishlists = null;
        if (session('user_id')) {
            $wishlistModel = new Wishlists();
            $wishlists = $wishlistModel->getWishlist(session('user_id'));
        }
        return view('clients.home', compact('products', 'saleProducts', 'banners', 'wishlists'));
    }

    public function showRecommendations()
    {
        $categories = Category::all();
        return view('clients.recommendations', compact('categories'));
    }

    public function handleRecommendations(Request $request)
    {
        $data = $request->category;
        if ($data) {
            $recommendProducts = Products::whereIn('category_id', $data)->where('status', 'active')->where('stock', '>', 0)->get();
        } else {
            $recommendProducts = null;
        }
        $banners = new Banners();
        $banners = $banners->getAllBanners();
        $products = Products::where('status', 'active')->where('stock', '>', 0)->get();
        $saleProducts = Products::where('status', 'active')->where('stock', '>', 0)->where('discount', '>', 0)->get();
        $wishlists = null;
        if (session('user_id')) {
            $wishlistModel = new Wishlists();
            $wishlists = $wishlistModel->getWishlist(session('user_id'));
        }
        return view('clients.home', compact('recommendProducts', 'products', 'saleProducts', 'banners', 'wishlists'));
    }

    public function addWishlist($product_id, $user_id)
    {
        $wishlist = new Wishlists();
        $wishlist->product_id = $product_id;
        $wishlist->user_id = $user_id;
        $wishlist->save();
        return redirect()->route('homepage');
    }

    public function deleteWishlist($product_id, $user_id)
    {
        Wishlists::where('product_id', $product_id)->where('user_id', $user_id)->delete();
        return redirect()->route('homepage');
    }
}
