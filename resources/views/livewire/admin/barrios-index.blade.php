

<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control " placeholder="Ingrese el nombre o correo de un usuario">
    </div>
    @if ($barrios->count())

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
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.barrios.edit', $barrio)}}"><i class="fas fa-pen-square"></i></a>
                                @endcan
                            </td>
                            <td width="10px">
                                @can('admin.barrios.destroy')
                                    <form action="{{route('admin.barrios.destroy', $barrio)}}" method="POST">
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
        <div class="card-footer">
            {{$barrios->links()}}
        </div>

        @else

        <div class="card-body">
            <strong> No hay registros</strong>
        </div>

        @endif  
</div>
