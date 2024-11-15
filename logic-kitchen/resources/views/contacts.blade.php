@extends('layouts.default')

@section('title', 'Контакты студии Logic Kitchen в Екатеринбурге')

@section('description', 'Студия по проектированию и изготовлению кухонь на заказ')

@section('page-content')
<div class="contacts container">
    <p><b>Телефон:</b> <a href="tel:{{ $phone }}">{{ $phone }}</a></p>
    <p><b>E-mail:</b> <a href="mailto:{{ $email }}">{{ $email }}</a></p>
    <p><b>WhatsApp:</b> <a href="{{ $whatsapp }}" target="_blank">8-912-607-16-19</a></p>
    <p><b>Telegram:</b> <a href="{{ $telegram }}" target="_blank">@logic_kitchen</a></p>
    <p><b>VK:</b> <a href="{{ $vk }}" target="_blank">{{ $vk }}</a></p>
</div>
@stop