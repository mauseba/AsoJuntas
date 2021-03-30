@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')

    @can('admin.tags.create')
        <a class="btn btn-success float-right" href="{{route('admin.tags.create')}}">Nueva etiqueta</a>
    @endcan

    <h1>Mostrar listado de etiqueta</h1>
@stop

@section('content')
<br>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->name}}</td>
                            <td width="10px">
                                @can('admin.tags.edit')
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.tags.edit', $tag)}}">Editar</a>
                                @endcan
                            </td>
                            <td width="10px">
                                @can('admin.tags.destroy')
                                    <form action="{{route('admin.tags.destroy', $tag)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
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
@endif
@stop