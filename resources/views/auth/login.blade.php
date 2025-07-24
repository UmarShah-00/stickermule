@extends('layouts.custom-master')

@section('styles')
<!-- Custom styles can be added here -->
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center authentication authentication-basic vh-100">
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">

            <div class="my-4 d-flex justify-content-center">
                {{-- 
                <a href="{{ url('index') }}">
                    <img src="{{ asset('build/assets/images/brand-logos/desktop-logo.png') }}" alt="Light Logo" class="desktop-logo">
                    <img src="{{ asset('build/assets/images/brand-logos/desktop-dark.png') }}" alt="Dark Logo" class="desktop-dark d-none">
                </a> 
                --}}
            </div>

            <div class="card custom-card shadow-sm">
                <div class="card-body p-4">
                    <h5 class="fw-semibold text-center mb-2">Stiker Mule</h5>
                    <p class="text-muted text-center mb-4">Sign in to manage your stiker mule</p>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Input -->
                        <div class="mb-3">
                            <label for="user-email" class="form-label">{{ __('Email Address') }}</label>
                            <input type="email" id="user-email" name="email" class="form-control" 
                                   placeholder="admin@example.com" value="{{ old('email') }}" 
                                   required autocomplete="email" autofocus>
                        </div>

                        <!-- Password Input -->
                        <div class="mb-3">
                           <div class="d-flex justify-content-between">
                             <label for="password" class="form-label">{{ __('Password') }}</label>
                            <a href="{{ route('forget.password.get') }}">Forgot Password?</a>
                           </div>
                            <input type="password" id="password" name="password" class="form-control" 
                                   placeholder="••••••" required autocomplete="current-password">
                        </div>
                         <!-- Recapcha -->
                         <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                                        @if ($errors->has('g-recaptcha-response'))
                                            <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                        @endif
                                    </div>  
                                </div>

                        <!-- Remember Me -->
                        <div class="mb-3 form-check mt-2">
                            <input type="checkbox" class="form-check-input" id="remember"
                                   name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Sign In') }}
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" 
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14"/>
                                    <path d="m12 5 7 7-7 7"/>
                                </svg>
                            </button>

                            <!-- Security Info -->
                            <div class="mt-2 pt-6 border-top text-center text-sm text-gray-500">
                                <div class="mt-2 d-flex justify-content-center align-items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" 
                                         viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/>
                                    </svg>
                                    <span>Protected by advanced security</span>
                                </div>
                                <div class="mt-1">Secure Login</div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('build/assets/show-password.js') }}"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>


@endsection
