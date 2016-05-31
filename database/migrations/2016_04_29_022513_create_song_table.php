<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->increments('id_song');
            $table->integer('id_province')
                    ->unsigned()
                    ->default(0);
            $table->foreign('id_province')
                    ->references('id_province')
                    ->on('provinces')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->string('title_song');
            $table->string('artist');
            $table->string('album');
            $table->integer('year');
            $table->string('genre');
            $table->string('information');
            $table->integer('track_number');
            $table->string('path_song');
            $table->string('path_cover');
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
        Schema::drop('songs');
    }
}
