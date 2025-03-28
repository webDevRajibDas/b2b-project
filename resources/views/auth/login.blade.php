@extends('frontend.layouts.app')

@section('content')
    <div class="page-header">
        <div class="container d-flex flex-column align-items-center">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            My Account
                        </li>
                    </ol>
                </div>
            </nav>

            <h1>My Account</h1>
        </div>
    </div>

    <div class="container login-container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="row">
                    <div class="col-md-6">
                        <div class="heading mb-1">
                            <h2 class="title">Login</h2>
                        </div>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <label for="login-email">
                                Email
                                <span class="required">*</span>
                            </label>
                            <input type="email" class="form-input form-wide" name="email" value="{{ old('email') }}"
                                   id="login-email" required autocomplete="email" autofocus/>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <label for="login-password">
                                Password
                                <span class="required">*</span>
                            </label>

                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password" required
                                   autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                            <div class="form-footer">
                                <div class="custom-control custom-checkbox mb-0">
                                    <input type="checkbox" class="custom-control-input" id="lost-password"/>
                                    <label class="custom-control-label mb-0" for="lost-password">Remember
                                        me</label>
                                </div>

                                @if (Route::has('password.request'))
                                    <a class=" -password text-dark form-footer-right"
                                       href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-dark btn-md w-100">
                                LOGIN
                            </button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="heading mb-1">
                            <h2 class="title">Register</h2>
                        </div>

                        <form action="#">
                            <label for="register-email">
                                Email address
                                <span class="required">*</span>
                            </label>
                            <input type="email" class="form-input form-wide" id="register-email" required/>

                            <label for="register-password">
                                Password
                                <span class="required">*</span>
                            </label>
                            <input type="password" class="form-input form-wide" id="register-password"
                                   required/>

                            <div class="form-footer mb-2">
                                <button type="submit" class="btn btn-dark btn-md w-100 mr-0">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('styles')
    <style>
        .login-container {
            margin-top: 3.9rem
        }

        .login-container .heading .title {
            margin-bottom: 0;
            font-size: 2.2rem;
            letter-spacing: -0.01em
        }

        .login-container .custom-checkbox .custom-control-label:after {
            top: 1px
        }

        .login-container form {
            margin-bottom: 64px
        }

        .login-container form label {
            margin-bottom: 0.7rem;
            color: #777;
            font-family: "Open Sans", sans-serif;
            font-size: 1.4rem;
            font-weight: 400
        }

        .login-container form .form-input {
            margin-bottom: 1.7rem;
            padding-top: 0.8rem;
            padding-bottom: 0.8rem;
            border-color: #e7e7e7;
            line-height: 32px
        }

        .login-container form .btn {
            font-family: "Open Sans", sans-serif;
            font-size: 1.6rem
        }

        .login-container form .form-footer {
            margin-top: 1.8rem;
            margin-bottom: 2.8rem
        }

        .login-container .custom-checkbox {
            margin-top: 1px;
            padding-left: 2.5rem
        }

        .login-container .custom-checkbox .custom-control-label {
            margin-top: 2px;
            font-size: 1.2rem
        }

        .login-container .forget-password {
            font-size: 1.4rem;
            font-weight: 600
        }

        .login-container .forget-password:hover {
            text-decoration: underline
        }

        .login-container .col-md-6:first-child .form-footer {
            margin-top: 1.3rem
        }
    </style>
@endpush

