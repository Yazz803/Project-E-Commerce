<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function autocompleteSearch(Request $request)
    {
          $query = $request->get('query');
          $filterResult = Product::where('name', 'LIKE', '%'. $query. '%')->get();
          return response()->json($filterResult);
    } 
}
