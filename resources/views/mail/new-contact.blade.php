<x-mail::message>
Hi, {{ $lead->name }}

{{-- Email: {{ $lead->email }} --}}
<hr>

Il ristorante ti avvisa che {{ $lead->message }}

Thanks,

{{ config('app.name') }}
</x-mail::message>
