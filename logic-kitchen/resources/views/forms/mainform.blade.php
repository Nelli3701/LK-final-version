<div class="popup-overlay">
    <div class="inner-form popup form-wrapper">
        <div class="form-header">
            <button class="btn-close"></button>
            <p>Закажите расчет стоимости вашей новой кухни - это бесплатно и ни к чему вас не&nbsp;обязывает</p>
        </div>

        <form class="main-form " action="{{ route('post_form') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="form_type" value="mainform">
            <input type="text" name="name" class="name" value="{{ old('name') }}" placeholder="Как к вам обращаться?*" required max="50" min="1">
            @error('name')
            <small class="red-text">{{ $message }}</small>
            @enderror
            <input type="tel" name="phone" class="phone-mask" value="{{ old('phone') }}" placeholder="Ваш телефон*" required>
            @error('phone')
            <small class="red-text">{{ $message }}</small>
            @enderror
            <small>Нажимая кнопку «Отправить», я даю свое согласие на <a href="/soglasie">обработку персональных данных</a></small>
            <input class="btn" type="submit" value="Отправить">
        </form>
    </div>
</div>