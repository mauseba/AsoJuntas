@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
    <h1>Crear nueva junta</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.juntas.store', 'autocomplete' => 'off', 'files' => true]) !!}

                @include('admin.juntas.partials.form')

                {!! Form::submit('Crear junta', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}

            @if (session('info'))
                <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.userjun.create')}}">Siguiente</a>
            @endif
        </div>
    </div>
@stop

@section('css')
    
@stop

@section('js')
@stop