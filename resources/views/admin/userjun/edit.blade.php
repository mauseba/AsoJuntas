@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
    <h1>Editar Afiliados de Juntas de Accion Comunal </h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::model( $userjun,['route' => ['admin.userjun.update', $userjun], 'autocomplete' => 'off', 'method' => 'put']) !!}

            @include('admin.userjun.partials.formDirectivos')

            {!! Form::submit('Actualizar Afiliado', ['class' => 'btn btn-primary']) !!}

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

@section('css')
@stop

@section('js')
@if (session('error'))
    <script>
        var session = '{{session('error')}}';
        Swal.fire(
        'Operacion no Completada',
        session ,
        'error'
        )
    </script>
@endif
@stop