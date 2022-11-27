<?php

use App\Models\Product;
use App\Models\Service;
use App\Models\CommentProduct;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\MenuController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\PagesController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\User\SearchController;
use App\Http\Controllers\Admin\StatusController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\ServiceController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\QuantityController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminServicesController;
use App\Http\Controllers\Admin\MethodPaymentController;
use App\Http\Controllers\User\CommentProductController;
use App\Http\Controllers\Admin\CategoryProductController;
use App\Http\Controllers\Admin\CategoryServiceController;
use App\Http\Controllers\User\CommentReplyProductController;
use App\Http\Controllers\User\CommentReplyServiceController;
use App\Http\Controllers\User\CommentServiceController;

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
Route::match('GET', 'order', function(){return back();});
// Route::match(['GET', 'POST'], 'login', function(){return redirect('/');});
Route::match('GET', '/send-comment-product/{comment_product:id}', function(){return back();});
Route::match('GET', '/delete-comment-product/{comment_product:id}', function(){return back();});
Route::match('GET', '/send-reply-product/{comment_reply_product:id}', function(){return back();});
Route::match('GET', '/delete-reply-product/{comment_reply_product:id}', function(){return back();});

// PagesController Route
Route::get('/', [PagesController::class, 'index'])->name('pages.index');
Route::get('/products', [PagesController::class, 'products'])->name('pages.products');
Route::get('/services', [PagesController::class, 'services'])->name('pages.services');
Route::get('/categories', [PagesController::class, 'categories'])->name('pages.categories');
Route::get('/category/product/{category_product:slug}', [PagesController::class, 'CategoryProduct'])->name('pages.category.product');
Route::get('/category/service/{category_service:slug}', [PagesController::class, 'CategoryService'])->name('pages.category.service');

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
    
    Route::post('/send-comment-product/{product:id}', [CommentProductController::class, 'store'])->name('comment.product.store');
    Route::delete('/delete-comment-product/{comment_product:id}', [CommentProductController::class, 'destroy'])->name('comment.product.destroy');

    Route::post('/send-reply-product/{comment_product:id}', [CommentReplyProductController::class, 'store'])->name('comment.product.reply.store');
    Route::delete('/delete-reply-product/{comment_reply_product:id}', [CommentReplyProductController::class, 'destroy'])->name('comment.product.reply.destroy');

    Route::post('/send-comment-service/{service:id}', [CommentServiceController::class, 'store'])->name('comment.service.store');
    Route::delete('/delete-comment-service/{comment_service:id}', [CommentServiceController::class, 'destroy'])->name('comment.service.destroy');

    Route::post('/send-reply-service/{comment_service:id}', [CommentReplyServiceController::class, 'store'])->name('comment.service.reply.store');
    Route::delete('/delete-reply-service/{comment_reply_service:id}', [CommentReplyServiceController::class, 'destroy'])->name('comment.service.reply.destroy');

    Route::delete('/checkout/{checkout:id}', [CheckoutController::class, 'cancelOrder'])->name('checkout.cancelOrder');
});

Route::get('/autocomplete-search', [SearchController::class, 'autocompleteSearch']);
Route::get('/search', [SearchController::class, 'index'])->name('search.user');
