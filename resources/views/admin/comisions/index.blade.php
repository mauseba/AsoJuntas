@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
    
    @can('admin.categories.create')
         <a class="btn btn-success float-right" href="{{route('admin.comisions.create')}}">Agregar Comisiones</a>
    @endcan

    <h1>Lista de categorías</h1>
@stop

@section('content')
    <br>
    <div class="card">

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($comisions as $comision)
                        <tr>
                            <td>{{$comision->id}}</td>
                            <td>{{$comision->comision}}</td>
                            <td>{{$comision->Tipo}}</td>
                            <td width="10px">
                                @can('admin.comisions.edit')
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.comisions.edit', $comision)}}"><i class="fas fa-pen-square"></i></a>
                                @endcan
                            </td>
                            <td width="10px">
                                @can('admin.comisions.destroy')
                                    <form action="{{route('admin.comisions.destroy', $comision)}}" class="formulario-eliminar" method="POST">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-eraser"></i></button>
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
    <script>
         $('.formulario-eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
                title: '¿Estas seguro?',
                text: "No se podra revertir esta operacion",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Eliminar registro!'
                }).then((result) => {
                if (result.value) {
            
                    this.submit();
                }
                })
            })
    </script>
@stop