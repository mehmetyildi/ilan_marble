@component('mail::message')
# {{ $name }}  Size bir mesaj gönderdi

{!! $body !!}

{{ $name }} <br>
<hr>

Departman: {{ $department }} <br>
Telefon: {{ $phone }} <br>
Email: {{ $email }} <br>

@endcomponent