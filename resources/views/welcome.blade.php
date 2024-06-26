@extends('layouts.welcome')

@section('title', 'Home')

@section('content')
    <div class="welcome">
        <img class="gif" src="{{ asset('img/passing3.gif') }}" alt="app logo">



        <div class="text">
            <h1>
                Welcome to DeliveBoo
            </h1>
            <div class="mt-4 actions">
                @guest
                    <a href="{{ route('login') }}" class="btn_primary">{{ __('Login') }}</a>
                    <a href="{{ route('register') }}" class="btn_dark">{{ __('Register') }}</a>
                @else
                    <a href="{{ url('dashboard') }}" class="btn_primary">{{ __('Dashboard') }}</a>
                @endguest
            </div>
        </div>

        {{-- <p class="container m-auto">
            DeliveBoo is a home food buying and selling platform.
            Access the page to insert your menu and manage orders and sales statistics.
        </p> --}}

    </div>

@endsection
