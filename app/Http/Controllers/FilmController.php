<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\film;
use DB;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;


class FilmController extends Controller
{
    //
    public function mainPage(film $filmModel){
       $films=DB::table('films')->where('Blu_ray','<=',Carbon::now())->simplePaginate(3);
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
    public function store(Request $request, film $kino, Rating $rating)
    {
        $this->validate($request,[
            'title'=>'required'
        ]);
            if (isset($request->id)) {
                $id = $request->id;
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
}

