@extends('xpanel.template.dashboard')
@section('titulo','Dashboard')

@section('conteudo')
<script type="text/javascript">
    $('#mn_menu1').addClass('active');
    $('#mn_menu1_opcoes').addClass('in');
    $('#mn_menu1_opcao1').addClass('active');
</script>

<div class="row">
    <div class="col-lg-12">
        <div class="view-header">
            <div class="pull-right text-right" style="line-height: 14px">
                <small>
                    <!-- <a href="{{asset('xpanel')}}">Dashboard</a><br>  -->
                    <span class="c-white">Dashboard</span>
                </small>
            </div>
            <div class="header-icon">
                <i class="pe page-header-icon pe-7s-display1"></i>
            </div>
            <div class="header-title">
                <h3 class="m-b-xs">Página em branco</h3>
                <small>
                    Este é o modelo de página que será usada em todas as telas
                </small>
            </div>
        </div>
        <hr>
    </div>
</div>


@stop
        