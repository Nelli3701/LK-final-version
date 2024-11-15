@extends('layouts.default')

@section('title', 'Спасибо за заявку!')

@section('description', 'Спасибо за вашу заявку! Свяжемся с вами в ближайшее время. Logic Kitchen')

@section('page-content')
@php
$hideTitle = true; // Скрываем на этой странице заголовок из родительского шаблона
@endphp
<div class="blue-background">
    <div class="page-content">
        <h1 class="container">Спасибо за вашу заявку!</h1>
        <p class="service-page container">Мы свяжемся с вами в ближайшее время.</p>
    </div>
</div>
@stop