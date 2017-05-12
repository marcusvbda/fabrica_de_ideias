<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Historico;

class userController  extends Controller
{
	
    public function show()
    {
    	$palestras = 122;
    	$palestras_assistidas = 42;
    	$perguntas = 61;
    	$perguntas_respondidas = 61;
    	$ebooks = 61;
    	$ebooks_baixados = 12;
    	$historico = Historico::orderBy('created_at','desc')->take(5)->get();
        return view('xpanel.user.profile',compact('palestras','palestras_assistidas','perguntas','perguntas_respondidas','ebooks_baixados','ebooks','historico'));
    }

    public static function  getPontuacao($total,$valores)
    {
    	$pontos = regra_de_3(array_sum($total),5,array_sum($valores));
    	if($pontos>5)
    		return 5;
    	else
    		return intval($pontos);
    }

   
}
