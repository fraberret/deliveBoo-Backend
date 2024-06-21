@extends('layouts.admin')

@section('title', "Order n.$order->id")

@section('content')

    <div class="container">
        <h1>{{ $order->restaurant->name }}</h1>
        <h2>Order n.{{ $order->id }}</h2>
        <h3>Customer: {{ $order->customer_name }} {{ $order->customer_last_name }}</h3>
        <h3>To Deliver to: {{ $order->customer_address }}</h3>
        <h3>Customer Telephone {{ $order->customer_telephone }}</h3>
        <p><strong>Total: </strong>{{ $order->total }}€</p>
        <p><strong>Date: </strong>{{ $order->date }}</p>




    </div>

@endsection
