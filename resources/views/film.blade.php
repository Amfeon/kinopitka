@extends('layouts.basic')
@section('head')
    {{--@foreach($film as $film)--}}
    <meta  property="og:title" content="{{$film->title}} дата выхода Blu-Ray релиза">
    <meta  property="og:type" content="video.movie">
    <meta  property="og:url" content="{{url()->current()}}">
    <meta  property="og:image" content="{{$film->image}}">
    <meta  property="og:video:director" content="{{$film->director}}">
    <meta  property="og:video:release_date" content="{{$film->release}}">
    <meta name="description"  property="og:description" content="{{$film->description}}">
    <title>
        {{$film->title}} / {{$film->original}} дата выхода на DVD / Blu-ray / HD и в iTunes
    </title>
@endsection
@section('menu')
    <li ><a href="{{ url('/') }}">Даты выхода</a></li>
    <li class="{{'active'}}"><a href="{{ url('/blu-ray') }}">Blu-Ray релизы</a></li>
    <li><a href="{{ url('/release-changes') }}">Новости релизов</a>
@endsection
@section('content')
<main class="container" itemscope itemtype="http://schema.org/Movie">
    <h1 class="success" itemprop="name">{{$film->title}} / {{$film->original}}</h1>
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- алаптивные верх -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-4528857575775094"
     data-ad-slot="6307733935"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
    <div class="row ">
        <div class="image_block">
            <div class="picture">
                <img itemprop="image" class="img-thumbnail" title="{{$film->title}}" alt="{{$film->title}}" src="{{'../'.$film->image}}">
            </div>
            <div class="icon">
                @if($film->release<=@date('Y-m-d'))
                    <a class="row" href="http://www.kinopoisk.ru/film/{{$film->kinopoisk}}/">
                        <img  src="https://rating.kinopoisk.ru/{{$film->kinopoisk}}.gif" alt="{{$film->title}}">
                    </a>
                    <span class='imdbRatingPlugin'  data-title='{{$film->imdb}}' data-style='p2'>
						<a href='https://www.imdb.com/title/{{$film->imdb}}' ><img alt='on IMDb' src='/css/images/imdb_46x22.png'>
						</a></span>
                @endif
            </div>
        </div>
        <div class="date_block">
            <div class="stroka"><strong >Дата выхода в России: </strong>                            <p class="date"> <span itemprop="datePublished">{{$date['date_release']}}</span> года</p></div>
            <div class="stroka"><strong >Дата DVD / Blu-Ray (iTunes) релиза </strong>               <p class="date"> {{$date['Blu_ray_release']}} года</p></div>
            <div class="stroka"><strong >Режиссер: </strong>             <p class="date" itemprop="director"> {{$film->director}}</p></div>
            <div class="actors"><strong >Актеры: </strong>               <p class="date" itemprop="actors">{{$film->actors}}</p></div>
            <div class="share" id="rating">
            </div>
        </div>
    </div>
    <article class="row article">
        <div class="text">
            <h3 class="info" >Сюжет:</h3>
            {!!$film->plot!!}
        </div>
            @foreach($trailers as $trailer)
                <div class="trailer" >
                    <h3 >{{$trailer->title}}</h3>
                    <span >{!! $trailer->trailer!!}</span>
                </div>
            @endforeach
    </article>
</main>
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
                        $('#rating').on('click', '.rating_bottom', function () {
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
                                    $(".rating_bottom,.qwestion").hide()
                                }
                            });
                        });
                    }else{
                        $(".rating_bottom,.qwestion").hide()
                    }
                }
            });
        })
    </script>
    <script type="text/javascript">
        (function(d,s,id){var js,stags=d.getElementsByTagName(s)[0];
            if(d.getElementById(id)){return;}js=d.createElement(s);js.id=id;
            js.src='/js/rating.min.js';
            stags.parentNode.insertBefore(js,stags);})(document,'script','imdb-rating-api');
    </script>
@endsection
