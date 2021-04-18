@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
    <h1>Creacion de Certificados</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <p class="float-left">Usuario: <strong>{{auth()->user()->name}}</strong> </p>
        @can('admin.pcertificado.index')
        <a class="btn btn-danger float-right" href="{{route('admin.pcertificado.index')}}"><i class="fas fa-window-close"></i></a>
        @endcan
    </div>
    <div class="card-body">
        {!! Form::open(['route' => 'admin.pcertificado.store', 'autocomplete' => 'off', 'files' => true]) !!}

            @include('admin.pcertificado.partial.form')

            {!! Form::submit('Crear certificado', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
        
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