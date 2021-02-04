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

Route::post('/categories', ['App\Http\Controllers\CategoryController', 'store'])
    ->name('category_store');

Route::get('/categories', ['App\Http\Controllers\CategoryController', 'index'])
    ->name('categories');

Route::get('/categories/create', ['App\Http\Controllers\CategoryController', 'create']);

Route::get('/categories/{category}', ['App\Http\Controllers\CategoryController', 'show'])
    ->name('category_show');

Route::post('/categories/{category}', ['App\Http\Controllers\CategoryController', 'update'])
    ->name('category_update');

Route::get('/categories/delete/{category}', ['App\Http\Controllers\CategoryController', 'delete'])
    ->name('category_delete');
