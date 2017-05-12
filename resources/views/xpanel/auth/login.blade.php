@extends('xpanel.template.login')
@section('titulo',__('login.titulo'))

@section('conteudo')
<div class="back-link">
   <a href="{{asset('')}}" class="btn btn-accent">@lang('login.voltar')</a>
</div>
<div class="container-center animated slideInDown">

    <div class="view-header">
        <div class="header-title text-center" style="margin-left: 0px;">
            <h3>
                <img src="{{asset(env('LOGO_BRANCO'))}}" height="100px">
            </h3>
            <small>
                @lang('login.subtitulo')
            </small>
        </div>
    </div>
    <div class="panel panel-filled">
        <div class="panel-body">
            <form id="frm_login">
                <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                <div class="form-group">
                    <label class="control-label" for="email">Email</label>
                    <input type="email" placeholder="email@email.com" title="@lang('login.email_title')" required name="email" id="email" class="form-control" value="marcusv.bda@icloud.com" maxlength="250">
                    <!--<span class="help-block small">Your unique username to app</span>-->
                </div>
                <div class="form-group">
                    <label class="control-label" for="password">@lang('login.senha')</label>
                    <input type="password" title="@lang('login.senha_title')" placeholder="******" required name="password" id="password" class="form-control" value="admin" maxlength="20">
                    <!--<span class="help-block small">Your strong password</span>-->
                </div>
                <div class="checkbox checkbox-warning" title="@lang('login.manter_title')">
                   <input type="checkbox" id="manter" name="manter" checked="">
                   <label for="manter">
                       @lang('login.manter')
                   </label>
                </div>
                <div class="pull-right">
                    <a href="{{asset('xpanel/auth/forgot')}}">@lang('login.esqueci')</a>
                </div>
                <hr>
                <div>
                    <input type="submit" class="btn btn-accent" value="@lang('login.entrar')" >
                    <a class="btn btn-default" href="{{asset('xpanel/auth/register')}}">@lang('login.cadastrar')</a>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
$('#frm_login').submit(function() 
{
    var email = $('#email').val();
    var senha = $('#password').val();
    var remember = $('#manter').is( ":checked" );
    xCode.ajax("put","{{asset('xpanel/auth/logar')}}",{email,senha,remember}).then(function(response)
    {
        if(response.success)
            load("{{asset('xpanel')}}");
        else
            sp_msg('error',"@lang('mensagens.erros_title')" +' - '+ response.msg);
    });
    return false;
});
</script>
@stop
        