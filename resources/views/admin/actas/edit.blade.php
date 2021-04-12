@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
    <h1>Editar acta de eventos</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body" >
        {!! Form::model( $acta,['route' => ['admin.actas.update', $acta], 'autocomplete' => 'off', 'files' => true, 'method' => 'PUT']) !!}

                <div class="form-group">
                    {!! Form::label('evento_id', 'ID:') !!}
                    {!! Form::text('evento_id',$acta->evento_id,  ['class' => 'form-control','readonly']) !!}
            
                    @error('evento_id')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('Fecha','Fecha:') !!}
                    {!! Form::text('Fecha',$eventos['0']['Fecha'],  ['class' => 'form-control','readonly']) !!}
            
                    @error('Fecha')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('asunto', 'Asunto:') !!}
                    {!! Form::text('asunto',$eventos['0']['Asunto'],  ['class' => 'form-control','readonly']) !!}
            
                    @error('asunto')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            {!! Form::label('url', 'Acta de reunion:') !!}
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
        
                {!! Form::submit('Editar documentos/s', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('content')
    @livewire('admin.eventos-index')
@stop

@section('css')

@stop

@section('js')
   
@stop