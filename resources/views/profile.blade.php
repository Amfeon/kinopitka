@extends('layouts.basic')
@section('menu')
    <li ><a href="{{ url('/') }}">Даты выхода</a></li>
    <li ><a href="{{ url('/blu-ray') }}">Blu-Ray релизы</a></li>
    @if($user->rule=='god') <li class="btn-warning"><a href="{{ url('/admin') }}">Админка</a></li>@endif
@endsection
@section('content')
    <div class="container" style="background-color: #f5f5f5;padding-top: 20px;">
        <img src="image/avatar/{{$user->avatar}}" style="width:150px; height: 150px; border-radius: 50%; float:left; margin-right: 25px; ">
        <h2>Спасибо что зашел {{$user->name}}</h2>
        <form enctype="multipart/form-data" action="/profile" method="POST">
            <laber>Обновить аватарку</laber>
            <input type="file" name="avatar">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="submit" class="pull-right btn btn-info">
        </form>

    </div>
@endsection