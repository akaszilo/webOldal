<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;

Route::get('/home', function () {
    return view('welcome');
})->name('home');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('bestsellers');