<!DOCTYPE html>
<html lang="ru">

<head>
    @include('includes.head')
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

                @include('includes.header')



                <nav class="navbar dark-background">

                    @include('includes.nav')


                </nav>

            </header>
            <div class="page-content">
                @if (!request()->is('/') && !isset($hideTitle))
                <h1 class="container">{{ $name ?? 'Logic Kitchen' }}</h1>
                @endif
                @yield('page-content')
            </div>

        </div>
        <footer class="footer">
            @include('includes.footer')

        </footer>
    </div>
    <script type="module" src="scripts/index.js"></script>
</body>

</html>