import {
    initCarousel
} from './carousel.js';
import {
    initFaq
} from './faq.js';
import {
    initMaterials
} from './materials.js'
import {
    initTypes
} from './types.js'
import {
    calculate
} from './calculator.js'

'use strict';

// Константы для классов и селекторов
const ERROR_MESSAGE_CLASS = 'error-message';
const RED_BORDER_CLASS = 'red-border';
const BLUE_BORDER_CLASS = 'blue-border';
const PHONE_MASK = '+{7}(000) 000-00-00';
const FORM_NAME_MAX_LENGTH = 50;
const MAX_DIMENSION_VALUE = 500; // макс значение длины и высоты (в см) для параметров калькулятора

// Маска для поля ввода номера телефона в формах, выполнение скриптов блоков для главной
document.addEventListener('DOMContentLoaded', function () {
    try {
        setupPhoneMasks();
    } catch (error) {
        console.error('Ошибка во время настройки масок телефонов:', error);
    }

    try {
        setupFormValidation();
    } catch (error) {
        console.error('Ошибка валидации формы:', error);
    }

    // Вызываем указанные функции только для страниц, где есть данные блоки
    if (document.querySelector('.cat-list')) {
        try {
            initTypes();
        } catch (error) {
            console.error('Ошибка инициализации типов гарнитуров:', error);
        }
    }
    if (document.querySelector('.projects')) {
        try {
            initCarousel();
        } catch (error) {
            console.error('Ошибка инициализации карусели:', error);
        }
    }
    if (document.querySelector('.faq-content')) {
        try {
            initFaq();
        } catch (error) {
            console.error('Ошибка инициализации FAQ:', error);
        }
    }
    if (document.querySelector('.materials')) {
        try {
            initMaterials();
        } catch (error) {
            console.error('Ошибка инициализации материалов:', error);
        }
    }

    // Настройка видимости всплывающей формы pop-up

    const popup = document.querySelector('.popup');
    const closePopupBtn = popup.querySelector('.btn-close');
    const popupButtons = document.querySelectorAll('.popup-btn');

    popupButtons.forEach(button => {
        button.addEventListener('click', togglePopup);
    });
    closePopupBtn.addEventListener('click', togglePopup);

    // Привязка события к кнопке для расчета стоимости в калькуляторе

    const calculatorForm = document.querySelector('.calculator-form');
    if (calculatorForm) {

        document.querySelector('.calculate-cost').addEventListener('click', calculate);
    }

});

// Переключение состояния поп-апа
function togglePopup() {
    const popup = document.querySelector('.popup');
    popup.classList.toggle('visible');
    popup.classList.toggle('shadow');
    document.body.classList.toggle('active');
}

// Меню бургер
let activeBtns = document.querySelectorAll('.active-btn');
let menu = document.querySelector('.navbar');
for (let activeBtn of activeBtns) {
    activeBtn.addEventListener('click', () => {
        menu.classList.toggle('opened');
        menu.classList.toggle('shadow');
    })
}

// Функция установки маски телефона
function setupPhoneMasks() {
    const phoneInputs = document.querySelectorAll('.phone-mask');
    phoneInputs.forEach(input => {
        try {
            IMask(input, {
                mask: PHONE_MASK,
                lazy: false
            });

            input.addEventListener('input', function () {
                input.style.color = 'black';
            });

            input.addEventListener('blur', function () {
                if (!input.value) {
                    input.style.color = 'gray';
                }
            });
        } catch (error) {
            console.error('Ошибка установки маски для телефона:', error);
        }
    });
}
// Функции для валидации форм

// Настройка валидации всех форм
function setupFormValidation() {
    const forms = document.querySelectorAll('.main-form');
    forms.forEach(form => {
        form.addEventListener('submit', (e) => {
            const isValid = validateForm(form);
            if (!isValid) {
                e.preventDefault(); // Отменяем отправку формы, если она не валидна
                if (form.classList.contains('calculator-form')) {
                    scrollToFirstError(form); // Прокручиваем только для формы калькулятора
                }
            }
        });

        // Убираем класс ошибки из инпутов
        const inputEls = form.querySelectorAll('input');
        inputEls.forEach(input => {
            input.addEventListener('input', () => {
                removeErrorMessage(input);
            });
        });
    });
}

