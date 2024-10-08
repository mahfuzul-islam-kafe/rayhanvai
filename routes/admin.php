<?php


use App\Http\Controllers\Admin\PagesController;
use App\Http\Middleware\Role;
use Illuminate\Support\Facades\Route;

Route::middleware(['role:admin'])->prefix('admin')->group(function () {
    Route::get('/test', function () {
        dd('You have reached the admin Dashboard');
    });
    Route::group(['controller' => PagesController::class], function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/products', 'products')->name('products');
    });
});
