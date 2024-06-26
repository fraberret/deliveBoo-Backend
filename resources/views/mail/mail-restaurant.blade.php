<x-mail::message>
Hi, {{ $lead->restaurant_name }}

{{-- Email: {{ $lead->email }} --}}
<hr>

You have receveid one order from {{ $lead->name }}

Customer Email: {{$order->customer_email}}

Customer Address: {{$order->customer_address}}

Customer Telephone: {{$order->customer_telephone}}

<ul>
    @foreach ($order->dishes as $dish)
    <li>{{$dish->name}} pz. {{$dish->pivot->quantity}}</li>    
    @endforeach
</ul>

Total: {{$order->total}}





Thanks,

{{ config('app.name') }}
</x-mail::message>
