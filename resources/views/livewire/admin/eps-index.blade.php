<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control " placeholder="Ingrese el nombre o correo de un usuario">
    </div>
    @if ($eps->count())
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
            @foreach ($eps as $entidad)
                <tr>
                    <td>{{$entidad->id}}</td>
                    <td>{{$entidad->name}}</td>
                    <td width="10px">
                        @can('admin.eps.edit')
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.eps.edit', $entidad)}}"><i class="fas fa-pen-square"></i></a>
                        @endcan
                    </td>
                    <td width="10px">
                        @can('admin.eps.destroy')
                            <form action="{{route('admin.eps.destroy', $entidad)}}" method="POST">
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
    {{$eps->links()}}
</div>
@else

<div class="card-body">
    <strong> No hay registros</strong>
</div>

@endif  

</div>
