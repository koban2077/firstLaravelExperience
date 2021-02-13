<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::post('/categories', ['App\Http\Controllers\CategoryController', 'store'])
    ->name('category_store');

Route::get('/categories', ['App\Http\Controllers\CategoryController', 'index'])
    ->middleware(['auth'])
    ->name('categories');

Route::get('/categories/create', ['App\Http\Controllers\CategoryController', 'create'])
    ->middleware(['auth'])
    ->middleware(['auth']);

Route::get('/categories/{category}', ['App\Http\Controllers\CategoryController', 'show'])
    ->middleware(['auth'])
    ->name('category_show');

Route::post('/categories/{category}', ['App\Http\Controllers\CategoryController', 'update'])
    ->middleware(['auth'])
    ->name('category_update');

Route::get('/categories/delete/{category}', ['App\Http\Controllers\CategoryController', 'delete'])
    ->middleware(['auth'])
    ->name('category_delete');

Route::get('/products', ['App\Http\Controllers\ProductController', 'index'])
    ->middleware(['auth'])
    ->name('products');

Route::post('/products', ['App\Http\Controllers\ProductController', 'store'])
    ->middleware(['auth'])
    ->name('product_store');

Route::get('/products/create', ['App\Http\Controllers\ProductController', 'create'])
    ->middleware(['auth'])
    ->name('product_create');

Route::get('/products/{product}', ['App\Http\Controllers\ProductController', 'show'])
    ->middleware(['auth'])
    ->name('product_show');

Route::post('/products/{product}', ['App\Http\Controllers\ProductController', 'update'])
    ->middleware(['auth'])
    ->name('product_update');

Route::get('/products/delete/{product}', ['App\Http\Controllers\ProductController', 'delete'])
    ->middleware(['auth'])
    ->name('product_delete');
