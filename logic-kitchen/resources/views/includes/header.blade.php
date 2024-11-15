<div class="header-info dark-background">
    <div class="inner-elements container">
        <x-logo />
        <div class="contacts">
            <div class="contacts-part address">
                <div class="contacts-part-icon"><i class="fa-solid fa-location-dot fa-2xs"></i></div>

                <span>Работаем по Екатеринбургу</span>
            </div>
            <x-phone-number />

        </div>


        <div>

            <button class="btn popup-btn">Вызвать замерщика</button>
            <div class="contacts-part-icon">
                <i class="fa-solid fa-envelope popup-btn"></i>
            </div>
            @include('forms.mainform')
        </div>
        <button class="burger active-btn"></button>

    </div>

</div>