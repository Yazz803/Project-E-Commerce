<?php

namespace App\Http\Controllers\Admin;

use App\Models\CategoryProduct;
use App\Models\CategoryService;
use App\Models\Product;
use App\Models\Service;
use App\Models\Checkout;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $categoryProducts = CategoryProduct::all();
        $categoryServices = CategoryService::all();
        return view('admin.home',[
            'title' => 'Dashboard Admin',
            'category_products' => $categoryProducts,
            'category_services' => $categoryServices,
            'services' => Service::all(),
            'products' => Product::all(),
            'pendingOrders' => Checkout::where('status', 'pending')->get(),
            'successOrders' => Checkout::where('status', 'success')->get(),
            'processOrders' => Checkout::where('status', 'process')->get(),
            'doneOrders' => Checkout::where('status', 'done')->get(),
        ]);
    }
}
