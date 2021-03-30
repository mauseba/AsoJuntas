<div>
    <div class="card">

        <div class="card-header">
            <label for="">Buscar:</label>
            <input wire:model="search" class="form-control " placeholder="Ingrese el nombre o correo de un usuario">
        </div>
     
        @if ($users->count())

            <div class="card-body table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                            <tr align="center">
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @can('admin.users.edit')
                                        <a class="btn btn-primary btn-sm" href="{{route('admin.users.edit', $user)}}">Asignar Rol</a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                {{$users->links()}}
            </div>
            
        @else

            <div class="card-body">
                <strong> No hay registros</strong>
            </div>
            
        @endif  
            

    </div>
    <script>
</div>
