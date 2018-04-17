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
        DB::table('pistes')->insert([
            'idPiste'=>'1',
            'nomPiste'=> 'Piste du bouc blanc',
            'urlPhoto'=> 'http://4.bp.blogspot.com/-jKGHE7x3E0I/VCF-irCDyYI/AAAAAAAADT4/1DGAcE1Oq3c/s1600/1.jpg',
            'Description'=>'Piste situé sur le site du nivot. Lors de sa construction on racontai que les lieux étaient habité par un bouc blanc. Lors de l\'ouverture de celle-ci le bouc fut retrouvé mort à son arivée.',
            'idAsso' => '1',
        ]);
        DB::table('pistes')->insert([
            'idPiste'=>'2',
            'nomPiste'=> 'Piste de la mine',
            'urlPhoto'=> 'http://an-uhelgoad.franceserv.com/mine5.jpg',
            'Description'=>'Anciènne mine de locmaria située dans la forest',
            'idAsso' => '2',
        ]);
        DB::table('pistes')->insert([
            'idPiste'=>'3',
            'nomPiste'=> 'Piste de la hulotte',
            'urlPhoto'=> 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/18/Strix_aluco_aluco.jpg/220px-Strix_aluco_aluco.jpg',
            'Description'=>'Piste situé sur le site du nivot adapté aux débutants.',
            'idAsso' => '1',
        ]);
        DB::table('pistes')->insert([
            'idPiste'=>'4',
            'nomPiste'=> 'Piste du roc\'h tredudon',
            'urlPhoto'=> 'http://farm4.static.flickr.com/3161/2883786929_f4b19387b6.jpg',
            'Description'=>'Roc\'h & Bike',
            'idAsso' => '2',
        ]);
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
