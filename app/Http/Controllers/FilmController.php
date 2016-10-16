<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\film;
use App\Rating;
use DB;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;


class FilmController extends Controller
{
    //
    public function pagination(Request $request){
        if(isset($request->start)){
             $start=$request->start;
            $films= DB::select('select * from films limit ?,12', [$start]);

            return view('pagination',['films'=>$films]);
        }else{
           return "Что-то пошло не так";

        }

    }
    public function mainPage(film $filmModel){

       $films=DB::table('films')->where('Blu_ray','<=',Carbon::now())->take(12)->get();
        //$films=$filmModel->mainPageGet());
        return view('home',['films'=>$films]);
    }
    public function index(film $FilmModel,$id)
    {
        $film = $FilmModel->getPublishedFilm($id);
        return view('film',['film' => $film]);
    }
    public  function create(){
        //$this->authorize('create'); // <---- вот это важная строчка
        return view('create');
    }
    public function store($id=null,Request $request, film $kino, Rating $rating)
    {
        $this->validate($request,[
            'title'=>'required'
        ]);
            if ($id!=null) {
                $kino->updateFilm($request->all(), $id);
                return redirect('/admin');
            } else {
                $id=$kino->createFilm($request->all());
                $rating->addFilm($id);
                return redirect('/admin');
            }

    }
    public function showUpdate(Request $request,Film $filmModel){
        if (isset($request->id)){
            $films=$filmModel->getUpdatedFilm($request->id);
            return view('updateForm',['films'=>$films]);
        }else{
            $films=$filmModel->getFilm();// создать получение всех записей
            return view('show',['films'=>$films]);
        }
    }
    public function drop(Request $request, film $filmModel, rating $rating ){
        $films=$filmModel->drop($request->id);// создать получение всех записей
        $rating->delete($request->id);
        return redirect('/update');
    }

    public function admin(){
       // $this->authorize('admin');
        return view('layouts.admin');
    }

    public function Blu_ray($data=null){
        if($data!=null){
            $mass=explode('-',$data);
            $month=$this->change_date($mass[0]); //месяц в число

            $next_month=$month+1; //следующий месяц
            $next_year=$mass[1]; // следующий год
            if($next_month==13){ // определение Января нового года
                $next_month=1;
                $next_year=$mass[1]+1;
            }
            $next_month=$this->IntToString($next_month);
            //предыдущий месяц
            $prev_month=$month-1;
            $prev_year=$mass[1];
            if ($prev_month==0){
               echo $prev_month=12;
                $prev_year=$mass[1]-1;
            }
            $prev_month=$this->IntToString($prev_month);
            $dt=Carbon::now()->month;
            if ($month==$dt){
                return redirect('/blu-ray/');
            }
            /* МЕсяц нужно преобразовать в цыфру,а потом сравнить с текущим*/
            $film= DB::select('select * from films where MONTH(Blu_ray)=? AND YEAR(Blu_ray)=?', [$month,$mass[1]]);// нужна проверка успешности запроса

               //  $now='month.'.$mass[0].'';
                 $now=trans('month.'.$mass[0].'');
                 $data=[ 'next'=>''.$next_month.'-'.$next_year,
                        'prev'=>''.$prev_month.'-'.$prev_year,
                        'now'=>''.$now.'-'.$mass[1]
                ];
            if($film==null) {
                return view('empty',['data'=>$data]);
            }else{
                return view('blu_ray',['films'=>$film,'data'=>$data]);
            }

        }else{
            $carbon=Carbon::now()->month;
            $year=Carbon::now()->year;
            $film= DB::select('select * from films where MONTH(Blu_ray)=? AND YEAR(Blu_ray)=?', [$carbon,$year]);// нужна проверка успешности запроса
            $month=$carbon;
            $next_month=$month+1;
            $next_month=$this->IntToString($next_month);
            //предыдущий месяц
            $prev_month=$month-1;
            $prev_month=$this->IntToString($prev_month);
            $now=trans('month.'.$this->IntToString($carbon).'');

            $data=['next'=>''.$next_month.'-2016',
                    'prev'=>''.$prev_month.'-2016',
                    'now'=>''.$now.'-'.$year
            ];
           return view('blu_ray',['films'=>$film,'data'=>$data]);
        }

    }
    public function change_date($data){
        switch ($data){
            case 'January': $data=1;break;
            case 'February': $data=2;break;
            case 'March': $data=3;break;
            case 'April': $data=4;break;
            case 'May': $data=5;break;
            case 'June': $data=6;break;
            case 'July': $data=7;break;
            case 'August': $data=8;break;
            case 'September': $data=9;break;
            case 'October': $data=10;break;
            case 'November': $data=11;break;
            case 'December': $data=12;break;
            default: return 'редирект на 404 ошибку';
        }
        return $data;
    }
    public function IntToString($month){
        switch ($month){
            case 1: $month='January';break;
            case 2: $month='February';break;
            case 3: $month='March';break;
            case 4: $month='April';break;
            case 5: $month='May';break;
            case 6: $month='June';break;
            case 7: $month='July';break;
            case 8: $month='August';break;
            case 9: $month='September';break;
            case 10: $month='October';break;
            case 11: $month='November';break;
            case 12: $month='December';break;
            default: return "ошибка порядкового номера месяца";
        }
        return $month;
    }
}

