@extends('frontend.layouts.app')

@section('content')

    <div class="form-box">
        <div class="form-container">
            <p class="title">Register</p>
            <form class="form" action="{{route('register')}}" method="post">
                @csrf

                <input id="name" type="text" class="input @error('name') is-invalid @enderror" name="name"
                       value="{{ old('name') }}" required autocomplete="name" placeholder="Full Name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <input id="email" type="text" class="input @error('email') is-invalid @enderror" name="email"
                       value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror


                <input id="password" type="text" class="input @error('password') is-invalid @enderror" name="password"
                       value="{{ old('password') }}" required autocomplete="password" placeholder="Password" autofocus>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <input id="password-confirm" type="password" class="form-control input" name="password_confirmation" required autocomplete="new-password" placeholder="Password">

                <button class="form-btn">Sign up</button>
            </form>
            <p class="sign-up-label">
                Already have an account ? <a href="{{route('login')}}"><span class="sign-up-link">Login</span></a>
            </p>
        </div>
    </div><!-- End .form-box -->


@endsection

@push('styles')
    <style>

        .form-container {
            height: auto;
            background-color: #fff;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            border-radius: 10px;
            box-sizing: border-box;
            padding: 20px 30px;
            margin: 35px;
        }

        .title {
            text-align: center;
            font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
            "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
            margin: 10px 0 30px 0;
            font-size: 28px;
            font-weight: 800;
        }

        .form {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 18px;
            margin-bottom: 15px;
        }

        .input {
            border-radius: 20px;
            border: 1px solid #c0c0c0;
            outline: 0 !important;
            box-sizing: border-box;
            padding: 12px 15px;
        }


        .form-btn {
            padding: 10px 15px;
            font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
            "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
            border-radius: 20px;
            border: 0 !important;
            outline: 0 !important;
            background: teal;
            color: white;
            cursor: pointer;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        .form-btn:active {
            box-shadow: none;
        }

        .sign-up-label {
            margin: 0;
            font-size: 10px;
            color: #747474;
            font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
            "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
        }

        .sign-up-link {
            margin-left: 1px;
            font-size: 11px;
            text-decoration: underline;
            text-decoration-color: teal;
            color: teal;
            cursor: pointer;
            font-weight: 800;
            font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
            "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
        }

    </style>
@endpush

