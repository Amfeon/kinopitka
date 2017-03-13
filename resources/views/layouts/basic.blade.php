<!DOCTYPE HTML>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css" type="text/css"/>
    @yield('head')
</head>
<body>
<nav class="header">
    <div class="logo">
        <img src="/image/logo_1.png" alt="Кинопытка - твой дневничок выхода фильмов"/>
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
        <a href="{{ url('/release-changes') }}">
            <div >
                Новости релизов
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
@yield('scripts')
</body>
</html>
