<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use App\Models\Service;
use App\Models\ImageProduct;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    
    public function index()
    {
        return view('publik.landingpage',[
            'title' => 'Landing Page',
            'newest' => Product::orderBy('id','desc')->take(8)->get(),
            'products' => Product::inRandomOrder()->get(),
            'services' => Service::inRandomOrder()->get()
        ]);
    }

    public function products()
    {
        return view('publik.products', [
            'title' => 'Products',
            'products' => Product::orderBy('created_at', 'desc')->take(8)->get(),
            'foods' => Product::where('category', 'foods')->orderBy('id', 'desc')->paginate(8, ['*'], 'foods'),
            'drinks' => Product::where('category', 'drinks')->orderBy('id', 'desc')->paginate(8, ['*'], 'drinks'),
            'images' => ImageProduct::all(),
            'singleimage' => ImageProduct::orderBy('id', 'desc')->take(1)->get(),
        ]);
    }

    public function services()
    {
        return view('publik.services',[
            'title' => 'Services',
            'services' => Service::orderBy('id', 'desc')->take(8)->get(),
            'progtechs' => Service::where('category','progtech')->orderBy('id','desc')->paginate(8),
            'designs' => Service::where('category','design')->orderBy('id','desc')->paginate(8),
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
        return view('publik.shoppingcart',[
            'title' => 'euy'
        ]);
    }
}
