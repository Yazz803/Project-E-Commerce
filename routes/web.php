<?php

use App\Models\Product;
use App\Models\Service;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\PagesController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\ServiceController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminServicesController;
use App\Http\Controllers\Admin\MethodPaymentController;
use App\Http\Controllers\Admin\StatusController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\QuantityController;

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

Route::match('GET', 'product', function(){return redirect('/products');});
Route::match(['GET', 'POST'], 'register', function(){return redirect('/');});
Route::match(['GET', 'POST'], 'login', function(){return redirect('/');});

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


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('admin');
Route::resource('/dashboard/products', AdminProductController::class)->middleware('admin');
Route::resource('/dashboard/services', AdminServicesController::class)->middleware('admin');

Route::post('/', [PagesController::class, 'search']);

Route::post('/order', [OrderController::class, 'store']);
Route::put('/order', [OrderController::class, 'update']);
Route::delete('/cancel-order/{order:id}',[OrderController::class, 'destroy']);
Route::get('/dashboard/list-orders', [OrderController::class, 'index'])->middleware('admin');
Route::get('/profile/edit', [ProfileController::class, 'edit']);
// Route::resource('/profile', ProfileController::class);
Route::get('/profile', [ProfileController::class, 'edit']);
Route::put('/profile', [ProfileController::class, 'update'])->name('update-profile');

Route::get('/checkout', [CheckoutController::class, 'index']);
Route::post('/checkout', [CheckoutController::class, 'store']);
Route::get('/checkout/{checkout:id}', [CheckoutController::class, 'show']);

Route::put('/ubah-status', [StatusController::class, 'update']);

Route::resource('/dashboard/method-payments', MethodPaymentController::class)->middleware('admin');