<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('welcome');
Route::resource('product', ProductController::class);

Route::resource('order', OrderController::class);
