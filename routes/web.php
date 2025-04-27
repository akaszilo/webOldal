<?php

use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CreditCardController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\OrderController;

/* Authentication routes */
Auth::routes();

Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'passwordReset'])->name('password.reset');

Route::post('/forgot-password', [ResetPasswordController::class, 'passwordEmail']);
Route::post('/reset-password', [ResetPasswordController::class, 'passwordUpdate'])->name('password.update');

/* Email verification */
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

/* Public category and product routes */
Route::get('/eyes', [CategoryController::class, 'showeyes'])->name('eyes');
Route::get('/lips', [CategoryController::class, 'showlips'])->name('lips');
Route::get('/face', [CategoryController::class, 'showface'])->name('face');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/search/autocomplete', [ProductController::class, 'autocomplete'])->name('search.autocomplete');
Route::get('/search', [ProductController::class, 'search'])->name('search');

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/brand/{brand}', [BrandController::class, 'show'])->name('brands.show');
Route::get('/product/{product}', [ProductController::class, 'showRecommended'])->name('product.show');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/brand/{brand}', [ProductController::class, 'filterByBrand'])->name('products.byBrand');

/* Profile page */
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});

/* Kosár (Cart) kezelése */
Route::middleware(['auth'])->group(function () {
    Route::get('/cart', function () {
        return redirect()->route('profile');
    })->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::post('/cart/place-order', [CartController::class, 'placeOrder'])->name('cart.placeOrder');

    // Rendelés leadás
    Route::post('/cart/process_order', [CartController::class, 'processOrder'])->name('cart.process_order');

    // CVV megerősítés
    Route::post('/cart/confirm_order', [CartController::class, 'confirmOrder'])->name('cart.confirm_order');

    // Sikeres rendelés oldal
    Route::get('/order/success', [CartController::class, 'orderSuccess'])->name('order.success');
});

/* Címek (Address) kezelése */
Route::middleware(['auth'])->group(function () {
    Route::resource('addresses', AddressController::class);
});

/* Bankkártyák kezelése */
Route::middleware(['auth'])->group(function () {
    Route::resource('credit_cards', CreditCardController::class)->except(['show']);
});

/* Rendelés (Order) kezelése */
Route::middleware(['auth'])->group(function () {
    Route::get('/order/checkout', [OrderController::class, 'checkout'])->name('order.checkout');
    Route::post('/order/process_order', [OrderController::class, 'process_order'])->name('order.process_order');
    Route::post('/order/confirm_order', [OrderController::class, 'confirm_order'])->name('order.confirm_order');
    Route::get('/order/success', [OrderController::class, 'orderSuccess'])->name('order.success');
});
