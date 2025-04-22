<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/brand/{brand}', [BrandController::class, 'show'])->name('brands.show');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
// web.php
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/brand/{brand}', [ProductController::class, 'filterByBrand'])->name('products.byBrand');

Auth::routes();

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::ResetLinkSent
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');