<div class="calculator  form-wrapper">
    <div class="calculator-form main-form">

        <p>1. Выберите параметры нижней части гарнитура</p>
        <div class="form-group">
            <label>Материал нижних фасадов:</label>
            <div>
                <input type="radio" id="lower_facade_mdf" name="lower_facades" value="МДФ" required />
                <label for="lower_facade_mdf">МДФ</label>
            </div>
            <div>
                <input type="radio" id="lower_facade_ldsp" name="lower_facades" value="ЛДСП" required />
                <label for="lower_facade_ldsp">ЛДСП</label>
            </div>

            <label for="lower_length">Длина (см):</label>
            <input type="text" id="lower_length" required>
            <label for="lower_height">Высота (см):</label>
            <input type="text" id="lower_height" required>
        </div>

        <p>2. Выберите параметры верхней части гарнитура</p>
        <div class="form-group">
            <label>Материал верхних фасадов:</label>
            <div>
                <input type="radio" id="upper_facade_mdf" name="upper_facades" value="МДФ" required />
                <label for="upper_facade_mdf">МДФ</label>
            </div>
            <div>
                <input type="radio" id="upper_facade_ldsp" name="upper_facades" value="ЛДСП" required />
                <label for="upper_facade_ldsp">ЛДСП</label>
            </div>

            <label for="upper_length">Длина (см):</label>
            <input type="text" id="upper_length" required>
            <label for="upper_height">Высота (см)</label>
            <input type="text" id="upper_height" required>
        </div>
        <p>3. Выберите параметры столешницы</p>
        <div class="form-group">
            <label>Материал столешницы:</label>
            <div>
                <input type="radio" id="countertop_material_mdf" name="countertop_material" value="МДФ" required />
                <label for="countertop_material_mdf">МДФ</label>
            </div>
            <div>
                <input type="radio" id="countertop_material_ldsp" name="countertop_material" value="ЛДСП" required />
                <label for="countertop_material_ldsp">ЛДСП</label>
            </div>
            <label for="countertop_length">Длина (см):</label>
            <input type="text" id="countertop_length" required>
            <label>Толщина столешницы:</label>
            <div>
                <input type="radio" id="thickness_26" name="thickness" value="26mm" required />
                <label for="thickness_26">26 мм</label>
            </div>
            <div>
                <input type="radio" id="thickness_38" name="thickness" value="38mm" required />
                <label for="thickness_38">38 мм</label>
            </div>
        </div>
        <button class="calculate-cost dark-background" type="submit">
            <span>Рассчитать стоимость</span>
        </button>

    </div>
</div>
<div class="calculator-result">
    <p>Цена вашего нового кухонного гарнитура от <span>[PRICE]</span></p>
    <p>Хотите заказать проект кухни и точный расчёт? Нажмите на кнопку "Вызвать замерщика"!</p>
    <button class="btn popup-btn">Вызвать замерщика</button>
</div><?php /**PATH D:\Виктория\Курсы\Laravel\logic-kitchen\resources\views/forms/calc.blade.php ENDPATH**/ ?>