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
