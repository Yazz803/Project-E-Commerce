<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\Service;
use App\Models\Checkout;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $categoryProducts = CategoryProduct::all();
        return view('admin.home',[
            'title' => 'Dashboard Admin',
            'category_products' => $categoryProducts,
            'services' => Service::all(),
            'pendingOrders' => Checkout::where('status', 'pending')->get(),
        ]);
    }
}
