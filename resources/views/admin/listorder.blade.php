@extends('admin.layouts.main')

@section('content')
    <h2 class="text-center px-4">Data Pemesanan Users</h2>
    <table class="table table-dark table-striped-columns">
        <thead>
          <tr>
            <th scope="col">NO</th>
            <th scope="col">Full Name</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($orderUser as $os)
          <tr>
            <th scope="row">{{ 1 }}</th>

            <td>{{ $os->user->full_name }}</td>
            <td>{{ $os->user->username }}</td>
            <td>{{ $os->user->email }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
@endsection