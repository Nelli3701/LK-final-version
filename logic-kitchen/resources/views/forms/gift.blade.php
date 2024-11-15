<div class="form-wrapper gift-form">
    <p>Используйте возможность сэкономить - выберите подарок при заказе кухни!</p>
    <form class="main-form" action="{{ route('post_form') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="form_type" value="giftform">
        <select name="gift" id="gift-select">
            <option value="" selected disabled>Ваш подарок</option>
            <option value="Мойка">Мойка</option>
            <option value="Смеситель">Смеситель</option>
            <option value="Фильтр для воды">Фильтр для воды</option>
        </select>
        <input type="text" name="name" class="name" placeholder="Как к вам обращаться?*" value="{{ old('name') }}" required max="50" min="1">
        @error('name')
        <small class="red-text">{{ $message }}</small>
        @enderror
        <input type="tel" name="phone" class="phone-mask" placeholder="Введите телефон*" value="{{ old('phone') }}" required>
        @error('phone')
        <small class="red-text">{{ $message }}</small>
        @enderror
        <small>Нажимая кнопку «Отправить», я даю свое согласие на <a href="/soglasie">обработку персональных данных</a></small>
        <input class="btn" type="submit" value="Отправить">
    </form>
</div>