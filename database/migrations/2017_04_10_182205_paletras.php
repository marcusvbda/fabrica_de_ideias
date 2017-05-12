<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Paletras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('palestras', function (Blueprint $table) 
        {
            $table->increments('id');

            $table->string('nome_autor',100);
            $table->string('imagem',250)->nullable();
            $table->string('video',250)->nullable();
            $table->string('disponivel',1)->default('S');
            $table->string('assistido',1)->default('N');
            $table->string('titulo',100);
            $table->string('subtitulo',250)->nullable();
            $table->longText('descricao');
            $table->longText('tags')->nullable();
            // autor com descrição e curriculum
            $table->integer('visualizacoes')->default(0);
            $table->integer('curtidas')->default(0);
            $table->integer('descurtidas')->default(0);
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
        Schema::drop('palestras');
    }
}
