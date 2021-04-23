@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')

    @can('admin.censo.create')
        <a class="btn btn-success btn-sm float-right" href="{{route('admin.censo.create')}}">Nuevos Datos básicos</a>
    @endcan
    
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    @if (session('error'))
    <script>
        var session = '{{session('error')}}';
        Swal.fire(
        'Error',
        session ,
        'error'
        )
    </script>
    @endif
    <script>
        $(function() {
            $('#user').selectpicker();
        });
    </script>

@stop