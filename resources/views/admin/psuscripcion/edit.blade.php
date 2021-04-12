@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
    <h1>Pagos de Suscripcion</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::model( $psuscripcion,['route' => ['admin.psuscripcion.update', $psuscripcion], 'autocomplete' => 'off', 'files' => true, 'method' => 'PUT']) !!}

            @include('admin.psuscripcion.partial.form')

            {!! Form::submit('subir documentos/s', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>

@stop


@section('js')

@endsection