@extends('layouts.default')

@section('title', 'Ошибка 404')

@section('description', 'Страница не найдена')

@section('page-content')
@php
$hideTitle = true; // Скрываем на этой странице заголовок из родительского шаблона
@endphp
<div class="blue-background">
    <div class="page-content">
        <h1 class="container" style="text-align: center" ;>Упс! Похоже, вы заблудились…</h1>
        <p class="service-page container">Мы не смогли найти страницу, которую вы искали. Возможно, она потерялась за углом вашей идеальной кухни. Вы можете:</p>
        <ul class="service-page container">
            <li>Вернуться на <a href="{{ url('/') }}">главную страницу</a> и начать путь к своему идеальному кухонному гарнитуру.</li>
            <li>Посмотреть нашу <a href="{{ url('/#projects') }}">галерею работ</a>, чтобы вдохновиться новыми идеями.</li>
            <li>Или позвонить нам, и мы с радостью поможем вам найти нужную информацию!</li>
        </ul>
    </div>
</div>
@stop