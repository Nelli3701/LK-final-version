import {
    changeImgHover
} from './index.js';
'use strict';

async function initMaterials() {
    const materialsContainer = document.querySelector('.materials');

    // Функция для загрузки данных из файла JSON
    async function fetchData() {
        try {
            const response = await fetch('data/materials.json');
            if (!response.ok) {
                throw new Error('Network response was not ok: ' + response.statusText);
            }
            return await response.json();
        } catch (error) {
            console.error('Ошибка при получении данных:', error);
        }
    }

    // Функция для отображения контента материалов
    function renderMaterials(data) {
        const tabsContainer = document.createElement('div');
        tabsContainer.className = 'material-tabs container';

        const contentContainer = document.createElement('div');
        contentContainer.className = 'material-content';

        data.forEach((material, index) => {
            // Создаем вкладку
            const tab = document.createElement('span');
            tab.className = 'h-tab' + (index === 0 ? ' active-tab' : '');
            tab.textContent = material.tab;
            tabsContainer.appendChild(tab);

            // Создаем список категорий
            const catList = document.createElement('div');
            catList.className = 'cat-list container' + (index === 0 ? ' visible' : '');

            material.items.forEach(item => {
                const element = document.createElement('div');
                element.className = 'cat-element';
                element.innerHTML = `
                    <div class="cat-element-desc">
                        <div class="cat-link">
                            <img class="img-with-border red-border" src="${item.image}" alt="${item.name}" data-hover="${item.hoverImg}">
                        </div>
                        <p class="cat-link-name">${item.name}</p>
                    </div>
                `;
                catList.appendChild(element);
                // Добавление событий на наведение
                const imgEl = element.querySelector('img');
                changeImgHover(imgEl, {
                    img: item.image
                });
            });
            contentContainer.appendChild(catList);

        });

        materialsContainer.appendChild(tabsContainer);
        materialsContainer.appendChild(contentContainer);

        // Обработчик клика по вкладкам
        const tabs = document.querySelectorAll('.h-tab');
        tabs.forEach((tab, index) => {
            tab.addEventListener('click', (e) => {
                e.preventDefault();
                tabs.forEach(t => t.classList.remove('active-tab'));
                tab.classList.add('active-tab');

                const catLists = document.querySelectorAll('.cat-list');
                catLists.forEach((list, idx) => {
                    list.classList.toggle('visible', idx === index + 1);
                });
            });
        });
    }

    try {
        // Загружаем данные
        const data = await fetchData();
        renderMaterials(data); // Генерируем содержимое на основе данных
    } catch (error) {
        console.error('Ошибка при загрузке данных:', error);
    }
}

export {
    initMaterials
};
