<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('welcome');
Route::resource('product', ProductController::class);

Route::resource('order', OrderController::class)
    ->only(['index', 'create', 'show', 'store']);
Route::get('/order/{order}/complete', [OrderController::class, 'complete'])->name('order.complete');
