@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')

  
{{-- @can('admin.barrios.create') --}}
<a class="btn btn-secondary btn-sm float-right" href="{{route('admin.barrios.create')}}">Agregar Barrio/Vereda</a>
{{-- @endcan --}}
    <h1>Lista de Barrios/Veradas</h1>
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
                <th>ID</th>
                <th>Nombre</th>
                <th colspan="2"></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($barrios as $barrio)
                <tr>
                    <td>{{$barrio->id}}</td>
                    <td>{{$barrio->name}}</td>
                    <td width="10px">
                        @can('admin.barrios.edit')
                            <a class="btn btn-primary btn-sm" href="{{route('admin.barrios.edit', $barrio)}}">Editar</a>
                        @endcan
                    </td>
                    <td width="10px">
                        @can('admin.barrios.destroy')
                            <form action="{{route('admin.barrios.destroy', $barrio)}}" method="POST">
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