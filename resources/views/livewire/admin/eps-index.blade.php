
<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control " placeholder="Ingrese la eps">
    </div>
    @if ($eps->count())
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
                    @foreach ($eps as $ep)
                        <tr>
                            <td>{{$ep->id}}</td>
                            <td>{{$ep->name}}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.eps.edit', $ep)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.eps.destroy', $ep)}}" method="POST">
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
    @else
        <div class="card-body">
            <strong> No hay registros</strong>
        </div>
    @endif
</div>
