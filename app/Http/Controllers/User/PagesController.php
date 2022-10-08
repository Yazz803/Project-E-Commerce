<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('publik.landingpage',[
            'categories' => ['BDP', 'MPLB', 'PPLG', 'TKJT', 'KLN'],
            'products' => ['Bolsu', 'Batagor', 'Susu Murni Nasional', 'Sushi', 'Mie Ayam'],
            'services' => ['Front-End Dev', 'Back-End Dev', 'Fullstack Dev', 'Komputer Jaringan Telekomunikasi', 'Design Grafis', 'UI/UX Website']
        ]);
    }

    public function products(Product $product)
    {
        return view('publik.products', [
            'products2' => Product::orderBy('id', 'desc')->take(5)->get(),
            'categories' => ['BDP', 'MPLB', 'PPLG', 'TKJT', 'KLN'],
            'products' => ['Bolsu', 'Batagor', 'Susu Murni Nasional', 'Sushi', 'Mie Ayam'],
            'services' => ['Front-End Dev', 'Back-End Dev', 'Fullstack Dev', 'Komputer Jaringan Telekomunikasi', 'Design Grafis', 'UI/UX Website']
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
        return view('publik.shoppingcart');
    }
}
