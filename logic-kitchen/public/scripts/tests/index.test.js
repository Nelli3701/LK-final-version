import {
    changeImgHover,
    validateName,
    validatePhone,
    setMargin,
    togglePopup,
    validateForm,
    validateDimensionField,
    validateRadioField,
    validateCalculatorForm
} from '../index';

test('togglePopup should toggle classes on popup and body', () => {
    const popup = document.createElement('div');
    popup.classList.add('popup');
    document.body.appendChild(popup);

    // Проверяем, что классы не установлены перед вызовом
    expect(popup.classList.contains('visible')).toBe(false);
    expect(document.body.classList.contains('active')).toBe(false);

    // Первый вызов togglePopup
    togglePopup();
    expect(popup.classList.contains('visible')).toBe(true);
    expect(document.body.classList.contains('active')).toBe(true);

    // Второй вызов togglePopup
    togglePopup();
    expect(popup.classList.contains('visible')).toBe(false);
    expect(document.body.classList.contains('active')).toBe(false);
});

test('changeImgHover should change the image on mouse enter and leave', () => {
    const imgOriginal = {
        img: 'original.png'
    };
    const imgEl = document.createElement('img');
    imgEl.src = imgOriginal.img;
    imgEl.dataset.hover = 'hovered.png';

    changeImgHover(imgEl, imgOriginal);

    // Симуляция наведения мыши
    imgEl.dispatchEvent(new Event('mouseenter'));
    expect(imgEl.src.endsWith('hovered.png')).toBe(true); // Проверяем, что изображение поменялось на hovered.png

    // Симуляция ухода мыши
    imgEl.dispatchEvent(new Event('mouseleave'));
    expect(imgEl.src.endsWith('original.png')).toBe(true); // Проверяем, что изображение вернулось к оригинальному
});
test('setMargin should set margin top according to header height', () => {
    const header = document.createElement('header');
    header.style.height = '100px';
    header.style.display = 'block';
    document.body.appendChild(header);
    const nextBlock = document.createElement('div');
    nextBlock.classList.add('page-content');
    document.body.appendChild(nextBlock);
    requestAnimationFrame(() => {
        setMargin(header, nextBlock);
        expect(nextBlock.style.marginTop).toBe('100px'); // Проверяем, установлен ли правильный отступ
    });
});

// Тесты для форм и калькулятора в том числе

test('valid name should return true', () => {
    const input = {
        value: 'Valid Name'
    };
    expect(validateName(input)).toBe(true);
});

test('empty name should return false', () => {
    const input = {
        value: ''
    };
    expect(validateName(input)).toBe(false);
});

test('valid phone number should return true', () => {
    const input = {
        value: '+7(123) 456-78-90'
    };
    expect(validatePhone(input)).toBe(true);
});

test('invalid phone number should return false', () => {
    const input = {
        value: '1234'
    };
    expect(validatePhone(input)).toBe(false);
});

describe('validateDimensionField', () => {
    let container;

    beforeEach(() => {
        // Создаем контейнер перед каждым тестом
        container = document.createElement('div');
        document.body.appendChild(container);
    });

    afterEach(() => {
        // Удаляем контейнер после каждого теста
        document.body.removeChild(container);
    });

    test('valid dimension should return true', () => {
        const input = document.createElement('input');
        input.value = '250'; // допустимое значение
        container.appendChild(input);
        const result = validateDimensionField(input, 'Ошибка валидации');
        expect(result).toBe(true);
    });

    test('dimension less than 0 should return false', () => {
        const input = document.createElement('input');
        input.value = '-1'; // недопустимое значение
        container.appendChild(input);
        const result = validateDimensionField(input, 'Ошибка валидации');
        expect(result).toBe(false);
    });

    test('dimension greater than max value should return false', () => {
        const input = document.createElement('input');
        input.value = '600'; // недопустимое значение
        container.appendChild(input);
        const result = validateDimensionField(input, 'Ошибка валидации');
        expect(result).toBe(false);
    });

    test('empty dimension should return false', () => {
        const input = document.createElement('input');
        input.value = ''; // пустое значение
        container.appendChild(input);
        const result = validateDimensionField(input, 'Ошибка валидации');
        expect(result).toBe(false);
    });

    test('non-numeric dimension should return false', () => {
        const input = document.createElement('input');
        input.value = 'abc'; // нечисловое значение
        container.appendChild(input);
        const result = validateDimensionField(input, 'Ошибка валидации');
        expect(result).toBe(false);
    });
});