function scrollToFirstError(form) {
    // Снова проверяем все поля, чтобы найти первое поле с ошибкой
    const errorInputEl = form.querySelector(`.${ERROR_MESSAGE_CLASS}`);
    if (errorInputEl) {
        const header = document.querySelector('header.main-header');
        const nextBlock = document.querySelector('.page-content');
        setMargin(header, nextBlock);
        const resultOffset = errorInputEl.getBoundingClientRect().top + window.scrollY;
        const windowHeight = window.innerHeight;
        const resultHeight = errorInputEl.offsetHeight;

        // Вычисляем новую позицию с учетом центра экрана
        const targetOffset = resultOffset - (windowHeight / 2 - resultHeight / 2);

        window.scrollTo({
            top: targetOffset,
            behavior: 'smooth'
        });
    } else {
        console.error("No error input element found on the form.");
    }
}

// Функция валидации каждой формы
function validateForm(form) {
    let isValid = true;

    // Проверка имени
    const nameInput = form.querySelector('input[name="name"]');
    if (nameInput) {
        const nameIsValid = validateField(nameInput, validateName);
        isValid = isValid && nameIsValid;
    }

    // Проверка телефона
    const phoneInput = form.querySelector('input[name="phone"]');
    if (phoneInput) {
        const phoneIsValid = validateField(phoneInput, validatePhone);
        isValid = isValid && phoneIsValid;
    }

    // Проверка, является ли форма калькулятором
    if (form.classList.contains('calculator-form')) {
        const calculatorIsValid = validateCalculatorForm(form);
        isValid = isValid && calculatorIsValid;
    }

    if (!isValid) {
        if (form.classList.contains('calculator-form')) {
            scrollToFirstError(form); // Прокручиваем только для формы калькулятора
        }
    }
    return isValid;
}

// Функция валидации для калькулятора
function validateCalculatorForm(form) {
    let isValid = true;

    // Проверяем нижние элементы
    const lowerFacadeChecked = form.querySelector('input[name="lower_facades"]:checked');
    isValid = validateRadioField(lowerFacadeChecked, 'Выберите материал нижних фасадов');

    const lowerLengthInput = form.querySelector('#lower_length');
    const lowerHeightInput = form.querySelector('#lower_height');
    const lowerLengthIsValid = validateDimensionField(lowerLengthInput,
        'Длина (см) нижней части должна быть числом в диапазоне от 0 до 500. Если данный модуль не нужен, введите 0');
    const lowerHeightIsValid = validateDimensionField(lowerHeightInput,
        'Высота (см) нижней части должна быть числом в диапазоне от 0 до 500. Если данный модуль не нужен, введите 0');
    isValid = isValid && lowerLengthIsValid && lowerHeightIsValid;

    // Проверяем верхние элементы
    const upperFacadeChecked = form.querySelector('input[name="upper_facades"]:checked');
    isValid = isValid && validateRadioField(upperFacadeChecked, 'Выберите материал верхних фасадов');

    const upperLengthInput = form.querySelector('#upper_length');
    const upperHeightInput = form.querySelector('#upper_height');
    const upperLengthIsValid = validateDimensionField(upperLengthInput,
        'Длина (см) верхней части должна быть числом в диапазоне от 0 до 500. Если данный модуль не нужен, введите 0');
    const upperHeightIsValid = validateDimensionField(upperHeightInput,
        'Высота (см) верхней части должна быть числом в диапазоне от 0 до 500. Если данный модуль не нужен, введите 0');
    isValid = isValid && upperLengthIsValid && upperHeightIsValid;

    // Проверяем столешницу
    const countertopMaterialChecked = form.querySelector('input[name="countertop_material"]:checked');
    isValid = isValid && validateRadioField(countertopMaterialChecked, 'Выберите материал столешницы');

    const countertopLengthInput = form.querySelector('#countertop_length');
    const countertopLengthIsValid = validateDimensionField(countertopLengthInput,
        'Длина (см) столешницы должна быть числом в диапазоне от 0 до 500.');
    isValid = isValid && countertopLengthIsValid;

    const thicknessChecked = form.querySelector('input[name="thickness"]:checked');
    isValid = isValid && validateRadioField(thicknessChecked, 'Выберите толщину столешницы');

    return isValid;
}

