@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
    @can('admin.posts.create')
        <a class="btn btn-success float-right" href="{{route('admin.psuscripcion.create')}}">Nuevo regitro de pago</a>
    @endcan
    <h1>Pagos de Suscripcion</h1>

@stop

@section('content')
    @livewire('admin.suscripcion-index')
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
