<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        return view('publik.search', [
            'title' => request('q'),
            'products_search' => Product::latest()->filter(request(['q']))->get(),
            'services_search' => Service::latest()->filter(request(['q']))->get(),
            'products' => Product::inRandomOrder()->take(10)->get(),
            'services' => Service::inRandomOrder()->take(10)->get(),
        ]);
    }

    public function autocompleteSearch(Request $request)
    {
          $query = $request->get('query');
          $filterResult = Product::where('name', 'LIKE', '%'. $query. '%')->get();
          return response()->json($filterResult);
    }
}
