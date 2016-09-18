<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function addFilm ($film_id)
    {
        return DB::insert('INSERT INTO `Ratings` (`film_id`) values (?)', [$film_id]);
    }
    public function getRating($film_id){
        $rating=DB::table('ratings')->where('film_id',$film_id)->first();
        return $rating;
    }
    public function del($id)
    {
       return DB::table('ratings')->where('film_id',$id)->delete();
    }
    public function showRating($film_id){
        return DB::table('ratings')->where('film_id',$film_id)->first();
    }
    
}