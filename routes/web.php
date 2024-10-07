<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PagesController;
use App\Services\Api\Human;
use App\Services\Api\ProductApi;
use App\Services\Cart;
use Illuminate\Support\Facades\Route;

Route::group(['controller' => ApiController::class], function () {
    Route::get('/', 'index')->name('api');
    Route::get('/{slug}_{id}', 'singleProduct')->name('api.product');
    Route::get('/limit', 'limitProduct')->name('api.limit');
    Route::get('/reset', 'Reset')->name('reset');
    Route::get('/desc', 'desc')->name('api.desc');
    Route::get('/asc', 'asc')->name('api.asc');
    Route::get('/category/{category}', 'categoryProduct')->name('api.category.product');
});
Route::group(['controller' => CartController::class], function () {
    Route::post('/add-to-cart', 'addToCart')->name('add.cart');
    Route::get('/product-cart', 'view')->name('view.cart');
    Route::delete('/cart/remove/{id}', 'removeFromCart')->name('remove.cart');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/test', function () {

    $cart = new Cart();
    // session()->get('cart');
    // session()->forget('cart');
    // $cart->add(1);
    // Cart::add(2);
    // Cart::add(1);
    // Cart::add(1);
    dd($cart->getCart());
});
