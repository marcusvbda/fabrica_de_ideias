<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Response;
use Mail;

use App\User; 


class AuthController extends Controller
{

    public function login()
    {
        Auth::logout();
        return view('xpanel.auth.login');
    }

    public function logar()
    {
        try
        {               
            $dados  = Input::all();             
            $usuario = User::where('email','=',$dados['email'])->where('senha','=',md5($dados['senha']))->first();
            if(isset($usuario)):
                Auth::loginUsingId($usuario->id, uppertrim($dados['remember'])==uppertrim('TRUE'));
                return Response::json(['success'=>true,'msg'=>__('mensagens.sucesso')]);       
            else:
                return Response::json(['success'=>false,'msg'=>__('login.nao_existe')]); 
            endif;    
        }
        catch(\Exception $e)
        {
            return Response::json(['success'=>false,'msg'=>__('mensagens.erro'),'error'=>$e]);            
        }
    }

    public function sair()
    {
        Auth::logout();
        return Redirect::to(asset('xpanel'));
    }

    public function register()
    {
        Auth::logout();        
        return view('xpanel.auth.register');
    }

    public function store()
    {
        $dados  = Input::all();             
        if(!$this->valida_novo_cadastro($dados))
            return Response::json(['success'=>false,'msg'=>__('register.erro_email_existente')]);  

        try
        {
            DB::beginTransaction();
            $dados['senha']=md5($dados['senha']);
            $dados['created_at']=date('Y-m-d');
            User::insert($dados);
            DB::commit();
            return Response::json(['success'=>true,'msg'=>__('mensagens.sucesso')]);
        }
        catch(\Exception $e)
        {
            return Response::json(['success'=>false,'msg'=>__('mensagens.erro'),'error'=>$e]);            
        }
    }

    public function valid()
    {
        $dados  = Input::all(); 
        switch ($dados['op']) 
        {
            case 'valida_codigo':
                // valida o codigo recebido e retorna de libera ou não
                // $dados['codigo']
                return Response::json(['success'=>true]);  
            case 'enviar_codigo_renovacao':
                $usuario=User::where('email','=',$dados['email'])->first();
                if(count($usuario)<=0)
                    return Response::json(['success'=>false,'msg'=>__('forgot.msg_erro_email_inexistente')]);  

                $codigo = uppertrim($this->generateRandomString(5));
                User::where('id','=',$usuario->id)->update(['reset_token'=>$codigo]);
                if($this->enviar_email_reset($usuario,$codigo))
                    return Response::json(['success'=>true]);  
                else
                    return Response::json(['success'=>false,'msg'=>__('forgot.msg_erro_email_enviar')]); 

            case 'valida_codigo_renovacao':
                $usuario = User::where('reset_token','=',$dados['codigo'])->first();
                if(count($usuario)>0)
                    return Response::json(['success'=>true,'data'=>$usuario]);  
                else
                    return Response::json(['success'=>false,'msg'=>__('forgot.msg_erro_codigo_valida')]); 
            default:
                # code...
                break;
        } 
    }
    private function generateRandomString($length = 10) 
    {
        $codigo = "";
        $unico = false;
        while ( ! $unico ):
            $codigo = uppertrim(substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length));
            if(count(User::where('codigo','=',$codigo)->get())>0)
                $unico=false;
            else
                $unico=true;
        endwhile;
        return  $codigo;
    }

    private function valida_novo_cadastro($dados)
    {
        if(!isset($dados['email']))
            return false;
        if(count(User::where('email','=',$dados['email'])->get())>0)
            return false;
        else
            return true;
    }

    public function esqueci()
    {      
        return view('xpanel.auth.esqueci');
    }

    private function enviar_email_reset($usuario,$codigo)
    {
        try
        {
            $dados = ['nome'=>$usuario->nome,'sobrenome'=>$usuario->sobrenome,'codigo'=>$codigo,'email'=>$usuario->email];
            Mail::send(['html' => 'xpanel.emails.reset'], $dados , function($msg) use ($dados)
            {
                $msg->to($dados['email'],$dados['nome'].' '.$dados['sobrenome'])->subject('Renovação de senha '.env('APP_NAME'));
            });
            return true;
        }
        catch(\Exception $e)
        {
            return false;
        }
    }

    public function reset_pass()
    {
        $dados  = Input::all();
        try
        {             

            DB::beginTransaction();
            User::where('id','=',$dados['id'])->update(['senha'=>md5($dados['senha']),'reset_token'=>null]);
            DB::commit();
            return Response::json(['success'=>true,'msg'=>__('mensagens.sucesso')]);
        }
        catch(\Exception $e)
        {
            return Response::json(['success'=>false,'msg'=>__('mensagens.erro'),'error'=>$e]);            
        }
    }

}
