<!DOCTYPE HTML>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="02jOB7DICDF9XjHoxsxNclYzXSWCjzeaUksskb4719A" />
    <meta name="_token" content="{!! csrf_token() !!}"/>

    <link defer rel="stylesheet" href="../css/style.css" type="text/css">
    @yield('head')
</head>
<body>
<nav class="header">
    <div class="logo">
        <a href="/"><img src="/image/logo_1.png" alt="Кинопытка - твой дневничок выхода фильмов"/></a>
    </div>
    <div class="menu">
        <a href="{{ url('/') }}">
            <div>
                Даты выхода
            </div>
        </a>
        <a href="{{ url('/blu-ray') }}">
            <div >
                Blu-Ray релизы
            </div>
        </a>

    </div>
    <div class="search">
        <form action="http://yandex.ru/sitesearch" method="get">
            <input name="search" placeholder="Найти фильм" type="search" required>
            <input class ="button" type="submit" value="поиск">
        </form>
    </div>
</nav>
<div class="wraper">
@yield('content')

<footer class="footer">
    <p>
    Копирайты и все такое =)
    </p>
</footer>
</div>
<script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
@yield('scripts')

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter3096745 = new Ya.Metrika({
                    id:3096745,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/3096745" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>
