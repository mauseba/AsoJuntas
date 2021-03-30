@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')

    @can('admin.posts.create')
        <a class="btn btn-success float-right" href="{{route('admin.posts.create')}}">Nueva publicacion</a>
    @endcan
    
    <h1>Listado de Publicaciones</h1>
@stop

@section('content')
<br>
    @livewire('admin.posts-index')
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