<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.home',[
            'title' => 'Dashboard Admin',
            'foods' => Product::where('category', 'foods')->get(),
            'drinks' => Product::where('category', 'drinks')->get(),
            'services' => Service::all()
        ]);
    }
}
