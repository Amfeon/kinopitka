<!DOCTYPE HTML>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="02jOB7DICDF9XjHoxsxNclYzXSWCjzeaUksskb4719A" />
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <link rel="stylesheet" href="/css/style.css">

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
                Blu-Ray/ HD релизы
            </div>
        </a>
    </div>
    <div class="search">
        <div class="ya-site-form ya-site-form_inited_no" onclick="return {'action':'http://kinopitka.ru/search','arrow':false,'bg':'transparent','fontsize':15,'fg':'#000000','language':'ru','logo':'rb','publicname':'Поиск фильма','suggest':true,'target':'_self','tld':'ru','type':2,'usebigdictionary':false,'searchid':1765939,'input_fg':'#000000','input_bg':'#ffffff','input_fontStyle':'normal','input_fontWeight':'normal','input_placeholder':'найти фильм','input_placeholderColor':'#cccccc','input_borderColor':'#7f9db9'}"><form action="https://yandex.ru/search/site/" method="get" target="_self" accept-charset="utf-8"><input type="hidden" name="searchid" value="1765939"/><input type="hidden" name="l10n" value="ru"/><input type="hidden" name="reqenc" value=""/><input type="search" name="text" value=""/><input type="submit" value="Найти"/></form></div><style type="text/css">.ya-page_js_yes .ya-site-form_inited_no { display: none; }</style><script type="text/javascript">(function(w,d,c){var s=d.createElement('script'),h=d.getElementsByTagName('script')[0],e=d.documentElement;if((' '+e.className+' ').indexOf(' ya-page_js_yes ')===-1){e.className+=' ya-page_js_yes';}s.type='text/javascript';s.async=true;s.charset='utf-8';s.src=(d.location.protocol==='https:'?'https:':'http:')+'//site.yandex.net/v2.0/js/all.js';h.parentNode.insertBefore(s,h);(w[c]||(w[c]=[])).push(function(){Ya.Site.Form.init()})})(window,document,'yandex_site_callbacks');</script>
    </div>
</nav>
@yield('content')
<footer class="footer">
    <p> Всем хаюшки, меня зовут Дмитрий и я администратор сего сайта, если у вас есть вопросы или предложения, не стесняйтесь:</p>
    <ul class='list-group'>
        <li class="list-group-item"><a target="_blank" rel='nofollow' href="https://vk.com/amfeon90" title="Вконтакте">Я в Контактике</a> </li>
        <li class="list-group-item"><a target="_blank" rel='nofollow' href="http://www.youtube.com/channel/UCPK8GKDoB01K8e0NEOgO_sw" title="ТыТруба">Я в Ютубушке</a></li>
        <li class="list-group-item"><a target="_blank" rel="author" href="https://plus.google.com/u/0/115214208930230673302">Я в Гугл+</a></li>
        <li class="list-group-item">ну и старая добрая почта Amfeon@bk.ru</li>
    </ul>
</footer>
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
