<div class="card">

    <div class="card-header">
        <label for="">Buscar:</label>
        <input wire:model="search" class="form-control" placeholder="Ingrese el nombre de un Afiliado">
    </div>

    @if ($userj->count())
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Identificacion</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Cargo</th>
                    <th>Junta</th>
                    <th>Comision</th>
                    <th>T. comision</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($userj as $userju)
                    <tr>
                        <td>{{$userju->Num_identificacion}}</td>
                        <td>{{$userju->nombre}}</td>
                        <td>{{$userju->Correo}}</td>
                        <td>{{$userju->Cargo}}</td>
                        <td>{{$userju->Nombre}}</td>
                        <td>{{$userju->comision}}</td>
                        <td>{{$userju->Tipo}}</td>

                        <td with="10px">
                            
                            <a class="btn btn-primary btn-sm" href="{{route('admin.userjun.edit', $userju)}}"><i class="fas fa-pen-square"></i></a>
                            
                        </td>
                        <td with="10px">

                            <form action="{{route('admin.userjun.destroy', $userju)}}" class="formulario-eliminar" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-eraser"></i></button>
                            </form>
                        
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    
        <div class="card-footer">
            {{$userj->links()}}
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