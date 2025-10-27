<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EsewaController;
use App\Models\Payment;









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


    Route::controller(UserController::class)->group(function () {


        // sub category route
        Route::get('mobiles', 'mobiles')->name('mobiles');
        Route::get('fashions', 'fashions')->name('fashions');
        Route::get('electronics', 'electronics')->name('electronics');
        Route::get('furnitures', 'furnitures')->name('furnitures');
        Route::get('grocery', 'grocery')->name('grocery');


        Route::view('contact', 'contact')->name('contact');
        Route::post('contact', 'contact')->name('contact');
        Route::view('about', 'about')->name('about');
    });

    // cart
    Route::controller(CartController::class)->group(function () {

        Route::post('cart', 'AddToCart')->name('add.cart.item');
        Route::get('cart/list', 'cartList')->name('cart.list');

        Route::get('/cart/delete/{id}', 'removeCart')->name('cart.remove');
        Route::get('ordernow', 'orderNow')->name('ordernow');
        Route::post('placeorder', 'placeorder')->name('placeorder');

        Route::get('myorder', 'myOrder')->name('myorder');
        Route::get('search','search')->name('search');
    });






     

Route::get('/checkout', [EsewaController::class, 'checkout'])->name('checkout');
Route::post('/esewa/pay', [EsewaController::class, 'pay'])->name('esewa.pay');
Route::get('/esewa/success', [EsewaController::class, 'success'])->name('esewa.success');
Route::get('/esewa/failure', [EsewaController::class, 'failure'])->name('esewa.failure');

// optional admin listing of payments
Route::get('/payments', function () {
    $payments = \App\Models\Payment::orderBy('id', 'desc')->get();
    return view('payments', compact('payments'));
});














 
});

require __DIR__ . '/auth.php';
