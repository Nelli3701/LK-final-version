

<?php $__env->startSection('title', 'Ошибка 404'); ?>

<?php $__env->startSection('description', 'Страница не найдена'); ?>

<?php $__env->startSection('page-content'); ?>
<?php
$hideTitle = true; // Скрываем на этой странице заголовок из родительского шаблона
?>
<div class="blue-background">
    <div class="page-content">
        <h1 class="container" style="text-align: center" ;>Упс! Похоже, вы заблудились…</h1>
        <p class="service-page container">Мы не смогли найти страницу, которую вы искали. Возможно, она потерялась за углом вашей идеальной кухни. Вы можете:</p>
        <ul class="service-page container">
            <li>Вернуться на <a href="<?php echo e(url('/')); ?>">главную страницу</a> и начать путь к своему идеальному кухонному гарнитуру.</li>
            <li>Посмотреть нашу <a href="<?php echo e(url('/#projects')); ?>">галерею работ</a>, чтобы вдохновиться новыми идеями.</li>
            <li>Или позвонить нам, и мы с радостью поможем вам найти нужную информацию!</li>
        </ul>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Виктория\Курсы\Laravel\logic-kitchen\resources\views/errors/404.blade.php ENDPATH**/ ?>