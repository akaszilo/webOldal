<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CreditCardController;
use App\Http\Controllers\AddressController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('brand', BrandController::class);
Route::resource('cart', CartController::class);
Route::resource('category', CategoryController::class);
Route::resource('order', OrderController::class);
Route::resource('product', ProductController::class);
Route::resource('credit_cards', CreditCardController::class)->except(['show']);
Route::resource('addresses', AddressController::class);


