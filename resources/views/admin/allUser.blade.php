@extends('admin.layouts.main')

@section('content')
<div class="container">
    <form class="d-flex w-50 mb-4 m-auto">
        <input class="form-control me-2" type="text" id="search" name="u" placeholder="Cari User..." value="{{ request('u') }}" autocomplete="off">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    @if($users->count())
    <style>
        .pagination{
            justify-content: center;
        }
    </style>
    {{ $users->links() }}
    <div class="menu-content">
      {{-- @if($) --}}
      <table class="table">
        <thead>
          <tr class="table-active">
            <th scope="col">No.</th>
            <th scope="col">Full Name</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Role</th>
            <th scope="col" class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <th scope="row">{{ $users->firstItem() + $loop->index }}</th>
            <td>{{ $user->full_name }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->no_hp }}</td>
            <td>{{ $user->address }}</td>
            <td class="@if($user->role == 'admin') text-danger @else text-primary @endif font-weight-bold">{{ ucfirst($user->role) }}</td>
            <td>
                <form action="{{ route('allusers.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger" onclick="return confirm('User akan Dihapus, Tekan Ok Untuk melanjutkannya')"><i class="fa fa-trash"></i></button>
                </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    {{ $users->links() }}

    @else
    <center>
        <h2>User Tidak Ditemukan!</h2>
    </center>
    @endif
  </div>
@endsection