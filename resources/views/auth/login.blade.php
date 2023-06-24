@extends('layouts.app')

@section('content')
    <div class="auth-form">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h2>{{ __('Login') }}</h2>
            <div class="form-group">
                <label for="email">{{ __('E-Mail Address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary btn-lg">{{ __('Login') }}</button>
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </form>
    </div>
@endsection

@section('styles')
    <style>
        .auth-form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .auth-form h2 {
            margin-top: 0;
            margin-bottom: 20px;
            font-weight: bold;
            text-align: center;
            font-size: 32px;
        }

        input[type="email"],
        input[type="password"] {
            display: block;
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 .2rem rgba(0,123,255,.25);
        }

        .form-check-input {
            position: absolute;
            margin-top: .3rem;
            margin-left: -1.25rem;
        }

        .form-check-label {
            padding-left: 1.5rem;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            width: 100%;
            transition: background-color ease-in-out .15s, border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-link {
            color: #007bff;
        }

        .btn-link:hover {
            color: #0056b3;
            text-decoration: underline;
        }
    </style>
@endsection
