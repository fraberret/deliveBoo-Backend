@extends('layouts.admin')

@section('title', 'All orders')

@section('content')
    <div class="container">
        @include('admin.partials.session-message')
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Restaurant</th>
                        <th scope="col">Date</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <td scope="row">{{ $order->restaurant->name }}</td>
                            <td>{{ $order->date }}</td>
                            <td>{{ $order->total }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>
                                <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-primary btn-sm">Show</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No orders available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>


    </div>
@endsection
