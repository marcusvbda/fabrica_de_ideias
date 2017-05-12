@extends('xpanel.template.dashboard')
@section('titulo',__("palestras.palestras"))

@section('conteudo')
<script type="text/javascript">
    $('#mn_palestras').addClass('active');
    $('#mn_palestras_opcoes').addClass('in');
    $('#mn_palestras_procurar').addClass('active');
</script>
<div class="row">
    
    <div class="col-xs-12">
        <form action="{{asset('xpanel/palestras')}}" method="get">
        	<div class="input-group">
        	  <input autocomplete="off" type="text" class="typeahead_search form-control" placeholder="@lang('palestras.search')" name="search"
              @if($search!="") value="{{$search}}" @endif >
        	  <span class="input-group-addon">
        	    <button class="pe-7s-search" style="background:transparent;border:none;color: #ffa000;font-weight: bold;" ></button>
        	  </span>
        	</div>
        </form>
	</div>
	<hr>
	<br>
    <div class="col-lg-12">
        <div class="tabs-container">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#todos" aria-expanded="true"> @lang('palestras.todos') ({{$todos['qtde']}})</a></li>
                <li class=""><a data-toggle="tab" href="#assistidos" aria-expanded="false"> @lang('palestras.assistidos') ({{$assistidos['qtde']}})</a></li>
                <li class=""><a data-toggle="tab" href="#nao_assistidos" aria-expanded="false"> @lang('palestras.nao_assistidos') ({{$nao_assistidos['qtde']}})</a></li>
                <li class=""><a data-toggle="tab" href="#nao_assistidos" aria-expanded="false"> @lang('palestras.favoritos') (2)</a></li>
            </ul>


            <div class="tab-content">

            	<!-- tab todos -->
                <div id="todos" class="tab-pane active">
                    <div class="panel-body">
                        <strong class="c-white">{{$todos['qtde']}} @lang('palestras.resultados_encontrados')</strong>	
                        <div class="row">
                            @foreach($todos['consulta'] as $palestra)
                            <div class="col-lg-3" style="margin-top: 30px;" tags="{{$palestra->tags}}">
                                <a href="{{asset('xpanel/palestras/'.base64_encode($palestra->id).'/show')}}">
                                    <img alt="" src="{{asset('public/uploads/imagens')}}/{{$palestra->imagem}}" width="196" height="110">
                                  
                                    <p><strong>{{$palestra->titulo}}</strong><p>
                                </a>
                                <p style="margin-bottom: 0px">
                                    <small>{{$palestra->nome_autor}}</small>
                                </p>
                                <p style="margin-bottom: 0px">
                                    <small>{{$palestra->visualizacoes}} @lang('palestras.visualizacoes') </small>
                                </p>
                                <p style="margin-bottom: 0px">
                                    {{$palestra->curtidas}} <span class="glyphicon glyphicon-thumbs-up"></span>   |    
                                    {{$palestra->descurtidas}} <span class="glyphicon glyphicon-thumbs-down"></span>
                                </p>
                            </div>                            
                            @endforeach
                        </div>
                        <hr>
                        {{$todos['consulta']->links()}}                        
                    </div>
                </div>
            	<!-- tab todos -->

                <!-- tab assistidos -->
                <div id="assistidos" class="tab-pane">
                    <div class="panel-body">
                        <strong class="c-white">{{$assistidos['qtde']}} @lang('palestras.resultados_encontrados')</strong>   
                        <div class="row">
                            @foreach($assistidos['consulta'] as $palestra)
                            <div class="col-lg-3" style="margin-top: 30px;" tags="{{$palestra->tags}}">
                                <a>
                                    <img alt="" src="{{asset('public/uploads/imagens')}}/{{$palestra->imagem}}" width="196" height="110">
                                  
                                    <p><strong>{{$palestra->titulo}}</strong><p>
                                </a>
                                <p style="margin-bottom: 0px">
                                    <small>{{$palestra->nome_autor}}</small>
                                </p>
                                <p style="margin-bottom: 0px">
                                    <small>{{$palestra->visualizacoes}} @lang('palestras.visualizacoes') </small>
                                </p>
                                <p style="margin-bottom: 0px">
                                    {{$palestra->curtidas}} <span class="glyphicon glyphicon-thumbs-up"></span>   |    
                                    {{$palestra->descurtidas}} <span class="glyphicon glyphicon-thumbs-down"></span>
                                </p>
                            </div>                            
                            @endforeach
                        </div>
                        <hr>
                        {{$todos['consulta']->links()}}                        
                    </div>
                </div>
                <!-- tab assistidos -->

                <!-- tab assistidos -->
                <div id="nao_assistidos" class="tab-pane">
                    <div class="panel-body">
                        <strong class="c-white">{{$nao_assistidos['qtde']}} @lang('palestras.resultados_encontrados')</strong>   
                        <div class="row">
                            @foreach($nao_assistidos['consulta'] as $palestra)
                            <div class="col-lg-3" style="margin-top: 30px;" tags="{{$palestra->tags}}">
                                <a>
                                    <img alt="" src="{{asset('public/uploads/imagens')}}/{{$palestra->imagem}}" width="196" height="110">
                                  
                                    <p><strong>{{$palestra->titulo}}</strong><p>
                                </a>
                                <p style="margin-bottom: 0px">
                                    <small>{{$palestra->nome_autor}}</small>
                                </p>
                                <p style="margin-bottom: 0px">
                                    <small>{{$palestra->visualizacoes}} @lang('palestras.visualizacoes') </small>
                                </p>
                                <p style="margin-bottom: 0px">
                                    {{$palestra->curtidas}} <span class="glyphicon glyphicon-thumbs-up"></span>   |    
                                    {{$palestra->descurtidas}} <span class="glyphicon glyphicon-thumbs-down"></span>
                                </p>
                            </div>                            
                            @endforeach
                        </div>
                        <hr>
                        {{$todos['consulta']->links()}}                        
                    </div>
                </div>
                <!-- tab assistidos -->

                

            </div>


        </div>
    </div>
                
</div>


<script type="text/javascript">
    $('.typeahead_search').typeahead({
            source: [@foreach($palestras as $palestra) "{{$palestra->titulo}}", @endforeach]
        });
</script>

@stop
        