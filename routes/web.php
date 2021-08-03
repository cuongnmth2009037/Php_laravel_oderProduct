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

Route::get('/products',[\App\Http\Controllers\ProductsController::class,'index']);
Route::get('/cart/add',[\App\Http\Controllers\ProductsController::class,'add']);
Route::get('/cart/show',[\App\Http\Controllers\ProductsController::class,'show']);
Route::get('/cart/delete',[\App\Http\Controllers\ProductsController::class,'destroy']);
Route::post('/cart/save',[\App\Http\Controllers\ProductsController::class,'save']);
