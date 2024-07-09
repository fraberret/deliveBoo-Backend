@extends('layouts.admin')

@section('title', "Order n.$order->id")

@section('content')

    <div class="container mt-5">
        <div class="py-4">
            <h1 class="mb-0">{{ $order->restaurant->name }}</h1>
            <hr class="my-4">
            <h2 class="my-4 customer-info">{{ $order->customer_name }} {{ $order->customer_lastname }}</h2>
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-unstyled">
                        <li class="my-3"><b>Address:</b> {{ $order->customer_address }}</li>
                        <li class="my-3"><b>Email:</b> {{ $order->customer_email }}</li>
                        <li class="my-3"><b>Phone:</b> {{ $order->customer_telephone }}</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5 class="fw-bold mb-3">Order Summary</h5>
                    <ul class="list-unstyled">
                        @foreach ($order->dishes as $dish)
                            <li class="my-2">
                                <span class="badge bg-secondary">{{ $dish->pivot->quantity }}x</span>
                                {{ $dish->name }}
                            </li>
                        @endforeach
                    </ul>
                    <ul class="list-unstyled">
                        <li><b>Total:</b> {{ $order->total }} &#8364;</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
