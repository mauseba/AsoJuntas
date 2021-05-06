

<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control " placeholder="Ingrese el nombre o correo de un usuario">
    </div>
    @if ($barrios->count())

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($barrios as $barrio)
                        <tr>
                            <td>{{$barrio->id}}</td>
                            <td>{{$barrio->name}}</td>
                            <td width="10px">
                                @can('admin.barrios.edit')
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.barrios.edit', $barrio)}}" title="Editar"><i class="fas fa-pen-square"></i></a>
                                @endcan
                            </td>
                            <td width="10px">
                                @can('admin.barrios.destroy')
                                    <form action="{{route('admin.barrios.destroy', $barrio)}}" class="formulario-eliminar" method="POST">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-eraser"></i></button>
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
                    {{$barrios->links()}}
                </div>
                <div class="col">
                    <p class="float-right">Cantidad de registros: <strong>{{$barrios->count()}}</strong> </p>
                </div>
            </div>
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
