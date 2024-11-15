

<?php $__env->startSection('title', 'Контакты студии Logic Kitchen в Екатеринбурге'); ?>

<?php $__env->startSection('description', 'Студия по проектированию и изготовлению кухонь на заказ'); ?>

<?php $__env->startSection('page-content'); ?>
<div class="contacts container">
    <p><b>Телефон:</b> <a href="tel:<?php echo e($phone); ?>"><?php echo e($phone); ?></a></p>
    <p><b>E-mail:</b> <a href="mailto:<?php echo e($email); ?>"><?php echo e($email); ?></a></p>
    <p><b>WhatsApp:</b> <a href="<?php echo e($whatsapp); ?>" target="_blank">8-912-607-16-19</a></p>
    <p><b>Telegram:</b> <a href="<?php echo e($telegram); ?>" target="_blank">@logic_kitchen</a></p>
    <p><b>VK:</b> <a href="<?php echo e($vk); ?>" target="_blank"><?php echo e($vk); ?></a></p>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Виктория\Курсы\Laravel\logic-kitchen\resources\views/contacts.blade.php ENDPATH**/ ?>