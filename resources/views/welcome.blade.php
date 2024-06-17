@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <div class="jumbotron p-5 mb-4 bg-light">
        <div class="container py-5">
            <div class="d-flex align-items-center">
                <h2 class="display-3 fw-bold">
                    Welcome to
                </h2>

                <div class="logo_laravel ps-2">
                    <img src="{{ asset('img/logo-deliveboo.png') }}" width="200px" alt="app logo">
                </div>
            </div>

            <p class="col-md-8 fs-4">
                DeliveBoo is a home food buying and selling platform.
                Access the page to insert your menu and manage orders and sales statistics.
            </p>

            <a href="{{ route('login') }}" class="btn btn-secondary">{{ __('Login') }}</a>
            <a href="{{ route('register') }}" class="btn btn-secondary">{{ __('Register') }}</a>
        </div>
    </div>

@endsection
