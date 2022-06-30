@extends('adminlte::page')

@section('title', 'Regras de visualizações')

@section('content_header')
    <div class="row">
        <div class="col">
            <h1>Regras de visualizações</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="container-fluid">
        <form action="">
            <div class="form-group">
                <label for="">Nome da métrica</label>
                <input type="text" class="form-control" name="zendesk_visualization_name">
            </div>
            <div class="form-group">
                <label for="">Id da visualização do Zendesk
                    <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Como encontrar o id?
                    </a>
                </label>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                    </div>
                </div>
                <input type="text" class="form-control" name="zendesk_visualization_id">
                <input type="hidden" name="rule_type" value="1">
            </div>
            <div class="form-group">
                <p>Neste trecho você deverá preencher os valores máximos aceitos para essa métrica para alterar a cor da métrica no painel, e a cor vermelha iniciará logo após o indicador ultrapassar o valor máximo da cor amarela.</p>
                <label for="">Valor máximo para a cor verde</label>
                <input type="number" class="form-control" name="green_range" id="">
            </div>
            <div class="form-group">
                <label for="">Valor máximo para a cor amarela</label>
                <input type="number" class="form-control" name="yellow_range" id="">
            </div>
            <input type="hidden" name="client_id" value="1">
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>
@stop

@include('integrations.modals')

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop