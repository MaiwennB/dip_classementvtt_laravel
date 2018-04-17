<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        // Asso
        DB::table('users')->insert([
            'id'=>'1',
            'name' => 'A MI CHEMIN',
            'email' => 'amichemin@asso.com',
            'password' => Hash::make('amichemin'),
        ]);
        DB::table('users')->insert([
            'id'=>'2',
            'name' => 'DdlM',
            'email' => 'ddlm@asso.com',
            'password' => Hash::make('ddlm29'),
        ]);
        DB::table('users')->insert([
            'id'=>'3',
            'name' => 'Club Carhaix VTT',
            'email' => 'carhaix.vtt@asso.com',
            'password' => Hash::make('carhaixvtt'),

        ]);
        // Adh
        DB::table('users')->insert([
            'id'=>'4',
            'name' => 'Ernest LE BRIS',
            'email' => 'ernest.lbrs@adh.com',
            'password' => Hash::make('ernstlbrs'),
        ]);
        DB::table('users')->insert([
            'id'=>'5',
            'name' => 'Jean-Marc DUBOSS',
            'email' => 'dudu.jm@adh.com',
            'password' => Hash::make('dudujaeanM'),
        ]);
        DB::table('users')->insert([
            'id'=>'6',
            'name' => 'Erwan LE BLAYOT',
            'email' => 'erwan.leblayot.vtt@adh.com',
            'password' => Hash::make('vtt29000'),

        ]);
        DB::table('users')->insert([
            'id'=>'7',
            'name' => 'Maiwenn BIZOUARN',
            'email' => 'maiiwenn@adh.com',
            'password' => Hash::make('superadmin'), //superadmin
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
