@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
    <h1>Panel de creacion</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.juntas.store', 'autocomplete' => 'off', 'files' => true]) !!}

                @include('admin.juntas.partials.form')

                {!! Form::submit('Crear junta', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    
@stop

@section('js')
@stop