<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMusicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('artist_id')->unsigned();
            $table->string('album')->nullable();
            $table->integer('year')->nullable();
            $table->integer('genre_id')->unsigned();
            $table->timestamps();

            $table->foreign('artist_id')->references('id')->on('artists');
            $table->foreign('genre_id')->references('id')->on('genres');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('musics');
    }
}
