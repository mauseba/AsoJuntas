@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
    <h1>Crear nueva Comision</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.comisions.store']) !!}

                <div class="form-group">
                    {!! Form::label('comision', 'Comision:') !!}
                    {!! Form::text('comision', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la comision']) !!}


                    @error('comision')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>

                <div class="form-group">
                    {!! Form::label('Tipo', 'Tipo') !!}
                    {!! Form::select('Tipo',array('especial'=>'Especial','normal'=>'Normal'), null, ['class' => 'form-control']) !!}

                    @error('Tipo')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                {!! Form::submit('Crear Comision', ['class' => 'btn btn-primary']) !!}

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


@section('js')

@endsection