describe('validateRadioField', () => {
    let checkedInput;
    let uncheckedInput;

    beforeEach(() => {
        // Создаем элементы input
        checkedInput = document.createElement('input');
        checkedInput.type = 'radio';
        checkedInput.checked = true; // Установим checked true для теста

        uncheckedInput = document.createElement('input');
        uncheckedInput.type = 'radio';
        uncheckedInput.checked = false; // Установим checked false для теста
    });

    test('checked input should return true', () => {
        const result = validateRadioField(checkedInput, 'Error!');
        expect(result).toBe(true);
    });

    test('unchecked input should return false', () => {
        const result = validateRadioField(uncheckedInput, 'Error!');
        expect(result).toBe(false);
    });
});

describe('validateCalculatorForm', () => {
    test('valid calculator form should return true', () => {
        const form = document.createElement('form');
        form.innerHTML = `
            <input type="radio" name="lower_facades" value="МДФ" checked>
            <input type="text" id="lower_length" value="100">
            <input type="text" id="lower_height" value="100">
            <input type="radio" name="upper_facades" value="ЛДСП" checked>
            <input type="text" id="upper_length" value="100">
            <input type="text" id="upper_height" value="100">
            <input type="radio" name="countertop_material" value="МДФ" checked>
            <input type="text" id="countertop_length" value="100">
            <input type="radio" name="thickness" value="26mm" checked>
        `;
        const result = validateCalculatorForm(form);
        expect(result).toBe(true);
    });

    test('invalid calculator form should return false', () => {
        const form = document.createElement('form');
        form.innerHTML = `
            <input type="radio" name="lower_facades" value="МДФ">
            <input type="text" id="lower_length" value="-1">
            <input type="text" id="lower_height" value="100">
            <input type="radio" name="upper_facades" value="ЛДСП">
            <input type="text" id="upper_length" value="600">
            <input type="text" id="upper_height" value="100">
            <input type="radio" name="countertop_material" value="МДФ">
            <input type="text" id="countertop_length" value="100">
            <input type="radio" name="thickness" value="38mm" checked>
        `;
        const result = validateCalculatorForm(form);
        expect(result).toBe(false);
    });
});

// Тесты для validateForm
describe('validateForm', () => {
    test('valid form should return true', () => {
        const form = document.createElement('form');
        form.innerHTML = `
            <input type="text" name="name" value="Valid Name">
            <input type="text" name="phone" value="+7(123) 456-78-90">
            <div class="calculator-form">
                <input type="radio" name="lower_facades" value="МДФ" checked>
                <input type="text" id="lower_length" value="100">
                <input type="text" id="lower_height" value="100">
                <input type="radio" name="upper_facades" value="ЛДСП" checked>
                <input type="text" id="upper_length" value="100">
                <input type="text" id="upper_height" value="100">
                <input type="radio" name="countertop_material" value="МДФ" checked>
                <input type="text" id="countertop_length" value="100">
                <input type="radio" name="thickness" value="26mm" checked>
            </div>
        `;
        const result = validateForm(form);
        expect(result).toBe(true);
    });

    test('invalid form should return false', () => {
        const form = document.createElement('form');
        form.innerHTML = `
            <input type="text" name="name" value="">
            <input type="text" name="phone" value="1234">
            <div class="calculator-form">
                <input type="radio" name="lower_facades">
                <input type="text" id="lower_length" value="600">
                <input type="text" id="lower_height" value="100">
                <input type="radio" name="upper_facades" value="ЛДСП" checked>
                <input type="text" id="upper_length" value="100">
                <input type="text" id="upper_height" value="100">
                <input type="radio" name="countertop_material" value="МДФ" checked>
                <input type="text" id="countertop_length" value="100">
                <input type="radio" name="thickness" value="26mm" checked>
            </div>
        `;
        const result = validateForm(form);
        expect(result).toBe(false);
    });
});
