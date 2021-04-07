@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
    <h1>Lista de usuario</h1>
@stop

@section('content')
    @livewire('admin.users-index')
@stop

@section('css')
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