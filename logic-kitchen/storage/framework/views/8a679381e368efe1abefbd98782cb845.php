<div class="form-wrapper gift-form">
    <p>Используйте возможность сэкономить - выберите подарок при заказе кухни!</p>
    <form class="main-form" action="<?php echo e(route('post_form')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="form_type" value="giftform">
        <select name="gift" id="gift-select">
            <option value="" selected disabled>Ваш подарок</option>
            <option value="Мойка">Мойка</option>
            <option value="Смеситель">Смеситель</option>
            <option value="Фильтр для воды">Фильтр для воды</option>
        </select>
        <input type="text" name="name" class="name" placeholder="Как к вам обращаться?*" value="<?php echo e(old('name')); ?>" required max="50" min="1">
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
        <input type="tel" name="phone" class="phone-mask" placeholder="Введите телефон*" value="<?php echo e(old('phone')); ?>" required>
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
</div><?php /**PATH D:\Виктория\Курсы\Laravel\logic-kitchen\resources\views/forms/gift.blade.php ENDPATH**/ ?>