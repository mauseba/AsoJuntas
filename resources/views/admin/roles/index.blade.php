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
                    <th colspan="2"></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td width="10px">
                            <a class="btn btn-primary btn-sm" href="{{route("admin.roles.edit",$role)}}" >Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{route('admin.roles.destroy', $role)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
@stop