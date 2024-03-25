<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomepageController::class, 'index'])->name('homepage');
Route::post('/', [HomepageController::class, 'contact'])->name('contact');
Route::get('/user/product/{product_id}/{user_id}', [HomepageController::class, 'addWishlist'])->name('addWishlist');
Route::get('/user/product/{product_id}/{user_id}/delete', [HomepageController::class, 'deleteWishlist'])->name('deleteWishlist');

Route::get('/products', [ProductController::class, 'showProducts'])->name('showProducts');
Route::get('/products/{category_id}', [ProductController::class, 'showCategory'])->name('showCategory');
Route::get('/detail/{product_id}', [ProductController::class, 'showDetail'])->name('showDetail');
Route::post('/addToCart/{product_id}', [ProductController::class, 'addToCart'])->name('addToCart');
Route::get('/cart/{user_id}', [ProductController::class, 'showCart'])->name('cart');
Route::get('/checkout', [ProductController::class, 'showCheckout'])->name('checkout');
Route::get('/about', function () {
    return view('clients.aboutUs');
})->name('aboutUs');

Route::get('/recommendations', [HomepageController::class, 'showRecommendations'])->name('recommendations');;

Route::post('/recommendations', [HomepageController::class, 'handleRecommendations']);

Route::post('/getCategories', [CategoriesController::class, 'getCategories'])->name('getCategories');

Route::get('admin/users', [UserController::class, 'index'])->name('users.index');
Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::post('/users', [UserController::class, 'store'])->name('users.create');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.delete');
});

Route::get('/admin/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/admin/products', [ProductController::class, 'store'])->name('products.create');
Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('products.delete');

Route::get('/admin/banners', [BannerController::class, 'index'])->name('banners.index');
Route::post('/admin/banners', [BannerController::class, 'store'])->name('banners.create');
Route::get('/admin/banners/{id}/edit', [BannerController::class, 'edit'])->name('banners.edit');
Route::put('/admin/banners/{id}', [BannerController::class, 'update'])->name('banners.update');
Route::delete('/admin/banners/{id}', [BannerController::class, 'destroy'])->name('banners.delete');

Route::prefix('/admin/categories')->group(function () {
    Route::get('/', [CategoriesController::class, 'index'])->name('categories.index');
    Route::post('/', [CategoriesController::class, 'store'])->name('categories.create');
    Route::get('/{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
    Route::put('/{id}', [CategoriesController::class, 'update'])->name('categories.update');
    Route::delete('/{id}', [CategoriesController::class, 'delete'])->name('categories.delete');
});
Route::get('/admin/orders', [OrderController::class, 'index'])->name('orders.index');
Route::patch('/admin/orders/{id}', [OrderController::class, 'update'])->name('orders.update');
Route::delete('/admin/orders/{id}', [OrderController::class, 'destroy'])->name('orders.delete');


Route::get('/loginForm', [LoginController::class, 'showLogin'])->name('user.showLogin');
Route::get('/signupForm', [LoginController::class, 'showSignup'])->name('user.showSignup');
Route::post('/signupForm', [LoginController::class, 'signup'])->name('user.signup');


// Route::get('/form', function () {
//     return view('clients.loginForm');
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/form', function () {
    return view('clients.loginForm');
});


Route::prefix('admin/contact')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('contact.index');
    Route::patch('/{id}', [ContactController::class, 'update'])->name('contact.update');
});
// Route::group(['middleware' => 'guest'], function () {
//     Route::get('/login-signup', [LoginController::class, 'showLogin']) ->name('login');
//     Route::post('/login-signup', [LoginController::class, 'login']) ->name('signup');
// });
