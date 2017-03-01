<?php

namespace App;
use App\Http\Requests\Request;
use DB;
use Dotenv\Validator;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class film extends Model
{
    public static $rules=array(
       'title'=>'requered',
       'original'=>'requered',
       'image'=>'requered',
       'text'=>'requered',
       'Blu_ray'=>'requered',
       'release'=>'requered',
       'budjet'=>'requered',
       'description'=>'requered',
       'imdb'=>'requered',
        'kinopoisk'=>'requered'
    );
    public function validate($data){
        return Validator::make($data, static::$rules);
    }
    /*Новости*****************************/
    public function news(){
        return $this->hasMany('App\FilmChange');
    }
    public function mainPageGet(){
        $a=DB::select('select * FROM films');
        return $a;
    }
public function getPublishedFilm($id){
    $a=DB::select('select * from films where id = ?', [$id]);
    return $a;
}
public function createFilm($date){
    $title=$date['title'];
    $original=$date['original'];
    $release=$date['release'];
    $Blu_ray=$date['Blu_ray'];
    $plot=$date['text'];
    $imdb=$date['imdb'];
    $image=$date['image'];
    $description=$date['description'];
   // $budjet=$date['budjet'];
    $kinopoisk=$date['kinopoisk'];
    $DVD_sourse=$date['DVD_sourse'];
    $actors=$date['actors'];
    $director=$date['director'];
    $trailer=$date['trailer'];
    preg_match('~[0-9]{4,}~',$kinopoisk,$a);
    $kinopoisk=$a[0];
    preg_match('~tt.[0-9]{1,}~',$imdb,$a);
    $imdb=$a[0];
    $id = DB::table('films')->insertGetId(
        ['title' => $title,
         'original' => $original,
         'image' => $image,
         'plot' => $plot,
         'imdb' => $imdb,
         'Blu_ray' => $Blu_ray,
         'release' => $release,
         'description' => $description,
         'created_at' => Carbon::now(),
         'updated_at' => Carbon::now(),
         'DVD_source' => $DVD_sourse,
         'kinopoisk' => $kinopoisk,
         'director' => $director,
         'actors' => $actors,
         'trailer' => $trailer
        ]
    );
    return $id;
    //return DB::insert('INSERT INTO `films` (`title`, `image`, `original`, `plot`, `imdb`, `Blu_ray`, `release`, `description`, `created_at`, `updated_at`,`DVD_source`,`kinopoisk`, `director`,`actors` ,`trailer`) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', [$title, $image, $original, $plot, $imdb, $Blu_ray, $release, $description,Carbon::now(),Carbon::now(),$DVD_sourse,$kinopoisk,$director,$actors,$trailer]);
}
    public function getFilm(){
        $a=DB::select('select id,title from films ');
        return $a;
    }
    public function getUpdatedFilm($id){
        $a=DB::select('select * from films WHERE id=?',[$id]);
        return $a;
    }
    public function updateFilm($date,$id){
     //   $id=$date['id'];
      /*  $title=$date['title'];
        $original=$date['original'];
        $release=$date['release'];
        $Blu_ray=$date['Blu_ray'];
        $plot=$date['text'];
        $imdb=$date['imdb'];
        $image=$date['image'];
        $description=$date['description'];
        //$budjet=$date['budjet'];
        $kinopoisk=$date['kinopoisk'];
        $DVD_source=$date['DVD_source'];
        $actors=$date['actors'];
        $director=$date['director'];
        $trailer=$date['trailer'];
        $trailer=str_replace("https://www.youtube.com/watch?v=","",$trailer);
        DB::table('films')
            ->where('id', $id)
            ->update([
                'title' => $title,
                'original' => $original,
                'image' => $image,
                'plot' => $plot,
                'imdb' => $imdb,
                'Blu_ray' => $Blu_ray,
                'release' => $release,
                'description' => $description,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'DVD_source' => $DVD_source,
                'kinopoisk' => $kinopoisk,
                'director' => $director,
                'actors' => $actors,
                'trailer' => $trailer
            ]);*/

       //return DB::update('UPDATE `films` SET `title`=?,`image`=?,`original`=?,`plot`=?,`imdb`=?,`Blu_ray`=?,`release`=?,`description`=?,`updated_at`=?, `DVD_source`=?, `kinopoisk`=?, `director`=?, `actors`=?, `trailer`=? WHERE id=?', [$title, $image, $original, $plot, $imdb, $Blu_ray, $release, $description,Carbon::now(),$DVD_source,$kinopoisk,$director,$actors,$trailer,$id]);
    }
    public function drop($id)
    {
        return DB::delete('delete from films where id=?',[$id]); // TODO: Change the autogenerated stub
    }
}
