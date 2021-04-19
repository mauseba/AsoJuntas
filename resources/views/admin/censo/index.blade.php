@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')

    {{-- @can('admin.censo.create') --}}
        <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.censo.create')}}">Nuevos Datos básicos</a>
    {{-- @endcan --}}
    
    <h1>Censo comunal</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    @livewire('admin.censo-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop