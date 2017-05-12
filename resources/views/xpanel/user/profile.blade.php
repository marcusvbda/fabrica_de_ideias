@extends('xpanel.template.dashboard')
@section('titulo',__('usuarios.profile'))

@section('conteudo')
<script type="text/javascript">
    $('#mn_usuarios').addClass('active');
    $('#mn_usuarios_opcoes').addClass('in');
    $('#mn_usuarios_profile').addClass('active');
</script>
<!-- <div class="row">
    <div class="col-lg-12">
        <div class="view-header">
            <div class="pull-right text-right" style="line-height: 14px">
                <small>
                    <a href="{{asset('xpanel')}}">Dashboard</a><br> 
                    <span class="c-white">@lang('usuarios.profile')</span>
                </small>
            </div>
            <div class="header-icon">
                <i class="pe page-header-icon pe-7s-users"></i>
            </div>
            <div class="header-title">
                <h3 class="m-b-xs">@lang('usuarios.profile')</h3>
                <small>
                   @lang('usuarios.profile_sub')
                </small>
            </div>
        </div>
        <hr>
    </div>
</div> -->


<?php  $usuario = Auth::user(); ?>
<div class="row">
    <div class="col-md-12">
        <div class="pull-left">
            <div class="btn-group">
                <button data-toggle="dropdown" class="btn btn-success dropdown-toggle btn-sm" aria-expanded="false">@lang('usuarios.acoes') <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="{{asset('xpanel/auth/sair')}}">@lang('usuarios.sair')</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row m-t-sm">

    <div class="col-md-12">
        <div class="panel panel-filled">

            <div class="panel-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="media">
                            <i class="pe pe-7s-user c-accent fa-3x"></i>
                            <h2 class="m-t-xs m-b-none">
                                {{$usuario->nome}} {{$usuario->sobrenome}} @if($usuario->apelido!="") ( {{$usuario->apelido}} ) @endif
                            </h2>
                            <small>
                                @if($usuario->sexo=="M") Usuário @else Usuária @endif desde {{dt_format($usuario->created_at,'d/m/Y')}}
                            </small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <table class="table small m-t-sm">
                            <tbody>
                            <tr>
                                <td>
                                    <strong class="c-white">{{$palestras}}</strong> @lang('usuarios.palestras_disponiveis')
                                </td>
                                <td>
                                    <strong class="c-white">{{$palestras_assistidas}}</strong> @lang('usuarios.palestras_assistidas')
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <strong class="c-white">{{$perguntas}}</strong> @lang('usuarios.perguntas_enviadas')
                                </td>
                                <td>
                                    <strong class="c-white">{{$perguntas_respondidas}}</strong> @lang('usuarios.perguntas_respondidas')
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong class="c-white">{{$ebooks}}</strong> @lang('usuarios.ebooks_disponiveis')
                                </td>
                                <td>
                                    <strong class="c-white">{{$ebooks_baixados}}</strong> @lang('usuarios.ebooks_baixados')
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-3 m-t-sm">
                    <span class="c-white">
                        @lang('usuarios.contato')
                    </span>
                        <br>
                        <small>
                        	@lang('usuarios.contato_sub')                            
                        </small>
                        <div class="btn-group m-t-sm pull-right">
                            <a href="#" class="btn btn-default btn-sm"><i class="fa fa-envelope"></i> @lang('usuarios.enviar_msg') </a>
                        </div>


                    </div>


                </div>

            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-md-12">
        <div class="panel panel-filled">

            <div class="panel-body">

                <div class="row">
                    <div class="col-md-3 col-xs-6 text-center">
                        <h2 class="no-margins">
                            {{porcentagem($palestras_assistidas,$palestras)}} %
                        </h2>
                        <span class="c-white">@lang('usuarios.palestras')</span> @lang('usuarios.assistidas')
                    </div>
                    <div class="col-md-3 col-xs-6 text-center">
                        <h2 class="no-margins">
                            {{porcentagem($perguntas_respondidas,$perguntas)}} %
                        </h2>
                        <span class="c-white">@lang('usuarios.perguntas')</span> @lang('usuarios.respondidas')
                    </div>
                    <div class="col-md-3 col-xs-6 text-center">
                        <h2 class="no-margins">
                            {{porcentagem($ebooks_baixados,$ebooks)}} %
                        </h2>
                        <span class="c-white">@lang('usuarios.ebooks')</span> @lang('usuarios.baixados')
                    </div>
                    <?php 
                        $pontos = App\Http\Controllers\userController::getPontuacao(
                                    [$ebooks,$palestras,$perguntas],
                                    [$ebooks_baixados,$palestras_assistidas,$perguntas_respondidas]
                                ); 
                    ?>
                    <div class="col-md-3 col-xs-6 text-center" title="{{$pontos}} @lang('usuarios.estrelas') ( {{porcentagem($pontos,5)}} % )">
                        <h2 class="no-margins">
                        @for($i=0 ; $i < $pontos ; $i++)
                            <i class="pe-7s-star"></i>
                        @endfor
                        </h2>
                        <span class="c-white">@lang('usuarios.pontuacao')</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<div class="row">

    <div class="col-md-6">
        <div class="panel">
            <div class="panel-body">
                <h4> @lang('usuarios.atividades_recentes')</h4>
                @if(count($historico)==0)
                    <small>@lang('usuarios.sem_atividades')</small>
                @endif
                <div class="v-timeline vertical-container">

                @foreach($historico as $hist) 
                    <div class="vertical-timeline-block">
                        <div class="vertical-timeline-icon">
                            <i class="fa fa-file"></i>
                        </div>
                        <div class="vertical-timeline-content">
                            <div class="p-sm">
                                <?php $dias = dias_atras($hist->created_at);?>
                                <span class="vertical-date pull-right"> <small>@if($dias>1) {{$dias}} @lang('usuarios.dias_atras') @elseif($dias==0) @lang('usuarios.hoje') @else {{$dias}} @lang('usuarios.dia_atras') @endif</small> </span>

                                <h2>{{$hist->titulo}}</h2>

                                <p>{{$hist->descricao}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach



                </div>
            </div>
        </div>


    </div>

</div>

@stop
        