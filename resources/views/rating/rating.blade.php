@if($RatingInfo->rating==0)
    <div class="row text-center lead alert alert-warning" style="padding: 10px">Фильм пока, вообще никто не ждет, А ты?</div>
@else
<div class="row text-center lead alert alert-warning" style="padding: 10px">Фильм ждет: {{@round($RatingInfo->rating*100)}}%<span class="qwestion">, А ты?</span></div>
@endif
<div id="negativ" class="col-xs-2 btn btn-info  col-xs-offset-1 botton">пофиг</div>
<div class="col-xs-6  progress">
    <div class="progress-bar progress-bar-info progress-bar-striped"  style="width:{{@round($RatingInfo->rating*100)}}%;height: 100%" >{{@round($RatingInfo->rating*100)}}%</div>
</div>
<div id="positiv" class="col-xs-2 btn btn-info botton">жду</div>
<div class="text-center  " style="margin-bottom: 10px">
    <script type='text/javascript' src='//yastatic.net/es5-shims/0.0.2/es5-shims.min.js' charset='utf-8'></script>
    <script type='text/javascript' src='//yastatic.net/share2/share.js' charset='utf-8'></script>
    <div class='ya-share2' data-services='vkontakte,facebook,odnoklassniki,moimir,twitter,viber,whatsapp'></div>
</div>
