<div>
    <div class="inner-elements container">
        <?php if (isset($component)) { $__componentOriginale7dc1b8cfba3f7c6278ef1986decdec2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale7dc1b8cfba3f7c6278ef1986decdec2 = $attributes; } ?>
<?php $component = App\View\Components\Logo::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('logo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Logo::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale7dc1b8cfba3f7c6278ef1986decdec2)): ?>
<?php $attributes = $__attributesOriginale7dc1b8cfba3f7c6278ef1986decdec2; ?>
<?php unset($__attributesOriginale7dc1b8cfba3f7c6278ef1986decdec2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale7dc1b8cfba3f7c6278ef1986decdec2)): ?>
<?php $component = $__componentOriginale7dc1b8cfba3f7c6278ef1986decdec2; ?>
<?php unset($__componentOriginale7dc1b8cfba3f7c6278ef1986decdec2); ?>
<?php endif; ?>

        <div class="contacts">
            <div class="contacts-part address">
                <div class="contacts-part-icon"><i class="fa-solid fa-location-dot fa-2xs"></i></div>


                <span>Работаем по Екатеринбургу</span>
            </div>
            <?php if (isset($component)) { $__componentOriginal3d68ecf3e28393b1ba3bad4e4abaef06 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3d68ecf3e28393b1ba3bad4e4abaef06 = $attributes; } ?>
<?php $component = App\View\Components\PhoneNumber::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('phone-number'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\PhoneNumber::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3d68ecf3e28393b1ba3bad4e4abaef06)): ?>
<?php $attributes = $__attributesOriginal3d68ecf3e28393b1ba3bad4e4abaef06; ?>
<?php unset($__attributesOriginal3d68ecf3e28393b1ba3bad4e4abaef06); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3d68ecf3e28393b1ba3bad4e4abaef06)): ?>
<?php $component = $__componentOriginal3d68ecf3e28393b1ba3bad4e4abaef06; ?>
<?php unset($__componentOriginal3d68ecf3e28393b1ba3bad4e4abaef06); ?>
<?php endif; ?>
            <div class="contacts-part clock">
                <div class="contacts-part-icon">
                    <i class="fa-solid fa-clock fa-2xs"></i>
                </div>
                <span>Режим работы: 9:00-20:00</span>
            </div>


        </div>
        <div class="social">
            <a target="_blank" href="https://vk.com/logickitchen" class="social-link"><i class="fa-brands fa-vk"></i></a>
            <a target="_blank" href="https://wa.me/79126071619" class="social-link"><i class="fa-brands fa-square-whatsapp"></i></a>
            <a target="_blank" href="https://t.me/logic_kitchen" class="social-link"><i class="fa-brands fa-telegram"></i></a>

        </div>
    </div>
</div>
<div>
    <div class="footer-bottom container">
        <div class="copyright">&copy; <?php echo e(date('Y')); ?></div>
        <p>
            <img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="Правильный CSS!" />
        </p>
        <div class="dev">
            <a target="_blank" href="https://t.me/victory_seo" class="seo">Разработка сайта</a>
            <a rel="nofollow" target="_blank" href="http://dimkachel.ru/" class="seo">Дизайн</a>
        </div>



    </div>
    <p class="footer-small">Настоящая информация не является публичной офертой, определяемой положениями статьи 437 Гражданского кодекса Российской Федерации. Все предложения, указанные на данном сайте, носят исключительно информационный характер и не являются обязательством для продавца. Заключение договора возможно только в случае получения согласия сторон на его условия, что будет оформлено отдельным документом.</p>
</div><?php /**PATH D:\Виктория\Курсы\Laravel\logic-kitchen\resources\views/includes/footer.blade.php ENDPATH**/ ?>