@extends('adminlte::page')

@section('title', 'Integrações')

@section('content_header')
    <h1>Integrações</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h3>Zendesk Support</h3>
                    <hr>
                    <span>Status: </span><span class="badge badge-secondary">Desabilitado</span>
                    <br>
                    <button class="btn btn-primary mt-3" data-toggle="modal" data-target="#zendeskModal">Instalar</button>
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
    <script> console.log('Hi!'); </script>
@stop