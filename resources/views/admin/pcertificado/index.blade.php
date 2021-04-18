@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
    @can('admin.pcertificado.create')
        <a class="btn btn-success float-right" href="{{route('admin.pcertificado.create')}}">Nuevo regitro de pago</a>
    @endcan
    <h1>Pagos de certificados</h1>

@stop

@section('content')
    @livewire('admin.certificado-index')
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
@if (session('error'))
<script>
    var session = '{{session('error')}}';
    Swal.fire(
    'Error',
    session ,
    'error'
    )
</script>
@endif
@if (session('warning'))
<script>
    var session = '{{session('warning')}}';
    Swal.fire(
    'Advertencia',
    session ,
    'warning'
    )
</script>
@endif
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
