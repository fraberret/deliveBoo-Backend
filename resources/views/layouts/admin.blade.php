<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Deliveboo | @yield('title', config('app.name'))</title>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light py-4 mb-5">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <div class="logo_laravel ps-2">
                        <img width="180" src="{{ asset('img/logo-deliveboo-back.png') }}" alt="app logo">
                    </div>
                    {{-- config('app.name', 'Laravel') --}}
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link nav_link px-4 {{ Request::is('dashboard') ? 'current_page' : '' }}"
                                href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav_link px-4 {{ Request::is('admin/dishes') ? 'current_page' : '' }}"
                                href="{{ route('admin.dishes.index') }}">{{ __('Dishes') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav_link px-4 {{ Request::is('admin/orders') ? 'current_page' : '' }}"
                                href="{{ route('admin.orders.index') }}">{{ __('Orders') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav_link px-4  {{ Request::is('admin/statistics') ? 'current_page' : '' }}"
                                href="{{ route('admin.statistics.index') }}">{{ __('Statistics') }}</a>
                        </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav text-end align-end">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown d-flex align-items-center justify-content-center">
                                <a id="navbarDropdown"
                                    class="nav-link user_nav_link d-flex align-items-center dropdown-toggle" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    v-pre>
                                    <span class="auth_name">{{ Auth::user()->name }}</span>
                                </a>
                                {{-- <div class="auth_avatar">
                                    <div class="auth_avatar_circle"></div>
                                </div> --}}

                                <div class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-white custom-hover"
                                        href="{{ url('dashboard') }}">{{ __('Dashboard') }}</a>
                                    <a class="dropdown-item text-white custom-hover"
                                        href="{{ url('profile') }}">{{ __('Profile') }}</a>
                                    <a class="dropdown-item text-white custom-hover" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>

    </div>
</body>

</html>
