<x-mail::message>
    Hi, {{ $lead->name }}

    {{-- Email: {{ $lead->email }} --}}
    <hr>

    Il {{ $lead->restaurant_name }} ti avvisa che {{ $lead->message }}

    Thanks,

    {{ config('app.name') }}
</x-mail::message>
