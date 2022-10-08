<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\User\PagesController;
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

Route::get('/', [PagesController::class, 'index']);
Route::get('/product/{product:slug}', [ProductController::class, 'index']);
Route::get('/store', [PagesController::class, 'store']);
Route::get('/shopping-cart', [PagesController::class, 'shoppingcart']);
Route::get('/products', [PagesController::class, 'products']);

Route::get('/login', [LoginController::class, 'index']);