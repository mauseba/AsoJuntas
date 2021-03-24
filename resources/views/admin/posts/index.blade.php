@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')

    @can('admin.posts.create')
        <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.posts.create')}}">Nueva publicacion</a>
    @endcan
    
    <h1>Listado de Publicaciones</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    @livewire('admin.posts-index')
@stop

@section('css')
   
@stop

@section('js')
    
@stop