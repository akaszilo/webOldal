<?php

use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;

/* For authentication */
Auth::routes();

Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'passwordReset'])->name('password.reset');

Route::post('/forgot-password', [ResetPasswordController::class, 'passwordEmail']);
Route::post('/reset-password', [ResetPasswordController::class, 'passwordUpdate'])->name('password.update');

Route::middleware(['auth'])->group(function () {
    Route::get('/email/verify', function () {
        return view('auth.verify');
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
        ->middleware(['signed'])
        ->name('verification.verify');

    Route::post('/email/verification-notification', [VerificationController::class, 'resend'])
        ->name('verification.resend');
});

/* For handling category filter */
Route::get('/eyes', [CategoryController::class, 'showeyes'])->name('eyes');
Route::get('/lips', [CategoryController::class, 'showlips'])->name('lips');
Route::get('/face', [CategoryController::class, 'showface'])->name('face');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

/* For searching */
Route::get('/search/autocomplete', [ProductController::class, 'autocomplete'])->name('search.autocomplete');
Route::get('/search', [ProductController::class, 'search'])->name('search');

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/brand/{brand}', [BrandController::class, 'show'])->name('brands.show');
Route::get('/product/{product}', [ProductController::class, 'showRecommended'])->name('product.show');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/brand/{brand}', [ProductController::class, 'filterByBrand'])->name('products.byBrand');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

