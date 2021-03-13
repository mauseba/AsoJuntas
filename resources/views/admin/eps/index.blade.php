@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')

    
    <a class="btn btn-secondary btn-sm float-right" id="btnGuardar" data-toggle="modal" href="#">Nueva eps</a>

    <h1>Mostrar listado de eps</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    
    @livewire('admin.eps-index')
    @include('admin.eps.create')
  
@stop

@section('css')
@stop

@section('js')
    <script>
        $('#btnGuardar').click(function(){
            $('#evento_modal').modal();
        });
    </script>
@stop