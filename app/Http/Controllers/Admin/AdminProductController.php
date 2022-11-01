<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\ImageProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.listproducts', [
            'products' => Product::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addproduct',[
            'id_prod' => Product::orderBy('id', 'desc')->first()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedProduct = $request->validate([
            'name' => 'required|unique:products',
            'price' => 'required',
            'stock' => 'required',
            'thumb_img' => 'required',
            'images' => 'required',
            'category' => 'required',
            'code_product' => 'required',
            'description' => 'required',
            'detail' => 'required'
        ]);

        if ($request->file('thumb_img')){
            $image = $request->file('thumb_img');
            $imageName = 'Product_'.uniqId().'.'.$image->extension();
            $img = Image::make($image->path());
            $img->fit(600, 360, function($const){
                $const->upsize();
            })->save(public_path('/images/'.$imageName));
            $validatedProduct['thumb_img'] = $imageName;
        }

        $images = [];
        if ($request->images){
            foreach($request->images as $image){
                $imageName = 'Product_'.uniqId().'.'.$image->extension();
                // $image->move(public_path('images'), $imageName);
                $img = Image::make($image->path());
                // size 5:3
                $img->fit(600, 360, function($const){
                    $const->upsize();
                })->save(public_path('images/'.$imageName));
                $images[]['name'] = $imageName;
            }
        }

        $validatedProduct['user_id'] = auth()->user()->id;
        $validatedProduct['name'] = strtolower($request->name);
        $validatedProduct['slug'] = Str::slug($request->name, '-');
        
        Product::create($validatedProduct);
        
        foreach($images as $image){
            ImageProduct::insert([
                'name' => implode('|', $image),
                'code_product' => $request->code_product
            ]);
        }
        Alert::toast('Berhasil Menambah Product!', 'success');
        return redirect('/dashboard/products/create');

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
        return view('admin.editproduct', [
            'product' => $product,
            'images' => ImageProduct::where('code_product', $product->code_product)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validatedProduct = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'category' => 'required',
            'code_product' => 'required',
            'description' => 'required',
            'detail' => 'required',
        ]);

        if ($request->file('thumb_img')){
            $image = $request->file('thumb_img');
            $imageName = 'Product_'.uniqId().'.'.$image->extension();
            $img = Image::make($image->path());
            $img->fit(600, 360, function($const){
                $const->upsize();
            })->save(public_path('/images/'.$imageName));
            $validatedProduct['thumb_img'] = $imageName;
        }

        $images = [];
        if ($request->images){
            foreach($request->images as $image){
                $imageName = 'Product_'.uniqId().'.'.$image->extension();
                // $image->move(public_path('images'), $imageName);
                $img = Image::make($image->path());
                // size 5:3
                $img->fit(600, 360, function($const){
                    $const->upsize();
                })->save(public_path('images/'.$imageName));
                $images[]['name'] = $imageName;
            }
        }

        $validatedProduct['user_id'] = auth()->user()->id;
        $validatedProduct['name'] = strtolower($request->name);
        $validatedProduct['slug'] = Str::slug($request->name, '-');
        
        $product->update($validatedProduct);
        
        if($request->images){
            foreach($images as $image){
                ImageProduct::insert([
                    'name' => implode('|', $image),
                    'code_product' => $request->code_product
                ]);
            }
        }
        Alert::toast('Berhasil Mengubah Product!', 'success');
        return redirect('/dashboard/products/'.$product->id.'/edit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $all_img_product = ImageProduct::all();
        foreach($all_img_product as $img){
            if($img->code_product == $product->code_product){
                File::delete('images/'.$img->name);
            }
        }
        File::delete('images/'.$product->thumb_img);
        ImageProduct::where('code_product', $product->code_product)->delete();
        Product::where('id', $product->id)->delete();

        Alert::Toast('Berhasil dihapus!', 'success');
        return back();
    }
}
