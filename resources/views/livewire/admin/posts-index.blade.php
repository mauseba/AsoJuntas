<div class="card">

    <div class="card-header">
        <label for="">Buscar:</label>
        <input wire:model="search" class="form-control" placeholder="Ingrese el nombre de un post">
    </div>

    @if ($posts->count())
        
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->name}}</td>
                            <td with="10px">
                                @can('admin.posts.edit')
                                     <a class="btn btn-primary btn-sm" href="{{route('admin.posts.edit', $post)}}">Editar</a>
                                @endcan
                            </td>
                            <td with="10px">
                                @can('admin.posts.destroy')
                                    <form action="{{route('admin.posts.destroy', $post)}}" class="formulario-eliminar" method="POST">
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
            {{$posts->links()}}
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
