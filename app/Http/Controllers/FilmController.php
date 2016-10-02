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
        return view('layouts.admin');
    }
    public function Blu_ray($data=null){
        if($data!=null){
            $mass=explode('-',$data);
            $dt=Carbon::now()->month;
            $mass[1];
            return $dt;
        }else{
            $carbon=Carbon::now()->addMonth(1)->month;
            $carbon=Carbon::now()->subMonth(10)->year;
            //echo new Carbon('last friday');
            // return  DB::table('films')->whereBetween('Blu_ray',array(Carbon::now()->subMonth(1),Carbon::now()->addMonth(1)))->get();
          // print_r( DB::SELECT('SELECT id FROM films WHERE MONTH(Blu_ray)=9'));
           return DB::select('select * from films where MONTH(Blu_ray)=?', [$carbon]);
        }

    }
}

