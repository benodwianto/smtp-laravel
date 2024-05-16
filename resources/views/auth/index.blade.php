@extends('layouts.main')

@section('container')
    <div class="row text-center justify-content-center">
        <div class="col-lg-4">
            <main class="form-signin">
                <form action="{{ url('login') }}" method="POST">
                    @csrf
                    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session()->has('logError'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            {{ session('logError') }}
                            <button type="button" class="btn-close me-1" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="form-floating mb-1">
                        <input type="email" name="email" class="form-control" id="floatingInput"
                            value="{{ old('email') }}" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="floatingPassword"
                            placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>

                    <div class="register mb-3 d-flex ms-2">
                        <label>
                            <a href="register">Register now</a>
                        </label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                </form>
            </main>
        </div>
    </div>
@endsection
