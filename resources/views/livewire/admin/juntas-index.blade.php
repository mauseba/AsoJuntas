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
                        <th>NIT</th>
                        <th>Fecha de registro</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Recibo de pago</th>
                        <th>D. NIT</th>
                        <th>D. Resolucion</th>
                        <th>Observaciones</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($juntas as $junta)
                        <tr>                           
                            <td>{{$junta->Nit}}</td>
                            <td>{{$junta->FechaC}}</td>
                            <td>{{$junta->Nombre}}</td>
                            <td>{{$junta->Correo}}</td>
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
                            <td>
                             @can('admin.juntas.edit')

                                <a class="btn btn-primary btn-sm" href="{{route('admin.juntas.edit', $junta)}}"><i class="fas fa-pen-square"></i></a>

                             @endcan       
                            </td>
                            <td>
                                @can('admin.juntas.destroy')
                                    <form action="{{route('admin.juntas.destroy', $junta)}}" class="formulario-eliminar" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-eraser"></i></button>
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
    <script>
        document.addEventListener('livewire:load', function () {
            $('.formulario-eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
                title: '¿Estas seguro?',
                text: "No se podra revertir esta operacion!",
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
        })
    </script>
</div>