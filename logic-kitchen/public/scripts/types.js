import {
    changeImgHover
} from './index.js';

'use strict';

async function initTypes() {
    const catListEl = document.querySelector('.cat-list');
    catListEl.innerHTML = ''; // Очищаем содержимое контейнера

    // Функция для загрузки данных из файла JSON
    async function fetchData() {
        try {
            const response = await fetch('data/types.json');
            if (!response.ok) {
                throw new Error('Network response was not ok: ' + response.statusText);
            }
            return await response.json();
        } catch (error) {
            console.error('Ошибка при получении данных:', error);
        }
    }

    // Функция для отрисовки блока с видами

    const renderTypes = () => {
        typesData.forEach(type => {
            const catElement = document.createElement('div');
            catElement.classList.add('cat-element');

            catElement.innerHTML = `
                <div class="cat-element-desc">
                    <div class="cat-link">
                        <img class="img-with-border red-border" src="${type.img}" 
                             alt="${type.name}" 
                             data-hover="${type.hoverImg}">
                    </div>
                    <p href="#" class="cat-link-name">${type.name}</p>
                </div>
            `;

            // Добавление событий на наведение
            const imgEl = catElement.querySelector('img');
            changeImgHover(imgEl, {
                img: type.img
            });

            catListEl.appendChild(catElement); // Добавляем элемент в список
        });
    };

    // Загрузка данных и рендеринг контента
    const typesData = await fetchData();
    if (typesData) {
        renderTypes(typesData);
    }
}

export {
    initTypes
};
