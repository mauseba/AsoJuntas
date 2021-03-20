<div>
    <div class="card">

        <div class="card-header">
            <input wire:model="search" class="form-control" placeholder="Ingrese el nombre o documento de un usuario">
        </div>
    
        @if ($userj->count())
            
            <div class="card-body table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Identificacion</th>
                            <th>Nombre</th>
                            <th>Tipo de ID</th>
                            <th>Telefono</th>
                            <th>Educacion</th>
                            <th>Correo</th>
                            <th>Cargo</th>
                            <th>Junta</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
    
                    <tbody>
                        @foreach ($userj as $userju)
                            <tr>
                                <td>{{$userju->Num_identificacion}}</td>
                                <td>{{$userju->nombre}}</td>
                                <td>{{$userju->Tip_identificacion}}</td>
                                <td>{{$userju->Num_contacto}}</td>
                                <td>{{$userju->Niv_educacion}}</td>
                                <td>{{$userju->Correo}}</td>
                                <td>{{$userju->Cargo}}</td>
                                <td>{{$userju->Vereda}}</td>
                                <td with="10px">
                                    
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.userjun.edit', $userju)}}">Editar</a>
                                    
                                </td>
                                <td with="10px">
                                        <form action="{{route('admin.userjun.destroy', $userju)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
    
                                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                        </form>
                                   
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="card-footer">
                {{$userj->links()}}
            </div>
        @else
            <div class="card-body">
                <strong>No hay ningún registro ...</strong>
            </div>
        @endif
    </div>
    
</div>
