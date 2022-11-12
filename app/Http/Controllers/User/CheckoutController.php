<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use App\Models\Product;
use App\Models\Checkout;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CheckoutController extends Controller
{

    public function index()
    {
        auth()->check() == true ? $ttl_orders = Order::where('user_id', auth()->user()->id)->count() : $ttl_orders = 0;
        $allCheckout = Checkout::all();
        return view('publik.checkout', [
            'title' => 'Checkout',
            'ttl_orders' => $ttl_orders,
            'orders' => Checkout::where('user_id', auth()->user()->id)->get(),
            'orderUser' => Checkout::all()
        ]);
    }
    public function store()
    {
        $orders = Order::where('user_id', auth()->user()->id)->get();
        $total_harga = 0;
        foreach ($orders as $order) {
            $total_harga += $order->product->price * $order->quantity;
        }
        $result_total_harga = $total_harga;

        $insertMultipleOrders = [];

        //ketika user memesar product, stock nya tidak akan berkurang, tapi ketika user melakukan checkout product, maka stock productnya berkurang
        foreach ($orders as $order) {
            $insertMultipleOrders[] = [
                'user_id' => $order->user_id,
                'product_id' => $order->product_id,
                'quantity' => $order->quantity,
                'total_price' => $result_total_harga,
                'created_at' => now(),
                'updated_at' => now()
            ];
            // jika stock barang kurang dari 0 maka akan menampilkan alert
            if ($order->product->stock < $order->quantity) {
                Alert::error('Stock Product', 'Stock Product Tidak Mencukupi');
                return redirect()->back();
            }
            $product = Product::find($order->product_id);
            $product->stock -= $order->quantity;
            $product->save();
        }
        
        
        // foreach($orders as $order){
        //     $insertMultipleOrders[] = [
        //         'user_id' => $order->user_id,
        //         'product_id' => $order->product_id,
        //         'quantity' => $order->quantity,
        //         'total_price' => $result_total_harga,
        //     ];
        // }

        Checkout::insert($insertMultipleOrders);
        Order::where('user_id', auth()->user()->id)->delete();
        Alert::success('Berhasil Checkout!');
        return back();
    }
}
