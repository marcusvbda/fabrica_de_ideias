<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Palestras;

class palestrasController  extends Controller
{
	
    public function show($id)
    {
    	$id = base64_decode($id);
        $palestra = Palestras::where('id','=',$id)->where('disponivel','=','S')->first();
        historico([
            "titulo"=>$palestra->titulo,
            "descricao"=>"Acessou a palestra"
        ]);
        return view('xpanel.palestras.show',compact('palestra'));
    }

    public function index()
    {
        $dados  = Input::all();     
        $search = "";
        $palestras = Palestras::where('disponivel','=','S')->get();
        if(isset($dados['search'])):
            $search = $dados['search'];
            $consulta = Palestras::where('titulo','like','%'.$search.'%')
            ->OrWhere('nome_autor','like','%'.$search.'%')
            ->OrWhere('tags','like','%'.$search.'%')
            ->orderBy('id','desc')
            ->paginate(9);
            $todos['qtde']=$consulta->total();
            $todos['consulta']=$consulta;

            $consulta = Palestras::where('titulo','like','%'.$search.'%')
            ->OrWhere('nome_autor','like','%'.$search.'%')
            ->OrWhere('tags','like','%'.$search.'%')
            ->orderBy('id','desc')          
            ->paginate(9);
            $assistidos['qtde']=$consulta->total();
            $assistidos['consulta']=$consulta;

            $consulta = Palestras::where('titulo','like','%'.$search.'%')
            ->OrWhere('nome_autor','like','%'.$search.'%')
            ->OrWhere('tags','like','%'.$search.'%')
            ->orderBy('id','desc')  
            ->paginate(9);
            $nao_assistidos['qtde']=$consulta->total();
            $nao_assistidos['consulta']=$consulta;
        else:           
            $consulta = Palestras::orderBy('id','desc')->paginate(9);
            $todos['qtde']=$consulta->total();
            $todos['consulta']=$consulta;

            $consulta = Palestras::where('assistido','=','S')->orderBy('id','desc')->paginate(9);
            $assistidos['qtde']=$consulta->total();
            $assistidos['consulta']=$consulta;

            $consulta = Palestras::where('assistido','=','N')->orderBy('id','desc')->paginate(9);
            $nao_assistidos['qtde']=$consulta->total();
            $nao_assistidos['consulta']=$consulta;
        endif;
        return view('xpanel.palestras.index',compact('todos','assistidos','nao_assistidos','search','palestras'));
    }
   
   
}
