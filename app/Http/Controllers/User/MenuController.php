<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        return view('publik.menu', [
            'title' => 'Menu Utama',
            'user' => auth()->user(),
            'products' => Product::inRandomOrder()->get(),
        ]);
    }
}
