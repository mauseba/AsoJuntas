
<div class="card ">

    <div class="card-header">
        <div class="row">
            <div class="col-9">
                <label for="">Buscar:</label>
                <input wire:model="search" class="form-control" placeholder="Puede ingresar nombre o junta de una afiliado">
            </div>
            <div class="col-3">
                <label for="">Buscar por cedula:</label>
                <input wire:model="cedul" class="form-control" placeholder="Ingresar el documento">
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
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($userj as $userju)
                        <tr>
                            <td>{{$userju->FechaC}}</td>
                            <td>{{$userju->Num_identificacion}}</td>
                            <td>{{$userju->nombre}}</td>
                            <td>{{$userju->Num_contacto}}</td>
                            <td>{{$userju->Correo}}</td>
                            <td>{{$userju->Cargo}}</td>
                            <td>{{$userju->Nombre}}</td>
                            <td>{{$userju->comision}}</td>

                            <td with="10px">
                                @can('admin.userjun.edit')
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.userjun.edit', $userju)}}"><i class="fas fa-pen-square"></i></a>
                                @endcan    
                            </td>
                            <td with="10px">
                                @can('admin.userjun.destroy')
                                    <form action="{{route('admin.userjun.destroy', $userju)}}" class="formulario-eliminar" method="POST">
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

