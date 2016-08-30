<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVolumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volumes', function (Blueprint $table) {
            $table->increments('id');
            $table->foreign('titleid')->references('id')->on('titles');
            $table->integer('volume');
            $table->date('started')->nullable();
            $table->date('ended')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('volumes');
    }
}
