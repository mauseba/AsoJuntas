@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')

    @can('admin.barrios.create')
        <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.barrios.create')}}">Ingresar Barrio/Vereda</a>
    @endcan
    
    <h1>Listado de Barrios/Veredas</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    @livewire('admin.barrios-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop