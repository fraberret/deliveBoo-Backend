@extends('layouts.admin')

@section('title', "Order n.$order->id")

@section('content')

    <div class="container mt-5">
        <div class="card card-order text-white">
            <div class="card-header text-white">
                <h1 class="mb-0">{{ $order->restaurant->name }}</h1>
            </div>
            <div class="card-body">
                <h2 class="my-4">{{ $order->customer_name }} {{ $order->customer_lastname }}</h2>
                <div class="row">
                    <div class="col-md-8">
                        <ul class="list-unstyled lh-lg">
                            <li><b>Address:</b> {{ $order->customer_address }}</li>
                            <li><b>Email:</b> {{ $order->customer_email }}</li>
                            <li><b>Phone:</b> {{ $order->customer_telephone }}</li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h5 class="fw-semibold">Order Summary</h5>

                        <ul class="list-unstyled lh-lg dishes-list">

                            @foreach ($order->dishes as $dish)
                                {{-- <h6>@dd($dish->pivot->quantity)</h6> --}}

                                <h6>Pz. {{ $dish->pivot->quantity }} {{ $dish->name }}</h6>
                            @endforeach

                        </ul>

                        <ul class="list-unstyled lh-lg">
                            <li><b>Total:</b> {{ $order->total }} &#8364;</li>
                        </ul>

                    </div>
                </div>
            </div>

        </div>






    </div>
    </div>

    <div class="container">


    </div>
    </div>


@endsection
