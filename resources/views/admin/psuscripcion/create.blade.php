@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Nota</strong>
        <ul>
            <li>Al crear un registro de pago de tipo bimestral, ingrese el primer mes correspondiente al pago.</li>
            <li>Al crear un registro de pago de tipo sucripcion, asegurese que no se ha creado un registro con anterioridad.</li>
        </ul> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <h1>Pagos de Suscripcion</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.psuscripcion.store', 'autocomplete' => 'off', 'files' => true]) !!}

            @include('admin.psuscripcion.partial.form')

            {!! Form::submit('Crear pago', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
        
    </div>
</div>
@stop


@section('js')

@endsection