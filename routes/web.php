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

Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'index'])->name('register');
Route::post('/register', ["триггер регистрации"]);

Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('/login', ["триггер логина"]);

Route::get('/profile/{user}', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show')->where('user', '^\d$');
Route::get('/profile/{user}/edit', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update')->where('user', '^\d$');
Route::post('/profile/{user}/edit', ["редактирование профиля"]);

Route::get('/products/create', [\App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
Route::post('/products/create', [\App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
Route::get('/products/{product}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product.show')->where('product', '^\d$');
Route::get('/products/{product}/update', [\App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
Route::post('/products/{product}/update', [\App\Http\Controllers\ProductController::class, 'UPDATE'])->name('product.UPDATE')->where('product', '^\d$');
Route::post('/products/{product}/remove', [\App\Http\Controllers\ProductController::class, 'remove'])->name('product.remove')->where('product', '^\d$');

Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
Route::get('/category/{category}', [\App\Http\Controllers\CategoryController::class, 'show'])->name('category.show')->where('category', '^\w{2,40}$');

Route::get('/public/{content}', ["страница с картинкой"]);
Route::post('/file/upload', ["страница с продуктом"]);

//Auth::routes();
