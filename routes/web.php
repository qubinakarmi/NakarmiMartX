<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;









// Home page accessible without login
Route::get('/', [UserController::class, 'home'])->name('home');

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('verified')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('showProduct', [UserController::class, 'addProduct']);
    Route::post('add', [UserController::class, 'newProduct'])->name('add.product');


    // sub category route
    Route::controller(UserController::class)->group(function () {

        Route::get('mobiles', 'mobiles')->name('mobiles');
        Route::get('fashions', 'fashions')->name('fashions');
        Route::get('electronics', 'electronics')->name('electronics');
        Route::get('furnitures', 'furnitures')->name('furnitures');
        Route::get('grocery', 'grocery')->name('grocery');


        Route::view('contact', 'contact')->name('contact');
        Route::view('about', 'about')->name('about');
        Route::post('cart','AddToCart')->name('add.cart.item');
        Route::get('cart/list','cartList')->name('cart.list');
        


    });
    Route::post('contact', [UserController::class, 'contact'])->name('contact');
    Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
});

require __DIR__ . '/auth.php';
