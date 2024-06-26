<x-mail::message>
Hi, {{ $lead->restaurant_name }}

{{-- Email: {{ $lead->email }} --}}
<hr>

You have receveid one order from {{ $lead->name }}

Customer Email: {{$order->customer_email}}

Customer Address: {{$order->customer_address}}

Customer Telephone: {{$order->customer_telephone}}

Dishes: {{$emailData['dish']}} pz. {{$emailData['quantity']}}

Total: {{$order->total}}





Thanks,

{{ config('app.name') }}
</x-mail::message>
