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
    <li><a href="{{ url('/release-changes') }}">Новости релизов</a></li>
@endsection
@section('content')
    <main class="container">
        <div class="row">
            <h1 class=" alert alert-info"> Blu-ray релизы запланированные на   {{$data['now']}}</h1>
            <p>
               Здесь представлен список оффициальных релизов, никаких пираточек и прочей ереси, только кашерный Blu-Ray. Однако, даты могу меняться так что следите за новостями.
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
                            <a href='/film/{{$film->id}}'>
                                <img  width="150" height="250" src ='/{{$film->image}}' alt='Подробенее о фильме {{$film->title}}' title='Подробенее о фильме {{$film->title}}'/>
                            </a>
                            <div class="stripe_down">Blu-ray релиз:<br/> {{$film->Blu_ray}}</div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="blu_ray_nav">
            <a class="left" href="/blu-ray/{{$data['prev']}}">
                <div >
                {{$data['prev']}}
                 </div>
            </a>
            <a class="right" href="/blu-ray/{{$data['next']}}">
            <div >
                {{$data['next']}}
            </div></a>
        </div>
    </main>
@endsection