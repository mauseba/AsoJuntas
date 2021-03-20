@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
    <h1>Editar Usuarios de Juntas de Accion Comunal </h1>
@stop

@section('content')

@if (session('info'))
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
@endif

<div class="card">
    <div class="card-body">
        {!! Form::model( $userjun,['route' => ['admin.userjun.update', $userjun], 'autocomplete' => 'off', 'method' => 'put']) !!}

            @include('admin.userjun.partials.form2')

            {!! Form::submit('Actualizar Usuario', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop