<!DOCTYPE html>
<html lang="en">

<head>
    <title>Новое сообщение с формы сайта</title>
</head>

<body>
    <h1>Новое сообщение с формы</h1>
    <p><strong>Имя:</strong> <?php echo e($name); ?></p>
    <p><strong>Телефон:</strong> <?php echo e($phone); ?></p>

    <?php if(isset($gift)): ?>
    <p><strong>Подарок:</strong> <?php echo e($gift); ?></p>
    <?php endif; ?>
</body>

</html><?php /**PATH D:\Виктория\Курсы\Laravel\logic-kitchen\resources\views/emails/form_submission.blade.php ENDPATH**/ ?>