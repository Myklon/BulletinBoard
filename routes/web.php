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

// Home page with all products
Route::redirect('', 'products');
Route::get('products', [\App\Http\Controllers\ProductController::class, 'index'])->name('product.index');

// Auth pages
Route::middleware(['guest'])->group(function () {
    // Registration
    Route::get('register', [\App\Http\Controllers\RegisterController::class, 'index'])->name('register');
    Route::post('register', [\App\Http\Controllers\RegisterController::class, 'register']);
    // Login
    Route::get('login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
    Route::post('login', [\App\Http\Controllers\LoginController::class, 'login']);
});
Route::middleware(['auth'])->group(function () {
    // Logout
    Route::get('logout', [\App\Http\Controllers\LogoutController::class, 'perform'])->name('logout');
});

// Product pages
Route::prefix('products')->controller(\App\Http\Controllers\ProductController::class)->group(function () {
    Route::middleware(['auth', 'regex.id'])->group(function () {
        // Create product
        Route::get('create', 'createProductForm')->name('product.create');
        Route::post('create', 'store')->name('product.store');
        // Edit product
        Route::get('{product}/edit', 'editProductForm')->name('product.edit');
        Route::post('{product}/update', 'update')->name('product.update');
        // Remove product
        Route::post('{product}/remove', 'removeProduct')->name('product.remove');
    });
    // Show Product page
    Route::get('{product}','showProduct')->name('product.show')->middleware('regex.id');
});

// Profile pages
Route::prefix('profile')->middleware('regex.id')->controller(\App\Http\Controllers\ProfileController::class)->group(function () {
    // Show profile page
    Route::get('{user}', 'showProfile')->name('profile.show');

    Route::middleware(['auth'])->group(function () {
        // Edit profile
        Route::get('{user}/edit', 'editProfileForm')->name('profile.edit');
        // Update user credentials
        Route::post('{user}/change_phone','changePhone')->name('profile.change_phone');
        Route::post('{user}/change_password','changePassword')->name('profile.change_password');
    });
});

// Category pages
Route::prefix('categories')->middleware(['regex.id'])->controller(\App\Http\Controllers\CategoryController::class)->group(function () {
    // All categories page
    Route::get('', 'index')->name('category.index');
    // Show all products by category
    Route::get('{category}','productsByCategory')->name('category.show');
});


//Route::get('/test/{year}/{month}', function ($year, $month) {
//    return "Year: $year Month: $month";
//})->middleware('regex.id');
