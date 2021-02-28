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
                        <th>Documento_NIT</th>
                        <th>Documento_Resolucion</th>
                        <th colspan="1"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($juntas as $junta)
                        <tr>
                            <td>{{$junta->id}}</td>
                            <td>{{$junta->FechaC}}</td>
                            <td>{{$junta->Vereda}}</td>
                            <td>{{$junta->Nit}}</td>
                            <td>{{$junta->D_NIT}}</td>
                            <td>{{$junta->D_Resolucion}}</td>
                            
                            <td width="10px">
                                
                                <a class="btn btn-primary btn-sm" href="{{route('admin.juntas.edit', $junta)}}">Editar</a>

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