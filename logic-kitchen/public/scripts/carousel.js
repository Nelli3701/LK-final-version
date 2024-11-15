'use strict';

async function initCarousel() {
    const carouselInnerEl = document.querySelector('.carousel-inner');
    const carouselIndicatorsEl = document.querySelector('.carousel-indicators');
    const nextSlideBtn = document.querySelector('.carousel-control-next');
    const prevSlideBtn = document.querySelector('.carousel-control-prev');
    // Индексы для текущего проекта и текущего изображения
    let currentProjectIndex = 0;
    let currentImageIndex = 0;
    let autoSwitchInterval;
    // Объявляем переменную для хранения данных карусели
    let carouselData = [];

    // Функция для загрузки данных из файла JSON
    async function fetchData() {
        try {
            const response = await fetch('data/carousel.json');
            if (!response.ok) {
                throw new Error('Network response was not ok: ' + response.statusText);
            }
            return await response.json();
        } catch (error) {
            console.error('Ошибка при получении данных:', error);
        }
    }

    // Функция для рендеринга слайдов

    const renderSlides = () => {
        const project = carouselData[currentProjectIndex];
        // Очищаем слайды и индикаторы
        carouselInnerEl.innerHTML = '';
        carouselIndicatorsEl.innerHTML = '';

        // Рендерим изображения
        project.img.forEach((imgSrc, index) => {
            const slideTemplate = `
            <div class="project-area carousel-item ${index === currentImageIndex ? 'active' : ''}">
                <img src="${imgSrc}" class="d-block w-100" alt="${project.name}">
                <header class="project-name">${project.name}</header>
                <p class="project-desc">${project.description}</p>  
            </div>
            `;
            carouselInnerEl.insertAdjacentHTML('afterbegin', slideTemplate);
            renderNavBtn(index);
        });
    };



    // Функция для рендеринга навигационных кнопок (индикаторов)

    const renderNavBtn = (index) => {
        const navBtnTemplate = `
        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="${index}" class="${index === currentImageIndex ? 'active' : ''}" aria-current="true" aria-label="Slide ${index}"></button>
        `;
        carouselIndicatorsEl.insertAdjacentHTML('beforeend', navBtnTemplate);
    };

    // Функция для переключения изображений внутри проекта
    const switchImage = (direction) => {
        const project = carouselData[currentProjectIndex];
        if (direction === 'next') {
            currentImageIndex = (currentImageIndex + 1) % project.img.length;
        } else if (direction === 'prev') {
            currentImageIndex = (currentImageIndex - 1 + project.img.length) % project.img.length;
        }
        renderSlides();
    };

    // Автоматическая смена изображений
    const startAutoSwitch = () => {
        autoSwitchInterval = setInterval(() => {
            switchImage('next');
        }, 2000);
    };

    // Обработчики событий для переключения изображений
    nextSlideBtn.addEventListener('click', (e) => {
        e.preventDefault();
        clearInterval(autoSwitchInterval); // Отключаем автоматическую смену при клике
        const project = carouselData[currentProjectIndex];
        // Переход к следующему проекту или зацикливание
        if (currentProjectIndex < carouselData.length - 1) {
            currentProjectIndex++;
        } else {
            currentProjectIndex = 0; // Зацикливаемся на первом проекте
        }

        currentImageIndex = 0; // сброс текущего изображения
        renderSlides();
        startAutoSwitch(); // Запускаем автоматическую смену для нового проекта
    });

    prevSlideBtn.addEventListener('click', (e) => {
        e.preventDefault();
        clearInterval(autoSwitchInterval); // Отключаем автоматическую смену при клике
        // Переход к предыдущему проекту или зацикливание
        if (currentProjectIndex > 0) {
            currentProjectIndex--;
        } else {
            currentProjectIndex = carouselData.length - 1; // Зацикливаемся на последнем проекте
        }

        currentImageIndex = 0; // сброс текущего изображения
        renderSlides();
        startAutoSwitch(); // Запускаем автоматическую смену для нового проекта
    });

    // События для индикаторов (переключение изображений в одном проекте)
    carouselIndicatorsEl.addEventListener('click', (e) => {
        if (e.target.tagName === 'BUTTON') {
            clearInterval(autoSwitchInterval); // Отключаем автоматическую смену при клике
            currentImageIndex = parseInt(e.target.getAttribute('data-bs-slide-to'));
            renderSlides();
            startAutoSwitch();
        }
    });

    try {
        // Загружаем данные и сохраняем их в carouselData
        carouselData = await fetchData();
        // Инициализация отображения слайдов только если есть данные
        if (carouselData.length > 0) {
            renderSlides();
            startAutoSwitch(); // Запуск автоматической смены изображений
        }
    } catch (error) {
        console.error('Ошибка при загрузке данных:', error);
    }
}

export {
    initCarousel
};
