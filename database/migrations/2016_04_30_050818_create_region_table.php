<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->increments('id_region');
            $table->integer('id_province')
                    ->unsigned()
                    ->default(0);
            $table->foreign('id_province')
                    ->references('id_province')
                    ->on('provinces')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->string('name_region');
            $table->string('name_province');
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
        Schema::drop('regions');
    }
}
