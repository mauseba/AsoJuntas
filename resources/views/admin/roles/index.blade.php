@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
    <a class="btn btn-success float-right" href="{{route('admin.roles.create')}}">Nuevo rol</a>
    <h1>Lista de Roles</h1>
@stop

@section('content')
<br>
<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Role</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td width="10px">
                            <a class="btn btn-primary btn-sm" href="{{route("admin.roles.edit",$role)}}" ><i class="fas fa-pen-square"></i></a>
                        </td>
                        <td width="10px">
                            <form action="{{route('admin.roles.destroy', $role)}}" class="formulario-eliminar"  method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-eraser"></i></button>
                            </form>
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

@section('css')
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