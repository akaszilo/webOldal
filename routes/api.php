<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/makeup-products', function () {
    $response = Http::get('https://makeup-api.herokuapp.com/api/v1/products.json');
    $products = json_decode($response->body());
    
    return response()->json($products);
});