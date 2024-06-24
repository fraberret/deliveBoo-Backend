<x-mail::message>
Introduction
Sender: {{ $lead->name }}

Email: {{ $lead->email }}

Message

{{ $lead->message }}

Thanks,

{{ config('app.name') }}
</x-mail::message>
