<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaylistContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playlist_contents', function (Blueprint $table) {
            $table->increments('id_playlist_content');
            $table->integer('id_playlist')
                    ->unsigned()
                    ->default(0);
            $table->foreign('id_playlist')
                    ->references('id_playlist')
                    ->on('playlists')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->integer('id_song')
                    ->unsigned()
                    ->default(0);
            $table->foreign('id_song')
                    ->references('id_song')
                    ->on('songs')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
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
        Schema::drop('palylist_contents');
    }
}
