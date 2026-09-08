<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CategoryController, ColorController, SizeController, BrandController, ProductController};

Route::redirect('/', '/products');
Route::resource('categories', CategoryController::class);
Route::resource('colors', ColorController::class);
Route::resource('sizes', SizeController::class);
Route::resource('brands', BrandController::class);
Route::resource('products', ProductController::class);