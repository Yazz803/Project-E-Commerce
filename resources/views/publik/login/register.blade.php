@extends('publik.login.layout.main')

@section('content')
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Register | Daftar Akun</h3>

            <form action="{{ route('register.store') }}" method="POST">
                @csrf
                <div class="form-outline mb-4">
                  <input type="text" name="full_name" id="typeEmailX-2" class="form-control form-control-lg" />
                  <label class="form-label" for="typeEmailX-2">Full Name</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" name="username" id="typeEmailX-2" class="form-control form-control-lg" />
                  <label class="form-label" for="typeEmailX-2">username</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" name="email" id="typeEmailX-2" class="form-control form-control-lg" />
                  <label class="form-label" for="typeEmailX-2">Email</label>
                </div>
    
                <div class="form-outline mb-4">
                  <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg" />
                  <label class="form-label" for="typePasswordX-2">Password</label>
                </div>
    
                <button class="btn btn-primary btn-lg btn-block" type="submit">Sign Up</button>
    
                <p class="mt-3">Sudah punya akun? <a href="{{ route('login.index') }}">Login</a></p>
                <a href="{{ route('pages.index') }}" class="btn btn-success ">Back to Home</a>
              </div>
            </form>
            
        </div>
      </div>
    </div>
  </div>
</section>
@endsection