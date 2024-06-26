<x-mail::message>
Hi, {{ $lead->name }}
{{-- Email: {{ $lead->email }} --}}

{{ $lead->restaurant_name }} let you know{{ $lead->message }}

<ul>
    @foreach ($order->dishes as $dish)
    <li>{{$dish->name}} pz. {{$dish->pivot->quantity}}</li>    
    @endforeach
</ul>

Total: {{$order->total}}

Thanks,

{{ config('app.name') }}
</x-mail::message>
