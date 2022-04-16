@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
  <div class="col-md-4">

    <main class="form-signin">
      <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
      <div class="text-center">
      <img class="mb-3 center-block" src="assets/img/logoin.png" alt="" width="72" height="72">
      </div>
      @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
       @endif

       @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
       @endif
      <form action="/login" method="POST">
        @csrf
        <div class="form-floating">
          <input type="username" name="username" class="form-control rounded-top @error('username') is-invalid @enderror" id="username" placeholder="username Address" autofocus required value="{{ old('username') }}">
          <label for="username">Username</label>
          @error('username')
          <div class="invalid-feedback">
          {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control rounded-bottom" id="password" placeholder="Password" required>
          <label for="password">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
      </form>

      <small class="d-block text-center mt-3">Not Registered? <a href="/register">Register Here!</a></small>
    </main>
    
  </div>
</div>

  
    
@endsection