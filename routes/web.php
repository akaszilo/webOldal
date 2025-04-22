<?php

use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

Route::get('/', [ProductController::class, 'index'])->name('home');

Auth::routes();

Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');

Route::post('/forgot-password', [ResetPasswordController::class, 'passwordEmail']);

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'passwordReset'])->name('password.reset');