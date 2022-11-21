@extends('admin.layouts.main')

@section('content')

    @if($services->count())
    <div class="container">
        <div class="row">
            {{-- List Product --}}
            @foreach($services as $service)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="/images/{{ $service->thumb_img }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold text-dark uppercase">{{ $service->name }}</h5>
                        <h5 class="card-title font-weight-bold text-danger">Rp {{ number_format($service->price,0, ',', '.') }}</h5>
                        <div class="text-truncate-mine">
                            {!! $service->description !!}
                        </div>
                        <hr>
                        <div class="action-button d-flex justify-content-around">
                            <a href="{{ route('service.show', $service->slug) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('services.edit', $service->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                            <form action="{{ route('services.destroy', $service->id) }}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" onclick="return confirm('hapus?')" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- /List Product --}}
        </div>
    </div>
    @else
    <center>
        <h1>Tidak ada Service!</h1>
    </center>
    @endif

    
@endsection