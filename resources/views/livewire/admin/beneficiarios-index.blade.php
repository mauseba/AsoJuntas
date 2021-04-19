<div class="card">


    <div class="card-header">




        <div class="row">
            <div class="col">
                <input wire:model="nombre" class="form-control text-sm" placeholder="Nombre">
            </div>
            <div class="col-md-2">

                <select wire:model="documento" class="form-control text-muted text-sm">
                    <option value=""> Tipo Doc </option>
                    <option value="R.C">R.C</option>
                    <option value="T.I">T.I</option>
                    <option value="C.C">C.C</option>
                    {{-- <option value="C.E">C.E</option> --}}
                </select>
            </div>
            <div class="col">
                <input wire:model="numero" class="form-control text-sm" placeholder="Numero">
            </div>
            <div class="col-md-2">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text text-sm" id="">Rango Edad</span>
                    </div>
                    <input wire:model="edad_max" class="form-control text-sm" placeholder="Max">
                    <input wire:model="edad_min" class="form-control text-sm" placeholder="Min">
                </div>


            </div>
            <div class="col">

                <select wire:model="genero" class="form-control text-secondary text-sm">
                    <option value=""> Género </option>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                    <option value="O">Otro</option>
                </select>
            </div>
            <div class="col">

                <select wire:model="afiliacion" class="form-control text-secondary text-sm">
                    <option value="">TipoAfiliacion</option>
                    <option>Ninguna</option>
                    <option>Subsidiado</option>
                    <option>Contributivo</option>

                </select>
            </div>







        </div>
        <div class="row mt-2">
            <div class="col">
                {{-- <input wire:model="eps" class="form-control" placeholder="EPS"> --}}
                <select wire:model="eps" class="form-control text-secondary text-sm">
                    <option value="" selected>EPS</option>
                    <option>Ninguna</option>
                    @foreach ($epss as $entidad)
                    <option value="{{$entidad->name}}">{{$entidad->name}}</option>
                    @endforeach


                </select>
            </div>
            <div class="col">

                <select wire:model="discapacidad" class="form-control text-secondary text-sm">
                    <option value=""> Discapacidad </option>
                    <option>Ninguna</option>
                    <option>Fisica</option>
                    <option>Intelectual</option>
                    <option>Sensorial</option>
                    <option>Psiquica</option>
                    <option>Viseral</option>
                    <option>Multiple</option>
                </select>
            </div>
            <div class="col-md">
                <select wire:model="edu" class="form-control text-secondary text-sm">
                    <option value="">NivelEdu</option>
                    <option>Ninguna</option>
                    <option>Primaria</option>
                    <option>Secundaria</option>
                    <option>Universidad</option>
                </select>
            </div>
            <div class="col-md">
                <select wire:model="subsidio" class="form-control text-secondary text-sm">
                    <option value="">Subsidio Gobierno</option>
                    <option>Ninguno</option>
                    <option>Familias en Accion</option>
                    <option>Jovenes en Accion</option>
                    <option>Adulto Mayor</option>
                    <option>Otro</option>
                </select>
            </div>
            <div class="col-md">
                <select wire:model="barrio" class="form-control text-secondary text-sm">
                    <option value="">Barrio</option>
                     @foreach ($barrios as $bar)
                    <option value="{{ $bar->name }}">{{ $bar->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">


                <select wire:model="afiliado" class="form-control text-secondary text-sm">
                    <option value="" >Afiliado</option>
                    @foreach ($user as $users)
                    <option value="{{ $users->id }}">{{ $users->name}}</option>
                    @endforeach
                </select>



            </div>
            <div class="col">
                <a class="btn btn-danger text-white" wire:click="exportar">PDF</a>
                {{-- <a class="btn btn-success  text-white" wire:click="exportarXL" >Excel</a>     --}}
            </div>
        </div>

        @if ($beneficiarios->count())

        <div class="card-body">
            <div class="table-responsive">
                <table id="beneficiarios" class="table table-striped">
                    <thead>
                        <tr>

                            <th>#</th>
                            <th>Nucleo<br>Familiar</th>
                            <th>Nombre</th>
                            <th>Tipo_Doc</th>
                            <th>Numero</th>
                            <th>Edad</th>
                            <th>Genero</th>
                            <th>Afiliacion salud</th>
                            <th>EPS</th>
                            <th>Discapacidad</th>
                            <th>Nivel Educativo</th>
                            <th>Subsidio<br>Gobierno</th>
                            <th>Barrio</th>
                            <th>Afiliado</th>
                            <th>Actualizado</th>
                            <th colspan="2">

                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($beneficiarios as $beneficiario)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$beneficiario->nucleo_fam}}</td>
                            <td>{{$beneficiario->name}}</td>
                            <td>{{$beneficiario->tipo_doc}}</td>
                            <td>{{$beneficiario->numero}}</td>
                            <td>{{$beneficiario->edad}}</td>
                            <td>{{$beneficiario->genero}}</td>
                            <td>{{$beneficiario->tipo_salud}}</td>
                            <td>{{$beneficiario->salud}}</td>
                            <td>{{$beneficiario->discap}}</td>
                            <td>{{$beneficiario->nivel_edu}}</td>
                            <td>{{$beneficiario->sub_gobierno}}</td>
                            <td>{{$beneficiario->barrio}}</td>
                            <td>{{$beneficiario->user['id'].'-'.$beneficiario->user['name'] }}</td>
                            <td>{{$beneficiario->updated_at->format('Y-m-d')}}</td>

                            <td>
                                {{-- @can('admin.beneficiarios.edit') --}}
                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('admin.beneficiarios.edit', $beneficiario)}}"><i
                                        class="fas fa-pen-square"></i></a>
                                {{-- @endcan --}}
                            </td>
                            <td>
                                {{-- @can('admin.beneficiarios.destroy') --}}
                                <form action="{{route('admin.beneficiarios.destroy', $beneficiario)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="fas fa-eraser"></i></button>
                                </form>
                                {{-- @endcan --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer">
            {{$beneficiarios->links()}}
        </div>
        @else
        <div class="card-body">
            <strong>No hay ningún registro ...</strong>
        </div>
        @endif
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css"></script>
    <script>
        $(document).ready(function () {
            $("#beneficiarios").DataTable();
        });

    </script>
