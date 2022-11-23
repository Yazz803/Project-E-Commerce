<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use App\Models\InOrder;
use App\Models\Product;
use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Models\CategoryProduct;
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
            'category_products' => CategoryProduct::all(),
            'checkouts' => Checkout::where('user_id', auth()->user()->id)->get(),
            'orderUser' => Checkout::all()
        ]);
    }
    public function store()
    {
        $orders = Order::where('user_id', auth()->user()->id)->get();
        foreach($orders as $order){
            // jika stock barang kurang dari 0 maka akan menampilkan alert
            if ($order->product->stock < $order->quantity) {
                Alert::error('Stock Product', 'Stock Product Tidak Mencukupi');
                return redirect()->back();
            }elseif(auth()->user()->address == NULL && auth()->user()->no_hp == NULL){
                Alert::error('Tidak Bisa Checkout', 'Silahkan mengisi alamat dan nomor hp di My Profile');
                return redirect()->back();
            }
        }
        $total_harga = 0;
        foreach ($orders as $order) {
            $total_harga += $order->product->price * $order->quantity;
        }
        $result_total_harga = $total_harga;

        $recordCheckout = [
            'user_id' => auth()->user()->id,
            'total_price_checkout' => $result_total_harga,
            'status' => 'pending',
        ];
        if($orders->count() > 0){
            Checkout::create($recordCheckout);
        }else{
            Alert::warning('Keranjang belanja kosong!');
            return back();
        }

        $checkout_id = Checkout::latest('created_at')->first();
        $checkout_id == NULL ? $checkout_id = 1 : $checkout_id = ($checkout_id->id);

        $insertMultipleOrders = [];

        //ketika user memesar product, stock nya tidak akan berkurang, tapi ketika user melakukan checkout product, maka stock productnya berkurang
        foreach ($orders as $order) {
            $insertMultipleOrders[] = [
                'checkout_id' => $checkout_id,
                'user_id' => $order->user_id,
                'product_id' => $order->product_id,
                'quantity' => $order->quantity,
                'total_price' => $order->product->price * $order->quantity,
                // 'created_at' => now(),
                // 'updated_at' => now()
            ];
            $product = Product::find($order->product_id);
            $product->stock -= $order->quantity;
            $product->save();
        }
        

        InOrder::insert($insertMultipleOrders);
        Order::where('user_id', auth()->user()->id)->delete();
        Alert::success('Berhasil Checkout!');
        return back();
    }

    public function show(Checkout $checkout)
    {
        auth()->check() == true ? $ttl_orders = Order::where('user_id', auth()->user()->id)->count() : $ttl_orders = 0;
        $allCheckout = Checkout::all();
        return view('publik.product-checkout', [
            'title' => 'Checkout',
            'category_products' => CategoryProduct::all(),
            // 'single_checkout' => $checkout,
            'ttl_orders' => $ttl_orders,
            'orders' => InOrder::where('user_id', auth()->user()->id)->where('checkout_id', $checkout->id)->get(),
            'checkouts' => Checkout::where('user_id', auth()->user()->id)->where('id', $checkout->id)->get(),
            'orderUser' => Checkout::all()
        ]);
    }
}