<div class="card">
    <div class="card-header">
        <label for="">Buscar:</label>
        <input wire:model="search" class="form-control "
            placeholder="Ingrese la fecha del registro, nombre o identificacion de la persona que aparece en el registro">
    </div>
    @if ($suscr->count())
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Fecha registro</th>
                        <th>Junta</th>
                        <th>Nombre Usuario</th>
                        <th>N. documento</th>
                        <th>Tipo certificado</th>
                        <th><strong>Estado</strong></th>
                        <th>Comprobante</th>
                        <th>Observaciones</th>
                        <th colspan="3">Acciones</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($suscr as $sus)
                        <tr align="center">
                            <td>{{ $sus->id }}</td>
                            <td>{{ $sus->FechaP }}</td>
                            <td>{{ $sus->junta }}</td>
                            <td>{{ $sus->nombre }}</td>
                            <td>{{ $sus->Documento }}</td>
                            <td>{{ $sus->tipo }}</td>
                            <td>{{ $sus->Estado }}</td>
                            <td align="center">
                                <a class="btn btn-light btn-sm" target="_blank"
                                    href="{{ Storage::url($sus->Comprobante) }}">
                                    <i class="far fa-eye"></i>
                                </a>
                            </td>
                            <td>{{ $sus->Observaciones }}</td>
                            <td>
                                @can('admin.pcertificado.edit')
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.pcertificado.edit', $sus) }}"><i
                                        class="fas fa-pen-square"></i></a>
                                @endcan
                            </td>
                            <td>
                                @can('admin.certificados')
                                    <a class="btn btn-warning btn-sm" target="_blank" href="{{ route('admin.pcertificado.certificado', $sus) }}"><i class="fas fa-file-alt"></i></a>
                                @endcan
                            </td>
                            <td>
                                @can('admin.pcertificado.destroy')
                                    <form action="{{ route('admin.pcertificado.destroy', $sus) }}" class="formulario-eliminar"
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
