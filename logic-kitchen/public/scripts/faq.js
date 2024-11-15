'use strict';

async function initFaq() {
    const faqContainer = document.querySelector('.faq-content');

    // Функция для загрузки данных из файла JSON
    async function fetchData() {
        try {
            const response = await fetch('data/faq.json');
            if (!response.ok) {
                throw new Error('Network response was not ok: ' + response.statusText);
            }
            return await response.json();
        } catch (error) {
            console.error('Ошибка при получении данных:', error);
        }
    }

    // Функция для отображения контента
    function renderFaq(data) {
        data.forEach(item => {
            const detailsEl = document.createElement('details');
            detailsEl.className = 'faq-elements';

            const summaryEl = document.createElement('summary');
            summaryEl.innerHTML = item.q;

            const answerEl = document.createElement('p');
            answerEl.innerHTML = item.a;

            detailsEl.appendChild(summaryEl);
            detailsEl.appendChild(answerEl);
            faqContainer.appendChild(detailsEl);
        });
    }

    // Загрузка данных и рендеринг контента
    const faqData = await fetchData();
    if (faqData) {
        renderFaq(faqData);
    }
    // Настраиваем, чтобы одновременно открыт был только один details в блоке FAQ
    const detailsEls = document.querySelectorAll('.faq-elements');
    detailsEls.forEach(details => {
        details.addEventListener('toggle', () => {
            if (details.open) {
                detailsEls.forEach(otherDetails => {
                    if (otherDetails !== details) {
                        otherDetails.removeAttribute('open');
                    }
                });
            }
        });
    });
}

export {
    initFaq
};
