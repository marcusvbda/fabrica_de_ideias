@extends('xpanel.template.login')
@section('titulo',404)
@section('conteudo')
<div class="back-link">
    <button onclick="voltar()" class="btn btn-accent">@lang('errors.back')</button>
</div>

<div class="container-center md animated slideInDown">

    <div class="view-header">
        <div class="header-icon">
            <i class="pe page-header-icon pe-7s-close-circle"></i>
        </div>
        <div class="header-title">
            <h3>404</h3>
            <small>
                @lang('errors.page_not_found')
            </small>
        </div>
    </div>

    <div class="panel panel-filled">
        <div class="panel-body">
            @lang('errors.sub_page_not_found')
        </div>
    </div>

</div>
<script type="text/javascript">
function voltar()
{
	history.back();	
}
</script>
@stop
        