<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::auth();
Route::group(['middleware'=> 'auth'],function(){
    Route::get('admin', 'FilmController@admin');
    Route::get('/create/','FilmController@create');
    Route::get('/edit/{id}','FilmController@edit');
    Route::post('/update/{id}','FilmController@update');
    Route::get('/update','FilmController@showUpdate');
    Route::get('/update/{id}','FilmController@showUpdate');
    Route::get('/delete/{id}','FilmController@delete');
    //Route::post('/store','FilmController@store');
    Route::post('/store/{id?}','FilmController@store');
    Route::get('/show/{id}','FilmController@show');
    Route::get('/delete/{id}','FilmController@drop');
});

Route::get('/film/{id}', 'FilmController@index')->where(['id'=>'[0-9]+']);
Route::get('/', 'FilmController@mainPage');
Route::post('/', 'FilmController@pagination');
Route::get('/blu-ray/{data?}','FilmController@Blu_ray')->where(['data'=>'\w{3,9}\-\d{4}']);
//Route::get('/home', 'HomeController@index');
Route::post('/rating','RatingController@showRating');
Route::post('/ratingAdd','RatingController@calcRating'); //нужен будет посредник на отправку аякс
Route::get('/parse','ParseController@parse');// поменять на парсер
Route::get('/parse_blu_ray','ParseController@parse_blu_ray');

Route::get('/profile','UserController@profile');
Route::post('/profile','UserController@update_avatar');


/*Route::get('/create',['middleware'=> 'auth'
    ,'uses'=>'FilmController@create']);*/

//Route::post('/store','FilmController@store');






/*Route::post('/rating', function (){
    if(Request::ajax()){
        return Request::all();
    }
});*/
//Route:: post('rating','Rating@add');