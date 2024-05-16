@extends('layouts.main')

@section('container')
    <div class="row text-center justify-content-center">
        <div class="col-lg-4">
            <main class="form-signin">
                <form action="{{ url('register') }}" method="POST">
                    @csrf
                    <h1 class="h3 mb-3 fw-normal">Registration</h1>

                    <div class="form-floating mb-1">
                        <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Bambang"
                            value="{{ old('username') }}">
                        <label for="floatingInput">Username</label>
                        @error('username')
                            <div class="is-invalid">
                                <span class="text-danger">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-1">
                        <input type="email" name="email" class="form-control @error('is-invalid') @enderror"
                            id="floatingInput" value="{{ old('email') }}" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                        @error('email')
                            <div class="is-invalid">
                                <span class="text-danger">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-1">
                        <input type="password" name="password" class="form-control" id="floatingPassword"
                            value="{{ old('password') }}" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                        @error('password')
                            <div class="is-invalid">
                                <span class="text-danger">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-1">
                        <input type="password" name="password_confirmation" class="form-control" id="floatingPassword"
                            value="{{ old('password') }}" placeholder="Password">
                        <label for="floatingPassword">Konfirmasi Password</label>
                        @error('password_confirmation')
                            <div class="is-invalid">
                                <span class="text-danger">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="register mb-3 d-flex ms-2">
                        <label>
                            <a href="login" class="text-decoration-none">already have account</a>
                        </label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
                </form>
            </main>
        </div>
    </div>
@endsection
