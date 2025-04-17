<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// routes/web.php
Route::get('/smink', [CategoryController::class, 'smink'])->name('smink');
Route::get('/arcapolas', [CategoryController::class, 'arcapolas'])->name('arcapolas');
Route::get('/hajapolas', [CategoryController::class, 'hajapolas'])->name('hajapolas');
Route::get('/testapolas', [CategoryController::class, 'testapolas'])->name('testapolas');
Route::get('/mukormok', [CategoryController::class, 'mukormok'])->name('mukormok');
Route::get('/kez-lab-apolas', [CategoryController::class, 'kezLabApolas'])->name('kez-lab-apolas');
Route::get('/kiegeszitok', [CategoryController::class, 'kiegeszitok'])->name('kiegeszitok');


//Route::get('/main', [MainController::class, 'index'])->name('main');