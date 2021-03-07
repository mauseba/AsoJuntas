@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
{{-- @can('admin.eps.create') --}}
<a class="btn btn-secondary btn-sm float-right" href="{{route('admin.eps.create')}}">Agregar EPS</a>    
{{-- @endcan --}}
<h1>Lista de EPS</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
@endif


<div class="card">

<div class="card-body">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th colspan="2"></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($eps as $entidad)
                <tr>
                    <td>{{$entidad->id}}</td>
                    <td>{{$entidad->name}}</td>
                    <td width="10px">
                        @can('admin.eps.edit')
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.eps.edit', $entidad)}}">Editar</a>
                        @endcan
                    </td>
                    <td width="10px">
                        @can('admin.eps.destroy')
                            <form action="{{route('admin.eps.destroy', $entidad)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        @endcan

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop