@extends('adminlte::page')

@section('title', 'Configurações do Monitor')

@section('content_header')
    <div class="row">
        <div class="col">
            <h1>Configurações do Monitor</h1>
        </div>
        <div class="col float-right">
            <button class="btn btn-success" data-toggle="modal" data-target="#ruleType">Adicionar regra</button>
        </div>
    </div>
@stop

@section('content')
    <div class="container-fluid">
    </div>
    <!-- Modal -->
    <div class="modal fade" id="ruleType" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Escolha o tipo de regra</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-justify">
                    <p>As regras de visualizações permitem que seja adicionada uma métrica de uma visualização existente do Zendesk.</p>
                    <p>As regras de métricas existentes permitem criar fórmulas personalizadas com métricas de visualizações já importadas.</p>
                </div>
                <div class="modal-footer">
                    <a href="{{route('monitor.visualizationRules')}}">
                        <button type="button" class="btn btn-primary">Regra de visualizações</button>
                    </a>
                    <button type="button" class="btn btn-primary">Regra de métricas existentes</button>
                </div>
            </div>
        </div>
    </div>
@stop

@include('integrations.modals')

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop