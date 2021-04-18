@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
@can('admin.userjun.create')
    <a class="btn btn-success float-right" href="{{route('admin.userjun.create')}}">Crear Afiliado</a>
@endcan

@can('admin.informes')
    <button class="btn btn-warning  float-right d-inline" data-toggle="modal" data-target="#exampleModal" data-backdrop="static" >Crear informe</button>
@endcan

<h1>Lista de afiliados de juntas</h1>

@include('admin.userjun.informe') <br>
    
@stop

@section('content')
        <!-- Nav tabs -->
<br>
<div class="card">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home">Afiliados</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" id="men1" href="#menu1">Directivos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" id="men2" href="#menu2">Fiscal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" id="men3" href="#menu3">Comisiones especiales</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <div id="home" class="container tab-pane active">  
                <h3>Todos los afiliados a juntas</h3>
                @livewire('admin.userjun-index') 
            </div>
            <div id="menu1" class="container tab-pane table-responsive fade">
                <h3>Directivos de juntas</h3>
                @livewire('admin.directivos-index')
            </div>
            <div id="menu2" class="container tab-pane table-responsive fade">
                <h3>Fiscales de juntas</h3>
                @livewire('admin.fiscal-index')
            </div>
            <div id="menu3" class="container tab-pane table-responsive fade">
                <h3>Afil. comisiones especiales</h3>
                @livewire('admin.especial-index')
            </div>
        </div>   
    </div>
</div>

@stop

@section('footer')
    <div class="text-center">
        <strong> 
            Copyright © 2021 
            <a href="/">Asojuntas</a>.
        </strong>
        All rights reserved.
        <div class="float-right d-none d-sm-block">
            <b>Version</b>
            1.0
        </div>
    </div>
@stop

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <style>
    table th {
        text-align: center;
    }
    </style>
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
@if (session('info'))
    <script>
        var session = '{{session('info')}}';
        Swal.fire(
        'Operacion Completada',
        session ,
        'success'
        )
    </script>
@endif
@if (session('error'))
    <script>
        var session = '{{session('error')}}';
        Swal.fire(
        'Operacion no Completada',
        session ,
        'error'
        )
    </script>
@endif
<script>
    $(function() {
        $('#excel').click(function(){
            $("#oppdf").hide();
        });

        $("#pdf").click(function(){
            $("#oppdf").show();
            $('#junta').click(function(){
                $("#tiempo").hide();
                $("#juntas").show();
                $("#ddlJuntas").val('default').selectpicker("refresh");
            });
            $('#fecha').click(function(){
                $("#juntas").hide();
                $("#tiempo").show();
                $('#txtFechaInicial').val("");
                $('#txtFechaFinal').val("");
            });
        });

        $('#ddlJuntas').selectpicker();
        
    });
</script>
@stop