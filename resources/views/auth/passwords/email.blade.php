@extends('master')

@section('content')
<div class="auth-wrapper auth-basic px-2">
    <div class="auth-inner my-2">
        <!-- Forgot Password basic -->
        <div class="card mb-0">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <div class="card-body">
                <a href="{{ route('home') }}" class="brand-logo">

                    <h2 class="brand-text text-primary ms-1">Vaidic Yoddha</h2>
                </a>

                <h4 class="card-title mb-1">Forgot Password? 🔒</h4>
                <p class="card-text mb-2">Enter your email and we'll send you instructions to reset your password</p>

                <form class="auth-forgot-password-form mt-2" action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div class="mb-1">
                        <label for="forgot-password-email" class="form-label">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                    </div>
                    <button class="btn btn-primary w-100" tabindex="2"> {{ __('Send Password Reset Link') }}  </button>
                </form>

                <p class="text-center mt-2">
                    <a href="{{ route('login') }}"> <i data-feather="chevron-left"></i> Back to login </a>
                </p>
            </div>
        </div>
        <!-- /Forgot Password basic -->
    </div>



    @endsection
