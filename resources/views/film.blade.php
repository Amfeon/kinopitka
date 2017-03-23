@extends('layouts.basic')
@section('head')
    {{--@foreach($film as $film)--}}
    <meta name="description" content="{{$film->description}}">
    <title>
        {{$film->title}} / {{$film->original}} дата выхода и Blu-ray релиза
    </title>

@endsection
@section('menu')
    <li ><a href="{{ url('/') }}">Даты выхода</a></li>
    <li class="{{'active'}}"><a href="{{ url('/blu-ray') }}">Blu-Ray релизы</a></li>
    <li><a href="{{ url('/release-changes') }}">Новости релизов</a>
@endsection
@section('content')

<main class="container">
    <h1 class="success">{{$film->title}} / {{$film->original}}</h1>
    <div class="row ">
        <div class="image_block">
            <div class="picture">
                <img class="img-thumbnail" title="{{$film->title}}" alt="{{$film->title}}" src="{{'../'.$film->image}}">
            </div>
            <div class="icon">
                @if($film->release<=@date('Y-m-d'))
                    <a class="row" href="http://www.kinopoisk.ru/film/{{$film->kinopoisk}}/">
                        <img  src="http://rating.kinopoisk.ru/{{$film->kinopoisk}}.gif" alt="{{$film->title}}">
                    </a>
                    <span class='imdbRatingPlugin'  data-title='{{$film->imdb}}' data-style='p2'>
						<a href='http://www.imdb.com/title/{{$film->imdb}}' ><img alt='on IMDb' src='http://g-ecx.images-amazon.com/images/G/01/imdb/plugins/rating/images/imdb_46x22.png'>
						</a></span>
                @endif
            </div>

        </div>
        <div class="date_block">
            <div class="stroka"><strong >Дата выхода в России: </strong>                             <p class="date"> {{@date('d-m-Y', strtotime($film->release))}} года</p></div>
            <div class="stroka"><strong >Blu-Ray релиз предположительно: </strong>             <p class="date"> {{@date('d-m-Y', strtotime($film->Blu_ray))}} года</p></div>
            <div class="share" id="rating">
                <script type='text/javascript' src='//yastatic.net/es5-shims/0.0.2/es5-shims.min.js' charset='utf-8'></script>
                <script type='text/javascript' src='//yastatic.net/share2/share.js' charset='utf-8'></script>
                <div class='ya-share2' data-services='vkontakte,facebook,odnoklassniki,moimir,twitter,viber,whatsapp'></div>
            </div>
            <div class="stroka"><strong >Режиссер: </strong>             <p class="date"> {{$film->director}}</p></div>
            <div class="actors"><strong >Актеры: </strong>               <p class="date">{{$film->actors}}</p></div>
        </div>
    </div>
    <article class="row article">
        <div class="text">
            <h3 class="info" >Сюжет:</h3>
            {!!$film->plot!!}
        </div>

            @foreach($trailers as $trailer)
                <div class="trailer">
                    <h3>{{$trailer->title}}</h3>
                    {!! $trailer->trailer!!}
                </div>
            @endforeach
    </article>
</main>

    {{--@endforeach --}}

@endsection
@section('scripts')
    <!-- JavaScripts -->
    <script type="text/javascript" src="../js/jquery.cookie.js"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $.ajax({
                type: 'post',
                url: '/rating',
                data: {id:{{$film->id}}},
                success: function (html) {
                    $("#rating").html(html);
                    $("#negativ").data({'negativ': 1, 'positiv': 0});
                    $("#positiv").data({'positiv': 1, 'negativ': 0});
                    if($.cookie("cc"+{{$film->id}})!={{$film->id}}){
                        $('#rating').on('click', '.botton', function () {
                            var positiv = $(this).data("positiv");
                            var negativ = $(this).data("negativ");
                            // $( "body" ).data( "bar", "foobar" );
                            // alert(negativ);
                            // console.log(positiv);
                            $.ajax({
                                type:'POST',
                                url:'/ratingAdd',
                                data: {id: {{$film->id}}, positiv: positiv, negativ: negativ},
                                success: function(html){
                                    $("#rating").html(html);
                                    $("#negativ").data({'negativ': 1, 'positiv': 0});
                                    $("#positiv").data({'positiv': 1, 'negativ': 0});
                                    $.cookie("cc"+{{$film->id}}, {{$film->id}}, { expires: 350});
                                    $(".botton,.qwestion").hide()
                                }
                            });
                        });
                    }else{
                        $(".botton,.qwestion").hide()
                    }
                }
            });
        })
    </script>
    <script type="text/javascript">
        (function(d,s,id){var js,stags=d.getElementsByTagName(s)[0];
            if(d.getElementById(id)){return;}js=d.createElement(s);js.id=id;
            js.src='http://g-ec2.images-amazon.com/images/G/01/imdb/plugins/rating/js/rating.min.js';
            stags.parentNode.insertBefore(js,stags);})(document,'script','imdb-rating-api');
    </script>
@endsection
