<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::group(['controller' => ApiController::class], function () {
    Route::get('/', 'index')->name('api');
    Route::get('/{slug}_{id}', 'singleProduct')->name('api.product');
    Route::get('/limit', 'limitProduct')->name('api.limit');
    Route::get('/reset', 'Reset')->name('reset');
    Route::get('/desc', 'desc')->name('api.desc');
    Route::get('/asc', 'asc')->name('api.asc');
    Route::get('/{category}', 'categoryProduct')->name('api.category.product');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


