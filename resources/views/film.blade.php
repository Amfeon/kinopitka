@extends('layouts.app')

@section('content')
    @foreach($film as $film)
<div class="container" style="background: #fff;">
    <h1 class="row alert alert-info">{{$film->title}} / {{$film->original}}</h1>
    <div class="row">
        <div class="col-sm-4">
            <div class="row">
                <div class="col-md-7">
                    <img class="img-thumbnail" title="{{$film->title}}" alt="{{$film->title}}" src="{{'../'.$film->image}}">
                </div>
                <div class="col-md-5">
                    <a class="row" href="http://www.kinopoisk.ru/film/822708/">
                        <img  src="http://rating.kinopoisk.ru/822708.gif">
                    </a>
                    <span class='imdbRatingPlugin'  data-title='tt1253863' data-style='p2'>
						<a href='http://www.imdb.com/title/tt1253863' ><img alt='on IMDb' src='http://g-ecx.images-amazon.com/images/G/01/imdb/plugins/rating/images/imdb_46x22.png'>
						</a></span>
                    <script>
                        (function(d,s,id){var js,stags=d.getElementsByTagName(s)[0];
                            if(d.getElementById(id)){return;}js=d.createElement(s);js.id=id;
                            js.src='http://g-ec2.images-amazon.com/images/G/01/imdb/plugins/rating/js/rating.min.js';
                            stags.parentNode.insertBefore(js,stags);})(document,'script','imdb-rating-api');
                    </script>
                    <div>  МЕстный рейтинг </div>
                </div>

            </div>

        </div>
        <div class="col-sm-8">
            <div class='row'>
                <strong class='col-xs-6 lead'>Релиз в России:  </strong> <p class='col-xs-6  lead' style='color: #0077d3;  font-size: 20px;'> {{@date('d-m-Y', strtotime($film->release))}} года</p>
            </div>
            <div class='row'>
                <strong class='col-xs-6 lead'>Blu-Ray релиз предположительно:</strong><p class='col-xs-6 lead' style='color: #0077d3;'>{{@date('d-m-Y', strtotime($film->Blu_ray))}} года</p>
            </div>
            <div class='row'>
                <strong class='col-xs-3 lead'>Режиссер:</strong><p class='col-xs-9 lead' style='color: #0077d3;'>Имя</p>
            </div>
            <div class='row'>
                <strong class='col-xs-3 lead'>Актеры:</strong><p class='col-xs-9 lead' style='color: #0077d3;'>Имя</p>
            </div>
            </div>
        </div>
    <article class="row">
        <div class="col-md-9 col-md-offset-1">
            <p>&nbsp;Знатный клипмейкер Джастин Лин под влиянием финансовых потокок JJ Абрамса снова в деле.</p>

            <p>В общем и целом, на главных героев в очередной раз напала какая то пакость, и судя по трейлерам, это был местный аналог космических зергов, короче похерили корабль и главным героям пришлось десантироваться на ближайшую планету,&nbsp;</p>

            <p>и по случайному стечению обстоятельств планета была густо населена, тут то и начинается замес...</p>
            {!!$film->plot!!}
        </div>




    </article>
    <div class="row ">
       @if($film->trailer!='')
            <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$film->trailer}}" frameborder="0" allowfullscreen></iframe>
           @endif
    </div>
    </div>
</div>
    @endforeach

@endsection
