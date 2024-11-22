<x-mail::message>
# Eduventure

Berikut adalah informasi login untuk peserta {{ $participant->name }}:

Nama : {{ $participant->name }}

Login ID : {{ $participant->login_id }}

Password : secret1234

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
