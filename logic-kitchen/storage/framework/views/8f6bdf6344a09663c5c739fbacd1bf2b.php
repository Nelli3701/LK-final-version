

<?php $__env->startSection('title', 'Спасибо за заявку!'); ?>

<?php $__env->startSection('description', 'Спасибо за вашу заявку! Свяжемся с вами в ближайшее время. Logic Kitchen'); ?>

<?php $__env->startSection('page-content'); ?>
<?php
$hideTitle = true; // Скрываем на этой странице заголовок из родительского шаблона
?>
<div class="blue-background">
    <div class="page-content">
        <h1 class="container">Спасибо за вашу заявку!</h1>
        <p class="service-page container">Мы свяжемся с вами в ближайшее время.</p>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Виктория\Курсы\Laravel\logic-kitchen\resources\views/thankyou.blade.php ENDPATH**/ ?>