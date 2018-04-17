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
            $table->increments('id');
            $table->time('temps');
            $table->integer('idPiste')->unsigned();
            $table->integer('idAdh')->unsigned();
            $table->timestamps();
        });
        Schema::table('temps', function (Blueprint $table) {
            $table->foreign('idPiste')->references('idPiste')->on('pistes');
            $table->foreign('idAdh')->references('idAdh')->on('adherents');
          });
        DB::table('temps')->insert([
            'id'=>'1',
            'temps' => '00:10:48',
            'idPiste' => '3',
            'idAdh' => '3',
        ]);
        DB::table('temps')->insert([
            'id'=>'2',
            'temps' => '00:15:22',
            'idPiste' => '2',
            'idAdh' => '3',
        ]);
        DB::table('temps')->insert([
            'id'=>'3',
            'temps' => '00:08:12',
            'idPiste' => '3',
            'idAdh' => '1',
        ]);
        DB::table('temps')->insert([
            'id'=>'4',
            'temps' => '00:11:47',
            'idPiste' => '4',
            'idAdh' => '4',
        ]);
        DB::table('temps')->insert([
            'id'=>'5',
            'temps' => '00:09:32',
            'idPiste' => '1',
            'idAdh' => '1',
        ]);
        DB::table('temps')->insert([
            'id'=>'6',
            'temps' => '00:06:52',
            'idPiste' => '2',
            'idAdh' => '2',
        ]);
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
