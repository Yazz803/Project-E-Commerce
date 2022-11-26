<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;


class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categoryProducts.index', [
            'title' => 'Category',
            'category_products' => CategoryProduct::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categoryProducts.create', [
            'title' => 'Category Create'
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
        $validateData = $request->validate([
            'name' => 'required|min:3',
            'slogan' => 'required|min:3',
            'thumb_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $validateData['ttl_product'] = 0;

        if ($request->file('thumb_img')){
            $image = $request->file('thumb_img');
            $imageName = 'Product_'.uniqId().'.'.$image->extension();
            $img = Image::make($image->path());
            $img->resize(1000, 1000, function ($const) {
                $const->aspectRatio();
            })->save(public_path('/images/'.$imageName));
            $validateData['thumb_img'] = $imageName;
        }

        $validateData['slug'] = Str::slug($request->name, '-');

        CategoryProduct::create($validateData);
        Alert::success('Success', 'Berhasil Menambah Category');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryProduct  $categoryProduct
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryProduct $categoryProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryProduct  $categoryProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryProduct $categoryProduct)
    {
        return view('admin.categoryProducts.edit', [
            'title' => 'Category Edit',
            'category_product' => $categoryProduct,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryProduct  $categoryProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryProduct $categoryProduct)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'slogan' => 'required',
        ]);

        if ($request->file('thumb_img')){
            // hapus dulu, baru upload yang baru
            File::delete('images/'.$categoryProduct->thumb_img);
            $image = $request->file('thumb_img');
            $imageName = 'Product_'.uniqId().'.'.$image->extension();
            $img = Image::make($image->path());
            $img->fit(1000, 1000, function($const){
                $const->upsize();
            })->save(public_path('/images/'.$imageName));
            $validateData['thumb_img'] = $imageName;
        }
        $validateData['slug'] = Str::slug($request->name, '-');

        $categoryProduct->update($validateData);

        Alert::success('Success', 'Category Product has been updated');

        return redirect()->route('category-products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryProduct  $categoryProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryProduct $categoryProduct)
    {
        $categoryProduct->where('id', $categoryProduct->id)->delete();
        Alert::success('Success', 'Berhasil Menghapus Category');
        return back();
    }
}
