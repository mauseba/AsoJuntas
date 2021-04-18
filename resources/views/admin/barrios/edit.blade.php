@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
    <h1>Editar barrios</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    
    <div class="card">
        <div class="card-body">
            {!! Form::model($barrios, ['route' => ['admin.barrios.update', $barrios], 'method' => 'put']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del barrio/Vereda']) !!}


                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>

            

                {!! Form::submit('Actualizar Barrio/Vereda', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
       
    </div>
    <a class="btn btn-secondary" href="{{route('admin.barrios.index')}}">Volver</a>
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
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
    

@endsection