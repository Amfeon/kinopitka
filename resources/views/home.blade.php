@extends('layouts.basic')
@section('head')
    <meta name="description" content="Здесь вы можете найти дату выхода лицензии ожидаемого вами фильма, а так же его Blu-ray релиза">
    <title>
        График выхода фильмов в кино, Blu-ray и HD лицензированных релизов ожидаемых фильмов на Кинопытка.ru
    </title>
@endsection
@section('content')
<main class="container">
    <div class="row">
        <h1> Даты выхода фильмов в кинотеатрах России </h1>
        <p>
           Представляем вашему вниманию даты выхода самых ожидаемых фильмов.
        </p>
    </div>
    <div class="row">
        <ul id='scroll' >
            @foreach($films as $film)
                <li>
                <div class='poster'>
                    <div class="stripe_up">
                        {{$film->title}}
                    </div>
                    <a href='film/{{$film->id}}'>
                        <img  width="150" height="250" src ='{{$film->image}}' alt='Подробнее о фильме {{$film->title}}' title='Подробнее о фильме {{$film->title}}'/>
                    </a>
                    <div class="stripe_down">Дата Выхода:<br/> {{$film->release}}</div>
                </div>
                </li>
            @endforeach
        </ul>
    </div>
    <div id="more" class="more_scroll">
        <p>
        Показать еще
        </p>
    </div>
</main>
@endsection
@section('scripts')
<script type="text/javascript">
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        var start=12;
        $("#more").click(function () {
            var btn = $(this)
            btn.text('loading...')
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
                btn.text('<p>Показать еще</p>')
            });
            return false
        })
    });
</script>
@endsection
