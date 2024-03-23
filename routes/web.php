<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BannerController;



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

Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');
Route::post('/admin/users', [UserController::class, 'store'])->name('users.create');
Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('users.update');

Route::get('/admin/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/admin/products', [ProductController::class, 'store'])->name('products.create');
Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('products.update');

Route::get('/admin/banners', [BannerController::class, 'index'])->name('banners.index');
Route::post('/admin/banners', [BannerController::class, 'store'])->name('banners.create');
Route::get('/admin/banners/{id}/edit', [BannerController::class, 'edit'])->name('banners.edit');
Route::put('/admin/banners/{id}', [BannerController::class, 'update'])->name('banners.update');
Route::delete('/admin/banners/{id}', [BannerController::class, 'destroy'])->name('banners.delete');





