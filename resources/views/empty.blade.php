@extends('layouts.app')
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