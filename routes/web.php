<?php

use App\Models\Test;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\User\PagesController;

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
Route::get('/products', [PagesController::class, 'products']);
Route::get('/product/{product:slug}', [ProductController::class, 'index']);

Route::get('/services', [PagesController::class, 'services']);
Route::get('/service/{service:slug}', [ServiceController::class, 'show']);

Route::get('/store', [PagesController::class, 'store']);
Route::get('/shopping-cart', [PagesController::class, 'shoppingcart']);

Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/test', function(){
    return view('publik.test',[
        'test' => Test::where('id', '2'),
    ]);
});


Route::get('/dashboard', function(){
    return view('admin.home',[
        'title' => 'Dashboard',
        'foods' => Product::where('category', 'foods')->get(),
        'drinks' => Product::where('category', 'drinks')->get(),
        'services' => Service::all()
    ]);
});