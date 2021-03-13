<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control " placeholder="Ingrese la vereda o nit de la junta de accion comunal">
    </div>
    @if ($juntas->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha de registro</th>
                        <th>Vereda</th>
                        <th>NIT</th>
                        <th>Recibo de pago</th>
                        <th>Documento_NIT</th>
                        <th>Documento_Resolucion</th>
                        <th>Observaciones</th>
                        <th colspan="2"></th>dpodrn 
                    </tr>
                </thead>

                <tbody>
                    @foreach ($juntas as $junta)
                        <tr>
                            <td>{{$junta->id}}</td>
                            <td>{{$junta->FechaC}}</td>
                            <td>{{$junta->Vereda}}</td>
                            <td>{{$junta->Nit}}</td>
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
    @else

        <div class="card-body">
            <strong> No hay registros</strong>
        </div>
        
    @endif  
</div>