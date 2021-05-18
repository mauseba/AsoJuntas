
<div class="card">

    <div class="card-header">
        
        <div class="row mt-2">
            <div class="col-lg-2">

                <select wire:model="junta" class="form-control text-secondary text-sm dynamic " data-dependent="state">
                    <option selected value="">Junta</option>
                    @foreach ($jun as $ju)
                    <option value="{{ $ju->Nombre }}">{{ $ju->Nombre}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-lg-2">
                <input wire:model="afiliado" class="form-control text-sm" placeholder="Nombre del Afiliado">

            </div>
            <a class="btn btn-danger text-white  ml-4 " wire:click="exportar">PDF</a>
        </div>



        @if ($censo->count())

        {{-- <a class="btn btn-success text-white  " >Excel</a> --}}
        
            <div class="card-body table-responsive">
                <table class="table table-striped {{-- table-bordered table-sm --}}" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Junta</th>
                            <th>Afiliado</th>
                            {{-- <th>Barrio</th> --}}
                            <th>Direccion</td>
                            <th>Tipo Vivienda</td>
                            <th>Energia</td>
                            <th>Gas</td>
                            <th>Agua</td>
                            <th>Alcantarillado</td>
                            <th>Escrituras</td>
                            <th>Sisben</td>
                            <th>Sub Vivienda</td>
                            <th>Sub Gobierno</td>
                            <th>Piso</td>
                            <th>Techo</td>
                            <th>Pañete</td>
                            <th>Baños</td>
                            <th>Baño Nuevo</td>
                            <th>Vivienda Nueva</td>
                            <th>Actualizado</td>

                            <th col-mdspan="2">
                                </td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($censo as $censos)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$censos->Nombre}}</td>
                            <td>{{$censos->nombre}}</td>
                            {{-- <td>{{$censos->name}}</td> --}}
                            <td>{{$censos->Direccion}}</td>
                            <td>{{$censos->tipo_vivienda}}</td>
                            <td>{{$censos->energia}}</td>
                            <td>{{$censos->gas}}</td>
                            <td>{{$censos->agua}}</td>
                            <td>{{$censos->alcantarilla}}</td>
                            <td>{{$censos->escrituras}}</td>
                            <td>{{$censos->sisben}}</td>
                            <td>{{$censos->sub_vivienda}}</td>
                            <td>{{$censos->sub_gobierno}}</td>
                            <td>{{$censos->piso}}</td>
                            <td>{{$censos->techo}}</td>
                            <td>{{$censos->pañete}}</td>
                            <td>{{$censos->baños}}</td>
                            <td>{{$censos->baño_nuevo}}</td>
                            <td>{{$censos->vivienda_nueva}}</td>
                            <td>{{$censos->updated_at->format('Y-m-d')}}</td>

                            <td>
                                @can('admin.censo.edit')
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.censo.edit', $censos)}}" title="Editar"><i
                                        class="fas fa-pen-square" ></i></a>
                                @endcan
                            </td>
                            <td>
                                @can('admin.censo.destroy')
                                <form action="{{route('admin.censo.destroy', $censos)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Eliminar"><i
                                            class="fas fa-eraser" ></i></button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{$censo->links()}}
                </div>
                <div class="col">
                    <p class="float-right">Cantidad de registros: <strong>{{$censo->count()}}</strong> </p>
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
    
