<!DOCTYPE HTML>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <meta name="description" content="Здесь вы можете найти дату выхода лицензии ожидаемого вами фильма, а так же его Blu-ray релиза">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css" type="text/css"/>
        <title>
                График выхода фильмов в кино, Blu-ray и HD лицензированных релизов ожидаемых фильмов на Кинопытка.ru
        </title>
</head>
<body id="app-layout">
<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Выпадающее меню</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                Kinopitka.ru
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li class="{{'active'}}"><a href="{{ url('/') }}">Даты выхода</a></li>
                <li><a href="{{ url('/blu-ray') }}">Blu-Ray релизы</a></li>

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Логин</a></li>
                    <li><a href="{{ url('/register') }}">Регистриция</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Выйти</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <h1 class="alert alert-info">Даты выхода наиболее ожидаемых фильмов</h1>
    <div class="row">
        <ul id='scroll' class='list-inline'>
            @foreach($films as $film)
                <li>
                <div class='col-md-12 shadow' style='padding:0;'>
                    <a href='film/{{$film->id}}'>
                        <img  width="150" height="250" src ='{{$film->image}}' alt='Подробенее о фильме {{$film->title}}' title='Подробенее о фильме {{$film->title}}'/>
                    </a>
                    <div style='position: absolute;    top: 0;    	width: 100%;    left: 0;    	text-align: center;color: #fff;background: transparent url("CSS/images/transparency.png") repeat scroll 0 0;'>{{$film->title}}</div>
                    <div style='position: absolute;    bottom: 0;    	width: 100%;    left: 0;    	text-align: center;color: #fff;background: transparent url("CSS/images/transparency.png") repeat scroll 0 0;'>Дата Выхода:<br/> {{$film->release}}</div>
                </div>
                </li>
            @endforeach
        </ul>
    </div>
    <div id="more" class="row btn btn-warning" style="width: 100%;border: 2px solid #D5AB55">
        Показать еще
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
</script>
<script>
    var start=12;
    $("#more").click(function () {
        var btn = $(this)
        btn.button('loading')

        $.ajax({
            url: "/", // url запроса
            cache: false,
            data: { start: start }, // если нужно передать какие-то данные
            type: "POST", // устанавливаем типа запроса POST
            success: function(html) {
                if(html==0){
                    $("#more").hide();
                }else {
                //console.log(html);
                    start=start+12;
                    alert(start);
                    $('#scroll').append(html);

                }
            } //контент подгружается в div#content
        }).always(function () {
            btn.button('reset')
        });
        return false
    })
</script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
<footer class="navbar-fixed-bottom" style="background: #080808;">
    <div class="navbar-inner container">
        <p>На сайте публикуются даты сугубо официальных релизов, собранных из зарубежных источников.</p>
        <ul >
            <li>
                <a rel="nofollow" href="https://vk.com/amfeon90" title="Вконтакте">Я в Контактике</a>
            </li>
            <li >
                <a rel="nofollow" href="http://www.youtube.com/channel/UCPK8GKDoB01K8e0NEOgO_sw" title="ТыТруба">Я в Ютубушке</a>
            </li>
            <li >
                <a rel="author" href="https://plus.google.com/u/0/115214208930230673302">Я в Гугл+</a>
            </li>
        </ul>
    </div>
</footer>
</body>
</html>
