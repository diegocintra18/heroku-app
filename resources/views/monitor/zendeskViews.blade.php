@extends('adminlte::page')

@section('title', 'Importar visualização')

@section('content_header')
    <div class="row">
        <div class="col">
            <h1>Importar visualização</h1>
        </div>
    </div>
@stop

@section('content')
@include('layouts.error')
    <div class="container-fluid">
        <form action="">
            <div class="form-group">
                <label for="">Id da visualização</label>
                <input type="text" name="zendesk_visualization_id" id="">
            </div>
            <div class="form-group">
                <label for="">Nome da métrica</label>
                <input type="text" name="zendesk_visualization_name" id="">
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