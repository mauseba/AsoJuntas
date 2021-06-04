<div class="card ">

    <div class="card-header">
        <div class="row">
            <div class="col-md">
                <input wire:model="nombre" class="form-control" placeholder="Nombre">
            </div>
            <div class="col-md">
                <input wire:model="junta" class="form-control" placeholder="Junta">
            </div>
            <div class="col-md">
                <input wire:model="documento" class="form-control" placeholder="Documento">
            </div>
            <div class="col-md">
                <a class="btn btn-danger text-white   " wire:click="exportar">PDF</a>
            </div>
        </div>
    </div>

    
    @if ($userj->count())
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>F. afiliacion</th>
                        <th>Identificacion</th>
                        <th>Nombre</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Cargo</th>
                        <th>Junta</th>
                        <th>Comision</th>

                        {{-- <th colspan="2">Censado</th> --}}
                    </tr>
                </thead>

                <tbody>
                    @foreach ($userj as $userju)
                    <tr>
                        <td>{{$userju->created_at}}</td>
                        <td>{{$userju->Num_identificacion}}</td>
                        <td>{{$userju->nombre}}</td>
                        <td>{{$userju->Num_contacto}}</td>
                        <td>{{$userju->Correo}}</td>
                        <td>{{$userju->Cargo}}</td>
                        <td>{{$userju->Nombre}}</td>
                        <td>{{$userju->comision}}</td>
                        <td>

                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{$userj->links()}}
                </div>
                <div class="col">
                    <p class="float-right">Cantidad de registros: <strong>{{$userj->count()}}</strong> </p>
                </div>
            </div>
        </div>
    @else
        <div class="card-body">
            <strong>No hay ningún registro ...</strong>
        </div>
    @endif

    <script>
        document.addEventListener('livewire:load', function () {
            $('.formulario-eliminar').submit(function (e) {
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
