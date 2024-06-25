@extends('layouts.admin')

@section('title', 'All orders')

@section('content')
    <div class="container">
        @include('admin.partials.session-message')
        <div class="dishes">
            <h2 class="mb-3">{{ $restaurant->name }}</h2>
            <div class="cols_heading">
                <div class="name">Customer Name</div>
                <div class="name">Date</div>
                <div class="name">Total Price</div>
                <div class="actions">Actions</div>
            </div>
            <div class="rows">
                @forelse ($orders as $order)
                    <div class="dish">
                        <div class="name">{{ $order->customer_name }} {{ $order->customer_lastname }}</div>
                        <div class="created_at">{{ $order->created_at }}</div>
                        <div class="price">{{ $order->total }} €</div>
                        <div class="actions text-start">
                            <a href="{{ route('admin.orders.show', $order) }}"><img width="23"
                                    src="{{ asset('img/icons/eye.png') }}" alt="eye icon" class="mobile_hidden"></a>
                        </div>
                    </div>
                @empty
                    <div class="no_dishes">
                        Sorry, no orders to show.
                    </div>
                @endforelse
            </div>
        </div>





    </div>


    </div>
@endsection
