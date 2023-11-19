@extends('layouts.main')

@section('container')
<main class="form-signin m-auto border p-4 rounded-3 shadow">
    <form class="/register" method="post">
      @csrf
      <h1 class="h3 mb-3 fw-normal">Please sign up</h1>

      <div class="row md-g-3 align-items-center">
        <div class="col-md">
          <div class="form-floating mt-3">            
              <input type="text" class="form-control @error('firstname')
                is-invalid
              @enderror" name="firstname" id="firstname" placeholder="First name" value="{{ old('firstname') }}" required>
              <label for="firstname">First name</label>
              @error('firstname')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>                
              @enderror
          </div>
        </div>
        <div class="col-md">
          <div class="form-floating mt-3">            
              <input type="text" class="form-control @error('lastname')
                is-invalid
              @enderror"  name="lastname" id="lastname" placeholder="Last name" value="{{ old('lastname') }}" required>
              <label for="lastname">Last name</label>
              @error('lastname')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>                
              @enderror
          </div>
        </div>
      </div>

      <div class="form-floating mt-3">
        <input type="text" class="form-control @error('username')
          is-invalid
        @enderror" name="username" id="username" placeholder="Username" value="{{ old('username') }}" required>
        <label for="username">Username</label>
        @error('username')
          <div class="invalid-feedback">
            {{ $message }}
          </div>                
        @enderror
      </div>

      <div class="form-floating mt-3">
        <input type="email" class="form-control @error('email')
          is-invalid
        @enderror" name="email" id="email" placeholder="name@example.com" value="{{ old('email') }}" required>
        <label for="email">Email address</label>
        @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>                
        @enderror
      </div>

      <div class="form-floating mt-3">
        <input type="password" class="form-control @error('password')
          is-invalid
        @enderror" name="password" id="password" placeholder="Password" required>
        <label for="password">Password</label>
        @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>                
        @enderror
      </div>

      <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Sign up</button>
    </form>
    <small class="d-block text-center mt-3">Have an account? <a href="/login">Sign in</a></small>
  </main>
@endsection