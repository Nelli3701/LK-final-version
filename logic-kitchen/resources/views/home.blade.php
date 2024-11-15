@extends('layouts.default')

@section('title', 'Заказать кухонный гарнитур по своим размерам недорого в Екатеринбурге - Logic Kitchen')

@section('description', 'Изготовим кухонный гарнитур по вашему проекту или же разработаем проект для вас с учётом ваших пожеланий')

@section('page-content')
<div class="main-banner">


    <div class="banner-text ">
        <h1 class="main-banner-text text-shadow container">Кухонные гарнитуры на&nbsp;заказ в&nbsp;Екатеринбурге</h1>
        <div class="banner-desc text-shadow container">Ваша идея - наша реализация</div>
        <div class="banner-desc text-shadow container">Современные технологии и элегантный дизайн</div>
    </div>
</div>
<section class="light-background">

    <h2 class="landing">Виды гарнитуров</h2>
    <div class="cat-list container"></div>
</section>
<section class="dark-background">
    <h2 class="landing">Преимущества</h2>
    <div class="advantages container">
        <div class="advantages-part">
            <div class="advantage"><img src="img/quality.svg" alt="качество">
                <div class="advantage-text">Качественные материалы</div>
            </div>
            <div class="advantage"><img src="img/mediators.svg" alt="без посредников">
                <div class="advantage-text">Отсутствие посредников</div>
            </div>
            <div class="advantage"><img src="img/price.svg" alt="выгодные цены">
                <div class="advantage-text">Цена на 20% ниже, чем у конкурентов</div>
            </div>
        </div>
        <div class="advantages-part">
            <div class="advantage"><img src="img/design.svg" alt="дизайн">
                <div class="advantage-text">Разработка дизайна гарнитура</div>
            </div>
            <div class="advantage"><img src="img/guarantee.svg" alt="гарантия">
                <div class="advantage-text">Гарантия</div>
            </div>
            <div class="advantage"><img src="img/cleaning.svg" alt="уборка">
                <div class="advantage-text">Уборка после установки</div>
            </div>
        </div>

    </div>
</section>
<section class="indent light-background">
    <h3 class="landing">Выберите подарок <br>при заказе кухни</h3>
    @include('forms.gift')
</section>
<section class="indent dark-background">
    <h2 id="projects" class="landing">Реализованные проекты кухонь</h2>
    <div class="projects">
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">

            </div>
            <div class="carousel-wrapper">
                <div class="carousel-inner">

                </div>
                <button class="btn popup-btn">Заказать расчёт</button>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>
</section>
<section class="indent light-background">
    <h2 id="materials" class="landing">Материалы</h2>
    <div class="materials">

        <div class="material-content">

        </div>

    </div>

</section>
<section class="indent dark-background">
    <div class="container calc-section">
        <h2 id="calc" class="landing">Калькулятор</h2>
        <p>Здесь вы можете самостоятельно сделать предварительный расчёт стоимости кухонного гарнитура. Заполните все поля и нажмите "Рассчитать стоимость". Будет показан предварительный расчет с учётом выбора фурнитуры эконом-варианта.</p>
        <small><i>*Не является публичной офертой. Для уточнения цены необходимо связаться с менеджером.</i></small>

        @include('forms.calc')
    </div>
</section>
<section class="reviews light-background">
    <h2 id="reviews" class="landing">Отзывы</h2>
    <div class="ya-widget container">
        <div style="width:560px;height:800px;overflow:hidden;position:relative;"><iframe style="width:100%;height:100%;border:1px solid #e6e6e6;border-radius:8px;box-sizing:border-box" src="https://yandex.ru/maps-reviews-widget/126260982281?comments"></iframe><a href="https://yandex.ru/maps/org/logika_kukhni/126260982281/" target="_blank" style="box-sizing:border-box;text-decoration:none;color:#b3b3b3;font-size:10px;font-family:YS Text,sans-serif;padding:0 20px;position:absolute;bottom:8px;width:100%;text-align:center;left:0;overflow:hidden;text-overflow:ellipsis;display:block;max-height:14px;white-space:nowrap;padding:0 16px;box-sizing:border-box">Логика
                кухни на карте Екатеринбурга — Яндекс Карты</a></div>
    </div>

</section>
<section class="faq-block text-shadow">
    <div class="container color-white">
        <h3 id="faq" class="landing">Часто задаваемые вопросы</h3>
        <div class="faq-content">

        </div>
    </div>
</section>
@stop