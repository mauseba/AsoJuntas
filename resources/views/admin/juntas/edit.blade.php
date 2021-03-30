@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
    <h1>Editar Junta de Accion Comunal</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        {!! Form::model( $junta,['route' => ['admin.juntas.update', $junta], 'autocomplete' => 'off', 'files' => true, 'method' => 'put']) !!}

            @include('admin.juntas.partials.form2')

            {!! Form::submit('Actualizar junta', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop