<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomepageController;


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

Route::get('/products', [ProductController::class, 'showProducts'])->name('showProducts');
Route::get('/cart', [ProductController::class, 'showCart'])->name('cart');




Route::get('/about', function () {
    return view('clients.aboutUs');
})->name('aboutUs');

Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');
Route::post('/admin/users', [UserController::class, 'store'])->name('users.create');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');


Route::get('/admin/products', [ProductController::class, 'index'])->name('products.index');


Route::get('/loginForm', [LoginController::class, 'showLogin']) ->name('user.showLogin');
Route::get('/login', [LoginController::class, 'login']) ->name('user.login');
Route::post('/', [LoginController::class, 'signup']) ->name('user.signup');


Route::get('/form', function () {
    return view('clients.loginForm');
});
