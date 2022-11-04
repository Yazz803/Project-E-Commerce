<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required',
            'quantity' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        // ini akan dilanjutkan besok 04/11/2022
        // update quantity order berdasarkan product nya
        // if (Order::where('product_id', $validatedData['product_id'])->exists() && Order::where('user_id', auth()->user()->id)->exists()) {
        //     $validatedData['quantity'] += $request->quantity;
        //     Order::where(['product_id', $request->product_id], ['user_id', auth()->user()->id])->update($validatedData);
        // }else{
        //     Order::create($validatedData);
        // }
        
            Order::create($validatedData);

        Alert::success('Berhasil Memesan', 'Silahkan check shopping cart anda :)');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        // update quantity order berdasarkan product nya

        $validatedData = $request->validate([
            'product_id' => 'required',
            'quantity' => 'required',
        ]);

            $validatedData['quantity'] += $request->quantity;
            // order udah jadi array
            $order = Order::where('product_id', $request->product_id)->orWhere('user_id', auth()->user()->id)->get();
            foreach($order as $o){
                if($o->product_id == $request->product_id && $o->user_id == auth()->user()->id){
                    $o->quantity += $request->quantity;
                    $o->save();
                }
            }

            Alert::success('Berhasil Menambah Pesanan', 'Silahkan check shopping cart anda :)');
            return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
            $order->where('id', $order->id)->delete();
            Alert::success('Berhasil Menghapus Pesanan', 'Silahkan check shopping cart anda :)');
            return back();
    }
}
