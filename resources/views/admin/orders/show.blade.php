@extends('layouts.admin')

@section('title', "Order n.$order->id")

@section('content')

    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h1 class="mb-0">{{ $order->restaurant->name }}</h1>
            </div>
            <div class="card-body">
                <h2 class="card-title">Order n.{{ $order->id }}</h2>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h3>Customer:</h3>
                        <p>{{ $order->customer_name }} {{ $order->customer_lastname }}</p>
                    </div>
                    <div class="col-md-6">
                        <h3>To Deliver to:</h3>
                        <p>{{ $order->customer_address }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h3>Customer Telephone:</h3>
                        <p>{{ $order->customer_telephone }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Total: </strong>{{ $order->total }}€</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Date: </strong>{{ $order->created_at }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