// Проверка радиокнопок
function validateRadioField(checkedInput, errorMessage) {
    if (!checkedInput) {
        alert(errorMessage);
        return false;
    }
    if (!checkedInput.checked) {
        return false;
    }
    return true;
}

// Валидация полей длины и высоты
function validateDimensionField(input, errorMessage) {
    removeErrorMessage(input); // Удаляем сообщение об ошибке до проверки
    const value = Number(input.value.trim());

    if (!input.value.trim() || isNaN(value) || value < 0 || value > MAX_DIMENSION_VALUE) {
        displayErrorMessage(input, errorMessage);
        return false;
    }

    // Если валидация успешна, удаляем сообщение об ошибке
    removeErrorMessage(input);
    return true;
}

// Функция вывода ошибки
function displayErrorMessage(input, message) {
    input.style.border = '2px solid red';
    let errorMsg = input.nextElementSibling;
    if (!errorMsg || !errorMsg.classList.contains(ERROR_MESSAGE_CLASS)) {
        errorMsg = document.createElement('small');
        errorMsg.className = ERROR_MESSAGE_CLASS;
        input.parentNode.insertBefore(errorMsg, input.nextSibling);
    }
    errorMsg.textContent = message;
}

// Отдельная функция для проверки поля
function validateField(input, validateFunc) {
    removeErrorMessage(input);
    const isValid = validateFunc(input);
    if (!isValid) {
        displayErrorMessage(input, getErrorMessage(input)); // Передаем сообщение об ошибке
    }
    return isValid;
}

// Валидация имени
function validateName(input) {
    const isEmpty = !input.value.trim();
    const isTooLong = input.value.length > FORM_NAME_MAX_LENGTH;
    return !isEmpty && !isTooLong;
}

// Валидация телефона
function validatePhone(input) {
    const digits = input.value.replace(/\D/g, '');
    return digits.length >= 11;
}

// Получение текстового сообщения об ошибке
function getErrorMessage(input) {
    switch (input.name) {
        case 'name':
            return `Поле обязательно для заполнения и не должно превышать ${FORM_NAME_MAX_LENGTH} символов!`;
        case 'phone':
            return 'Номер телефона заполнен некорректно. Используйте формат: +7(000) 000-00-00!';
        default:
            return '';
    }
}

// Удалить сообщение об ошибке
function removeErrorMessage(input) {
    input.style.border = '';
    const errorMsg = input.nextElementSibling;
    if (errorMsg && errorMsg.classList.contains(ERROR_MESSAGE_CLASS)) {
        errorMsg.remove();
    }
}

// Функция для настройки отступа от фиксированного меню

const header = document.querySelector('header.main-header');
const nextBlock = document.querySelector('.page-content');


function setMargin(header, nextBlock) {


    const headerHeight = header.offsetHeight;
    nextBlock.style.marginTop = `${headerHeight}px`;
}
window.addEventListener('load', () => setMargin(header, nextBlock));
window.addEventListener('resize', () => setMargin(header, nextBlock));

/**
 * Функция changeImgHover устанавливает обработчики событий для изменения изображения
 * и рамки элемента <img> при наведении мыши. 
 * 
 * @param {HTMLImageElement} imgEl - Элемент <img>, для которого будет применена функция.
 * @param {Object} imgOriginal - Объект, содержащий оригинальное изображение.
 *                              Должен иметь свойство img, указывающее путь к оригинальному изображению.
 * Данная функция позволяет динамически изменять изображения и стилизовать рамки,
 * что полезно для создания интерактивных элементов на веб-странице.
 */
function changeImgHover(imgEl, imgOriginal) {
    imgEl.addEventListener('mouseenter', () => {
        if (imgEl.dataset.hover) {
            imgEl.src = imgEl.dataset.hover;
        }
        imgEl.classList.remove(RED_BORDER_CLASS);
        imgEl.classList.add(BLUE_BORDER_CLASS);
    });

    imgEl.addEventListener('mouseleave', () => {
        if (imgEl.dataset.hover) {
            imgEl.src = imgOriginal.img;
        }
        imgEl.classList.remove(BLUE_BORDER_CLASS);
        imgEl.classList.add(RED_BORDER_CLASS);
    });
}

export {
    changeImgHover,
    validateName,
    validatePhone,
    setMargin,
    togglePopup,
    validateForm,
    validateDimensionField,
    validateRadioField,
    validateCalculatorForm
};
