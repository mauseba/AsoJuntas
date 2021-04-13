@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
    <h1>Crear nuevo Barrio</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.barrios.store']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del Barrio/Vereda']) !!}


                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror

            </div>

            

            {!! Form::submit('Agregar Barrio', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop