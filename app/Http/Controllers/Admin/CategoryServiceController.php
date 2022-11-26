<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategoryService;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categoryServices.index', [
            'title' => 'Category Services',
            'category_services' => CategoryService::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categoryServices.create', [
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

        CategoryService::create($validateData);
        Alert::success('Success', 'Berhasil Menambah Category');
        return redirect()->route('category-services.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryService  $categoryService
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryService $categoryService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryService  $categoryService
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryService $categoryService)
    {
        return view('admin.categoryServices.edit', [
            'title' => 'Category Edit',
            'category_service' => $categoryService,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryService  $categoryService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryService $categoryService)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'slogan' => 'required',
        ]);

        if ($request->file('thumb_img')){
            // hapus dulu, baru upload yang baru
            File::delete('images/'.$categoryService->thumb_img);
            $image = $request->file('thumb_img');
            $imageName = 'Product_'.uniqId().'.'.$image->extension();
            $img = Image::make($image->path());
            $img->resize(1000, 1000, function($const){
                $const->aspectRatio();
            })->save(public_path('/images/'.$imageName));
            $validateData['thumb_img'] = $imageName;
        }
        $validateData['slug'] = Str::slug($request->name, '-');

        $categoryService->update($validateData);

        Alert::success('Success', 'Category Service has been updated');

        return redirect()->route('category-services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryService  $categoryService
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryService $categoryService)
    {
        $categoryService->where('id', $categoryService->id)->delete();
        Alert::success('Success', 'Berhasil Menghapus Category');
        return back();
    }
}
