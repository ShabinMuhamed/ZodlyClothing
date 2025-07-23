<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;



Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/shop',[HomeController::class,'shop'])->name('products');
Route::get('/details/{id}',[HomeController::class,'show'])->name('product.details');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::get('/admin/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/admin/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/admin/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/admin/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/admin/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/admin/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::delete('/admin/product-images/{id}', [ProductController::class, 'deleteImage'])->name('product_images.destroy');







