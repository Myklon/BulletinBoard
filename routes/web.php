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


Route::middleware(['guest'])->group(function () {
    Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'index'])->name('register');
    Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'register']);
    Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
    Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login']);
});

Route::prefix('products')->middleware(['auth'])->group(function () {
    Route::get('/create', [\App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
    Route::post('/create', [\App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
    Route::get('/{product}/edit', [\App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit')->where('product', '^\d+$');
    Route::post('/{product}/update', [\App\Http\Controllers\ProductController::class, 'update'])->name('product.update')->where('product', '^\d+$');
    Route::post('/{product}/remove', [\App\Http\Controllers\ProductController::class, 'remove'])->name('product.remove')->where('product', '^\d+$');
});

Route::get('/products/{product}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product.show')->where('product', '^\d+$');

Route::get('/logout', [\App\Http\Controllers\LogoutController::class, 'perform']
)->name('logout')->middleware('auth');;

Route::get(
    '/profile/{user}',
    [\App\Http\Controllers\ProfileController::class, 'show']
)->name('profile.show')->where('user', '^\d+$');
Route::get(
    '/profile/{user}/edit',
    [\App\Http\Controllers\ProfileController::class, 'edit']
)->name('profile.edit')->where('user', '^\d+$')->middleware('auth');;
//Route::post('/profile/{user}/update', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update')->where('user', '^\d+$');
Route::post('/profile/{user}/change_phone', [\App\Http\Controllers\ProfileController::class, 'changePhone'])->name('profile.change_phone')->where('user', '^\d+$')->middleware('auth');
Route::post(
    '/profile/{user}/change_password',
    [\App\Http\Controllers\ProfileController::class, 'changePassword']
)->name('profile.change_password')->where('user', '^\d+$')->middleware('auth');



Route::get(
    '/categories',
    [\App\Http\Controllers\CategoryController::class, 'index']
)->name('category.index');
Route::get(
    '/categories/{category}',
    [\App\Http\Controllers\CategoryController::class, 'productsByCategory']
)->name('category.show')->where('category', '^\d+$');

Route::get(
    'test',
    function () {
        return __('product.create.success.success');
    }
);

//Route::get('/public/{path}');

//Auth::routes();
