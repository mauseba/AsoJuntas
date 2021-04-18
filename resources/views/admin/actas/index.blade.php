@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
    @can('admin.actas.create')
        <a class="btn btn-success float-right" href="{{route('admin.actas.create')}}">subir acta</a>    
    @endcan
    <h1>Subir Acta</h1>
@stop

@section('content')
<br>
    @livewire('admin.eventos-index')
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
    <style>
    table th {
        text-align: center;
    }
    table td {
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
@stop