<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        return view('publik.pages.menu', [
            'title' => 'Menu Utama',
            'user' => auth()->user(),
            'products' => Product::inRandomOrder()->take(10)->get(),
            'services' => Service::inRandomOrder()->take(10)->get(),
        ]);
    }
}
