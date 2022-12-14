<?php

namespace App\Http\Controllers\User;

use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\CategoryService;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Service;
use App\Models\ImageProduct;
use Illuminate\Http\Request;
use App\Models\MethodPayment;

class PagesController extends Controller
{
    
    public function index()
    {
        auth()->check() == true ? $ttl_orders = Order::where('user_id', auth()->user()->id)->count() : $ttl_orders = 0;
        return view('publik.pages.landingpage',[
            'title' => 'Landing Page',
            'category_products' => CategoryProduct::all(),
            'newest' => Product::orderBy('id','desc')->take(8)->get(),
            'products' => Product::inRandomOrder()->take(10)->get(),
            'services' => Service::inRandomOrder()->take(10)->get(),
            'ttl_orders' => $ttl_orders,
        ]);
    }

    public function aboutWikrama() {
        return view('publik.pages.aboutWikrama', [
            'title' => 'About Wikrama',
        ]);
    }

    public function products()
    {
        auth()->check() == true ? $ttl_orders = Order::where('user_id', auth()->user()->id)->count() : $ttl_orders = 0;
        return view('publik.products.products', [
            'title' => 'Products',
            'products' => Product::orderBy('created_at', 'desc')->take(8)->get(),
            'category_products' => CategoryProduct::all(),
            // 'foods' => Product::where('category', 'foods')->orderBy('id', 'desc')->paginate(8, ['*'], 'foods'),
            // 'drinks' => Product::where('category', 'drinks')->orderBy('id', 'desc')->paginate(8, ['*'], 'drinks'),
            'images' => ImageProduct::all(),
            'singleimage' => ImageProduct::orderBy('id', 'desc')->take(1)->get(),
            'ttl_orders' => $ttl_orders,
        ]);
    }

    public function CategoryProduct(CategoryProduct $categoryProduct)
    {
        return view('publik.products.categoryProduct', [
            'title' => 'Category Product',
            'category' => $categoryProduct,
            'products' => Product::inRandomOrder()->get(),
            'services' => Service::inRandomOrder()->get(),
        ]);
    }
    public function CategoryService(CategoryService $categoryService)
    {
        return view('publik.services.categoryService', [
            'title' => 'Category Service',
            'category' => $categoryService,
            'products' => Product::inRandomOrder()->get(),
            'services' => Service::inRandomOrder()->get(),
        ]);
    }

    public function services()
    {
        auth()->check() == true ? $ttl_orders = Order::where('user_id', auth()->user()->id)->count() : $ttl_orders = 0;
        return view('publik.services.services',[
            'title' => 'Services',
            'services' => Service::orderBy('id', 'desc')->take(8)->get(),
            'category_services' => CategoryService::all(),
            // 'progtechs' => Service::where('category','progtech')->orderBy('id','desc')->paginate(8),
            // 'designs' => Service::where('category','design')->orderBy('id','desc')->paginate(8),
            'ttl_orders' => $ttl_orders,
        ]);
    }

    public function categories()
    {
        return view('publik.pages.categories',[
            'title' => 'Categories',
            'category_products' => CategoryProduct::all(),
            'category_services' => CategoryService::all(),
            'products' => Product::inRandomOrder()->take(10)->get(),
            'services' => Service::inRandomOrder()->take(10)->get(),
        ]);
    }

    public function shoppingcart()
    {
        $user_order_id = Order::where('user_id', auth()->user()->id)->get();
        return view('publik.pages.shoppingcart',[
            'title' => 'Shopping Cart',
            'category_products' => CategoryProduct::all(),
            'quantity' => $user_order_id,
            'orders' => Order::where('user_id', auth()->user()->id)->get(),
            'methodPayments' => MethodPayment::all(),
        ]);
    }
}
