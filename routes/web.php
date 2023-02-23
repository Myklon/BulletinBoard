<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/products');

Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index'])->name('product.index');

Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'index'])->name('register.form');
Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'register'])->name('register');

Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login.form');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');

Route::get('/profile/{user}', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show')->where('user', '^\d+$');
Route::get('/profile/{user}/edit', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit')->where('user', '^\d+$');
//Route::post('/profile/{user}/update', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update')->where('user', '^\d+$');
Route::post('/profile/{user}/change_phone', [\App\Http\Controllers\ProfileController::class, 'changePhone'])->name('profile.change_phone')->where('user', '^\d+$');
Route::post('/profile/{user}/change_password', [\App\Http\Controllers\ProfileController::class, 'changePassword'])->name('profile.change_password')->where('user', '^\d+$');

Route::get('/products/create', [\App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
Route::post('/products/create', [\App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
Route::get('/products/{product}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product.show')->where('product', '^\d+$');
Route::get('/products/{product}/edit', [\App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit')->where('product', '^\d+$');
Route::post('/products/{product}/update', [\App\Http\Controllers\ProductController::class, 'update'])->name('product.update')->where('product', '^\d+$');
Route::post('/products/{product}/remove', [\App\Http\Controllers\ProductController::class, 'remove'])->name('product.remove')->where('product', '^\d+$');

Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
Route::get('/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'productsByCategory'])->name('category.show')->where('category', '^\d+$');

//Route::get('/public/{path}');

//Auth::routes();
