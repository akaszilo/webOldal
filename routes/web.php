<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CreditCardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;


/* Authentication routes */
Auth::routes();
Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'password_reset'])->name('password.reset');

Route::get('/email/verify', function () {
Route::post('/forgot-password', [ResetPasswordController::class, 'password_email']);
Route::post('/reset-password', [ResetPasswordController::class, 'password_update'])->name('password.update');
    return view('auth.verify');
})->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
    ->middleware(['signed'])
    ->name('verification.verify');
Route::post('/email/verification-notification', [VerificationController::class, 'resend'])
    ->name('verification.resend');



/* Category routes */
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/brands/{brand}', [BrandController::class, 'show'])->name('brands.show');
Route::get('/eyes', [CategoryController::class, 'show_eyes'])->name('eyes');
Route::get('/lips', [CategoryController::class, 'show_lips'])->name('lips');
Route::get('/face', [CategoryController::class, 'show_face'])->name('face');
Route::get('/all', [CategoryController::class, 'all_products'])->name('all');





/* Search routes */
Route::get('/search/autocomplete', [ProductController::class, 'auto_complete'])->name('search.autocomplete');
Route::get('/search', [ProductController::class, 'search'])->name('search');



/* Product page routes */
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/brand/{brand}', [BrandController::class, 'show'])->name('brands.show');
Route::get('/product/{product}', [ProductController::class, 'show_recommended'])->name('product.show');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/brand/{brand}', [ProductController::class, 'filter_by_brand'])->name('products.byBrand');



/* Profile routes */
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');



/* Cart routes */
Route::get('/user_pages/cart', [CartController::class, 'show_user_cart'])->name('user.cart');
Route::get('/subcategory/{id}', [CategoryController::class, 'show_sub_category'])->name('subcategory.show');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/destroy/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::post('/cart/place-order', [CartController::class, 'place_order'])->name('cart.placeOrder');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/confirm-order', [CartController::class, 'confirm_order'])->name('cart.confirmOrder');

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
Route::post('/cart/confirm_order', [CartController::class, 'confirm_order'])->name('cart.confirm_order');

/* Address */
Route::resource('addresses', AddressController::class);

/* Manage credit cards */
Route::resource('credit_cards', CreditCardController::class)->except(['show']);

/* Order route */
Route::post('/cart/process_order', [CartController::class, 'process_order'])->name('cart.process_order');

/* Manage order */
Route::get('/order/checkout', [OrderController::class, 'checkout'])->name('order.checkout');
Route::post('/order/process_order', [OrderController::class, 'process_order'])->name('order.process_order');
Route::get('/order/success', [OrderController::class, 'order_success'])->name('order.success');
Route::get('/order/{order}/details', [ProfileController::class, 'show_order_details'])->name('order.details');
Route::get('/order/select_payment', [OrderController::class, 'select_payment'])->name('order.select_payment');
Route::post('/order/process_payment', [OrderController::class, 'process_payment'])->name('order.process_payment');
Route::post('/order/place_order', [OrderController::class, 'place_order'])->name('order.place_order');
Route::delete('/order/{order}', [OrderController::class, 'destroy'])->name('order.destroy');
Route::get('/order/confirm_order', [OrderController::class, 'show_cvv_form'])->name('order.confirm_order');
Route::get('/profile', [ProfileController::class, 'index'])
    ->name('profile')
    ->middleware('auth', App\Http\Middleware\OrderStatus::class);
Route::put('/profile/update', [ProfileController::class, 'update_profile'])->name('profile.update');



/* Succesful order */
Route::get('/order/success', [CartController::class, 'order_success'])->name('order.success');



