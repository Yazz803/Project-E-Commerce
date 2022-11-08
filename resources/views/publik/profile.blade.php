@extends('publik.layouts.main')

@section('section')
<div class="container edit-profile">
    <br><br>
    <center>
        <img src="/assets/img/undraw_profile.svg" alt="">
    </center>
    <form action="/profile" method="POST" class="form-profile">
        @csrf
        @method('PUT')
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
            <label for="exampleInputEmail1" class="@error('address') text-danger @enderror">Address</label>
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