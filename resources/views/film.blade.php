@extends('layouts.app')

@section('content')
    @foreach($film as $film)
<div class="container" style="background: #fff;">
    <h1 class="row alert alert-success">{{$film->title}} / {{$film->original}}</h1>
    <div class="row">
        <div class="col-sm-4 ">
            <div class="row">
                <div class="col-lg-7">
                    <img class="img-thumbnail" title="{{$film->title}}" alt="{{$film->title}}" src="{{'../'.$film->image}}">
                </div>
                <div class="col-lg-5">
                    @if($film->release<=@date('Y-m-d'))
                    <a class="row" href="http://www.kinopoisk.ru/film/{{$film->kinopoisk}}/">
                        <img  src="http://rating.kinopoisk.ru/{{$film->kinopoisk}}.gif">
                    </a>
                    <span class='imdbRatingPlugin'  data-title='{{$film->imdb}}' data-style='p2'>
						<a href='http://www.imdb.com/title/{{$film->imdb}}' ><img alt='on IMDb' src='http://g-ecx.images-amazon.com/images/G/01/imdb/plugins/rating/images/imdb_46x22.png'>
						</a></span>
                    <script>
                        (function(d,s,id){var js,stags=d.getElementsByTagName(s)[0];
                            if(d.getElementById(id)){return;}js=d.createElement(s);js.id=id;
                            js.src='http://g-ec2.images-amazon.com/images/G/01/imdb/plugins/rating/js/rating.min.js';
                            stags.parentNode.insertBefore(js,stags);})(document,'script','imdb-rating-api');
                    </script>
                @endif
                </div>

            </div>

        </div>
        <div class="col-sm-8">
            <div class='row'>
                <strong class='col-sm-6 lead'>Релиз в России:  </strong> <p class='col-sm-6  lead' style='color: #0077d3;  font-size: 20px;'> {{@date('d-m-Y', strtotime($film->release))}} года</p>
            </div>
            <div class='row'>
                <strong class='col-sm-6 lead'>Blu-Ray релиз предположительно:</strong><p class='col-sm-6 lead' style='color: #0077d3;'>{{@date('d-m-Y', strtotime($film->Blu_ray))}} года</p>
            </div>
            <div class="row hidden-sm hidden-xs" id="rating">
                <div class="row text-center">Фильм ждет: 20%, А ты?</div>
                <div class="col-xs-2 btn btn-info  col-xs-offset-1 ">пофиг</div>
                <div class="col-xs-6  progress">
                    <div class="progress-bar progress-bar-info progress-bar-striped"  style="width:20%;height: 100%" >20%</div>
                </div>
                <div class="col-xs-2 btn btn-info">жду</div>
                <div class="text-center  " style="margin-bottom: 10px">
                    <script type='text/javascript' src='//yastatic.net/es5-shims/0.0.2/es5-shims.min.js' charset='utf-8'></script>
                    <script type='text/javascript' src='//yastatic.net/share2/share.js' charset='utf-8'></script>
                    <div class='ya-share2' data-services='vkontakte,facebook,odnoklassniki,moimir,twitter,viber,whatsapp'></div>
                </div>
            </div>

            <div class='row'>
                <strong class='col-xs-3 lead'>Режиссер:</strong><p class='col-xs-9 lead' style='color: #0077d3;'>{{$film->director}}</p>
            </div>
            <div class='row'>
                <strong class='col-xs-3 lead'>Актеры:</strong><p class='col-xs-9 lead' style='color: #0077d3;'>{{$film->actors}}</p>
            </div>
            <div class="row visible-sm visible-xs ">
                <script type='text/javascript' src='//yastatic.net/es5-shims/0.0.2/es5-shims.min.js' charset='utf-8'></script>
                <script type='text/javascript' src='//yastatic.net/share2/share.js' charset='utf-8'></script>
                <div class='ya-share2' data-services='vkontakte,facebook,odnoklassniki,moimir,twitter,viber,whatsapp'></div>
            </div>
            </div>
        </div>

    <article class="row">
        <div class="col-md-10 ">
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
