<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use App\Models\Service;
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

    public function products(Product $product)
    {
        return view('publik.products', [
            'title' => 'Products',
            'products2' => Product::orderBy('id', 'desc')->take(8)->get(),
            'foods' => Product::where('category', 'foods')->orderBy('id', 'desc')->paginate(8),
            'drinks' => Product::where('category', 'drinks')->orderBy('id', 'desc')->paginate(8),
            'categories' => ['BDP', 'MPLB', 'PPLG', 'TKJT', 'KLN'],
            'products' => ['Bolsu', 'Batagor', 'Susu Murni Nasional', 'Sushi', 'Mie Ayam'],
            'services' => ['Front-End Dev', 'Back-End Dev', 'Fullstack Dev', 'Komputer Jaringan Telekomunikasi', 'Design Grafis', 'UI/UX Website']
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
