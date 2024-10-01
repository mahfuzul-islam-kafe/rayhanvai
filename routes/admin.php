<?php


use App\Http\Middleware\Role;
use Illuminate\Support\Facades\Route;

Route::middleware(['role:admin'])->prefix('admin')->group(function () {
    Route::get('/test', function () {
        dd('admin route tested');
    });
});
