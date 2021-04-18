@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Nota</strong>
        <ul>
            <li>Recuerde que al editar un registro de pago de tipo bimestral, ingrese el primer mes correspondiente al pago.</li>
            <li>Al editar un registro de pago de tipo sucripcion, asegurese que no se ha creado un registro con anterioridad.</li>
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
        {!! Form::model( $psuscripcion,['route' => ['admin.psuscripcion.update', $psuscripcion], 'autocomplete' => 'off', 'files' => true, 'method' => 'PUT']) !!}

            @include('admin.psuscripcion.partial.form')

            {!! Form::submit('editar documentos/s', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>

@stop


@section('js')

@endsection