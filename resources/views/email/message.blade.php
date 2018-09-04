@component('mail::message')
    @component('mail::panel')
        <strong style="text-transform: uppercase">Имя отправителя:</strong> {{$name}} <br>
        <strong style="text-transform: uppercase">Компания отправителя:</strong> {{$company}} <br>
        <strong style="text-transform: uppercase">E-mail отправителя:</strong> {{$email}} <br>
        <strong style="text-transform: uppercase">Номер телефона отправителя:</strong> {{$phone}} <br>
        <strong style="text-transform: uppercase">Сообщение:</strong> <br>{{$message}}
    @endcomponent
@endcomponent
