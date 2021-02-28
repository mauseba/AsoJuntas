@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
    <h1>Lista de usuario</h1>
@stop

@section('content')
    @livewire('admin.users-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> </script>
@stop