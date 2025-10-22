<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;







Route::get('/', [UserController::class, 'home'])->name('home');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::get('showProduct', [UserController::class, 'addProduct']);
    Route::post('add', [UserController::class, 'newProduct'])->name('add.product');
    Route::view('mobile', 'mobile')->name('mobile');


    Route::view('contact', 'contact')->name('contact');
    Route::view('about', 'about')->name('about');



    Route::view('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/clear-cart', [CartController::class, 'clearCart'])->name('cart.clear');


    Route::get('/products/{category}', [ProductController::class, 'showByCategory'])->name('products.category');
});

require __DIR__ . '/auth.php';
