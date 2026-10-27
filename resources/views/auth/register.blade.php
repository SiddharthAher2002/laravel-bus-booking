@extends('layouts.frontend.aria')

@section('content')
<style>
    .auth-wrapper {
        background: linear-gradient(rgba(17, 52, 72, 0.78), rgba(17, 52, 72, 0.88)), url('{{ asset('AriaTheme/images/header-background.jpg') }}') center center no-repeat;
        background-size: cover;
        background-attachment: fixed;
        min-height: 100vh;
        padding-top: 7.5rem;
        padding-bottom: 5rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .auth-card {
        background: rgba(17, 52, 72, 0.94);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(20, 191, 152, 0.28);
        border-radius: 12px;
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.5);
        padding: 2.5rem 2.5rem 2rem 2.5rem;
        width: 100%;
        max-width: 520px;
        margin: 0 auto;
        color: #ffffff;
    }
    .auth-header {
        text-align: center;
        margin-bottom: 2rem;
    }
    .auth-header .badge-tag {
        display: inline-block;
        color: #14bf98;
        font: 700 0.8rem/1 "Montserrat", sans-serif;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 0.5rem;
    }
    .auth-header h2 {
        color: #ffffff;
        font: 700 1.85rem/2.2rem "Montserrat", sans-serif;
        margin-bottom: 0.4rem;
    }
    .auth-header p {
        color: #c1cace;
        font-size: 0.92rem;
        margin: 0;
    }
    .auth-form .form-group {
        margin-bottom: 1.25rem;
        position: relative;
    }
    .auth-form label {
        display: block;
        color: #dfe5ec;
        font: 600 0.85rem/1.2 "Montserrat", sans-serif;
        margin-bottom: 0.45rem;
        letter-spacing: 0.3px;
    }
    .input-icon-group {
        position: relative;
    }
    .input-icon-group .input-icon {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #14bf98;
        font-size: 0.95rem;
        z-index: 5;
    }
    .auth-form .form-control-custom {
        width: 100%;
        padding: 0.75rem 1rem 0.75rem 2.5rem;
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 6px;
        color: #ffffff;
        font-size: 0.95rem;
        transition: all 0.25s ease-in-out;
    }
    .auth-form .form-control-custom:focus {
        outline: none;
        background: rgba(255, 255, 255, 0.14);
        border-color: #14bf98;
        box-shadow: 0 0 10px rgba(20, 191, 152, 0.35);
        color: #ffffff;
    }
    .auth-form .form-control-custom::placeholder {
        color: rgba(223, 229, 236, 0.5);
    }
    .auth-form .form-control-custom.is-invalid {
        border-color: #ff6b6b;
        background: rgba(255, 107, 107, 0.08);
    }
    .auth-feedback {
        display: block;
        color: #ff7b7b;
        font-size: 0.8rem;
        margin-top: 0.35rem;
    }
    .btn-auth-submit {
        display: block;
        width: 100%;
        padding: 0.95rem 1.5rem;
        border: 2px solid #14bf98;
        border-radius: 6px;
        background-color: #14bf98;
        color: #ffffff;
        font: 700 0.875rem/1 "Montserrat", sans-serif;
        text-transform: uppercase;
        letter-spacing: 1px;
        text-align: center;
        cursor: pointer;
        margin-top: 1.5rem;
        transition: all 0.25s ease;
    }
    .btn-auth-submit:hover {
        background-color: transparent;
        color: #14bf98;
        text-decoration: none;
    }
    .auth-divider {
        height: 1px;
        background: rgba(255, 255, 255, 0.15);
        margin: 1.75rem 0 1.25rem 0;
    }
    .auth-switch-text {
        text-align: center;
        color: #c1cace;
        font-size: 0.9rem;
        margin: 0;
    }
    .auth-switch-text a {
        color: #14bf98;
        font-weight: 700;
        text-decoration: none;
        margin-left: 0.25rem;
        transition: color 0.2s;
    }
    .auth-switch-text a:hover {
        color: #1bd1a7;
        text-decoration: underline;
    }
    .admin-portal-link {
        text-align: center;
        margin-top: 1rem;
    }
    .admin-portal-link a {
        color: #8fa0ad;
        font-size: 0.8rem;
        text-decoration: none;
        transition: color 0.2s;
    }
    .admin-portal-link a:hover {
        color: #ffffff;
    }
</style>

<div class="auth-wrapper">
    <div class="container">
        <div class="auth-card">
            <div class="auth-header">
                <span class="badge-tag">JOIN BUS-BOOK</span>
                <h2>Create Account</h2>
                <p>Register to book seats and travel across destinations</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="auth-form">
                @csrf

                <div class="form-group">
                    <label for="name">Full Name</label>
                    <div class="input-icon-group">
                        <i class="fas fa-user input-icon"></i>
                        <input id="name" type="text" class="form-control-custom @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Your Full Name">
                    </div>
                    @error('name')
                        <span class="auth-feedback" role="alert">
                            <i class="fas fa-exclamation-triangle mr-1"></i> {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-icon-group">
                        <i class="fas fa-envelope input-icon"></i>
                        <input id="email" type="email" class="form-control-custom @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="name@example.com">
                    </div>
                    @error('email')
                        <span class="auth-feedback" role="alert">
                            <i class="fas fa-exclamation-triangle mr-1"></i> {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-icon-group">
                                <i class="fas fa-lock input-icon"></i>
                                <input id="password" type="password" class="form-control-custom @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="At least 8 chars">
                            </div>
                            @error('password')
                                <span class="auth-feedback" role="alert">
                                    <i class="fas fa-exclamation-triangle mr-1"></i> {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password-confirm">Confirm Password</label>
                            <div class="input-icon-group">
                                <i class="fas fa-check-double input-icon"></i>
                                <input id="password-confirm" type="password" class="form-control-custom" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat password">
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn-auth-submit">
                    <i class="fas fa-user-plus mr-2"></i> Register Now
                </button>

                <div class="auth-divider"></div>

                <p class="auth-switch-text">
                    Already have an account?
                    <a href="{{ route('login') }}">Sign In Here</a>
                </p>

                <div class="admin-portal-link">
                    <a href="{{ route('admin.login') }}">
                        <i class="fas fa-shield-alt mr-1"></i> Are you an Administrator? Sign in here
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
