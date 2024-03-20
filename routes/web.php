<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;


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

Route::get('/', function () {
    return view('clients.home');
});

Route::get('/admin/users', [UserController::class, 'index'])->name('user.list');
Route::get('/admin/products', [ProductController::class, 'index'])->name('product.list');
Route::get('/admin/user', [UserController::class, 'index'])->name('user.list');


Route::get('/login', [LoginController::class, 'login']) ->name('user.login');
Route::post('/', [LoginController::class, 'signup']) ->name('user.signup');


Route::get('/form', function () {
    return view('clients.loginForm');
});
