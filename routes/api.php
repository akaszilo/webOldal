<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CreditCardController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('brand', BrandController::class);
Route::resource('category', CategoryController::class);
Route::resource('credit_cards', CreditCardController::class)->except(['show']);


