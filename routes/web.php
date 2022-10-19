<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\ServiceController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\PagesController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminServicesController;
use App\Http\Controllers\Admin\ImageController;

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

Route::get('/', [PagesController::class, 'index'])->name('login');
Route::get('/products', [PagesController::class, 'products']);
Route::get('/product/{product:slug}', [ProductController::class, 'index']);

Route::get('/services', [PagesController::class, 'services']);
Route::get('/service/{service:slug}', [ServiceController::class, 'show']);

Route::get('/store', [PagesController::class, 'store']);
Route::get('/shopping-cart', [PagesController::class, 'shoppingcart']);

Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/logout', [LoginController::class, 'logout']);


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::resource('/dashboard/products', AdminProductController::class);
Route::resource('/dashboard/services', AdminServicesController::class);
Route::get('/dashboard/products/checkSlug', [AdminProductController::class, 'checkSlug'])->middleware('auth');