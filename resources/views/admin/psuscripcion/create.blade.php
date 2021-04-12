@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
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