@extends('xpanel.template.dashboard')
@section('titulo',__('palestras.palestra'))

@section('conteudo')
<script type="text/javascript">
    $('#mn_palestras').addClass('active');
    $('#mn_palestras_opcoes').addClass('in');
    $('#mn_palestras_procurar').addClass('active');
</script>

<div class="row">
    <div class="col-lg-12">
        <div class="view-header">
            <div class="pull-right text-right" style="line-height: 14px">
                <small>
                    <a href="{{asset('xpanel')}}">@lang('dashboard.inicio')</a><br> 
                </small>
            </div>
            <div class="header-icon">
                <i class="pe pe-7s-micro"></i>
            </div>
            <div class="header-title">
                <h3 class="m-b-xs">{{$palestra->titulo}}</h3>
                <small>
                    {{$palestra->subtitulo}}
                </small>
            </div>
        </div>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="panel panel-filled">
            <div class="panel-heading">
                <div class="panel-tools">
                    <a class="panel-toggle"><i class="fa fa-chevron-up"></i></a>
                    <!-- <a class="panel-close"><i class="fa fa-times"></i></a> -->
                </div>
                @lang('palestras.descricao')
            </div>
            <div class="panel-body" style="display: block;">
                <p>
                    {{$palestra->descricao}}
                </p>          


            </div>
        </div>

        <div class="panel panel-filled  panel-collapse">
            <div class="panel-heading">
                <div class="panel-tools">
                    <a class="panel-toggle"><i class="fa fa-chevron-down"></i></a>
                    <!-- <a class="panel-close"><i class="fa fa-times"></i></a> -->
                </div>
                @lang('palestras.informacoes')
            </div>
            <div class="panel-body" style="display: none;">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris a lacus est. Maecenas vel odio quis ligula sollicitudin efficitur ac eget ligula. Vestibulum et urna non risus tristique porta non et tortor. Ut molestie magna mauris, sed porttitor libero feugiat sit amet. Quisque ac feugiat nulla, nec finibus dolor. Ut non felis vitae leo molestie euismod ut sed elit. Vivamus convallis sagittis facilisis. Pellentesque id facilisis dolor, vitae venenatis elit. Aliquam erat volutpat. Maecenas maximus magna vel orci vehicula, ut hendrerit arcu consequat. Pellentesque euismod purus at odio consequat, eu aliquam augue gravida. Nunc id maximus eros, sed vulputate dolor.
                </p>          


            </div>
        </div>

        <div class="panel panel-filled  panel-collapse">
            <div class="panel-heading">
                <div class="panel-tools">
                    <a class="panel-toggle"><i class="fa fa-chevron-down"></i></a>
                    <!-- <a class="panel-close"><i class="fa fa-times"></i></a> -->
                </div>
                Ebooks
            </div>
            <div class="panel-body" style="display: none;">
                <p>
                    <h4>
                        <a>
                            <strong><i class="pe-7s-notebook"></i> Gestão de Pessoas 1/3 </strong>
                        </a>
                    </h4>  
                </p>  
                <p>
                    <h4>
                        <a>
                            <strong><i class="pe-7s-notebook"></i> Gestão de Pessoas 2/3 </strong>
                        </a>
                    </h4>  
                </p> 
                <p>
                    <h4>
                        <a>
                            <strong><i class="pe-7s-notebook"></i> Gestão de Pessoas 3/3 </strong>
                        </a>
                    </h4>  
                </p>       


            </div>
        </div>
    </div>


    <div class="col-lg-8">
        <div class="panel panel-filled">
            <div class="panel-heading">
                <div class="panel-tools">
                    <a class="panel-toggle"><i class="fa fa-chevron-down"></i></a>
                    <!-- <a class="panel-close"><i class="fa fa-times"></i></a> -->
                </div>
                @lang('palestras.informacoes')
            </div>
            <div class="panel-body" style="display: block;">
                <div class="col-lg-12">
                    <div class="row">
                        <style>
                           video::-internal-media-controls-download-button {
                            display:none;
                           }

                           video::-webkit-media-controls-enclosure {
                                overflow:hidden;
                           }

                           video::-webkit-media-controls-panel {
                                width: calc(100% + 30px); 
                           }
                        </style>
                        <video width="100%" controls >
                          <source src="{{asset('public/uploads/videos/'.$palestra->video)}}" type="video/mp4">
                        </video>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-right">
                            <strong style="color: #f6a830">{{$palestra->visualizacoes}} @lang('palestras.visualizacoes')</strong>
                        </div>
                    </div>                   
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="text-left">
                            <a><strong><span class="pe-7s-plus"></span> @lang('palestras.adicionar_favoritos')</strong></a>
                        </div>  
                    </div>
                    <div class="col-lg-8">
                        <div class="text-right">
                            <a><strong><span class="glyphicon glyphicon-thumbs-up"></span> {{$palestra->curtidas}}</strong></a>
                            <a style="padding-left: 10px;"><strong><span class="glyphicon glyphicon-thumbs-down"></span> {{$palestra->descurtidas}}</strong></a>
                        </div>   
                    </div>                
                </div>
            </div>
        </div>
    </div>


</div>
<!-- row -->


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-filled">
            <div class="panel-heading">
                <div class="panel-tools">
                    <a class="panel-toggle"><i class="fa fa-chevron-up"></i></a>
                    <!-- <a class="panel-close"><i class="fa fa-times"></i></a> -->
                </div>
                @lang('palestras.comentarios')
            </div>
            <div class="panel-body" style="display: block;">
                <form id="enviar_comentario">
                    <div class=form-group>
                        <textarea class="form-control" rows="3" placeholder="@lang('palestras.enviar_comentario')"></textarea>
                    </div>
                </form>


                @for($i=0;$i<5;$i++)
                <hr>                
                <div style="padding-bottom: 25px;">
                    <p style="color: #f6a830">
                        <strong> joão da silva </strong> @lang('palestras.comentou')
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin porttitor cursus tincidunt. Integer placerat massa nec turpis blandit laoreet. Nullam aliquam vulputate rutrum. Donec magna nisi, commodo sit amet magna non, vehicula hendrerit diam. Proin sem ligula, suscipit sed augue et, hendrerit viverra sapien. Phasellus facilisis eleifend lacus at commodo.
                    </p>
                    <p>
                        <a>@lang('palestras.responder')</a>
                        <a style="padding-left: 10px;">
                            <strong><span class="glyphicon glyphicon-thumbs-up"></span></strong>
                        </a>
                        <a style="padding-left: 10px;">
                            <strong><span class="glyphicon glyphicon-thumbs-down"></span></strong>
                        </a>
                    </p>
                    <p>
                        <strong>
                            <a>@lang('palestras.ver_respostas') <i class="fa fa-chevron-down"></i></a></a>
                        </strong>
                    </p>
                </div>
                @endfor

            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    $(document).ready(function() 
    {
        $("video").bind("contextmenu",function(){
            return false;
            });
     } );
</script>

@stop
        