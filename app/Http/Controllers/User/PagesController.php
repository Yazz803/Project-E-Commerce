<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use App\Models\Product;
use App\Models\Service;
use App\Models\ImageProduct;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    
    public function index()
    {
        auth()->check() == true ? $ttl_orders = Order::where('user_id', auth()->user()->id)->count() : $ttl_orders = 0;
        return view('publik.landingpage',[
            'title' => 'Landing Page',
            'newest' => Product::orderBy('id','desc')->take(8)->get(),
            'products' => Product::inRandomOrder()->get(),
            'services' => Service::inRandomOrder()->get(),
            'ttl_orders' => $ttl_orders,
        ]);
    }

    public function products()
    {
        auth()->check() == true ? $ttl_orders = Order::where('user_id', auth()->user()->id)->count() : $ttl_orders = 0;
        return view('publik.products', [
            'title' => 'Products',
            'products' => Product::orderBy('created_at', 'desc')->take(8)->get(),
            'foods' => Product::where('category', 'foods')->orderBy('id', 'desc')->paginate(8, ['*'], 'foods'),
            'drinks' => Product::where('category', 'drinks')->orderBy('id', 'desc')->paginate(8, ['*'], 'drinks'),
            'images' => ImageProduct::all(),
            'singleimage' => ImageProduct::orderBy('id', 'desc')->take(1)->get(),
            'ttl_orders' => $ttl_orders,
        ]);
    }

    public function services()
    {
        auth()->check() == true ? $ttl_orders = Order::where('user_id', auth()->user()->id)->count() : $ttl_orders = 0;
        return view('publik.services',[
            'title' => 'Services',
            'services' => Service::orderBy('id', 'desc')->take(8)->get(),
            'progtechs' => Service::where('category','progtech')->orderBy('id','desc')->paginate(8),
            'designs' => Service::where('category','design')->orderBy('id','desc')->paginate(8),
            'ttl_orders' => $ttl_orders,
        ]);
    }

    public function product()
    {
        return view('publik.singleProduct');
    }

    public function store()
    {
        return view('publik.store');
    }

    public function shoppingcart()
    {
        auth()->check() == true ? $ttl_orders = Order::where('user_id', auth()->user()->id)->count() : $ttl_products = 0;
        $user_order_id = Order::where('user_id', auth()->user()->id)->get();
        // $hasil = [];
        // foreach($user_order_id as $user_order){
        //     $product_id = $user_order->product_id;
        //     $hasil[] = Product::where('id', $product_id)->get();
        // }
        return view('publik.shoppingcart',[
            'title' => 'Selamat Datang di Shopping Cart',
            'ttl_orders' => $ttl_orders,
            'quantity' => $user_order_id,
            // 'products' => $hasil,
            'orders' => Order::where('user_id', auth()->user()->id)->get(),
        ]);
    }
}
