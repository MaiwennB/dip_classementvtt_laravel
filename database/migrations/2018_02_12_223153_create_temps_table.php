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
        //piste1
        DB::table('temps')->insert([
            'id'=>'1',
            'temps' => '00:10:48',
            'idPiste' => '1',
            'idAdh' => '1',
        ]);
        DB::table('temps')->insert([
            'id'=>'2',
            'temps' => '00:15:22',
            'idPiste' => '1',
            'idAdh' => '2',
        ]);
        DB::table('temps')->insert([
            'id'=>'3',
            'temps' => '00:08:12',
            'idPiste' => '1',
            'idAdh' => '3',
        ]);
        DB::table('temps')->insert([
            'id'=>'4',
            'temps' => '00:12:24',
            'idPiste' => '1',
            'idAdh' => '3',
        ]);
        DB::table('temps')->insert([
            'id'=>'5',
            'temps' => '00:11:47',
            'idPiste' => '1',
            'idAdh' => '4',
        ]);

        //piste2
        DB::table('temps')->insert([
            'id'=>'6',
            'temps' => '00:29:12',
            'idPiste' => '2',
            'idAdh' => '1',
        ]);
        DB::table('temps')->insert([
            'id'=>'7',
            'temps' => '00:20:22',
            'idPiste' => '2',
            'idAdh' => '2',
        ]);
        DB::table('temps')->insert([
            'id'=>'8',
            'temps' => '00:21:12',
            'idPiste' => '2',
            'idAdh' => '2',
        ]);
        DB::table('temps')->insert([
            'id'=>'18',
            'temps' => '00:019:24',
            'idPiste' => '2',
            'idAdh' => '3',
        ]);
        DB::table('temps')->insert([
            'id'=>'9',
            'temps' => '00:19:47',
            'idPiste' => '2',
            'idAdh' => '4',
        ]);

        //piste3
        DB::table('temps')->insert([
            'id'=>'10',
            'temps' => '00:12:48',
            'idPiste' => '3',
            'idAdh' => '1',
        ]);
        DB::table('temps')->insert([
            'id'=>'11',
            'temps' => '00:07:22',
            'idPiste' => '3',
            'idAdh' => '1',
        ]);
        DB::table('temps')->insert([
            'id'=>'12',
            'temps' => '00:08:12',
            'idPiste' => '3',
            'idAdh' => '3',
        ]);
        
        //piste4
        DB::table('temps')->insert([
            'id'=>'13',
            'temps' => '00:10:48',
            'idPiste' => '4',
            'idAdh' => '1',
        ]);
        DB::table('temps')->insert([
            'id'=>'14',
            'temps' => '00:10:22',
            'idPiste' => '4',
            'idAdh' => '2',
        ]);
        DB::table('temps')->insert([
            'id'=>'15',
            'temps' => '00:11:12',
            'idPiste' => '4',
            'idAdh' => '3',
        ]);
        DB::table('temps')->insert([
            'id'=>'16',
            'temps' => '00:12:24',
            'idPiste' => '4',
            'idAdh' => '4',
        ]);
        DB::table('temps')->insert([
            'id'=>'17',
            'temps' => '00:11:47',
            'idPiste' => '4',
            'idAdh' => '4',
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
