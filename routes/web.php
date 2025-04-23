<?php

use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/brand/{brand}', [BrandController::class, 'show'])->name('brands.show');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/brand/{brand}', [ProductController::class, 'filterByBrand'])->name('products.byBrand');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');



Auth::routes();

Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');

Route::post('/forgot-password', [ResetPasswordController::class, 'passwordEmail']);

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'passwordReset'])->name('password.reset');

Route::post('/reset-password', [ResetPasswordController::class, 'passwordUpdate'])->name('password.update');

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\VerificationController;

Route::middleware(['auth'])->group(function () {
    // Email verification notice page
    Route::get('/email/verify', function () {
        return view('auth.verify');
    })->name('verification.notice');

    // Email verification handler
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
        ->middleware(['signed'])
        ->name('verification.verify');

    // Resend verification email
    Route::post('/email/verification-notification', [VerificationController::class, 'resend'])
        ->name('verification.resend');
});

Route::get('/search/autocomplete', [ProductController::class, 'autocomplete'])->name('search.autocomplete');
Route::get('/search', [ProductController::class, 'search'])->name('search');
