@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')

    @can('admin.beneficiarios.create')
        <a class="btn btn-success float-right" href="{{route('admin.beneficiarios.create')}}">Agregar beneficiario</a>
    @endcan
    
    <h1>Listado Beneficiarios</h1>
@stop

@section('content')



    @livewire('admin.beneficiarios-index')
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
@if (session('info'))
<script>
    var session = '{{session('info')}}';
    Swal.fire(
    'Operacion Completada',
    session ,
    'Success'
    )
</script>
@endif

@stop