<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-9">
                <label for="">Buscar:</label>
                <input wire:model="search" class="form-control " placeholder="Ingrese la vereda o nit de la junta de accion comunal">
            </div>
            <div class="col">
                <label for="">Filtrar por:</label>
                <select wire:model="seleccion" class="form-control ">
                    <option selected>Seleccione...</option>
                    <option value="1">Activas</option>
                    <option value="2">Inactivas</option>
                </select>
            </div>
        </div>
        
    </div>
    @if ($juntas->count())
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha de registro</th>
                        <th>NIT</th>
                        <th>Nombre</th>
                        <th>Recibo de pago</th>
                        <th>Documento_NIT</th>
                        <th>Documento_Resolucion</th>
                        <th>Observaciones</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($juntas as $junta)
                        <tr>
                            <td>{{$junta->id}}</td>
                            <td>{{$junta->FechaC}}</td>
                            <td>{{$junta->Nit}}</td>
                            <td>{{$junta->Nombre}}</td>
                            <td align="center">
                                <a class="btn btn-light btn-sm" target="_blank" href="{{Storage::url($junta->D_Recibopago)}}">
                                    <i class="far fa-eye"></i>
                                </a>
                            </td>
                            <td align="center">
                                <a class="btn btn-light btn-sm" target="_blank" href="{{Storage::url($junta->D_NIT)}}">
                                    <i class="far fa-eye"></i>
                                </a>
                            </td>
                            <td align="center">
                                <a class="btn btn-light btn-sm" target="_blank" href="{{Storage::url($junta->D_Resolucion)}}">
                                    <i class="far fa-eye"></i>
                                </a>
                            </td>
                            <td>{{$junta->Observaciones}}</td>
                            <td width="10px">
                             @can('admin.juntas.edit')

                                <a class="btn btn-primary btn-sm" href="{{route('admin.juntas.edit', $junta)}}">Editar</a>

                             @endcan       
                            </td>
                            <td with="10px">
                                @can('admin.juntas.destroy')
                                <form action="{{route('admin.juntas.destroy', $junta)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                </form>
                                @endcan 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$juntas->links()}}
        </div>
    @else

        <div class="card-body">
            <strong> No hay registros</strong>
        </div>
        
    @endif  
</div>