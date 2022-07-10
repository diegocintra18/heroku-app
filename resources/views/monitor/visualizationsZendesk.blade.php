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
@include('layouts.error')
    <div class="container-fluid">
        <form action="{{ route('monitor.storeZendeskVisualization') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Nome da métrica</label>
                <input type="text" class="form-control" name="zendesk_visualization_name">
            </div>
            <div class="form-group">
                <label for="">Id da visualização do Zendesk
                    <a class="btn btn-info btn-sm" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Como encontrar o id?
                    </a>
                </label>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body bg-info">
                        Acesse sua central de administração do zendesk, clique em editar na visualização desejada, e copie o id da visualização na url do navegador.
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
            <div class="form-group">
                <label for="">Ordem de exibição</label>
                <input type="number" class="form-control" name="order" id="">
            </div>
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