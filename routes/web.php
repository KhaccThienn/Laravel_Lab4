<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']) -> name('home.index');

Route::get('/category', [CategoryController::class, 'index'])->name('category.index');

Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');

Route::post('/category', [CategoryController::class, 'store'])->name('category.store');

Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');

Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');

Route::delete('/category/{id}', [CategoryController::class, 'delete'])->name('category.delete');

Route::get('/product', [ProductController::class, 'index'])->name('product.index');

Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');

Route::post('/product', [ProductController::class, 'store'])->name('product.store');

Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');

Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');

Route::delete('/product/{id}', [ProductController::class, 'delete'])->name('product.delete');