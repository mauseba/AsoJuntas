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