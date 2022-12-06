<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Support\Str;
use App\Models\ImageProduct;
use App\Models\ImageService;
use Illuminate\Http\Request;
use App\Models\CategoryService;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class AdminServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.services.listservices', [
            'services' => Service::latest()->filter(request(['q']))->paginate(18)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.addservice', [
            'title' => 'Add Service',
            'id_serv' => Service::orderBy('id', 'desc')->first(),
            'categories' => CategoryService::all(),
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
        $validatedService = $request->validate([
            'name' => 'required|unique:products',
            'price' => 'required',
            'thumb_img' => 'required',
            'images' => 'required',
            'category_service_id' => 'required',
            'tag' => 'required',
            'code_service' => 'required',
            'description' => 'required',
            'detail' => 'required',
        ]);

        if ($request->file('thumb_img')){
            $image = $request->file('thumb_img');
            $imageName = 'Product_'.uniqId().'.'.$image->extension();
            $img = Image::make($image->path());
            $img->fit(500, 500, function($const){
                $const->upsize();
            })->save(public_path('/images/'.$imageName));
            $validatedService['thumb_img'] = $imageName;
        }

        $images = [];
        if ($request->images){
            foreach($request->images as $image){
                $imageName = 'Product_'.uniqId().'.'.$image->extension();
                // $image->move(public_path('images'), $imageName);
                $img = Image::make($image->path());
                // size 5:3
                $img->fit(500, 500, function($const){
                    $const->upsize();
                })->save(public_path('images/'.$imageName));
                $images[]['name'] = $imageName;
            }
        }

        $validatedService['user_id'] = auth()->user()->id;
        $validatedService['name'] = strtolower($request->name);
        $validatedService['slug'] = Str::slug($request->name, '-');
        
        Service::create($validatedService);
        
        foreach($images as $image){
            ImageService::insert([
                'name' => implode('|', $image),
                'code_service' => $request->code_service
            ]);
        }

        // setiap nambah service, ttl_service di table category akan bertambah 1
        $category = CategoryService::find($request->category_service_id);
        if($category){
            $category->ttl_service += 1;
            $category->save();
        }

        Alert::toast('Berhasil Menambah Service!', 'success');
        return redirect()->route('services.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('admin.services.editservice', [
            'service' => $service,
            'imageServices' => ImageService::where('code_service', $service->code_service)->get(),
            'categories' => CategoryService::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $validatedService = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'code_service' => 'required',
            'description' => 'required',
            'detail' => 'required',
        ]);

        if ($request->file('thumb_img')){
            // hapus dulu, baru upload yang baru
            File::delete('images/'.$service->thumb_img);
            $image = $request->file('thumb_img');
            $imageName = 'Service_'.uniqId().'.'.$image->extension();
            $img = Image::make($image->path());
            $img->fit(500, 500, function($const){
                $const->upsize();
            })->save(public_path('/images/'.$imageName));
            $validatedService['thumb_img'] = $imageName;
        }

        $images = [];
        if ($request->images){
            // menghapus thumb image dan menggantikannya dengan yang baru
            $old_img = ImageService::where('code_service', $service->code_service)->get();
            foreach($old_img as $image){
                File::delete('images/'.$image->name);
            }
            ImageService::where('code_service', $service->code_service)->delete();
            foreach($request->images as $image){
                $imageName = 'Service_'.uniqId().'.'.$image->extension();
                // $image->move(public_path('images'), $imageName);
                $img = Image::make($image->path());
                // size 1:1
                $img->fit(500, 500, function($const){
                    $const->upsize();
                })->save(public_path('images/'.$imageName));
                $images[]['name'] = $imageName;
            }
        }

        $validatedService['user_id'] = auth()->user()->id;
        $validatedService['category_service_id'] = $request->category_service_id;
        $validatedService['name'] = strtolower($request->name);
        $validatedService['slug'] = Str::slug($request->name, '-');

        
        $service->update($validatedService);
        
        if($request->images){
            foreach($images as $image){
                ImageService::insert([
                    'name' => implode('|', $image),
                    'code_service' => $request->code_service
                ]);
            }
        }
        Alert::toast('Berhasil Mengubah service!', 'success');
        return redirect()->route('services.edit', $service->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $all_img_product = ImageService::all();
        foreach($all_img_product as $img){
            if($img->code_service == $service->code_service){
                File::delete('images/'.$img->name);
            }
        }
        // mengurangi ttl_service di table Category sebanyak 1 kali
        $category = Categoryservice::find($service->categoryService->id);
        $category->ttl_service -= 1;
        $category->save();
        File::delete('images/'.$service->thumb_img);
        ImageService::where('code_service', $service->code_service)->delete();
        Service::where('id', $service->id)->delete();

        // destroy field in database
        Alert::toast('Berhasil Menghapus', 'success');

        return back();
    }
}
