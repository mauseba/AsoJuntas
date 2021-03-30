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
        
                    <div class="form-group">
                        {!! Form::label('url', 'Acta de reunion:') !!}
                        {!! Form::file('url', ['class' => 'form-control-file', 'accept' => '.pdf']) !!}
                
                        @error('url')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                
               
                    {!! Form::submit('subir acta', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
   
@stop