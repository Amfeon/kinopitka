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
            <ul>

                    <li  class="row" style="padding: 0;list-style-type:none;">
                       <div class="col-sm-6">
                          <div class="row"> Дом странных детей Мисс Перегрин / Miss Peregrine's Home for Peculiar Children</div>
                       </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-8">РЕлиз намечен на:</div>
                                <div class="col-sm-4"> 12-12-2016</div>
                            </div>
                        </div>
                    </li>
                <li class="row" style="padding: 0;  list-style-type:none">
                    <div class="col-sm-6">
                        <div class="row"> Дом странных детей Мисс Перегрин </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-8">Blu-ray намечен на:</div>
                            <div class="col-sm-4"> 12-12-2016</div>
                        </div>
                    </div>
                </li>

            </ul>

        </div>
    </article>

@endsection