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
use Illuminate\Http\Request;



/* Authentication routes */
Auth::routes();

Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'passwordReset'])->name('password.reset');

Route::get('/email/verify', function () {
Route::post('/forgot-password', [ResetPasswordController::class, 'passwordEmail']);
Route::post('/reset-password', [ResetPasswordController::class, 'passwordUpdate'])->name('password.update');
    return view('auth.verify');
})->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
    ->middleware(['signed'])
    ->name('verification.verify');
Route::post('/email/verification-notification', [VerificationController::class, 'resend'])
    ->name('verification.resend');



/* Category routes */
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/eyes', [CategoryController::class, 'showeyes'])->name('eyes');
Route::get('/lips', [CategoryController::class, 'showlips'])->name('lips');
Route::get('/face', [CategoryController::class, 'showface'])->name('face');
Route::get('/all', [CategoryController::class, 'index'])->name('all');



/* Search routes */
Route::get('/search/autocomplete', [ProductController::class, 'autocomplete'])->name('search.autocomplete');
Route::get('/search', [ProductController::class, 'search'])->name('search');



/* Product page routes */
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/brand/{brand}', [BrandController::class, 'show'])->name('brands.show');
Route::get('/product/{product}', [ProductController::class, 'showRecommended'])->name('product.show');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/brand/{brand}', [ProductController::class, 'filterByBrand'])->name('products.byBrand');



/* Profile routes */
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');



/* Cart routes */
Route::get('/cart', function () {
    return redirect()->route('profile');
})->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/destroy/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::post('/cart/place-order', [CartController::class, 'placeOrder'])->name('cart.placeOrder');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/confirm-order', [CartController::class, 'confirmOrder'])->name('cart.confirmOrder');
// Route::delete('/cart/destroy/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

/* Coupon */
Route::post('/apply-coupon', function (Illuminate\Http\Request $request) {
    $coupon = trim($request->input('coupon'));
    $filePath = storage_path('app/private/kuponkod.txt');
    $validCoupons = file($filePath, FILE_IGNORE_NEW_LINES);

    if (in_array($coupon, $validCoupons)) {
        session(['discount' => 0.8]); 
        return redirect()->route('profile')->with('success', 'Coupon accepted! 20% discount.')->withFragment('tab-cart');


    }

    return back()->with('error', 'Coupon is not avaliable or doesn\'t exist.');
})->name('apply.coupon');
    



/*CVV authentication */
Route::post('/cart/confirm_order', [CartController::class, 'confirmOrder'])->name('cart.confirm_order');



/* Address */
Route::resource('addresses', AddressController::class);



/* Manage credit cards */
Route::resource('credit_cards', CreditCardController::class)->except(['show']);



/* Order route */
Route::post('/cart/process_order', [CartController::class, 'processOrder'])->name('cart.process_order');



/* Manage order */
Route::post('/order/checkout', [OrderController::class, 'checkout'])->name('order.checkout');
Route::post('/order/process_order', [OrderController::class, 'process_order'])->name('order.process_order');
Route::get('/order/success', [OrderController::class, 'orderSuccess'])->name('order.success');
Route::get('/order/{order}/details', [ProfileController::class, 'showOrderDetails'])->name('order.details');
Route::get('/order/select_payment', [OrderController::class, 'select_payment'])->name('order.select_payment');
Route::post('/order/process_payment', [OrderController::class, 'processPayment'])->name('order.process_payment');
Route::post('/order/place_order', [OrderController::class, 'place_order'])->name('order.place_order');
Route::delete('/order/{order}', [OrderController::class, 'destroy'])->name('order.destroy');
Route::get('/order/confirm_order', [OrderController::class, 'showCvvForm'])->name('order.confirm_order');
Route::get('/profile', [ProfileController::class, 'index'])
    ->name('profile')
    ->middleware('auth', App\Http\Middleware\OrderStatus::class);
Route::put('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');



/* Succesful order */
Route::get('/order/success', [CartController::class, 'orderSuccess'])->name('order.success');



