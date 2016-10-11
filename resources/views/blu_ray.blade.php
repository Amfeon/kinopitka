@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class=" alert alert-info"> Blu-ray релизы запланированные на   {{$data['now']}}</h1>
        <div class="row">
            <ul id='scroll' class='list-inline'>
                @foreach($films as $film)
                    <li>
                        <div class='col-md-12' style='padding:0;'>
                            <a href='/film/{{$film->id}}'>
                                <img  width="150" height="250" src ='/{{$film->image}}' alt='Подробенее о фильме {{$film->title}}' title='Подробенее о фильме {{$film->title}}'/>
                            </a>
                            <div style='position: absolute;    top: 0;    	width: 100%;    left: 0;    	text-align: center;color: #fff;background: transparent url("/CSS/images/transparency.png") repeat scroll 0 0;'>{{$film->title}}</div>
                            <div style='position: absolute;    bottom: 0;    	width: 100%;    left: 0;    	text-align: center;color: #fff;background: transparent url("/CSS/images/transparency.png") repeat scroll 0 0;'>Blu-ray релиз:<br/> {{$film->Blu_ray}}</div>
                        </div>
                    </li>
                @endforeach
            </ul>
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