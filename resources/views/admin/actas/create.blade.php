@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
    <h1>Crear acta de eventos</h1>
@stop

@section('content')

    <div class="card">  
        <div class="card-body" >
            {!! Form::open(['route' => 'admin.actas.store', 'autocomplete' => 'off', 'files' => true]) !!}

                    <div class="form-group">
                        {!! Form::label('evento_id', 'ID:') !!}
                        {!! Form::text('evento_id',$evento->id,  ['class' => 'form-control','readonly']) !!}
                
                        @error('evento_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('Fecha','Fecha:') !!}
                        {!! Form::text('Fecha',$evento->Fecha,  ['class' => 'form-control','readonly']) !!}
                
                        @error('Fecha')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('asunto', 'Asunto:') !!}
                        {!! Form::text('asunto',$evento->Asunto,  ['class' => 'form-control','readonly']) !!}
                
                        @error('asunto')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {!! Form::label('url', '*Acta de reunion:') !!}
                                {!! Form::file('url', ['class' => 'form-control-file', 'accept' => '.pdf']) !!}
                                
                                @error('url')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                <p class="text-danger text-small">*El archivo a subir debe ser tipo .pdf y no debe ser mayor a 512 kb </p>

                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                {!! Form::label('url2', 'Asistencia al evento:') !!}
                                {!! Form::file('url2', ['class' => 'form-control-file', 'accept' => '.pdf']) !!}
                        
                                @error('url2')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                <p class="text-danger text-small">*El archivo a subir debe ser tipo .pdf y no debe ser mayor a 512 kb </p>

                            </div>
                        </div>
                    </div>
               
                    {!! Form::submit('subir documento/s', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
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
   
@stop