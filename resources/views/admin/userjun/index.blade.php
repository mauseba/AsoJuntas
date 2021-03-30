@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')

<a class="btn btn-success float-right" href="{{route('admin.userjun.create')}}">Crear usuario</a>
<button class="btn btn-warning  float-right d-inline" data-toggle="modal" data-target="#exampleModal" data-backdrop="static" >Crear informe</button>
    <h1>Mostrar lista de usuario de juntas</h1>
    @include('admin.userjun.informe') <br>
    
@stop

@section('content')
<br>
    @livewire('admin.userjun-index')  

@stop

@section('css')
    <style>
    table th {
        text-align: center;
    }
    </style>
@stop

@section('js')
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
<script>
    $(function() {
        $('#excel').click(function(){
            $("#fecha").hide();
        });

        $("#pdf").click(function(){
            $('#txtFechaInicial').val("");
            $('#txtFechaFinal').val("");
            $("#fecha").show();
        });

    });
</script>
@stop