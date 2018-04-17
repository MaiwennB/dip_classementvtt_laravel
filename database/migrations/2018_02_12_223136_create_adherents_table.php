<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdherentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adherents', function (Blueprint $table) {
            $table->increments('idAdh');
            $table->integer('idAsso')->unsigned();
            $table->integer('id')->unsigned();
            $table->timestamps();
        });
        Schema::table('adherents', function (Blueprint $table) {
            $table->foreign('idAsso')->references('idAsso')->on('associations');
            $table->foreign('id')->references('id')->on('users');
          });
          DB::table('adherents')->insert([
            'idAdh'=>'1',
            'idAsso' => '1',
            'id' => '4',
        ]);
        DB::table('adherents')->insert([
            'idAdh'=>'2',
            'idAsso' => '3',
            'id' => '5',
        ]);
        DB::table('adherents')->insert([
            'idAdh'=>'3',
            'idAsso' => '2',
            'id' => '6',

        ]);
        DB::table('adherents')->insert([
            'idAdh'=>'4',
            'idAsso' => '1',
            'id' => '7',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adherents');
    }
}
