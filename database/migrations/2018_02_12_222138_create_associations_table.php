<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssociationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('associations', function (Blueprint $table) {
            $table->increments('idAsso');
            $table->string('nomAsso');
            $table->integer('idUser')->unsigned();
            $table->timestamps();
        });

        Schema::table('associations', function (Blueprint $table) {
            $table->foreign('idUser')->references('id')->on('users');
          });
        DB::table('associations')->insert([
            'idAsso'=>'1',
            'nomAsso' => 'A mi chemin',
            'idUser' => '1',
        ]);
        DB::table('associations')->insert([
            'idAsso'=>'2',
            'nomAsso' => 'Descendeurs de la mine',
            'idUser' => '2',
        ]);
        DB::table('associations')->insert([
            'idAsso'=>'3',
            'nomAsso' => 'Club Carhaix VTT',
            'idUser' => '3',

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('associations');
    }
}
