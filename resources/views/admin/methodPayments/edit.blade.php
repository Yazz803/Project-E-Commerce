@extends('admin.layouts.main')

@section('content')
<div class="form-add-product col-lg-6 m-auto">
    <form action="{{ route('method-payments.update', $methodPayment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name" class="font-weight-bold @error('name') text-danger @enderror text-primary"><i class="fa fa-circle"></i> Nama Pembayaran</label>
            @error('name')
            <p class="text-danger font-weight-bold">
                {{ $message }}
            </p>
            @enderror
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Bank BRI / Bank BCA / Dana / dll" value="{{ $methodPayment->name }}">
        </div>
        <div class="form-group">
            <label for="no_rek" class="font-weight-bold text-primary"><i class="fa fa-circle"></i> Nomor Rekening</label>
            <input type="text" name="no_rek" class="form-control" id="no_rek" placeholder="Masukan Nomor Rekening Jika ada" value="{{ $methodPayment->no_rek }}">
        </div>
        <div class="form-group" style="margin-top: 30px;">
            <label for="body" class="form-label font-weight-bold @error('description') text-danger @enderror text-primary"><i class="fa fa-circle"></i> Description</label>
            @error('description')
            <p class="text-danger font-weight-bold">{{ $message }}</p>
            @enderror
            <input id="description" type="hidden" name="description" value="{!! $methodPayment->description !!}">
            <trix-editor input="description" placeholder="Silahkan masukan step-by-step dari pembayaran yang akan dilakukan"></trix-editor>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection