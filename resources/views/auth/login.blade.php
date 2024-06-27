@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="container">

        <form class="form" method="POST" action="{{ route('login') }}">
            @csrf

            <div class="top">
                <div class="title">
                    <h5>{{ __('Login') }}</h5>
                    <hr>
                    <img src="{{ asset('img/logo-emblem.png') }}" alt="">
                </div>
                <div class="inputs">
                    <div class="form_input">
                        <label for="email">{{ __('E-Mail Address*') }}</label>
                        <div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form_input">
                        <label for="password">{{ __('Password*') }}</label>

                        <div>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="check_flex">
                        <div class="check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        <div class="d-flex align-items-end">
                            <span>* </span>
                            <h5> required fields</h5>
                        </div>

                    </div>
                </div>
            </div>
            <div class="bottom">
                <div class="forgot_password">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        {{-- <a href="{{ route('register') }}">
                            {{ __('Already have an account?') }}</a> --}}
                    @endif
                </div>
                <button type="submit" class="border-0 btn_primary">
                    <img class="me-2" src="{{ asset('img/icons/login.png') }}" alt="user icon">{{ __('Login') }}
                </button>
            </div>
        </form>
    </div>
@endsection
