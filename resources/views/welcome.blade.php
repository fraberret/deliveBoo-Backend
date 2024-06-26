@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <div class="jumbotron p-5 mb-4">
        <div class="container py-5">
            <div class="d-flex align-items-center">
                <h2 class="display-3 text-secondary fw-thin me-3">
                    Welcome to
                </h2>

                <div class="logo_laravel ps-2">
                    <img width="300" src="{{ asset('img/logo-deliveboo-back.png') }}" alt="app logo">
                </div>
            </div>

            <p class="col-md-8 fs-4">
                DeliveBoo is a home food buying and selling platform.
                Access the page to insert your menu and manage orders and sales statistics.
            </p>
            @guest
                <a href="{{ route('login') }}" class="btn btn-secondary">{{ __('Login') }}</a>
                <a href="{{ route('register') }}" class="btn btn-secondary">{{ __('Register') }}</a>
            @else
                <a href="{{ url('dashboard') }}" class="btn btn-secondary">{{ __('Dashboard') }}</a>
            @endguest
        </div>
    </div>

@endsection
