<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Checkout;
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
        $allCheckout = Checkout::all();
        return view('admin.listorder', [
            'orderUser' => Checkout::paginate(15),
            'users' => User::latest()->filter(request(['u']))->paginate(15)
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

        $validatedData['code_order'] = uniqid();

        $allOrder = Order::where('user_id', auth()->user()->id)->orWhere('product_id', $request->product_id)->get();
        foreach($allOrder as $all){
            if($all->user_id == auth()->user()->id){
                $code_order = $all->code_order;
                $validatedData['code_order'] = $code_order;
            }
        }
            
        // mengurangi stock sesuai dengan quantitynya
        // $product = Product::find($validatedData['product_id']);
        // $product->stock -= $validatedData['quantity'];
        // $product->save();

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
    public function show(Checkout $checkout)
    {
        return view('admin.singleOrder', [
            'orders' => $checkout
        ]);
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

            // $validatedData['quantity'] += $request->quantity;
            // order udah jadi array
            $order = Order::where('product_id', $request->product_id)->orWhere('user_id', auth()->user()->id)->get();
            foreach($order as $o){
                if($o->product_id == $request->product_id && $o->user_id == auth()->user()->id){
                    if($o->quantity == $request->quantity){
                        Alert::warning('Tidak ada pesanan yang ditambah!');
                        return back();
                    }else{
                        Alert::success('Berhasil Update Pesanan');
                        // jika quantitynya dikurangi, maka stocknya bertambah, jika quantitynya ditambah, maka stocknya berkurang
                        // if($o->quantity > $request->quantity){
                        //     $product = Product::where('id', $request->product_id)->first();
                        //     $product->stock += ($o->quantity - $request->quantity);
                        //     $product->save();
                        // }else{
                        //     $product = Product::where('id', $request->product_id)->first();
                        //     $product->stock -= ($request->quantity - $o->quantity);
                        //     $product->save();
                        // }
                        $o->quantity = $request->quantity;
                        $o->save();
                    }
                }
            }
            
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
            // menambah stock product sesuai dengan quantitynya
            $product = Product::where('id', $order->product_id)->first();
            $product->stock += $order->quantity;
            $product->save();
            
            $order->where('id', $order->id)->delete();
            Alert::success('Berhasil Menghapus Pesanan');
            return back();
    }
}
