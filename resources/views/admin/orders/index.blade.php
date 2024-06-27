@extends('layouts.admin')

@section('title', 'All orders')

@section('content')
    <div class="container">
        @include('admin.partials.session-message')
        <div class="banner">
            <div class="text">
                <h6>orders</h6>
                <h2>See all your orders here!</h2>
            </div>
        </div>
        <div class="orders">
            @if (count($orders) > 0)
                <div class="title mb-5 d-flex justify-content-between align-items-center">
                    <h2>{{ $restaurant->name }}</h2>
                    <div class="total_orders">
                        <div class="d-flex align-items-center">
                            <span>total orders:</span> <span>{{ count($orders) }}</span>
                        </div>
                    </div>
                </div>
                <div class="cols_heading">
                    <div class="name">Customer Name</div>
                    <div class="date">Date</div>
                    <div class="price">Total Price</div>
                    <div class="actions">Review Order</div>
                </div>
            @endif
            <div class="rows">
                @forelse ($orders as $order)
                    <div class="order">
                        <div class="name">{{ $order->customer_name }} {{ $order->customer_lastname }}</div>
                        <div class="date">{{ $order->created_at }}</div>
                        <div class="price">{{ $order->total }} €</div>
                        <div class="actions">
                            <a href="{{ route('admin.orders.show', $order) }}">
                                <img width="23" src="{{ asset('img/icons/eye.png') }}" alt="eye icon"><span>View</span>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="no_orders">
                        Sorry, no orders to show.
                    </div>
                @endforelse
            </div>
        </div>





    </div>


    </div>
@endsection
