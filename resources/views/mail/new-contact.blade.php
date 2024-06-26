<x-mail::message>
<h2>Hi, {{ $lead->name }}</h2>

<p>{{ $lead->restaurant_name }} wants to let you know:</p>
<p>{{ $lead->message }}</p>

<h3>Order Details:</h3>
<ul>
    @foreach ($order->dishes as $dish)
        <li>{{ $dish->name }} - {{ $dish->pivot->quantity }} pz.</li>
    @endforeach
</ul>

<p><strong>Total:</strong> {{ $order->total }}€</p>

<p>Thanks,</p>
<p>{{ config('app.name') }}</p>
</x-mail::message>
