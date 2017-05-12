@extends('xpanel.template.login')
@section('titulo',__('register.titulo'))

@section('conteudo')
<div class="back-link">
    <a href="{{asset('xpanel/auth/login')}}" class="btn btn-accent">@lang('register.voltar')</a>
</div>

<div class="container-center lg animated slideInDown">


    <div class="view-header">
        <div class="view-header">
            <div class="header-title text-center" style="margin-left: 0px;">
                <h3>
                    <img src="{{asset(env('LOGO_BRANCO'))}}" height="100px">
                </h3>
                <small>
                    @lang('register.sub_titulo')
                </small>
            </div>
        </div>
    </div>

    <div class="panel panel-filled">
        <div class="panel-body">
            <p>

            </p>
            <form id="frm_liberacao">
                <div class="row">
                    <div class="form-group col-lg-12">
                        <label>@lang('register.codigo_liberacao')</label>
                        <input type="text" maxlength="150" required id="codigo" name="codigo" class="form-control" name="" placeholder="@lang('register.codigo_liberacao')">
                        <span class="help-block small">@lang('register.sub_codigo_liberacao')</span>
                    </div>                            
                </div>
                <div>
                    <input type="submit" class="btn btn-accent" value="@lang('register.validar_codigo')">
                    <a class="btn btn-default" href="{{asset('')}}">@lang('register.nao_tenho')</a>                            
                </div>
            </form>

            <form id="frm_register" style="display: none" onsubmit="return false">
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label>@lang('register.nome')</label>
                        <input type="text" id="nome" name="nome" maxlength="150" required="" class="form-control">
                        <input type="text" id="nome" hidden >
                        <span class="help-block small">@lang('register.sub_nome')</span>
                    </div>
                    <div class="form-group col-lg-6">
                        <label>@lang('register.sobrenome')</label>
                        <input type="text" value="" id="sobrenome" required="" class="form-control" maxlength="200" name="sobrenome">
                        <span class="help-block small">@lang('register.sub_sobrenome')</span>
                    </div>
                    <div class="form-group col-lg-6">
                        <label>@lang('register.apelido')</label>
                        <input type="text" id="apelido" name="apelido" maxlength="100" required="" class="form-control">
                        <span class="help-block small">@lang('register.sub_apelido')</span>
                    </div>
                    <div class="form-group col-lg-6">
                        <label>@lang('register.email')</label>
                        <input type="email" id="email" name="email" maxlength="250" required="" class="form-control">
                        <span class="help-block small">@lang('register.sub_email')</span>
                    </div>
                    <div class="form-group col-lg-6">
                        <label>@lang('register.nascimento')</label>
                        <input type="date" id="dt_nascimento" name="dt_nascimento" required="" class="form-control">
                        <span class="help-block small">@lang('register.sub_nascimento')</span>
                    </div>
                    <div class="form-group col-lg-6">
                        <label>@lang('register.sexo')</label>
                        <select class="form-control" name="sexo" id="sexo">
                            <option value="M">@lang('register.masculino')</option>
                            <option value="F">@lang('register.feminino')</option>
                        </select>
                        <span class="help-block small">@lang('register.sexo')</span>
                    </div>
                    <div class="form-group col-lg-6">
                        <label>@lang('register.senha')</label>
                        <input type="password" id="senha" class="form-control" name="senha" required maxlength="20">
                        <span class="help-block small">@lang('register.sub_senha')</span>
                    </div>
                    <div class="form-group col-lg-6">
                        <label>@lang('register.repete_senha')</label>
                        <input type="password" id="repete_senha" class="form-control"  required maxlength="20">
                        <span class="help-block small">@lang('register.sub_repete_senha')</span>
                    </div>
                </div>
                <div>
                    <input type="submit" class="btn btn-accent" value="@lang('register.cadastrar')">
                </div>
            </form>
        </div>
    </div>

</div>

<script>

$('#frm_liberacao').submit(function() 
{
    var codigo = $('#codigo').val();
    xCode.ajax("post","{{asset('xpanel/auth/valid')}}",{op:"valida_codigo",codigo:codigo}).then(function(response)
    {
        if(!response.success)
           return sp_msg('error',"@lang('mensagens.erros_title')" +' - '+ response.msg);
        else
        {
            $('#frm_liberacao').toggle(150);
            $('#frm_register').toggle(150);
        }
    });
    return false;
});

$('#frm_register').submit(function() 
{
    dados = $("#frm_register").FormData();
    if($('#senha').val()!=$('#repete_senha').val())
    {
        sp_msg('error',"@lang('register.erro_senhas')");
        return false;
    }
    dados['codigo']=$('#codigo').val();
    xCode.ajax("post","{{asset('xpanel/auth/store')}}",dados).then(function(response)
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
        