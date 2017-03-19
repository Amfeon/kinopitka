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
            <input class ="button" type="submit" value="Жмахай">
        </form>
    </div>
</nav>

@yield('content')

<footer class="footer">
    <p>
    Копирайты и все такое =)
    </p>
</footer>
<script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
@yield('scripts')
</body>
</html>
