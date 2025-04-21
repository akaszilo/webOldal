<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('brand', BrandController::class);
Route::resource('cart', CartController::class);
Route::resource('category', CategoryController::class);
Route::resource('home', HomeController::class);
Route::resource('order', OrderController::class);
Route::resource('product', ProductController::class);
Route::get('/bestsellers', [ProductController::class, 'bestsellers']);
