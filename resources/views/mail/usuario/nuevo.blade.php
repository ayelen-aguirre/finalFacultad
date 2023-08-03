@component('mail::message')
# Blog de Laravel

@component('mail::panel')
**{{ $user->created_at }}**: Se creó el usuario {{ $user->name }}.
Ya puede ingresar al Sistema.
@endcomponent

@component('mail::button', ['url' => $url])
ISFT N° 38
@endcomponent

Saludos,<br>
{{ config('app.name') }}
@endcomponent
