<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePistesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pistes', function (Blueprint $table) {
            $table->increments('idPiste');
            $table->string('nomPiste');
            $table->text('urlPhoto');
            $table->text('Description');
            $table->integer('idAsso')->unsigned();
            $table->timestamps();
        });
        Schema::table('pistes', function (Blueprint $table) {
            $table->foreign('idAsso')->references('idAsso')->on('associations');
            
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pistes');
    }
}
