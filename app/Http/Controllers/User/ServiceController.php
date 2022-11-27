<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use App\Models\Product;
use App\Models\Service;
use App\Models\ImageService;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        auth()->check() == true ? $ttl_orders = Order::where('user_id', auth()->user()->id)->count() : $ttl_orders = 0;
        return view('publik.services.singleService',[
            'title' => strtolower(str_replace('-',' ',basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)))),
            'service' => $service,
            // 'foods' => Product::where('category', 'foods')->inRandomOrder()->take(5)->get(),
            // 'drinks' => Product::where('category', 'drinks')->inRandomOrder()->take(5)->get(),
            'ttl_orders' => $ttl_orders,
            'imageServices' => ImageService::where('code_service', $service->code_service)->get(),
            'services' => Service::inRandomOrder()->get(),
            'products' => Product::inRandomOrder()->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceRequest  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
