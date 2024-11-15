<!DOCTYPE html>
<html lang="ru">

<head>
    <?php echo $__env->make('includes.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function(m, e, t, r, i, k, a) {
            m[i] = m[i] || function() {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            for (var j = 0; j < document.scripts.length; j++) {
                if (document.scripts[j].src === r) {
                    return;
                }
            }
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(98907726, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/98907726" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
    <div class="wrapper">
        <div class="content light-background">
            <header class="main-header">

                <?php echo $__env->make('includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



                <nav class="navbar dark-background">

                    <?php echo $__env->make('includes.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                </nav>

            </header>
            <div class="page-content">
                <?php if(!request()->is('/') && !isset($hideTitle)): ?>
                <h1 class="container"><?php echo e($name ?? 'Logic Kitchen'); ?></h1>
                <?php endif; ?>
                <?php echo $__env->yieldContent('page-content'); ?>
            </div>

        </div>
        <footer class="footer">
            <?php echo $__env->make('includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </footer>
    </div>
    <script type="module" src="scripts/index.js"></script>
</body>

</html><?php /**PATH D:\Виктория\Курсы\Laravel\logic-kitchen\resources\views/layouts/default.blade.php ENDPATH**/ ?>