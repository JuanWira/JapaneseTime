@extends('layouts.main')
@section('container')
<div class="third-content">
    <div class="row justify-content-center marx">
        <div class="col-md-4">
            <main class="form-signin w-100 m-auto">
                <div class="card mar">
                    @if (session()->has('loginError'))
                        <div class="alert alert-danger alert-dismissible show" role="alert">
                            {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <h1 class="h3 mb-3 fw-normal text-center text-white mt-3 mb-4">Admin</h1>
                    <form action="/login" method="post">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" name = "username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" autofocus required value="{{ old('username') }}">
                        <label for="username" class="float">Username</label>
                        @error('username')
                            <div class="invalid-feedback" style="font-size: 1.1rem">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                  
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                        <label for="password" class="float">Password</label>
                    </div>
                    <button class="btn btn-primary w-100 py-2 mb-4 btn-lg mt-1" type="submit">Access</button>
                    </form>
                    <img class="admin-img mx-auto d-block" src="assets/img/cutes.png" alt="cute">
                </div>
            </main>
        </div>
    </div>
</div>
@endsection