@extends('layouts.admin')
@section('content')
<div class="container">
    @if($errors->has())
     <ul>

             {{$errors->first('title','<li>:message</li>')}}

     </ul>
    @endif
     <form id='createForm' class="form-horizontal" method="POST" action='/store'>

         <label class="control-label">imdb</label>
         <div class="btn btn-info" id="parse">Спарсить</div>
         <input type="text" class="form-control" id="imdb"  name="imdb" required value="{{Request::old('imdb')}}">

         <label class="control-label">iКинопоиск</label>
         <input type="text" class="form-control" id="kinopoisk"  name="kinopoisk" required value="{{Request::old('kinopoisk')}}">

         <label class="control-label">Источник дат DVD</label>
         <input type="text" class="form-control" id="DVD_sourse"  name="DVD_sourse" required value="{{Request::old('DVD_sourse')}}">

         <label class="control-label">Режиссер</label>
         <input type="text" class="form-control"  name="director" value="{{Request::old('director')}}" >

         <label class="control-label">Актеры</label>
         <input type="text" class="form-control"  name="actors" value="{{Request::old('actors')}}" >

         <label class="control-label">Описание</label>
         <input type="text" class="form-control"  name="description" value="{{Request::old('description')}}" required>

       <div id="body">

         <label class="control-label">Название фильма</label>
         <input type="text" class="form-control"  name="title" required value="{{Request::old('title')}}">

         <label class="control-label">Оригинальное</label>
         <input type="text" class="form-control"  name="original" value="{{Request::old('original')}}" required >

         <label class="control-label">Дата выхода</label>
         <input type="date" class="form-control"  name="release" value="{{@date('Y-m-d')}}" required>

         <label class="control-label">Блю-рей релиз</label>
         <input type="date" class="form-control"  name="Blu_ray"  value="{{@date('Y-m-d')}}" required>

         <label class="control-label">Картинка</label>
         <input type="text" class="form-control"  name="image" required value="{{Request::old('image')}}">

      </div>

         <label class="control-label">Трейлер</label>
         <input type="text" class="form-control"  name="trailer">
            <label class="control-label">СЮжет фильма</label>
            <textarea class="form-control" id="text" name="text"> {{Request::old('text')}}</textarea>
          <input type="hidden" name="_token" value="{{csrf_token()}}">
         <input class="btn btn-primary" type="submit" value="Создать">
    </form>
</div>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
    $('createForm').validate();
</script>
<script>tinymce.init({ selector:'textarea',
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        content_css: [
            '//www.tinymce.com/css/codepen.min.css'
        ]
    });</script>
<script>
    $(document).ready(function(){
        $('#parse').on('click', function(){
            var url=$('#imdb').val();

            $.ajax({
                type:'GET',
                url: "test",
                cache: false,
                data: {url: url},
                success: function(html){
                    $("#body").html(html);
                }
            })
        });
    });
</script>
@endsection