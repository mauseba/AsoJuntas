@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
    <h1>Edicion de Certificados</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        @can('admin.pcertificado.index')
        <a class="btn btn-danger float-right" href="{{route('admin.pcertificado.index')}}"><i class="fas fa-window-close"></i></a>
        @endcan
    </div>
    <div class="card-body">
        {!! Form::model( $pcertificado,['route' => ['admin.pcertificado.update', $pcertificado], 'autocomplete' => 'off', 'files' => true, 'method' => 'PUT']) !!}

            @include('admin.pcertificado.partial.form')

            {!! Form::submit('Crear certificado', ['class' => 'btn btn-primary']) !!}
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
@if (session('info'))
<script>
    var session = '{{session('info')}}';
    Swal.fire(
    'Operacion Completada',
    session ,
    'success'
    )
</script>
@endif
@endsection