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

Route::middleware(['guest'])->group(function () {
    Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'index'])->name('register');
    Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'register']);
    Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
    Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login']);
});
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [\App\Http\Controllers\LogoutController::class, 'perform'])->name('logout');
});

Route::prefix('products')->group(function () {
    Route::get('/', [\App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
    Route::get('{product}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product.show')->middleware('regex.id');

    Route::middleware(['auth', 'regex.id'])->group(function () {
    Route::get('create', [\App\Http\Controllers\ProductController::class, 'createForm'])->name('product.create');
    Route::post('create', [\App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
    Route::get('{product}/edit', [\App\Http\Controllers\ProductController::class, 'editForm'])->name('product.edit');
    Route::post('{product}/update', [\App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
    Route::post('{product}/remove', [\App\Http\Controllers\ProductController::class, 'remove'])->name('product.remove');
    });
});

Route::prefix('profile')->group(function () {
    Route::get('{user}', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show')->middleware('regex.id');

    Route::middleware(['auth', 'regex.id'])->group(function () {
        Route::get('{user}/edit', [\App\Http\Controllers\ProfileController::class, 'editForm'])->name('profile.edit');
        Route::post('{user}/change_phone', [\App\Http\Controllers\ProfileController::class, 'changePhone'])->name('profile.change_phone');
        Route::post('{user}/change_password', [\App\Http\Controllers\ProfileController::class, 'changePassword'])->name('profile.change_password');
    });
});

Route::prefix('categories')->middleware(['auth', 'regex.id'])->group(function () {
    Route::get('/', [\App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
    Route::get('{category}', [\App\Http\Controllers\CategoryController::class, 'productsByCategory'])->name('category.show');
});

//Route::get('/test/{year}/{month}', function ($year, $month) {
//    return "Year: $year Month: $month";
//})->middleware('regex.id');
