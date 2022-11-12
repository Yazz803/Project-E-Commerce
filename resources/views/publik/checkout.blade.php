@extends('publik.layouts.main')

@section('section')
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-lg-12">
                @if($orders->count() > 0)
						@foreach($orders as $order)
						<div class="product-cart">
							<img src="/images/{{ $order->product->thumb_img }}" width="100px" alt="">
							<div class="text-product">
								<a href="/product/{{ $order->product->slug }}"><h3 class="product-name" style="font-size: 20px !important;">{{ strtoupper($order->product->name). ' (' . $order->quantity . 'x)' }}</h3></a>
								<h4 class="product-price">Rp {{ number_format($order->product->price,0, ',', '.') }} <span style="color: #D10024;font-size:12px;">(STOCK: {{ $order->product->stock }})</span> </h4>
							</div>
                            
						</div>
						@endforeach
						@else
						<div class="product-cart">
							<h3 class="product-name" style="padding: 20px;">Belum ada Checkout!</h3>
						</div>
						@endif
            </div>
        </div>
    </div>
@endsection