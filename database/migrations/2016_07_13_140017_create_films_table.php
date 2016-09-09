<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('image');
            $table->string('original');
            $table->char('imdb',50);
            $table->char('DVD_source',50);
            $table->char('kinopoisk',50);
            $table->date('Blu_ray');
            $table->date('release');
            $table->text('plot');
            $table->string('description');
            $table->string('director');
            $table->string('actors');
            $table->string('trailer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('films');
    }
}
