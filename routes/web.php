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


require __DIR__.'/auth.php';

Route::middleware(['auth'])->group( function (){

    Route::post('/categories', ['App\Http\Controllers\CategoryController', 'store'])
        ->name('category_store');

    Route::get('/categories', ['App\Http\Controllers\CategoryController', 'index'])
        ->name('categories');

    Route::get('/categories/create', ['App\Http\Controllers\CategoryController', 'create'])
        ->name('category_create');

    Route::get('/categories/{category}', ['App\Http\Controllers\CategoryController', 'show'])
        ->name('category_show');

    Route::post('/categories/{category}', ['App\Http\Controllers\CategoryController', 'update'])
        ->name('category_update');

    Route::get('/categories/delete/{category}', ['App\Http\Controllers\CategoryController', 'delete'])
        ->name('category_delete');

    Route::get('/products', ['App\Http\Controllers\ProductController', 'index'])
        ->name('products');

    Route::post('/products', ['App\Http\Controllers\ProductController', 'store'])
        ->name('product_store');

    Route::get('/products/create', ['App\Http\Controllers\ProductController', 'create'])
        ->name('product_create');

    Route::get('/products/{product}', ['App\Http\Controllers\ProductController', 'show'])
        ->name('product_show');

    Route::post('/products/{product}', ['App\Http\Controllers\ProductController', 'update'])
        ->name('product_update');

    Route::get('/products/delete/{product}', ['App\Http\Controllers\ProductController', 'delete'])
        ->name('product_delete');

    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});



