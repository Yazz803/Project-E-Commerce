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
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MethodPaymentController;
use App\Http\Controllers\Admin\StatusController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\QuantityController;
use App\Http\Controllers\Admin\CategoryProductController;
use App\Http\Controllers\Admin\CategoryServiceController;
use App\Http\Controllers\User\MenuController;
use App\Http\Controllers\User\SearchController;

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
Route::match(['GET'], 'order', function(){return back();});
Route::match(['GET', 'POST'], 'login', function(){return redirect('/');});

// PagesController Route
Route::get('/', [PagesController::class, 'index'])->name('pages.index');
Route::get('/products', [PagesController::class, 'products'])->name('pages.products');
Route::get('/services', [PagesController::class, 'services'])->name('pages.services');
Route::get('/categories', [PagesController::class, 'categories'])->name('pages.categories');

// ProductController Route
Route::get('/product/{product:slug}', [ProductController::class, 'show'])->name('product.show');

// ServiceController Route
Route::get('/service/{service:slug}', [ServiceController::class, 'show'])->name('service.show');

// LoginController Route
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login.index');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');

// RegisterController Route
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest')->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Admin Route
Route::group(['middleware' => 'admin', 'prefix' => 'dashboard'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('/products', AdminProductController::class);
    Route::resource('/services', AdminServicesController::class);
    Route::resource('/method-payments', MethodPaymentController::class);
    Route::get('/list-orders', [OrderController::class, 'index'])->name('order.index');
    Route::put('/ubah-status', [StatusController::class, 'update'])->name('status.update');
    Route::resource('/category-products', CategoryProductController::class)->except('show');
    Route::resource('/category-services', CategoryServiceController::class)->except('show');
});

Route::middleware('auth')->group(function () {
    Route::get('/shopping-cart', [PagesController::class, 'shoppingcart'])->name('pages.shoppingcart');

    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
    Route::put('/order', [OrderController::class, 'update'])->name('order.update');
    Route::delete('/cancel-order/{order:id}',[OrderController::class, 'destroy'])->name('order.destroy');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/checkout/{checkout:id}', [CheckoutController::class, 'show'])->name('checkout.show');
    
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    
    Route::get('/menu-utama', [MenuController::class, 'index'])->name('menu.utama');
});

Route::get('/autocomplete-search', [SearchController::class, 'autocompleteSearch']);