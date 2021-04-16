@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
    <h1>Editar Junta de Accion Comunal</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#home">Datos Basicos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" id="men1" href="#menu1">Documentos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" id="men2" href="#menu2">Observaciones</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        {!! Form::model( $junta,['route' => ['admin.juntas.update', $junta], 'autocomplete' => 'off', 'files' => true, 'method' => 'put']) !!}

            @include('admin.juntas.partials.form2')

        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop