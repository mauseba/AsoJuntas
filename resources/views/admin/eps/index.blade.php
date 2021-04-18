@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')

    @can('admin.eps.create')
        <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.eps.create')}}">Ingresar EPS</a>
    @endcan
    
    <h1>Listado de EPS</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    @livewire('admin.eps-index')
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
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop