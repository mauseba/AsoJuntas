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


@section('js')

@endsection