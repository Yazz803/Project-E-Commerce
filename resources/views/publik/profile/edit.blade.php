@extends('publik.layouts.main')

@section('section')
<div class="container edit-profile">
    <div class="profile" style="margin-top: 10px;">
        <center>
            <img src="{{ asset('/images/'. auth()->user()->photo_profile) }}" width="100px" style="border-radius: 50%" alt="">
        </center>
        <h4 style="color: gray; margin-top:5px">{{ auth()->user()->full_name }}</h4>
    </div>

    <form action="{{ route('profile.update') }}" method="POST" class="form-profile" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputEmail1" class="@error('address') text-danger @enderror">Ganti Photo Profile</label>
            <input type="file" name="photo_profile" class="form-control">
            @error('photo_profile')
            <p class="text-danger">
                {!! $message !!}
            </p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Full Name</label>
            <input type="text" name="full_name" class="form-control" placeholder="Enter Full Name" value="{{ $user->full_name }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Enter Username" value="{{ $user->username }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{ $user->email }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1" class="@error('address') text-danger @enderror">Alamat</label>
            <input type="text" name="address" class="form-control" placeholder="Enter Address" value="{{ $user->address }}">
            @error('address')
            <p class="text-danger">
                {!! $message !!}
            </p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1" class="@error('no_hp') text-danger @enderror">No. HP</label>
            <input type="number" name="no_hp" class="form-control " placeholder="Enter Handphone Number" value="{{ $user->no_hp }}">
            @error('no_hp')
            <p class="text-danger">
                {!! $message !!}
            </p>
            @enderror
        </div>
          <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection