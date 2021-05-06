<div class="card">

    <div class="card-header">
        <div class="row">
            <div class="col-2">
                {{-- <input wire:model="barrio" class="form-control text-sm" placeholder="Barrio"> --}}
                 <select wire:model="barrio" class="form-control text-secondary text-sm">
                    <option value="">Barrio</option>
                    @foreach ($barrios as $bar)
                    <option value="{{ $bar->name }}">{{ $bar->name}}</option>
                    @endforeach
                </select>

            </div>
            <div class="col-2">
                <input wire:model="direccion" class="form-control text-sm" placeholder="Direccion">
            </div>
            <div class="col-md">
                <select wire:model="tipo_vivienda" class="form-control text-sm ">
                    <option selected value="">Tipo Vivienda</option>
                    <option value="Arriendo">Arriendo</option>
                    <option value="Propia">Propia</option>
                    <option value="Posada">Posada</option>
                </select>
            </div>
            <div class="col-md">

                <select wire:model="energia" class="form-control text-sm">
                    <option selected value="">Energia</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col-md">

                <select wire:model="gas" class="form-control text-sm">
                    <option selected value="">Gas</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col-md">

                <select wire:model="agua" class="form-control text-sm">
                    <option selected value="">Agua</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col-md">

                <select wire:model="alcantarilla" class="form-control text-sm">
                    <option selected value="">Alcantarilla</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col-md">

                <select wire:model="escrituras" class="form-control text-sm">
                    <option selected value="">Escrituras</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md">

               <select   wire:model="sisben" class="form-control text-sm" data-container="body" data-live-search="true">
                        <option selected value="" > Sisben </option>
                        <optgroup label="Grupo A" data-subtext="Pobreza extrema">
                            <option>A1</option>
                            <option>A2</option>
                            <option>A3</option>
                            <option>A4</option>
                            <option>A5</option>                           
                        </optgroup>
                        <optgroup label="Grupo B" data-subtext="Pobreza moderada">
                            <option>B1</option>
                            <option>B2</option>
                            <option>B3</option>
                            <option>B4</option>
                            <option>B5</option>                           
                            <option>B6</option>                           
                            <option>B7</option>                           
                        </optgroup>
                        <optgroup label="Grupo C" data-subtext="Vulnerable">
                            <option>C1</option>
                            <option>C2</option>
                            <option>C3</option>
                            <option>C4</option>
                            <option>C5</option>                           
                            <option>C6</option>                           
                            <option>C7</option>                           
                            <option>C8</option>                           
                            <option>C9</option>                           
                            <option>C10</option>                           
                            <option>C11</option>                           
                            <option>C12</option>                           
                            <option>C13</option>                           
                            <option>C14</option>                           
                            <option>C15</option>                           
                            <option>C16</option>                           
                            <option>C17</option>                           
                            <option>C18</option>                           
                        </optgroup>
                        <optgroup label="Grupo D" data-subtext="No pobre, No vulnerable">
                            <option>D1</option>
                            <option>D2</option>
                            <option>D3</option>
                            <option>D4</option>
                            <option>D5</option>                           
                            <option>D6</option>                           
                            <option>D7</option>                           
                            <option>D8</option>                           
                            <option>D9</option>                           
                            <option>D10</option>                           
                            <option>D11</option>                           
                            <option>D12</option>                           
                            <option>D13</option>                           
                            <option>D14</option>                           
                            <option>D15</option>                           
                            <option>D16</option>                           
                            <option>D17</option>                           
                            <option>D18</option>                            
                            <option>D19</option>                            
                            <option>D20</option>                            
                            <option>D21</option>                            
                        </optgroup>
                    </select>
            </div>

            <div class="col-md">

                <select wire:model="sub_vivienda" class="form-control text-sm">
                    <option selected value="">Sub Vivienda</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col-md">

                <select wire:model="piso" class="form-control text-sm">
                    <option selected value="">Piso</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col-md">

                <select wire:model="techo" class="form-control text-sm">
                    <option selected value="">Techo</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col-md">

                <select wire:model="pañete" class="form-control text-sm">
                    <option selected value="">Pañete</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col-md">

                <select wire:model="baños" class="form-control">
                    <option selected value="">Baño</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col-md">

                <select wire:model="baño_nuevo" class="form-control text-sm">
                    <option selected value="">Baño Nuevo</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col-md">

                <select wire:model="vivienda_nueva" class="form-control text-sm">
                    <option selected value="">Vivienda Nueva</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col-md">

                <select wire:model="subsidio" class="form-control text-sm">
                    <option selected value="">Subsidio Gobierno</option>
                    <option>Ninguno</option>
                    <option>Familias en Accion</option>
                    <option>Jovenes en Accion</option>
                    <option>Adulto Mayor</option>
                    <option>Otro</option>
                </select>
            </div>
            <div class="col-md">

                <select wire:model="junta" class="form-control text-secondary text-sm">
                    <option selected value="">Junta</option>
                    @foreach ($jun as $ju)
                    <option value="{{ $ju->Nombre }}">{{ $ju->Nombre}}</option>
                    @endforeach
                </select>
            </div>
             <a class="btn btn-danger text-white   " wire:click="exportar">PDF</a>
        </div>



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
                            <th>Barrio</th>
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
                            <td>{{$censos->name}}</td>
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
                                <form action="{{route('admin.censo.destroy', $censos)}}" class="formulario-eliminar" method="POST">
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
