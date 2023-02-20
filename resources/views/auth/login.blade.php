@extends('layouts.auth')

@push('style')
{{-- Template --}}
<link rel="stylesheet" href="{{ asset("template/css/app.css") }}">
@endpush

@section('content')

<main>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                <div class="d-flex justify-content-center py-4">
                <a href="" class="logo d-flex align-items-center w-auto">
                    <img src="{{asset('img/logo.png')}}" alt="" class="img">
                    <span class="d-none d-lg-block">CyberMedia Center</span>
                </a>
                </div><!-- End Logo -->

                <div class="card mb-3">

                <div class="card-body">

                    <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                    </div>

                    <form method="POST" action="{{ route('auth.login') }}" class="row g-3 needs-validation" id="login-form">
                        @csrf

                    <div class="col-12">
                        <label for="username" class="form-label">Username</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text">
                                <i class="bi bi-person-circle"></i>
                            </span>
                            <input type="text" name="username" class="form-control" id="username" required>
                            <div class="invalid-feedback">Please enter your username.</div>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="remember_me">
                        <label class="form-check-label" for="remember_me">Remember me</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit" id="login-form-button">Login</button>
                    </div>
                    </form>

                </div>
                </div>

                <div class="credits">
                Designed by <a href="">CyberMedia Center</a>
                </div>

            </div>
            </div>
        </div>

        </section>

    </div>
</main><!-- End #main -->
@endsection

@push('script')
<script type="module" src="{{ asset('js/auth/login.js') }}"></script>
@endpush
