@extends('layouts.custom-master')

@section('styles')
@endsection

@section('content')

<div class="container-lg">
    <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
            <div class="my-5 text-center">
                <a href="{{ url('index') }}">
                    <img src="{{ asset('build/assets/images/brand-logos/desktop-logo.png') }}" alt="Logo" class="desktop-logo">
                    <img src="{{ asset('build/assets/images/brand-logos/desktop-dark.png') }}" alt="Dark Logo" class="desktop-dark">
                </a>
            </div>
            <div class="card custom-card">
                <div class="card-body p-5">
                    <h5 class="fw-semibold text-center">Sign Up</h5>
                    <p class="text-muted op-7 fw-normal text-center">Welcome! Join us by creating a free account.</p>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary w-100">Register</button>
                        </div>
                    </form>

                    <div class="text-center mt-3">
                        <p class="fs-12 text-muted">Already have an account? 
                            <a href="{{ route('login') }}" class="text-primary">Sign In</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{asset('build/assets/show-password.js')}}"></script>
@endsection
