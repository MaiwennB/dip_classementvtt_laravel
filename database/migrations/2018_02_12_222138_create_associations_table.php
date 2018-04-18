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
            $table->string('logoAsso');
            $table->string('site');
            $table->integer('idUser')->unsigned();
            $table->timestamps();
        });

        Schema::table('associations', function (Blueprint $table) {
            $table->foreign('idUser')->references('id')->on('users');
          });
        DB::table('associations')->insert([
            'idAsso'=>'1',
            'nomAsso' => 'A mi chemin',
            'logoAsso'=> 'http://www.amichemins.fr/images/hasard/grand-format.png',
            'site'=> 'http://amichemins.fr/',
            'idUser' => '1',
        ]);
        DB::table('associations')->insert([
            'idAsso'=>'2',
            'nomAsso' => 'Descendeurs de la mine',
            'logoAsso'=> 'http://dh.mine.pagesperso-orange.fr/Images/nouveau%20logo.gif',
            'site'=> 'http://www.dh2lamine.com/',
            'idUser' => '2',
        ]);
        DB::table('associations')->insert([
            'idAsso'=>'3',
            'nomAsso' => 'Club Carhaix VTT',
            'logoAsso'=> 'https://image.jimcdn.com/app/cms/image/transf/dimension=102x10000:format=jpg/path/s8b7b24835304bfcc/image/i30be05e9156c942d/version/1465368230/image.jpg',
            'site'=> 'https://carhaix-vtt.jimdo.com/',
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
