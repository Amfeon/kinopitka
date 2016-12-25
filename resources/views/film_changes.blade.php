@extends('layouts.basic')
@section('head')
        <meta name="description" content="Здесь публикуются изменение Blu-ray релизов и дат выхода фильмов">
        <title>
            Изменения в датах выхода фильмов и Blu-ray релизов.
        </title>

@endsection
@section('menu')
    <li ><a href="{{ url('/') }}">Даты выхода</a></li>
    <li ><a href="{{ url('/blu-ray') }}">Blu-Ray релизы</a></li>
    <li class="{{'active'}}"><a href="{{ url('/release-changes') }}">Новости релизов</a></li>
@endsection
@section('content')
    <article class="container" style="background: #fff; border-radius: 10px;">
        <h1 class="alert alert-info">Изменения в датах выхода фильмов и Blu-ray релизов. </h1>
        <div class="row">Публикуются даты  ОФИЦИАЛЬНЫХ Blu-ray релизов, никаких пираток и прочей ереси. Данные с оффициальных сайтов.</div>
        <div class="row">
                <h2 class="text-center  alert-success" style="border:1px solid #2b542c"> 21 Декабря 2016 </h2>
                    <div class="col-md-12" style="padding: 0;">
                       <div class="col-sm-3"><img src="http://laravel-test.ru/image/MissPeregrinesHomeforPeculiarChildren.jpg" width="100" height="170"></div>
                       <div class="col-sm-3">
                          <div class="row"> title(original)</div>

                       </div>
                        <div class="col-sm-3">
                            <div class="row">Дата изменена на:</div>
                            <div class="row">12-12-2016</div>
                        </div>
                    </div>

        </div>
    </article>

@endsection