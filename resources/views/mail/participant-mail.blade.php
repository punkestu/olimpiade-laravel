<x-mail::message>
# Introduction

The body of your message.

Nama : {{ $participant->name }}

Login ID : {{ $participant->login_id }}

Password : secret1234

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
