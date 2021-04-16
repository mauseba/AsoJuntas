<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-9">
                <label for="">Buscar:</label>
                <input wire:model="search" class="form-control "
                    placeholder="Ingrese el nombre o mes de la junta de accion comunal">
            </div>
            <div class="col">
                <label for="">Filtrar por pago:</label>
                <select wire:model="seleccion" class="form-control ">
                    <option selected>Seleccione...</option>
                    <option value="suscripcion">Suscripcion</option>
                    <option value="bimestral">Bimestral</option>
                </select>
            </div>
        </div>

    </div>
    @if ($suscr->count())
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Fecha registro</th>
                        <th>Junta</th>
                        <th>Mes de pago</th>
                        <th>Tipo pago</th>
                        <th>Comprobante</th>
                        <th>Observaciones</th>
                        <th colspan="2">Certificados</th>
                        <th colspan="2">Acciones</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($suscr as $sus)
                        <tr align="center">
                            <td>{{ $sus->id }}</td>
                            <td>{{ $sus->FechaP }}</td>
                            <td>{{ $sus->Nombre }}</td>
                            <td>{{ $sus->Mes }}</td>
                            <td>{{ $sus->tipo }}</td>
                            <td align="center">
                                <a class="btn btn-light btn-sm" target="_blank"
                                    href="{{ Storage::url($sus->Comprobante) }}">
                                    <i class="far fa-eye"></i>
                                </a>
                            </td>
                            <td>{{ $sus->Observaciones }}</td>
                            <td>
                                @can('admin.psuscripcion.index')
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.psuscripcion.buscador', $sus) }}"><i class="fas fa-file-alt"></i></a>
                                @endcan
                            </td>
                            <td>
                                @can('admin.psuscripcion.index')
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-file"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('admin.psuscripcion.pazsalvo', $sus) }}">junta - Pazysalvo</a>
                                        <a class="dropdown-item" href="{{route('admin.psuscripcion.afiliacion', $sus) }}">junta - Afiliacion</a>
                                        </div>
                                    </div>
                                @endcan
                            </td>
                            <td>
                                @can('admin.psuscripcion.edit')
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.psuscripcion.edit', $sus) }}"><i
                                        class="fas fa-pen-square"></i></a>
                                @endcan
                            </td>
                            <td>
                                @can('admin.psuscripcion.destroy')
                                    <form action="{{ route('admin.psuscripcion.destroy', $sus) }}" class="formulario-eliminar"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm" type="submit"><i
                                                class="fas fa-eraser"></i></button>
                                    </form>
                                @endcan
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $suscr->links() }}
        </div>
    @else

        <div class="card-body">
            <strong> No hay registros</strong>
        </div>

    @endif
    <script>
        document.addEventListener('livewire:load', function() {
            $('.formulario-eliminar').submit(function(e) {
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
