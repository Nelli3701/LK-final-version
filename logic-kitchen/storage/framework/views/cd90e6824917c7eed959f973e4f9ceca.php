<div class="logo">
    <?php if(!request()->is('/')): ?>
    <a href="/" class="logo-link">
        <img src="<?php echo e($src); ?>" alt="<?php echo e($alt); ?>" class="logo-img">
        <span class="logo-text"><?php echo $text; ?></span>
    </a>
    <?php else: ?>
    <span class="logo-link">
        <img src="<?php echo e($src); ?>" alt="<?php echo e($alt); ?>" class="logo-img">
        <span class="logo-text"><?php echo $text; ?></span>
    </span>
    <?php endif; ?>
</div><?php /**PATH D:\Виктория\Курсы\Laravel\logic-kitchen\resources\views/components/logo.blade.php ENDPATH**/ ?>