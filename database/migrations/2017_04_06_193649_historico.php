<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Historico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historico', function (Blueprint $table) 
        {
            $table->increments('id');

            $table->integer('usuario_id')->unsigned();            
            $table->foreign('usuario_id')
            ->references('id')
                ->on('usuarios');

            $table->string('titulo',50);
            $table->longText('descricao');
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
        Schema::drop('historico');
    }
}
