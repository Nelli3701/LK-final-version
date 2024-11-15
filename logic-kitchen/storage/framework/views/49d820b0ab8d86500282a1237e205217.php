<?php
$menuItems = [
['name' => 'Проекты', 'link' => '/#projects'],
['name' => 'Материалы', 'link' => '/#materials'],
['name' => 'Калькулятор', 'link' => '/#calc'],
['name' => 'Отзывы', 'link' => '/#reviews'],
['name' => 'FAQ', 'link' => '/#faq'],
['name' => 'Контакты', 'link' => 'contacts'],
];
?>
<ul class="navbar-list container">
    <?php $__currentLoopData = $menuItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(!request()->is($item['link'])): ?>
    <li class="navbar-list-item">
        <a href="<?php echo e($item['link']); ?>" class="navbar-link">
            <?php echo e($item['name']); ?>

        </a>
    </li>
    <?php else: ?>
    <li class="navbar-list-item">
        <span href="<?php echo e($item['link']); ?>" class="navbar-link navbar-link-active">
            <?php echo e($item['name']); ?>

        </span>
    </li>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<!--Кнопка закрыть меню-->
<button class="btn-close active-btn"></button><?php /**PATH D:\Виктория\Курсы\Laravel\logic-kitchen\resources\views/includes/nav.blade.php ENDPATH**/ ?>