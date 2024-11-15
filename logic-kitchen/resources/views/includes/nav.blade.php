@php
$menuItems = [
['name' => 'Проекты', 'link' => '/#projects'],
['name' => 'Материалы', 'link' => '/#materials'],
['name' => 'Калькулятор', 'link' => '/#calc'],
['name' => 'Отзывы', 'link' => '/#reviews'],
['name' => 'FAQ', 'link' => '/#faq'],
['name' => 'Контакты', 'link' => 'contacts'],
];
@endphp
<ul class="navbar-list container">
    @foreach($menuItems as $item)
    @if (!request()->is($item['link']))
    <li class="navbar-list-item">
        <a href="{{ $item['link'] }}" class="navbar-link">
            {{ $item['name'] }}
        </a>
    </li>
    @else
    <li class="navbar-list-item">
        <span href="{{ $item['link'] }}" class="navbar-link navbar-link-active">
            {{ $item['name'] }}
        </span>
    </li>
    @endif
    @endforeach
</ul>
<!--Кнопка закрыть меню-->
<button class="btn-close active-btn"></button>