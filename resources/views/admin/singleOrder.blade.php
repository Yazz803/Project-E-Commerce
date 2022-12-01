@extends('admin.layouts.main')

@section('content')
    <div class="container">
        <a href="{{ route('order.index') }}" class="btn btn-outline-info mb-4"><i class="fa fa-arrow-left"></i> Back</a>
        <h4 class="text-primary mb-4"><i class="fa fa-circle"></i> Detail Pesanan : {{ $checkout->user->full_name }} ({{ $checkout->user->username }})</h4>
        <div class="row mt-4">
            {{-- List Product --}}
            @foreach($orders as $order)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <img src="/images/{{ $order->product->thumb_img }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href="{{ route('product.show', $order->product->slug) }}" class="font-weight-bold text-dark">{{ $order->product->name }} ({{ $order->quantity }}x)</a>
                        <h5 class="font-weight-bold text-danger">Rp {{ number_format($order->product->price,0, ',', '.') }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- /List Product --}}
        </div>
        <div class="order-info text-dark d-flex justify-content-between" style="border-top: 2px solid gray">
            <div class="kanan">
                <h3>Total Price : <span class="text-danger font-weight-bold">Rp {{ number_format($checkout->total_price_checkout,0, ',', '.') }}</span></h3>
                <p class="font-weight-bold m-0">Metode Pembayaran : <span class="text-primary">{{ $checkout->payment }}</span></p>
                <p class="font-weight-bold m-0">Id Pemesanan : <span class="text-primary">{{ $checkout->id_pemesanan }}</span></p>
                <p class="font-weight-bold m-0">Alamat : <span class="text-primary">{{ $checkout->user->address }}</span></p>
                <p class="font-weight-bold">Nomor HP : <span class="text-primary">{{ $checkout->user->no_hp }}</span></p>
            </div>
            <div class="kiri text-right">
                <a href="{{ route('generateInvoicePDFAdmin', $checkout->id) }}" class="text-success font-weight-bold"><u>Donwload Invoice</u></a>
                {{-- <form action="{{ route('status.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="process">
                    <button class="btn btn-primary" onclick="return confirm('Tekan Ok Jika ingin Mengkonfirmasi Pesanan.')">Konfirmasi Pembayaran</button>
                </form> --}}
                @if($checkout->status == 'pending')
              <form action="{{ route('status.update') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="checkout_id" value="{{ $checkout->id }}">
                <input type="hidden" name="status" value="success">
                <button type="submit" onclick="return confirm('Pesanan akan dikonfirmasi, tekan OK jika ingin melanjutkannya')" class="btn btn-primary">Konfirmasi Pesanan</button>
              </form>
              @elseif($checkout->status == 'success')
              <form action="{{ route('status.update') }}" method="POST">
                @csrf
                @method('PUT')
                <label for="estimasiTiba">Estimasi Tiba</label>
                <input type="date" name="estimasi_tiba">
                @error('estimasi_tiba')
                <script>alert('Harap isi Tanggal Estimasi Tiba')</script>
                @enderror
                <input type="hidden" name="checkout_id" value="{{ $checkout->id }}">
                <input type="hidden" name="status" value="process">
                <button type="submit" onclick="return confirm('Pesanan akan diproses, tekan OK jika ingin melanjutkannya')" class="btn btn-primary">Pesanan akan diproses</button>
              </form>
              @elseif($checkout->status == 'process')
              <form action="{{ route('status.update') }}" method="POST">
                @csrf
                @method('PUT')
                <label for="estimasiTiba">Ubah Estimasi Tiba</label>
                <input type="hidden" name="status" value="{{ $checkout->status }}">
                <input type="hidden" name="checkout_id" value="{{ $checkout->id }}">
                <input type="hidden" name="ubah" value="1">
                <input type="date" name="estimasi_tiba">
                @error('estimasi_tiba')
                <script>alert('{{ $message }}')</script>
                @enderror
                @if(session('ubah_estimasi'))
                <script>alert('{{ session('ubah_estimasi') }}')</script>
                @endif
                <button type="submit" onclick="return confirm('Tanggal Estimasi Tiba akan diubah, tekan OK jika ingin melanjutkannya')" class="btn btn-success"><i class="fa fa-edit"></i></button>
              </form>
              <form action="{{ route('status.update') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="done">
                <input type="hidden" name="checkout_id" value="{{ $checkout->id }}">
                <button type="submit" onclick="return confirm('Pesanan sampai di costumer, tekan OK jika ingin melanjutkannya')" class="btn btn-primary">Pesanan Tiba di Costumer</button>
              </form>
              @elseif($checkout->status == 'done')
              <div class="">
                  <button type="button" class="btn btn-success font-weight-bold"><i class="fa fa-check"></i> Pesanan Tiba di Costumer</button>
              </div>
              @endif
            </div>
        </div>
    </div>
    
    {{-- <footer 
        style="
        position: absolute;
        bottom:80px;
        right:0;
        /* width: 83.5%; */
        border-bottom: 2px solid black;
        border-top: 2px solid black;">
        <div class="d-flex justify-content-between">
            <div class="kanan">
                <p>teuing naon</p>
            </div>
            <div class="kiri">
                <p>dia bakalan dimana</p>
            </div>
        </div>
    </footer> --}}
@endsection