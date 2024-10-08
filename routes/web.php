<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PagesController;
use App\Models\Category;
use App\Models\Product;
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
    Route::get('/check-out', 'checkout')->name('checkout.cart');
    Route::delete('/cart/remove/{id}', 'removeFromCart')->name('remove.cart');
});
Route::group(['controller' => OrderController::class], function () {
    Route::post('/create/order', 'createOrder')->name('order.create');
    Route::get('/thank-you', 'thankyou')->name('thankyou');
     
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/create-products', function () {

    $products = ProductApi::getProducts();
    foreach ($products as $product) {
        Product::updateOrCreate(['api_id' => $product['id']], [
            'title' => $product['title'],
            'price' => $product['price'],
            'description' => $product['description'],
            'image' => $product['image'],
            'category' => Category::firstOrCreate(['category' => $product['category']], [])->id
        ]);
    }
});
Route::get('/test', function () {

    
});
