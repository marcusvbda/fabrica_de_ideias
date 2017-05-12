<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) 
        {
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->increments('id');
            $table->string('nome',150);
            $table->string('sobrenome',200)->nullable();
            $table->string('senha',250);
            $table->string('sexo',1)->default('M');
            $table->string('email',250)->unique();
            $table->string('apelido',100)->nullable();
            $table->string('reset_token',100)->nullable();
            $table->string('codigo',5);
            $table->string('remember_token', 100)->nullable();
            $table->date('dt_nascimento');   
            $table->timestamps();              
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('usuarios');
    }
}
