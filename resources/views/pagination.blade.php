@foreach($films as $film)
    <li>
        <div class='col-md-12' style='padding:0;'>
            <a href='film/{{$film->id}}'>
                <img  width="150" height="250" src ='{{$film->image}}' alt='Подробенее о фильме {{$film->title}}' title='Подробенее о фильме {{$film->title}}'/>
            </a>
            <div style='position: absolute;    top: 0;    	width: 100%;    left: 0;    	text-align: center;color: #fff;background: transparent url("CSS/images/transparency.png") repeat scroll 0 0;'>{{$film->title}}</div>
            <div style='position: absolute;    bottom: 0;    	width: 100%;    left: 0;    	text-align: center;color: #fff;background: transparent url("CSS/images/transparency.png") repeat scroll 0 0;'>Blu-ray релиз:<br/> {{$film->Blu_ray}}</div>
        </div>
    </li>
@endforeach