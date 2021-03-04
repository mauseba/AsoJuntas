@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
    <h1>Crear Roles</h1>
@stop

@section('content')

    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.roles.store']) !!}

                @include('admin.roles.partials.form')

                {!! Form::submit('Crear Rol', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop