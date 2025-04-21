<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('brand', BrandController::class);
Route::resource('cart', CartController::class);
Route::resource('category', CategoryController::class);
Route::resource('order', OrderController::class);
Route::resource('product', ProductController::class);
