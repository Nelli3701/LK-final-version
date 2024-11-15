<div class="popup-overlay">
    <div class="inner-form popup form-wrapper">
        <div class="form-header">
            <button class="btn-close"></button>
            <p>Закажите расчет стоимости вашей новой кухни - это бесплатно и ни к чему вас не&nbsp;обязывает</p>
        </div>

        <form class="main-form " action="<?php echo e(route('post_form')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="form_type" value="mainform">
            <input type="text" name="name" class="name" value="<?php echo e(old('name')); ?>" placeholder="Как к вам обращаться?*" required max="50" min="1">
            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <small class="red-text"><?php echo e($message); ?></small>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <input type="tel" name="phone" class="phone-mask" value="<?php echo e(old('phone')); ?>" placeholder="Ваш телефон*" required>
            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <small class="red-text"><?php echo e($message); ?></small>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <small>Нажимая кнопку «Отправить», я даю свое согласие на <a href="/soglasie">обработку персональных данных</a></small>
            <input class="btn" type="submit" value="Отправить">
        </form>
    </div>
</div><?php /**PATH D:\Виктория\Курсы\Laravel\logic-kitchen\resources\views/forms/mainform.blade.php ENDPATH**/ ?>