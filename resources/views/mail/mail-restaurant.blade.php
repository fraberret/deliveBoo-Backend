<x-mail::message>
<h2>Hi, {{ $lead->restaurant_name }}</h2>

<p>You have received an order from {{ $lead->name }}.</p>

<h3>Order Details:</h3>
<ul>
    @foreach ($order->dishes as $dish)
        <li>{{ $dish->name }} - {{ $dish->pivot->quantity }} pz.</li>
    @endforeach
</ul>

<h3>Customer Details:</h3>
<ul>
    <li><strong>Email:</strong> {{ $order->customer_email }}</li>
    <li><strong>Address:</strong> {{ $order->customer_address }}</li>
    <li><strong>Telephone:</strong> {{ $order->customer_telephone }}</li>
</ul>

<p><strong>Total:</strong> {{ $order->total }}€</p>

<hr>

<p>Thank you for using {{ config('app.name') }}.</p>
</x-mail::message>
