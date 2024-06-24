@extends('layouts.admin')

@section('title', 'All orders')

@section('content')
    <div class="container">
        @include('admin.partials.session-message')
        <div class="dishes">
            <div class="cols_heading">
                <div class="name">Restaurant</div>
                <div class="name">Date</div>
                <div class="name">Total Price</div>
                <div class="name">Customer Name</div>
                <div class="actions">Actions</div>
            </div>
            <div class="rows">
                @forelse ($orders as $order)
                    <div class="dish">
                        <div class="name">{{ $order->restaurant->name }}</div>
                        <div class="name">{{ $order->created_at }}</div>
                        <div class="price">{{ $order->total }} €</div>
                        <div class="name">{{ $order->customer_name }} {{ $order->customer_lastname }}</div>
                        <div class="actions">
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

            @if ($orders->hasPages())
                <div class="bottom">
                    <div class="pagination">
                        {{ $orders->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            @else
                <div class="bottom_no_pagination">
                </div>
            @endif
        </div>





    </div>


    </div>
@endsection
