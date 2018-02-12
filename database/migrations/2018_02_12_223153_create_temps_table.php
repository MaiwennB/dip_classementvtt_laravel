<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temps', function (Blueprint $table) {
            $table->increments('idTemps');
            $table->time('temps');
            $table->integer('idPiste')->unsigned();
            $table->integer('idAdh')->unsigned();
            $table->timestamps();
        });
        Schema::table('temps', function (Blueprint $table) {
            $table->foreign('idPiste')->references('idPiste')->on('pistes');
            $table->foreign('idAdh')->references('idAdh')->on('adherents');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temps');
    }
}
