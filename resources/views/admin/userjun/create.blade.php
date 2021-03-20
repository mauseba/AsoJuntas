@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')

    <h1>Crear directivos de junta</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.userjun.store', 'autocomplete' => 'off', 'files' => true]) !!}

                @include('admin.userjun.partials.form')

                {!! Form::submit('Crear directivos', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('css')
@stop

@section('js')

@stop