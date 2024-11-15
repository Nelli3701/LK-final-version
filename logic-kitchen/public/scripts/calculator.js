import {
    setMargin,
    validateForm
} from './index.js';
class Calculator {
    constructor(lowerMaterial, upperMaterial, countertopMaterial, lowerDimensions, upperDimensions, countertopDimensions, thickness, coefficient) {
        this.lowerMaterial = lowerMaterial; // 'МДФ' или 'ЛДСП'
        this.upperMaterial = upperMaterial; // 'МДФ' или 'ЛДСП'
        this.countertopMaterial = countertopMaterial; // 'МДФ' или 'ЛДСП'
        this.lowerDimensions = lowerDimensions; // { length: , height: }
        this.upperDimensions = upperDimensions; // { length: , height: }
        this.countertopDimensions = countertopDimensions; // { length: }
        this.thickness = thickness; // '26mm' или '38mm'
        this.coefficient = coefficient; // защищенный от изменений коэффициент

        // Цены за квадратный метр для фасадов и столешницы
        this.pricePerSqm = {
            facade: {
                'МДФ': 8500,
                'ЛДСП': 3000
            },
            countertop: {
                '26mm': {
                    'МДФ': 5000,
                    'ЛДСП': 3000
                },
                '38mm': {
                    'МДФ': 6000,
                    'ЛДСП': 4000
                }
            }
        };
    }

    calculatePrice() {
        const lowerArea = (this.lowerDimensions.length * this.lowerDimensions.height) / 10000; // перевод в квадратные метры
        const upperArea = (this.upperDimensions.length * this.upperDimensions.height) / 10000;
        const countertopArea = this.countertopDimensions.length / 10000;

        // Рассчитываем стоимость
        const totalPrice = (lowerArea * this.pricePerSqm.facade[this.lowerMaterial] +
            upperArea * this.pricePerSqm.facade[this.upperMaterial] +
            countertopArea * this.pricePerSqm.countertop[this.thickness][this.countertopMaterial]) * this.coefficient;

        return totalPrice;
    }
}

// Функция для сбора данных из формы и вычисления стоимости
function calculate() {
    const form = document.querySelector('.calculator-form');
    // Валидация формы
    const isValid = validateForm(form); // Вызов функции валидации
    if (!isValid) {
        return; // Если форма не валидна, прекращаем выполнение
    }
    const lowerMaterial = document.querySelector('input[name="lower_facades"]:checked').value;
    const upperMaterial = document.querySelector('input[name="upper_facades"]:checked').value;
    const countertopMaterial = document.querySelector('input[name="countertop_material"]:checked').value;

    const lowerLength = parseFloat(document.getElementById('lower_length').value);
    const lowerHeight = parseFloat(document.getElementById('lower_height').value);
    const upperLength = parseFloat(document.getElementById('upper_length').value);
    const upperHeight = parseFloat(document.getElementById('upper_height').value);
    const countertopLength = parseFloat(document.getElementById('countertop_length').value);

    const thickness = document.querySelector('input[name="thickness"]:checked').value;

    // Коэффициент
    const coefficient = 2;

    // Создание экземпляра класса
    const calculator = new Calculator(
        lowerMaterial,
        upperMaterial,
        countertopMaterial, {
            length: lowerLength,
            height: lowerHeight
        }, {
            length: upperLength,
            height: upperHeight
        }, {
            length: countertopLength
        },
        thickness,
        coefficient
    );

    const price = calculator.calculatePrice();
    // Отображение результата
    const resultElement = document.querySelector('.calculator-result');
    resultElement.style.display = 'flex';
    resultElement.querySelector('span').innerText = `${price.toFixed(2)} руб.`;

    // Получаем header и nextBlock внутри функции

    const header = document.querySelector('header.main-header');
    const nextBlock = document.querySelector('.page-content');


    // Прокручиваем страницу к результату с учетом высоты фиксированного меню

    setMargin(header, nextBlock);

    const resultOffset = resultElement.getBoundingClientRect().top + window.scrollY;
    const windowHeight = window.innerHeight;
    const resultHeight = resultElement.offsetHeight;

    // Вычисляем новую позицию с учетом центра экрана
    const targetOffset = resultOffset - (windowHeight / 2 - resultHeight / 2);

    window.scrollTo({
        top: targetOffset,
        behavior: 'smooth'
    });
}

export {
    calculate
}
