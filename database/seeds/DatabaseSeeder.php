<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        Eloquent::unguard();    
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $tabelas = DB::select('SHOW TABLES');
        $nomeDB = env('DB_DATABASE');
        $campoNomeTabela = "Tables_in_".$nomeDB;
        foreach($tabelas as $tabela):
            if ($tabela->{$campoNomeTabela} != 'migrations')
                DB::table($tabela->{$campoNomeTabela})->truncate();
        endforeach;


        foreach($tabelas as $tabela):
            if ($tabela->{$campoNomeTabela} != 'migrations')
                if(class_exists($tabela->{$campoNomeTabela}.'Seed'))
                    $this->call($tabela->{$campoNomeTabela}.'Seed');
        endforeach;

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}


class usuariosSeed extends Seeder 
{
    public function run()
    {
       DB::table('usuarios')->insert(
        [
          "senha"     =>md5('admin'),
          "nome"      =>"Vinicius",
          "sobrenome" =>"Bassalobre",
          "apelido"   =>"Vinão",
          "dt_nascimento"   =>"1992-04-08",
          "email"      =>"marcusv.bda@icloud.com",
          "created_at" => date('Y-m-d'),
          "updated_at" => date('Y-m-d'),
          "codigo"     => "ABCDE"
       ]);
    }
}

class palestrasSeed extends Seeder 
{
    public function run()
    {
       DB::table('palestras')->insert(
        [
          "titulo"     =>"Gestão de Pessoas 1/3",
          "descricao"  =>
          "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris a lacus est. Maecenas vel odio quis ligula sollicitudin efficitur ac eget ligula. Vestibulum et urna non risus tristique porta non et tortor. Ut molestie magna mauris, sed porttitor libero feugiat sit amet. Quisque ac feugiat nulla, nec finibus dolor. Ut non felis vitae leo molestie euismod ut sed elit. Vivamus convallis sagittis facilisis. Pellentesque id facilisis dolor, vitae venenatis elit. Aliquam erat volutpat. Maecenas maximus magna vel orci vehicula, ut hendrerit arcu consequat. Pellentesque euismod purus at odio consequat, eu aliquam augue gravida. Nunc id maximus eros, sed vulputate dolor.
          ",
          "visualizacoes"  =>125,
          "curtidas"   => 120,
          "descurtidas"=>2,
          "created_at" => date('Y-m-d'),
          "updated_at" => date('Y-m-d'),
          "nome_autor" => "Professor José Neto",
          "imagem"     => "imagem1.jpg",
          "video"      => "teste1.mp4",
          "subtitulo"  => "subtitulo da palestra"
       ]);
       DB::table('palestras')->insert(
        [
          "titulo"     =>"Gestão de Pessoas 2/3",
          "descricao"  =>
          "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris a lacus est. Maecenas vel odio quis ligula sollicitudin efficitur ac eget ligula. Vestibulum et urna non risus tristique porta non et tortor. Ut molestie magna mauris, sed porttitor libero feugiat sit amet. Quisque ac feugiat nulla, nec finibus dolor. Ut non felis vitae leo molestie euismod ut sed elit. Vivamus convallis sagittis facilisis. Pellentesque id facilisis dolor, vitae venenatis elit. Aliquam erat volutpat. Maecenas maximus magna vel orci vehicula, ut hendrerit arcu consequat. Pellentesque euismod purus at odio consequat, eu aliquam augue gravida. Nunc id maximus eros, sed vulputate dolor.
          ",
          "visualizacoes"  =>70,
          "curtidas"   => 20,
          "descurtidas"=>1,
          "created_at" => date('Y-m-d'),
          "updated_at" => date('Y-m-d'),
          "nome_autor" => "Professora Ana Livia",
          "imagem"     => "imagem2.jpg",
          "video"      => "teste1.mp4",
          "subtitulo"  => "subtitulo da palestra"
       ]);
       DB::table('palestras')->insert(
        [
          "titulo"     =>"Gestão de Pessoas 3/3",
          "descricao"  =>
          "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris a lacus est. Maecenas vel odio quis ligula sollicitudin efficitur ac eget ligula. Vestibulum et urna non risus tristique porta non et tortor. Ut molestie magna mauris, sed porttitor libero feugiat sit amet. Quisque ac feugiat nulla, nec finibus dolor. Ut non felis vitae leo molestie euismod ut sed elit. Vivamus convallis sagittis facilisis. Pellentesque id facilisis dolor, vitae venenatis elit. Aliquam erat volutpat. Maecenas maximus magna vel orci vehicula, ut hendrerit arcu consequat. Pellentesque euismod purus at odio consequat, eu aliquam augue gravida. Nunc id maximus eros, sed vulputate dolor.
          ",
          "visualizacoes"  =>1450,
          "curtidas"   => 700,
          "descurtidas"=>25,
          "created_at" => date('Y-m-d'),
          "updated_at" => date('Y-m-d'),
          "nome_autor" => "Professor José Neto",
          "imagem"     => "imagem3.jpg",
          "video"      => "teste1.mp4",
          "subtitulo"  => "subtitulo da palestra"
       ]);
       DB::table('palestras')->insert(
        [
          "titulo"     =>"Tire sua ideia do papel",
          "descricao"  =>
          "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris a lacus est. Maecenas vel odio quis ligula sollicitudin efficitur ac eget ligula. Vestibulum et urna non risus tristique porta non et tortor. Ut molestie magna mauris, sed porttitor libero feugiat sit amet. Quisque ac feugiat nulla, nec finibus dolor. Ut non felis vitae leo molestie euismod ut sed elit. Vivamus convallis sagittis facilisis. Pellentesque id facilisis dolor, vitae venenatis elit. Aliquam erat volutpat. Maecenas maximus magna vel orci vehicula, ut hendrerit arcu consequat. Pellentesque euismod purus at odio consequat, eu aliquam augue gravida. Nunc id maximus eros, sed vulputate dolor.
          ",
          "visualizacoes"  =>759,
          "curtidas"   => 145,
          "descurtidas"=>62,
          "created_at" => date('Y-m-d'),
          "updated_at" => date('Y-m-d'),
          "nome_autor" => "Professora Ana Livia",
          "imagem"     => "imagem4.jpg",
          "video"      => "teste1.mp4",
          "subtitulo"  => "subtitulo da palestra"
       ]);
       DB::table('palestras')->insert(
        [
          "titulo"     =>"Controle financeiro de seu negócio",
          "descricao"  =>
          "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris a lacus est. Maecenas vel odio quis ligula sollicitudin efficitur ac eget ligula. Vestibulum et urna non risus tristique porta non et tortor. Ut molestie magna mauris, sed porttitor libero feugiat sit amet. Quisque ac feugiat nulla, nec finibus dolor. Ut non felis vitae leo molestie euismod ut sed elit. Vivamus convallis sagittis facilisis. Pellentesque id facilisis dolor, vitae venenatis elit. Aliquam erat volutpat. Maecenas maximus magna vel orci vehicula, ut hendrerit arcu consequat. Pellentesque euismod purus at odio consequat, eu aliquam augue gravida. Nunc id maximus eros, sed vulputate dolor.
          ",
          "visualizacoes"  =>19,
          "curtidas"   => 5,
          "descurtidas"=>0,
          "created_at" => date('Y-m-d'),
          "updated_at" => date('Y-m-d'),
          "nome_autor" => "Professora Ana Livia",
          "imagem"     => "imagem5.jpg",
          "video"      => "teste1.mp4",
          "subtitulo"  => "subtitulo da palestra",
          "tags"       => "carro,paçoca"
       ]);
    }
}
