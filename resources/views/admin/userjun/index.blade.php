@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
<a class="btn btn-secondary btn-sm float-right" href="{{route('admin.userjun.create')}}">Crear usuario</a>
    <h1>Mostrar lista de usuario de juntas</h1>
    
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

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

@stop