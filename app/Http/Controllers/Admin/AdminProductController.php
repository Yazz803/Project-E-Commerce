<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Order;
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
        return view('admin.products.listproducts', [
            'products' => Product::latest()->filter(request(['q']))->paginate(18),
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.addproduct',[
            'id_prod' => Product::orderBy('id', 'desc')->first(),
            'categories' => CategoryProduct::all(),
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
            'category_product_id' => 'required',
            'code_product' => 'required',
            'description' => 'required',
            'detail' => 'required'
        ]);

        if ($request->file('thumb_img')){
            $image = $request->file('thumb_img');
            $imageName = 'Product_'.uniqId().'.'.$image->extension();
            $img = Image::make($image->path());
            $img->fit(500, 500, function($const){
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
                // size 1:1
                $img->fit(500, 500, function($const){
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

        // setiap nambah product, ttl_product di table category akan bertambah 1
        $category = CategoryProduct::find($request->category_product_id);
        if($category){
            $category->ttl_product += 1;
            $category->save();
        }

        Alert::toast('Berhasil Menambah Product!', 'success');
        return redirect()->route('products.create');

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
        return view('admin.products.editproduct', [
            'product' => $product,
            'images' => ImageProduct::where('code_product', $product->code_product)->get(),
            'categories' => CategoryProduct::all()
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
            'code_product' => 'required',
            'description' => 'required',
            'detail' => 'required',
        ]);

        if ($request->file('thumb_img')){
            // hapus dulu, baru upload yang baru
            File::delete('images/'.$product->thumb_img);
            $image = $request->file('thumb_img');
            $imageName = 'Product_'.uniqId().'.'.$image->extension();
            $img = Image::make($image->path());
            $img->fit(500, 500, function($const){
                $const->upsize();
            })->save(public_path('/images/'.$imageName));
            $validatedProduct['thumb_img'] = $imageName;
        }

        $images = [];
        if ($request->images){
            // menghapus thumb image dan menggantikannya dengan yang baru
            $old_img = ImageProduct::where('code_product', $product->code_product)->get();
            foreach($old_img as $image){
                File::delete('images/'.$image->name);
            }
            ImageProduct::where('code_product', $product->code_product)->delete();
            foreach($request->images as $image){
                $imageName = 'Product_'.uniqId().'.'.$image->extension();
                // $image->move(public_path('images'), $imageName);
                $img = Image::make($image->path());
                // size 1:1
                $img->fit(500, 500, function($const){
                    $const->upsize();
                })->save(public_path('images/'.$imageName));
                $images[]['name'] = $imageName;
            }
        }

        $validatedProduct['user_id'] = auth()->user()->id;
        $validatedProduct['category_product_id'] = $request->category_product_id;
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
        return redirect()->route('products.edit', $product->id);

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
        // mengurangi ttl_product di table Category sebanyak 1 kali
        $category = CategoryProduct::find($product->categoryProduct->id);
        $category->ttl_product -= 1;
        $category->save();
        File::delete('images/'.$product->thumb_img);
        ImageProduct::where('code_product', $product->code_product)->delete();
        Product::where('id', $product->id)->delete();
        Order::where('product_id', $product->id)->delete();

        Alert::Toast('Berhasil dihapus!', 'success');
        return back();
    }
}
