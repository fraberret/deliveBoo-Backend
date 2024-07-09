@extends('layouts.admin')

@section('title', 'Dashboard')


@section('content')
    <div class="container">

        <div class="banner d-flex">
            <div class="text">
                <h6>{{ __('User Dashboard') }}</h6>

                @if (session('status'))
                    {{ session('status') }}
                @endif

                <h3 class="fw-bold"> {{ __('You are logged in!') }}</h3>


                <h6 class="dash-info mt-5">
                    <a class="text-decoration-none" style="color: var(--boo-primary)" href="{{ route('admin.orders.index') }}">
                        You have <span style="color: white">{{ $totalOrders }}</span> orders
                    </a>
                </h6>
                <h6 class="dash-info mt-5">
                    <a href="{{ route('admin.dishes.index') }}" class="text-decoration-none"
                        style="color: var(--boo-primary)">
                        You currently have <span style="color: white">{{ count($dishes) }}</span> dishes
                    </a>
                </h6>
                <div class="dishes-box-dash d-flex justify-content-center mt-3">
                    <a style="padding: 1rem;" href="{{ route('admin.dishes.create') }}"
                        class="btn_primary text-decoration-none">
                        Create a new one
                    </a>
                </div>
                <h6 class="dash-info mt-5">
                    <a class="text-decoration-none" style="color: var(--boo-primary)"
                        href="{{ route('admin.statistics.index') }}">
                        see the statistics
                    </a>
                </h6>


            </div>
            <div class="info">
                <ul class="list-unstyled text-center">
                    <li class="fw-semibold fs-4">

                        <div class="restaurant_image mb-2">
                            @if ($restaurant->logo)
                                @if (Str::startsWith($restaurant->logo, 'https://'))
                                    <img class="rounded-3" width="100" src="{{ $restaurant->logo }}" alt="">
                                @elseif (Str::startsWith($restaurant->logo, '/img/'))
                                    <img class="rounded-3" width="100" src="{{ asset($restaurant->logo) }}"
                                        alt="">
                                @else
                                    <img class="rounded-3" width="100" src="{{ asset('storage/' . $restaurant->logo) }}"
                                        alt="">
                                @endif
                            @else
                                <img class="rounded-3" width="100" src="{{ asset('img/default.png') }}" alt="">
                            @endif
                        </div>
                        <h3>{{ $restaurant->name }}</h3>
                    </li>
                    <li>
                        @foreach ($restaurant->cousines as $cousine)
                            <small class="badge bg-light text-dark fw-normal ms-2 mb-2">{{ $cousine->name }}</small>
                        @endforeach
                    </li>
                    <li>
                        {{ $restaurant->telephone_number }}
                    </li>
                    <li>
                        {{ $restaurant->address }}
                    </li>
                    <li>
                        <b>VAT:</b> {{ $restaurant->piva }}
                    </li>
                    <hr>
                    <li>
                        <h6> {{ $restaurant->user->name }}</h6>
                    </li>
                    <li>
                        {{ $restaurant->user->email }}
                    </li>
                </ul>

            </div>

        </div>




    </div>
@endsection
