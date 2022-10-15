<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use App\Models\Service;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\ImageProduct;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $images = ImageProduct::all();
        $row = [];
        foreach($images as $image){
            $row[] = $image->code_product;
        }

        for($i=0; $i < count($images); ++$i){
            $imageProduct = $row[$i];
        }

        return view('publik.singleProduct', [
            'title' => strtolower(str_replace('-',' ',basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)))),
            'product' => $product,
            'foods' => Product::where('category', 'foods')->inRandomOrder()->take(5)->get(),
            'drinks' => Product::where('category', 'drinks')->inRandomOrder()->take(5)->get(),
            'images' => ImageProduct::where('code_product', $imageProduct)->get(),
            'services' => Service::inRandomOrder()->take(5)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
