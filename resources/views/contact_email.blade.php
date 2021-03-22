@component('mail::message')
    {{$subject}}

    {{$message}}

    Kindly contact me via {{$phone_number}} or {{$email}}

    Thanks,
    {{$fullname}}

    {{ config('app.name') }}
@endcomponent
