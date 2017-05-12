@extends('xpanel.template.dashboard')
@section('titulo','Dashboard')

@section('conteudo')
<script type="text/javascript">
    $('#mn_dashboard').addClass('active');
</script>

<div class="row">
    <div class="col-lg-12">
        <div class="view-header">
            <div class="pull-right text-right" style="line-height: 14px">
                <small>
                    <!--<a>Dashboard</a><br> -->
                    <span class="c-white">@lang('dashboard.inicio')</span>
                </small>
            </div>
            <div class="header-icon">
                <i class="pe page-header-icon pe-7s-display1"></i>
            </div>
            <div class="header-title">
                <h3 class="m-b-xs">Dashboard</h3>
                <small>
                    @lang('dashboard.dash_sub')
                </small>
            </div>
        </div>
        <hr>
    </div>
</div>



<script type="text/javascript">

    setTimeout(function()
    {
        sp_msg("error","Erro - Exemplo de mensagem de erro ");
    }, 1000);
    setTimeout(function()
    {
        sp_msg("info","Info - Exemplo de mensagem de info ");
    }, 2000);
    setTimeout(function()
    {
        sp_msg("warning","Aviso - Exemplo de mensagem de warning ");
    }, 3000);
    setTimeout(function()
    {
        sp_msg("success","Sucesso - Exemplo de mensagem de success ");
    }, 4000);
    
</script>

@stop