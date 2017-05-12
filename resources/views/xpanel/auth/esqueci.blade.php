@extends('xpanel.template.login')
@section('titulo',__('forgot.titulo'))

@section('conteudo')
<div class="back-link">
    <a href="{{asset('xpanel/auth/login')}}" class="btn btn-accent">@lang('forgot.voltar')</a>
</div>

<div class="container-center animated slideInDown">


    <div class="view-header">
        <div class="header-title text-center" style="margin-left: 0px;">
            <h3>
                <img src="{{asset(env('LOGO_BRANCO'))}}" height="100px">
            </h3>
            <small>
               @lang('forgot.sub_titulo')                
            </small>
        </div>
    </div>

    <div class="panel panel-filled">
        <div class="panel-body">
            <div id="div_load" style="display: none">
                <div class="text-center">
                    <h1><a class="fa fa-spinner fa-spin"></a><h1>
                </div>
            </div>
            <form id="frm_email" >
                <div class="form-group">
                    <label class="control-label" for="email">@lang('forgot.email')</label>
                    <input type="email" title="@lang('forgot.email')" required maxlength="250" name="email" id="email" class="form-control" placeholder="email@email.com">
                    <span class="help-block small">@lang('forgot.sub_email')</span>
                </div>
                <div>
                    <input type="submit" class="btn btn-accent" value="@lang('forgot.receber')">
                </div>
            </form>

            <form id="frm_new_pass" style="display: none">
                <div class="form-group">
                    <label class="control-label" for="email">@lang('forgot.codigo')</label>
                    <input type="text" title="@lang('forgot.codigo')" required maxlength="5" name="codigo" id="codigo" class="form-control text-center">
                    <span class="help-block small">@lang('forgot.sub_email')</span>
                </div>
                <div>
                    <input type="submit" class="btn btn-accent" value="@lang('forgot.renovar')">
                </div>
            </form>

            <form id="frm_reset" style="display: none">
                <div class="form-group">
                    <label class="control-label" for="senha">@lang('forgot.senha')</label>
                    <input type="text" id="id_usuario" hidden>
                    <input type="password" title="@lang('forgot.senha')" required maxlength="20" name="senha" id="senha" class="form-control text-center">
                    <span class="help-block small">@lang('forgot.sub_senha')</span>
                </div>
                <div class="form-group">
                    <label class="control-label" for="senha">@lang('forgot.repita')</label>
                    <input type="password" title="@lang('forgot.repita')" required maxlength="20"  id="repita_senha" class="form-control text-center">
                    <span class="help-block small">@lang('forgot.sub_repita_senha')</span>
                </div>
                <div>
                    <input type="submit" class="btn btn-accent" value="@lang('forgot.confirmar')">
                </div>
            </form>
        </div>
    </div>

</div>

<script type="text/javascript">
$('#frm_email').submit(function() 
{
    var email = $('#email').val();
    $('#div_load').show(150);

    xCode.ajax("post","{{asset('xpanel/auth/valid')}}",{op:"enviar_codigo_renovacao",email:email}).then(function(response)
    {
        $('#div_load').hide(150);
        if(!response.success)
           return sp_msg('error',"@lang('mensagens.erros_title')" +' - '+ response.msg);
        else
        {
            $('#frm_email').toggle(150);
            $('#frm_new_pass').toggle(150);
        }
    });
    return false;
});

$('#frm_new_pass').submit(function() 
{
    var codigo = $('#codigo').val();
    xCode.ajax("post","{{asset('xpanel/auth/valid')}}",{op:"valida_codigo_renovacao",codigo:codigo}).then(function(response)
    {
        if(!response.success)

           return sp_msg('error',"@lang('mensagens.erros_title')" +' - '+ response.msg);
        else
        {
            $('#id_usuario').val(response.data.id);
            $('#frm_new_pass').toggle(150);
            $('#frm_reset').toggle(150);
        }
    });
    return false;
});

$('#frm_reset').submit(function() 
{
    if($('#senha').val()!=$('#repita_senha').val())
    {
        sp_msg('error',"@lang('register.erro_senhas')");
        return false;
    }

    xCode.ajax("put","{{asset('xpanel/auth/reset_pass')}}",{senha:$('#senha').val(),id:$('#id_usuario').val()}).then(function(response)
    {
        if(!response.success)
           return sp_msg('error',"@lang('mensagens.erros_title')" +' - '+ response.msg);
        else
        {
            sp_msg('success','@lang("register.msg_sucesso") !!')
            setTimeout(refresh, 3000);     
        }
    });
    return false;
});

function refresh()
{
    load("{{asset('xpanel/auth/login')}}");
}
</script>
@stop
        