@extends('layouts.basic')
@section('head')
    <meta name="description" content="Здесь вы можете найти дату выхода лицензии ожидаемого вами фильма на Blu-ray и HD.">
    <title>
        График  Blu-ray и HD лицензированных релизов ожидаемых фильмов намеченных на @if(isset($data['now'])) {{$data['now']}} @endif Кинопытка.ru
    </title>
@endsection
@section('menu')
    <li ><a href="{{ url('/') }}">Даты выхода</a></li>
    <li class="{{'active'}}"><a href="{{ url('/blu-ray') }}">Blu-Ray релизы</a></li>
@endsection
@section('content')
    <div class="container ">
        <h1 class=" alert alert-info"> Blu-ray релизы запланированные на   {{$data['now']}}</h1>
        <div class="row">
          <p> К сожалению, в этом месяце Blu-ray релизов не запланированно!</p>
        </div>
        <div id="more" class="row text-center" style="width: 100%;">
            <a href="/blu-ray/{{$data['prev']}}"><div class="col-sm-5 text-left arrow-left">
                    {{$data['prev']}}
                </div></a>
            <a href="/blu-ray/{{$data['next']}}">
                <div class="col-sm-offset-2 col-sm-5 text-right arrow-right">
                    {{$data['next']}}
                </div></a>

        </div>
    </div>
@endsection