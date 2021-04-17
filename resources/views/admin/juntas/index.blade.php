@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
    @can('admin.juntas.create')
        <a class="btn btn-success float-right d-inline" href="{{route('admin.juntas.create')}}">Nueva junta</a>  
    @endcan
    
    @can('admin.informes')
        <button class="btn btn-warning  float-right d-inline" data-toggle="modal" data-target="#exampleModal" data-backdrop="static" >Crear informe</button>
    @endcan
    <h1>Mostrar lista de Juntas</h1>
    
    @include('admin.juntas.informe') <br>
@stop

@section('content')
<br>
    @livewire('admin.juntas-index')            
@stop

@section('css')
    <style>
    table th {
        text-align: center;
    }
    </style>
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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